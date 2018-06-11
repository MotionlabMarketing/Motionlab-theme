<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _motorhomes
{

	public $enabled         = true;
	private $block          = [];
	private $makes_slug     = 'makes';
	private $specs_slug     = 'specs';
	private $specific_brand = null;

	/*
	* These are variables used for filtering. Made them class variables because they are set
	* in the processFilters method and used in the fetchMotorhomes method,
	*/
	private $tax_query 			= [];
	private $berth_filter		= [];
	private $min_price_filter 	= [];
	private $max_price_filter 	= [];

	public function __construct($specific_brand = null) {

		$this->specific_brand = $specific_brand;

		$this->getCategories();
		$this->processFilters(); //THIS DOES NOT HANDLE SORTS. SORTS ARE HANDLED IN fetchMotorhomes
		$this->fetchMotorhomes($this->specific_brand);

	}

	private function getCategories() {

		$make_terms                             = get_terms($this->makes_slug);
		$specs_terms                            = get_terms($this->specs_slug);
		$berth_options                          = $this->get_distinct_meta_values('motorhome_details_berth');
		$lowest_price                           = $this->get_lowest_prices($this->specific_brand);

		$this->block['make_select_terms']       = $make_terms;
		$this->block['specs_select_terms']      = $specs_terms;
		$this->block['berth_select_options']    = $berth_options;
		$this->block['lowest_price']            = $lowest_price;

	}

	private function processFilters() {
		/**
		*	Here we're going to go over any passed in GET variables which handle the filtering.
		*/
		if(isset($_GET['branch'])) {
			$this->tax_query[] = [
				'taxonomy'  => 'branches',
				'terms'     => array($_GET['branch']),
				'field'     => 'slug'
			];
		}

		$berth_filter_options = [];
		for($i = 0; $i < 5; $i++) {
			if(isset($_GET['b'.$i])) {
				$berth_filter_options[] = $_GET['b'.$i];
			}
		}

		if(!empty($berth_filter_options)) {
			$this->berth_filter = [
				'key'		=> 'motorhome_details_berth',
				'compare'	=> 'IN',
				'value'		=> $berth_filter_options
			];
		}

		$tax_query_options = [];
		if(isset($_GET['cfEndKitchen'])) {
			$tax_query_options[] = "end-kitchen";
		}
		if(isset($_GET['cfEndWash'])) {
			$tax_query_options[] = "end-washroom";
		}
		if(isset($_GET['cfEndBed'])) {
			$tax_query_options[] = "end-bedroom";
		}
		if(isset($_GET['cfEndbed'])) {
			$tax_query_options[] = "fixed-bed";
		}
		if(!empty($tax_query_options)) {
			$this->tax_query[] = [
				'taxonomy'	=> 'layouts',
				'field'		=> 'slug',
				'terms'		=> $tax_query_options
			];
		}

		if(isset($_GET['minPrice'])) {
			$this->min_price_filter = [
				'key'		=> 'motorhome_details_price',
				'compare'	=> '>=',
				'value'		=> $_GET['minPrice']
			];
		}
		if(isset($_GET['maxPrice'])) {
			$this->min_price_filter = [
				'key'		=> 'motorhome_details_price',
				'compare'	=> '<=',
				'value'		=> $_GET['maxPrice']
			];
		}
	}

	private function fetchMotorhomes($specific_brand) {

		$orderby_query  = [];
		$brand_clause = [];

		if(isset($_POST['sortby_age']) && $_POST['sortby_age'] != '') :
			$orderby_query['age_clause']    = $_POST['sortby_age'];
		endif;

		if(isset($_POST['sortby_price']) && $_POST['sortby_price'] != '') :
			$orderby_query['price_clause']  = $_POST['sortby_price'];
		endif;

		if(isset($_POST['sortby_berth']) && $_POST['sortby_berth'] != '') :
			$orderby_query['berth_clause']  = $_POST['sortby_berth'];
		endif;

		if($specific_brand != null) :
			$brand_clause = array(
                'key'           => 'motorhome_details_make',
	            'compare'       => '=',
	            'value'         => $specific_brand
            );
		endif;

		$args = array(
			'posts_per_page'    => 8,
			'paged'             => $_POST['page_number'] ?: 1,
			'post_type'         => 'motorhomes',
			'meta_query'        => array(
	            'relation'      => 'AND',
	            'berth_clause'  => array(
	                'key'           => 'motorhome_details_berth',
	                'compare'       => 'EXISTS',
	            ),
	            'age_clause'    => array(
	                'key'           => 'motorhome_details_build_year',
	                'compare'       => 'EXISTS',
	            ),
	            'price_clause'  => array(
	                'key'           => 'motorhome_details_price',
	                'compare'       => 'EXISTS',
	            ),
	            "brand_clause"  => $brand_clause,
				'berth_filter'	=> $this->berth_filter,
				'min_price'		=> $this->min_price_filter,
				'max_price'		=> $this->max_price_filter
	        ),
			'orderby'           => $orderby_query,
			'post_status'       => array('publish'),
			'tax_query'         => $this->tax_query
		);

		$motorhomes = new WP_Query($args);

		//Fetch gallery images for this motorhome.
		foreach($motorhomes->posts as $post) :
			$collection_id = get_field('motorhome_details_showcase', $post->ID);

			$post->showcase_image = [];
			if(!empty($collection_id)) :
				$showcase_args = array(
					'post_type'         => 'gallery',
					'tax_query'         => [
						'taxonomy'  => 'collections',
						'terms'     => [ $collection_id ],
						'field'     => 'slug'
					],
					'posts_per_page'    => 1
				);

				$image = new WP_Query($showcase_args);
				$post->showcase_image = $image;
			endif;
		endforeach;

		$this->block['posts'] = $motorhomes;
	}

	private function get_distinct_meta_values($meta_key){

	    global $wpdb;

	    $result = $wpdb->get_results($wpdb->prepare("
	            SELECT DISTINCT meta_value
	            FROM {$wpdb->postmeta}
	            WHERE meta_key = '%s' AND meta_value != ''
	            ORDER BY meta_value ASC
	        ", $meta_key
	    ));

	    return $result;
	}

	private function get_lowest_prices($meta_value) {

		global $wpdb;

		if($meta_value != null) {
			$result = $wpdb->get_results($wpdb->prepare("
	            SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = 'motorhome_details_price' AND post_id IN (
					SELECT post_id FROM wp_postmeta WHERE meta_key = 'motorhome_details_make' AND meta_value = '%s'
				) ORDER BY meta_value ASC LIMIT 1;
		        ", $meta_value
		    ));
		} else {
			$result = $wpdb->get_results("SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = 'motorhome_details_price' LIMIT 1");
		}

	    return $result;

	}

	public function getBlock() {
		return $this->block;
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _caravans extends CPTCore
{

	public $enabled         = true;
	private $block          = [];
	private $makes_slug     = 'makes';
	private $specs_slug     = 'specs';

	public function __construct() {

		$this->getCategories();
		$this->fetchCaravans();

	}

	private function getCategories() {

		$make_terms                             = get_terms($this->makes_slug);
		$specs_terms                            = get_terms($this->specs_slug);
		$berth_options                          = $this->get_distinct_meta_values('caravan_details_berth');

		$this->block['make_select_terms']       = $make_terms;
		$this->block['specs_select_terms']      = $specs_terms;
		$this->block['berth_select_options']    = $berth_options;

	}

	private function fetchCaravans() {

		$tax_query      = [];
		$orderby_query  = [];

		if(isset($_POST['sortby_age']) && $_POST['sortby_age'] != '') :
			$orderby_query['age_clause']    = $_POST['sortby_age'];
		endif;

		if(isset($_POST['sortby_price']) && $_POST['sortby_price'] != '') :
			$orderby_query['price_clause']  = $_POST['sortby_price'];
		endif;

		if(isset($_POST['sortby_berth']) && $_POST['sortby_berth'] != '') :
			$orderby_query['berth_clause']  = $_POST['sortby_berth'];
		endif;

		$args = array(
			'posts_per_page'    => 8,
			'paged'             => $_POST['page_number'] ?: 1,
			'post_type'         => 'caravans',
			'meta_query'        => array(
	            'relation'      => 'AND',
	            'berth_clause'  => array(
	                'key'           => 'caravan_details_berth',
	                'compare'       => 'EXISTS',
	            ),
	            'age_clause'    => array(
	                'key'           => 'caravan_details_build_year',
	                'compare'       => 'EXISTS',
	            ),
	            'price_clause'  => array(
	                'key'           => 'caravan_details_price',
	                'compare'       => 'EXISTS',
	            )
	        ),
			'orderby'           => $orderby_query,
			'post_status'       => array('publish'),
			'tax_query'         => $tax_query
		);

		$caravans = new WP_Query($args);

		//Fetch gallery images for this caravan.
		foreach($caravans->posts as $post) :
			$collection_id = get_field('caravan_details_showcase', $post->ID);

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

		$this->block['posts'] = $caravans;
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

	public function getBlock() {
		return $this->block;
	}
}

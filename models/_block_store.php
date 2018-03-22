<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_store
{

	private $current;
	private $layout;
	private $block = [];
	private $category_slug = 'product_categories';
	private $colours_slug = 'product_colours';

	public function __construct($block, $current) {

		$this->block = $block;
		$this->current = $current;
		$this->layout = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

		$this->getCategories();
		$this->fetchProducts();

	}

	private function loadBlockSettings() {

		//Any specific block settings should be loaded into $block here.

	}

	private function getCategories() {

		$this->block['category_select_options'] = $this->get_taxonomy_hierarchy($this->category_slug, array('hide_empty' => false, 'parent' => 0));
		$this->block['colour_select_options'] = $this->get_taxonomy_hierarchy($this->colours_slug, array('hide_empty' => false, 'parent' => 0));

	}

	/**
	 * @param $taxonomy
	 * @param $args
	 *
	 * @return array
	 */
	private function get_taxonomy_hierarchy( $taxonomy, $args) {

		$taxonomy   = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
		$terms      = get_terms( $taxonomy, $args );
		$children   = array();

		foreach ( $terms as $term ){

			$term->children = $this->get_taxonomy_hierarchy( $taxonomy, array('hide_empty' => false, 'parent' => $term->term_id) );
			$children[ $term->term_id ] = $term;

		}

		return $children;
	}

	private function fetchProducts() {

		$tax_query = [];

		if ( isset($_POST['category_filter']) && $_POST['category_filter'] != '' ) {
			$tax_query[] = [
				'taxonomy'  => 'product_categories',
				'terms'     => [ $_POST['category_filter'] ],
				'field'     => 'slug'
			];
		}

		if ( isset($_POST['colour_filter']) && $_POST['colour_filter'] != '' ) {
			$tax_query[] = [
				'taxonomy'  => 'product_colours',
				'terms'     => [ $_POST['colour_filter'] ],
				'field'     => 'slug'
			];
		}

		$args = array(
			'posts_per_page'    => $_POST['block_post_per_page'] ?: 6,
			'paged'             => $_POST['block_page'] ?: 1,
			'post_type'         => "products",
			'tax_query'         => $tax_query
		);

		$this->block['posts'] = new WP_Query( $args );

	}

	public function renderBlock() {
		$block = $this->block;

		switch ($this->block['layout']):
		    case "slidingPanels":
		        include(BLOCKS_DIR . 'store/__slidingPanels.php');
		        break;
		    default:
		        include(BLOCKS_DIR . 'jobs/__talent.php');
		        break;
		endswitch;

	}
}
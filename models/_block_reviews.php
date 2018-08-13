<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_reviews
{

	private $current;
	private $layout;
	private $block = [];
	private $category_filter;

	public function __construct($block, $current) {

		$this->block   = $block;
		$this->current = $current;
		$this->layout  = get_sub_field($current . '_layout');
		$this->category_filter = get_sub_field('block_reviews_category_filter');

		$this->loadBlockSettings();

		$this->fetchPosts();

	}

	private function loadBlockSettings() {

		$this->block['title']           = get_sub_field($this->current . '_title_title');
		$this->block['include_stars']   = get_sub_field('block_reviews_include_stars');
		$this->block['review_columns']  = get_sub_field('block_reviews_columns');

	}

	public function fetchPosts($review_count = 3) {

		$tax_query = [];

		if(!empty($this->category_filter)):
			foreach($this->category_filter as $cat_filter) :
				$category_filters[] = $cat_filter->slug;
			endforeach;
			$tax_query[] = [
				'taxonomy'  => 'reviewer',
				'terms'     => $category_filters,
				'field'     => 'slug'
			];
		endif;

		$args = array(
			'posts_per_page'    => $this->block['review_columns'],
			'paged'             => 1,
			'post_type'         => 'reviews',
			'post_status'       => array( 'publish' ),
			'order'             => 'rand',
			'tax_query'         => $tax_query
		);

		$this->block['posts'] = new WP_Query( $args );

		return $this->block['posts'];

	}

	public function renderBlock() {
		$block = $this->block;

		switch ($this->layout):
		    default:
		        include(BLOCKS_DIR . 'reviews/__basic.php');
		        break;
		endswitch;

	}
}

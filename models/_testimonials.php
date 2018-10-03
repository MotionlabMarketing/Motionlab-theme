<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _testimonials
{

	public $enabled = true;
	private $block = [];
	private $category_slug = 'reviewer';
	private $category_filter;
	private $default_category;

	public function __construct($default_category = null) {

		$this->category_filter = get_sub_field('block_reviews_category_filter');
		$this->default_category = $default_category;

		$this->getCategories();
		$this->fetchReviews();

	}

	private function getCategories() {

		$terms                          = get_terms($this->category_slug, array(
										    'hide_empty' => false,
										));
		$this->block['select_terms']    = $terms;

		return $terms;

	}

	private function fetchReviews() {

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

		if(!empty($this->default_category)) {
			$tax_query[] = [
				'taxonomy'  => 'reviewer',
				'terms'     => $this->default_category,
				'field'     => 'slug'
			];
		}

		$args = array(
			'posts_per_page'    => 8,
			'paged'             => $_POST['page_number'] ?: 1,
			'post_type'         => 'reviews',
			'orderby'           => 'date',
			'order'             => 'DESC',
			'post_status'       => 'publish',
			'tax_query'         => $tax_query
		);

		$testimonials = new WP_Query($args);

		$this->block['posts'] = $testimonials;
	}

	public function getBlock() {
		return $this->block;
	}
}

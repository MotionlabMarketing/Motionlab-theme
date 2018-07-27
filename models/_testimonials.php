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

	public function __construct() {

		$this->getCategories();
		$this->fetchReviews();

	}

	private function getCategories() {

		$terms                          = get_terms($this->category_slug);
		$this->block['select_terms']    = $terms;

		return $terms;

	}

	private function fetchReviews() {

		$tax_query = [];

		if(isset($_POST['category_filter']) && $_POST['category_filter'] != ""):
			$tax_query[] = [
				'taxonomy'  => 'reviewer',
				'terms'     => [ $_POST['category_filter'] ],
				'field'     => 'slug'
			];
		endif;

		$args = array(
			'posts_per_page'    => 8,
			'paged'             => $_POST['page_number'] ?: 1,
			'post_type'         => 'reviews',
			'orderby'           => 'date',
			'order'             => 'DESC',
			'tax_query'         => $tax_query
		);

		$testimonials = new WP_Query($args);

		$this->block['posts'] = $testimonials;
	}

	public function getBlock() {
		return $this->block;
	}
}

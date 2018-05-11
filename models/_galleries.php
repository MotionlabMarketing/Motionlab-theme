<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _galleries
{

	public $enabled = true;
	private $block = [];
	private $category_slug = 'collections';

	public function __construct() {

		$this->getCategories();
		$this->fetchCollections();

	}

	private function getCategories() {

		$terms                          = get_terms($this->category_slug);
		$this->block['select_terms']    = $terms;

		return $terms;

	}

	private function fetchCollections() {

		$tax_query = [];

		if(isset($_POST['category_filter']) && $_POST['category_filter'] != ""):
			$tax_query[] = [
				'taxonomy'  => 'collections',
				'terms'     => [ $_POST['category_filter'] ],
				'field'     => 'slug'
			];
		endif;

		$args = array(
			'posts_per_page'    => 16,
			'paged'             => $_POST['page_number'] ?: 1,
			'post_type'         => 'gallery',
			'orderby'           => 'date',
			'order'             => 'DESC',
			'tax_query'         => $tax_query
		);

		$gallery = new WP_Query($args);

		$this->block['posts'] = $gallery;
	}

	public function getBlock() {
		return $this->block;
	}
}

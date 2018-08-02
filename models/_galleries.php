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
	private $from = 0;

	public function __construct($from = 0) {

		$this->from = $_POST['from'] ?: $from;

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
			'posts_per_page'    => -1,
			'post_type'         => 'gallery',
			'orderby'           => 'date',
			'order'             => 'DESC',
			'tax_query'         => $tax_query
		);

		$gallery = new WP_Query($args);

		$gallery_images = [];
		foreach($gallery->posts as $post):
			foreach(get_field('image', $post->ID) as $image):
				$gallery_images[] = [
					"fullsize"  => $image['url'],
					"preview"   => $image['sizes']['galleryMedium']
				];
			endforeach;
		endforeach;

		$this->block['total']   = count($gallery_images);
		$this->block['posts']   = array_slice($gallery_images, $this->from, 12);
		$this->block['from']    = $this->from;
	}

	public function getBlock() {
		return $this->block;
	}
}

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

	public function __construct($block, $current) {

		$this->block   = $block;
		$this->current = $current;
		$this->layout  = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

		$this->fetchPosts();

	}

	private function loadBlockSettings() {

		$this->block['title']               = get_sub_field($this->current . '_title_title');
		
		$this->block['include_stars']       = get_sub_field($this->current . '_include_stars');
		$this->block['include_border']      = get_sub_field($this->current . '_include_border');
		$this->block['include_background']  = get_sub_field($this->current . '_include_background');

		$this->block['page_button']         = get_sub_field($this->current . '_page_button');

	}

	public function fetchPosts($review_count = 3) {

		$args = array(
			'posts_per_page'    => $review_count,
			'paged'             => 1,
			'post_type'         => 'reviews',
			'post_status'       => array( 'publish' ),
			'order'             => 'rand',
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

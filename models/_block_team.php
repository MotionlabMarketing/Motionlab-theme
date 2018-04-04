<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_team
{

	private $current;
	private $layout;
	private $block = [];
	private $profile_count = 5;

	public function __construct($block, $current) {

		$this->block   = $block;
		$this->current = $current;
		$this->layout  = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

		$this->fetchPosts($this->profile_count);

	}

	private function loadBlockSettings() {

		$this->profile_count            = get_sub_field('block_team_profiles') != "" ? get_sub_field('block_team_profiles') : 5;
		$this->selected_profiles        = get_sub_field('block_team_selected_profiles');
		$this->block['page_button']     = get_sub_field('block_team_button');

	}

	public function fetchPosts($profile_count = 5) {

		$this->block['posts']->posts = [];
		foreach($this->selected_profiles as $post_id) :
			$this->block['posts']->posts[] = get_post($post_id);
		endforeach;

		if(empty($this->selected_profiles) || sizeof($this->selected_profiles) < $profile_count) :

			$args = array(
				'posts_per_page'    => $profile_count - (!empty($this->selected_profiles) ? sizeof($this->selected_profiles) : 0),
				'paged'             => 1,
				'post_type'         => 'team_members',
				'order'             => 'rand',
				'post__not_in'      => $this->selected_profiles
			);

			$temp_members = new WP_Query( $args );

			$this->block['posts']->posts = array_merge($this->block['posts']->posts, $temp_members->posts);
		endif;

		return $this->block['posts'];

	}

	public function renderBlock() {
		$block = $this->block;

		switch ($this->layout):
		    default:
		        include(BLOCKS_DIR . 'team/__basic.php');
		        break;
		endswitch;

	}
}

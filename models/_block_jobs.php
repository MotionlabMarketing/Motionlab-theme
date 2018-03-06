<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_jobs {

	private $current;
	private $layout;
	private $block = [];

	public function __construct($block, $current, $post_vars) {

		$this->block = $block;
		$this->current = $current;
		$this->layout = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

	}

	private function loadBlockSettings() {

		$this->block['bg_color']     = get_sub_field($this->current . '_background_system_background_colours');
		$this->block['text_color']    = get_sub_field($this->current . '_text_system_text_colours');
		$this->block['block_width']  = get_sub_field($this->current . '_width_block_width');

		$this->block['block_title']  = get_sub_field($this->current . '_title_title');

		$this->block['sections']    = get_sub_field($this->current . '_sections');

	}

	public function renderBlock() {
		$block = $this->block;

		switch ($this->layout):
		    case "jobs_aside":
		        include(BLOCKS_DIR . 'jobs/__jobs_aside.php');
		        break;
		    case "talent_aside":
		        include(BLOCKS_DIR . 'jobs/__talent_aside.php');
		        break;
		    case "latest_jobs":
		        include(BLOCKS_DIR . 'jobs/__latest_jobs.php');
		        break;
		    case "talent":
		        include(BLOCKS_DIR . 'jobs/__talent.php');
		        break;
		    default:
		        include(BLOCKS_DIR . 'jobs/__talent.php');
		        break;
		endswitch;

	}
}

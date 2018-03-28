<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_tabs
{

	private $current;
	private $layout;
	private $block = [];
	private $category_slug = 'sectors';

	public function __construct($block, $current) {

		$this->block = $block;
		$this->current = $current;
		$this->layout = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

		if($this->layout == 'employer'): $this->getCategories(); endif;

	}

	private function loadBlockSettings() {

		$this->block['tabs']                           = get_sub_field($this->current . '_tabs');
		$this->block['title']                          = get_sub_field($this->current . '_title_title');
		$this->block['content']                        = get_sub_field($this->current . '_content');

		$this->block['sections']                       = get_sub_field($this->current . '_sections');

		$this->block['tabs_settings']['tab_position']  = get_sub_field($this->current . '_position');
		$this->block['tabs_settings']['tab_size']      = get_sub_field($this->current . '_size');
		$this->block['tabs_settings']['tab_weight']    = get_sub_field($this->current . '_weight');
		$this->block['tabs_settings']['box_borders']   = get_sub_field($this->current . '_box_borders');
		$this->block['tabs_settings']['box_radius']    = get_sub_field($this->current . '_box_radius');

		$this->block['tabs_settings']['box_bg']        = get_sub_field($this->current . '_box_background');
		$this->block['tabs_settings']['box_bg']        = $this->block['tabs_settings']['box_bg']['system_background_colours'];

	}

	private function getCategories() {

		$this->block['select_terms'] = get_terms($this->category_slug);

	}

	public function renderBlock() {
		$block = $this->block;
		$current = $this->current;

		switch ($this->layout):
		    case "employer":
		        include(BLOCKS_DIR . 'tabs/__employer_tabs.php');
		        break;
		    case "contentAside":
		        include(BLOCKS_DIR . 'tabs/__contentAside.php');
		        break;
		    case "dot_tabs":
		        include(BLOCKS_DIR . 'tabs/__dot_tabs.php');
		        break;
		    default:
		        include(BLOCKS_DIR . 'tabs/__basic.php');
		        break;
		endswitch;

	}
}

<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_news
{

	private $current;
	private $layout;
	private $block = [];
	private $latest = true;

	public function __construct($block, $current) {

		$this->block = $block;
		$this->current = $current;
		$this->layout = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

		$this->fetchPosts();

	}

	private function loadBlockSettings() {

		$this->block['content']['type']      = get_sub_field($this->current . '_selection');
		$this->block['content']['feeds']     = get_sub_field($this->current . '_enabledSocial');
		$this->block['content']['link']      = get_sub_field($this->current . '_enabledmore');
		$this->block['content']['articles']  = get_sub_field($this->current . '_articles');
		$this->block['content']['link']      = get_sub_field($this->current . '_news_link');
		$this->block['content']['txtColor']  = get_sub_field($this->current . '_txtColor_system_text_colours');

		$this->block['content']['date']      = get_sub_field($this->current . '_enablePostDate');
		$this->block['content']['buttons']   = get_sub_field($this->current . '_enableButtons');
		$this->block['content']['button']    = get_sub_field($this->current . '_buttons');

		// GET THE COLUMN SIZES NEEDED IF SOCIAL IS INCLUDED.
		if ($this->block['content']['feeds'] == true):

		    $this->block['content']['cols'] = [0 => '8', 1 => '4'];
		    $this->block['temp'] = get_field('social_links', 'option');

		    // NEED TO BE SWITCHED ROUND REALLY.
		    foreach ($this->block['temp'] as $a):

		        // GET FACEBOOK USERNAME
		        if (strpos($a['link'] , "facebook") == true):
		            $b = explode("/", $a['link']);
		            $block['content']['profiles']['facebook'] = $b[3];
		        endif;

		        // GET TWITTER USERNAME
		        if (strpos($a['link'] , "twitter") == true):
		            $b = explode("/", $a['link']);
		            $block['content']['profiles']['twitter'] = $b[3];
		        endif;
		    endforeach;

		    unset($this->block['temp']);

		else:

		    $this->block['content']['cols'] = [0 => '12'];

		endif;

	}

	private function fetchPosts() {

		if($this->block['content']['type'] == "latest") {

			$args = array(
				'posts_per_page'    => 4,
				'paged'             => 1,
				'post_type'         => 'post'
			);

			$this->block['posts'] = new WP_Query( $args );

		} else {

			foreach(get_sub_field('block_news_articles') as $post_id) {
				$this->block['posts']->posts[] = get_post($post_id);
			}
		}


	}

	public function renderBlock() {
		$block = $this->block;

		switch ($block['layout']):
		    case "list":
		        include(BLOCKS_DIR . 'news/__list.php');
		        break;
		    case "row":
		        include(BLOCKS_DIR . 'news/__row.php');
		        break;
		    default:
		        include(BLOCKS_DIR . 'news/__column.php');
		        break;
		endswitch;

	}
}

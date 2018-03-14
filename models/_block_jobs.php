<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_jobs
{

	private $current;
	private $layout;
	private $block                  = [];
	private $sector_taxonomy_slug   = 'sectors';
	private $location_taxonomy_slug = 'locations';
	private $role_taxonomy_slug     = 'roles';
	private $type_taxonomy_slug     = 'types';

	public function __construct($block, $current) {

		$this->block    = $block;
		$this->current  = $current;
		$this->layout   = get_sub_field($current . '_layout');

		/*  These are the functions that will grab all the data required before the controller renders the block.
			Each function should return or push something to the $this->block[] array.
		*/
		$this->loadBlockSettings();
		$this->fetchCategories();

		if($this->layout != '_key_areas')
			$this->fetchPosts();

	}

	private function loadBlockSettings() {

		//TODO: Move this to the block settings
		$this->block['block_title']     = get_sub_field($this->current . '_title_title');

		if($this->layout == '_key_areas')
			$this->block['sections']        = get_sub_field($this->current . '_keyarea');

		if($this->layout == '_jobs_aside')
			$this->block['sections']        = get_sub_field($this->current . '_sections');

	}

	private function fetchCategories() {

		$this->block['sector_select_options']   = $this->get_taxonomy_hierarchy($this->sector_taxonomy_slug, array('hide_empty' => false, 'parent' => 0));
		$this->block['location_select_options'] = $this->get_taxonomy_hierarchy($this->location_taxonomy_slug, array('hide_empty' => false, 'parent' => 0));
		$this->block['role_select_options']     = $this->get_taxonomy_hierarchy($this->role_taxonomy_slug, array('hide_empty' => false, 'parent' => 0));
		$this->block['type_select_options']     = $this->get_taxonomy_hierarchy($this->type_taxonomy_slug, array('hide_empty' => false, 'parent' => 0));

	}

	private function fetchPosts() {

		$tax_query = [];

		if ( isset($_POST['sector_filter']) && $_POST['sector_filter'] != '' ) {
			$tax_query[] = [
				'taxonomy'  => 'sectors',
				'terms'     => [ $_POST['sector_filter'] ],
				'field'     => 'slug'
			];
		}

		if ( isset($_POST['location_filter']) && $_POST['location_filter'] != '' ) {
			$tax_query[] = array(
				'taxonomy'  => 'locations',
				'terms'     => array($_POST['location_filter']),
				'field'     => 'slug'
			);
		}

		if ( isset($_POST['type_filter']) && $_POST['type_filter'] != '') {
			$tax_query[] = array(
				'taxonomy'  => 'types',
				'terms'     => array($_POST['type_filter'] && $_POST['type_filter'] != ''),
				'field'     => 'slug'
			);
		}

		if ( isset($_POST['role_filter']) && $_POST['role_filter'] != '') {
			$tax_query[] = array(
				'taxonomy'  => 'types',
				'terms'     => array($_POST['type_filter'] && $_POST['type_filter'] != ''),
				'field'     => 'slug'
			);
		}

		//TODO: ADD IN SALARY FILTER


		if($this->layout == 'talent' || $this->layout == 'talent_aside') $post_type = 'talent'; else $post_type = 'jobs';

		$args = array(
			'posts_per_page'    => $_POST['block_post_per_page'] ?: 6,
			'paged'             => $_POST['block_page'] ?: 1,
			'post_type'         => $post_type,
			'tax_query'         => $tax_query
		);

		$this->block['posts'] = new WP_Query( $args );

	}

	/**
	 * @param $taxonomy
	 * @param $args
	 *
	 * @return array
	 */
	private function get_taxonomy_hierarchy( $taxonomy, $args) {

		$taxonomy   = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
		$terms      = get_terms( $taxonomy, $args );
		$children   = array();

		foreach ( $terms as $term ){

			$term->children = $this->get_taxonomy_hierarchy( $taxonomy, array('hide_empty' => false, 'parent' => $term->term_id) );
			$children[ $term->term_id ] = $term;

		}

		return $children;
	}

	/**
	 * Renders block
	 */
	public function renderBlock() {

		$block = $this->block;

		switch ($this->layout):
		    case "key_areas":
		        include(BLOCKS_DIR . 'jobs/__key_areas.php');
		        break;
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

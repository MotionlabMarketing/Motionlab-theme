<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 03/04/18
 * Time: 17:57
 */

/*  IMPORTANT: This is not technically a custom post type but I needed somewhere to extend the
	built in taxonomies for standard wordpress posts.
*/

Class CPTPosts extends CPTCore {

	public $enabled = true;

	/**
	 * CPTTeam constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	public function registerPostType() {
		return false;
	}

	public function registerTaxonomies() {

		//Register PRODUCT CATEGORIES taxonomy
		$labels = [
			'name'              => _x( 'Post Types', 'taxonomy general name' ),
			'singular_name'     => _x( 'Post Type', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Post Types' ),
			'all_items'         => __( 'All Post Types' ),
			'parent_item'       => __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'edit_item'         => __( 'Edit Type' ),
			'update_item'       => __( 'Update Type' ),
			'add_new_item'      => __( 'Add New Post Type' ),
			'new_item_name'     => __( 'New Post Type Name' ),
			'menu_name'         => __( 'Post Types' ),
		];

		register_taxonomy( 'post_specific_types', [ 'post' ], [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'post_specific_types' ],
			  'show_admin_column' => true,
		  'show_in_nav_menus' => false,
		  'show_tagcloud' => false,
			'capabilities' => array(
			    'manage_terms' => '',
			    'edit_terms' => '',
			    'delete_terms' => '',
			    'assign_terms' => 'edit_posts'
			  ),
		] );

	}
}

$team_cpt = (new CPTPosts());

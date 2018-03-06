<?php

Class CPTTeam extends CPTCore{

	public $enabled = false;

	/**
	 * CPTTeam constructor.
	 */
	public function __construct() {
		parent::__construct();
	}


	public function registerPostType() {
		$labels = array(
			'name'                => __( 'Team Members' ),
			'singular_name'       => __( 'Team Member'),
			'menu_name'           => __( 'Team Members'),
			'parent_item_colon'   => __( 'Parent Team'),
			'all_items'           => __( 'All Team Members'),
			'view_item'           => __( 'View Member'),
			'add_new_item'        => __( 'Add New Member'),
			'add_new'             => __( 'Add New'),
			'edit_item'           => __( 'Edit Member'),
			'update_item'         => __( 'Update Member'),
			'search_items'        => __( 'Search Team'),
			'not_found'           => __( 'Not Found'),
			'not_found_in_trash'  => __( 'Not found in Trash')
		);
		$args = array(
			'label'               => __( 'team_members'),
			'description'         => __( 'Manage your team members.'),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
			'public'              => true,
			'hierarchical'        => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'has_archive'         => true,
			'can_export'          => true,
			'exclude_from_search' => false,
		        'yarpp_support'       => true,
			'taxonomies' 	      => array('post_tag'),
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'           => 'dashicons-groups'
		);

		register_post_type( 'team_members', $args );
	}

}

$team_cpt = (new CPTTeam());

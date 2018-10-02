<?php

Class CPTGlobalCTA extends CPTCore {

	public $enabled = true;

	/**
	 * CPTTeam constructor.
	 */
	public function __construct() {
		parent::__construct();
	}


	public function registerPostType() {
		$labels = array(
			'name'                => __( 'Global CTA' ),
			'singular_name'       => __( 'Global CTA'),
			'menu_name'           => __( 'Global CTAs'),
			'parent_item_colon'   => __( 'Parent CTA'),
			'all_items'           => __( 'All Global CTAs'),
			'view_item'           => __( 'View Global CTA'),
			'add_new_item'        => __( 'Add New Global CTA'),
			'add_new'             => __( 'Add New'),
			'edit_item'           => __( 'Edit Global CTA'),
			'update_item'         => __( 'Update Global CTA'),
			'search_items'        => __( 'Search Global CTAs'),
			'not_found'           => __( 'Not Found'),
			'not_found_in_trash'  => __( 'Not found in Trash')
		);
		$args = array(
			'label'               => __( 'global_cta'),
			'description'         => __( 'Manage your Global CTAs.'),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
			'public'              => true,
			'hierarchical'        => true,
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
			'menu_icon'           => 'dashicons-megaphone',
			'rewrite'             => array(
				'with_front'    => false
			)
		);

		register_post_type( 'global_cta', $args );
	}

}

(new CPTGlobalCTA());

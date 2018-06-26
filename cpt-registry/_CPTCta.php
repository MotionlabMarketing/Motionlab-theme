<?php

Class CPTCta extends CPTCore{

	public $enabled = true;

	/**
	 * CPTCta constructor.
	 */
	public function __construct() {
		parent::__construct();
	}


	public function registerPostType() {
		$labels = array(
			'name'                => __( 'Global CTAs' ),
			'singular_name'       => __( 'CTA'),
			'menu_name'           => __( 'Global CTAs'),
			'parent_item_colon'   => __( 'Parent CTA'),
			'all_items'           => __( 'All CTAs'),
			'view_item'           => __( 'View CTA'),
			'add_new_item'        => __( 'Add New CTA'),
			'add_new'             => __( 'Add New'),
			'edit_item'           => __( 'Edit CTA'),
			'update_item'         => __( 'Update CTA'),
			'search_items'        => __( 'Search CTAs'),
			'not_found'           => __( 'Not Found'),
			'not_found_in_trash'  => __( 'Not found in Trash')
		);
		$args = array(
			'label'               => __( 'global_ctas'),
			'description'         => __( 'Manage your site CTAs.'),
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

		register_post_type( 'global_ctas', $args );
	}

}

$team_cpt = (new CPTCta());

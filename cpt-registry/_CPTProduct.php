<?php

Class CPTProduct extends CPTCore{

	public $enabled = true;

	/**
	 * CPTTeam constructor.
	 */
	public function __construct() {
		parent::__construct();
	}


	public function registerPostType() {
		$labels = array(
			'name'                => __( 'Products' ),
			'singular_name'       => __( 'Product'),
			'menu_name'           => __( 'Products'),
			'parent_item_colon'   => __( 'Parent Product'),
			'all_items'           => __( 'All Products'),
			'view_item'           => __( 'View Product'),
			'add_new_item'        => __( 'Add New Product'),
			'add_new'             => __( 'Add New'),
			'edit_item'           => __( 'Edit Product'),
			'update_item'         => __( 'Update Product'),
			'search_items'        => __( 'Search Products'),
			'not_found'           => __( 'Not Found'),
			'not_found_in_trash'  => __( 'Not found in Trash')
		);
		$args = array(
			'label'               => __( 'products'),
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
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'           => 'dashicons-cart'
		);

		register_post_type( 'products', $args );
	}

	public function registerTaxonomies() {

		//Register PRODUCT CATEGORIES taxonomy
		$labels = [
			'name'              => _x( 'Product Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Categories' ),
			'all_items'         => __( 'All Categories' ),
			'parent_item'       => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item'         => __( 'Edit Category' ),
			'update_item'       => __( 'Update Category' ),
			'add_new_item'      => __( 'Add New Product Category' ),
			'new_item_name'     => __( 'New Product Category Name' ),
			'menu_name'         => __( 'Product Categories' ),
		];

		register_taxonomy( 'product_categories', [ 'products' ], [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'product_category' ],
		] );

		//Register COLOURS taxonomy
		$labels = [
			'name'              => _x( 'Product Colours', 'taxonomy general name' ),
			'singular_name'     => _x( 'Product Colour', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Colours' ),
			'all_items'         => __( 'All Colours' ),
			'parent_item'       => __( 'Parent Colour' ),
			'parent_item_colon' => __( 'Parent Colour:' ),
			'edit_item'         => __( 'Edit Colour' ),
			'update_item'       => __( 'Update Colour' ),
			'add_new_item'      => __( 'Add New Product Colour' ),
			'new_item_name'     => __( 'New Product Colour Name' ),
			'menu_name'         => __( 'Product Colours' ),
		];

		register_taxonomy( 'product_colours', [ 'products' ], [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'product_colour' ],
		] );
	}

}

$team_cpt = (new CPTProduct());

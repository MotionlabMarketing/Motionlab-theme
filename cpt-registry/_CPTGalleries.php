<?php

Class CPTGallery extends CPTCore{

	public $enabled = true;

	/**
	 * CPTTeam constructor.
	 */
	public function __construct() {
		parent::__construct();
	}


	public function registerPostType() {

	    register_post_type( 'gallery',
	        array(
	            'labels' => array(
	                'name'          => __( 'Gallery' ),
	                'singular_name' => __( 'Gallery' )
	            ),
	            'taxonomies'        => array('galleries'),
	            'public'            => true,
	            'has_archive'       => false,
	            'rewrite'           => array('slug' => 'gallery-image'),
	            'menu_icon'         => 'dashicons-images-alt2',
	        )
	    );

	}

	public function registerTaxonomies() {

	    $labels = array(
	        'name' => _x( 'Collections', 'Collections' ),
	        'singular_name' => _x( 'Collection', 'Collection' ),
	        'search_items' =>  __( 'Search Collections' ),
	        'all_items' => __( 'All Collections' ),
	        'parent_item' => __( 'Parent Collection' ),
	        'parent_item_colon' => __( 'Parent Collections:' ),
	        'edit_item' => __( 'Edit Collection' ),
	        'update_item' => __( 'Update Collection' ),
	        'add_new_item' => __( 'Add New Collection' ),
	        'new_item_name' => __( 'New Collections Name' ),
	        'menu_name' => __( 'Collections' ),
	    );

	    register_taxonomy('collections', array('gallery'), array(
	        'hierarchical' => true,
	        'labels' => $labels,
	        'show_ui' => true,
	        'show_admin_column' => true,
	        'query_var' => true,
	        'rewrite' => array( 'slug' => 'collections' ),
	    ));
	}

}

$team_cpt = (new CPTGallery());

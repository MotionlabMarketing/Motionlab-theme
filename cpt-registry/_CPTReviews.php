<?php

Class CPTReviews extends CPTCore{

	public $enabled = true;

	/**
	 * CPTTeam constructor.
	 */
	public function __construct() {
		parent::__construct();
	}


	public function registerPostType() {
	    register_post_type( 'reviews',
	        array(
	            'labels' => array(
	                'name'          => __( 'Reviews' ),
	                'singular_name' => __( 'Reviews' )
	            ),
	            'public'            => true,
	            'has_archive'       => false,
	            'rewrite'           => array('slug' => 'reviews'),
	            'menu_icon'         => 'dashicons-thumbs-up',
	        )
	    );
	}

	public function registerTaxonomies() {

		$labels = array(
	        'name' => _x( 'Reviewers', 'Reviewers' ),
	        'singular_name' => _x( 'Reviewer', 'Reviewer' ),
	        'search_items' =>  __( 'Search Reviewers' ),
	        'all_items' => __( 'All Reviewers' ),
	        'parent_item' => __( 'Parent Reviewer' ),
	        'parent_item_colon' => __( 'Parent Reviewers:' ),
	        'edit_item' => __( 'Edit Reviewer' ),
	        'update_item' => __( 'Update Reviewer' ),
	        'add_new_item' => __( 'Add New Reviewer' ),
	        'new_item_name' => __( 'New Reviewers Name' ),
	        'menu_name' => __( 'Reviewers' ),
	    );

	// Now register the taxonomy

	    register_taxonomy('reviewer', array('reviews'), array(
	        'hierarchical' => true,
	        'labels' => $labels,
	        'show_ui' => true,
	        'show_admin_column' => true,
	        'query_var' => true,
	        'rewrite' => array( 'slug' => 'reviewer' ),
//	        'capabilities' => array(
//			    'manage_terms' => '',
//			    'edit_terms' => '',
//			    'delete_terms' => '',
//			    'assign_terms' => 'edit_posts'
//			),
	    ));
	}

}

$team_cpt = (new CPTReviews());

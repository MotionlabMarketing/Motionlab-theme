<?php
/**
* Mike Booth functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package motionlabtheme
*/


/*==================================================================
UNDERSCORES STUFF
==================================================================*/

if ( ! function_exists( 'motionlabtheme_setup' ) ) :
	function motionlabtheme_setup() {
		load_theme_textdomain( 'motionlabtheme', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Main Menu', 'motionlabtheme' ),
			'top-menu' => esc_html__( 'Top Menu', 'motionlabtheme' ),
			'footer_1' => esc_html__( 'Footer 1', 'motionlabtheme' ),
			'footer_2' => esc_html__( 'Footer 2', 'motionlabtheme' ),
			'footer_3' => esc_html__( 'Footer 3', 'motionlabtheme' ),
			'tnc' => esc_html__( 'Footer – Legal Links', 'motionlabtheme' ), // TODO: Update the naming on this.
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'motionlabtheme_setup' );



// Register widget area.
// function motionlabtheme_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'motionlabtheme' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'motionlabtheme' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'motionlabtheme_widgets_init' );


// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';



/*==================================================================
STYLES AND SCRIPTS
==================================================================*/

function websiteadvanced_scripts() {

	// deregister default jQuery included with Wordpress
	wp_deregister_script( 'jquery' );

	$jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js';
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), '20130115', false );

	//Main Scripts
	wp_enqueue_script ('map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAmmvkoPA2evn0of5_sXcmyk5uoiDRBe-Q&#038;extension=.js', array('jquery'),'', true);
	wp_enqueue_script ('main', get_template_directory_uri() . '/assets/scripts/main-min.js', array('jquery'),'', true);

	//Main Styles
	wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/main-min.css' );

	//Maps
	//wp_enqueue_script ('map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDEN3LHOOKqILWrucfQaF1THTHI2bCw-00', array('jquery'),'', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'websiteadvanced_scripts' );


/*==================================================================
ACF OPTIONS PAGES
==================================================================*/

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('Theme');
	acf_add_options_sub_page('Global Banner');
}


/*==================================================================
DEFAULT IMAGES
==================================================================*/
function remove_default_image_sizes( $sizes) {
	unset( $sizes['thumbnail']);
	//unset( $sizes['medium']);
	//unset( $sizes['medium_large']);
	unset( $sizes['large']);
	//unset( $sizes['full']);

	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');


add_theme_support( 'post-thumbnails' );
add_image_size( 'logoCrop', 300, 300, true);
add_image_size( 'medium', 480, 480, false );
add_image_size( 'mediumCrop', 400, 280, true );



/*==================================================================
ALLOW SVGs TO BE UPLOADED
==================================================================*/
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*==================================================================
REMOVE PRE TEXT FROM CATEGORIES
==================================================================*/
add_filter( 'get_the_archive_title', function ($title) {

	if ( is_category() ) {

		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {

		$title = single_tag_title( '', false );

	} elseif ( is_author() ) {

		$title = '<span class="vcard">' . get_the_author() . '</span>' ;

	}

	return $title;

});

/*==================================================================
WORK OUT MENU NAMES
==================================================================*/
function gymgear_get_menu_by_location( $location ) {
	if( empty($location) ) return false;

	$locations = get_nav_menu_locations();
	if( ! isset( $locations[$location] ) ) return false;

	$menu_obj = get_term( $locations[$location], 'nav_menu' );

	return $menu_obj;
}


/*==================================================================
LOOP THROUGH ALL FIELDS IN AN ACF FIELD GROUP!
Remember to change the group ID per pull
==================================================================*/
function get_specifications_fields() {

	global $post;

	$specifications_group_id = 569; // Post ID of the specifications field group.
	$specifications_fields = array();

	$fields = acf_get_fields( $specifications_group_id );

	foreach ( $fields as $field ) {
		$field_value = get_field( $field['name'] );

		if ( $field_value && !empty( $field_value ) ) {
			$specifications_fields[$field['name']] = $field;
			$specifications_fields[$field['name']]['value'] = $field_value;
		}
	}

	return $specifications_fields;

}


/*==================================================================
NUMERIC PAGINATION
==================================================================*/
// function pagination_bar() {
// 	global $wp_query;
//
// 	$total_pages = $wp_query->max_num_pages;
//
// 	if ($total_pages > 1){
// 		$current_page = max(1, get_query_var('paged'));
//
// 		echo paginate_links(array(
// 			'base' => get_pagenum_link(1) . '%_%',
// 			'format' => 'page/%#%',
// 			'current' => $current_page,
// 			'total' => $total_pages,
// 		));
// 	}
// }


/*==================================================================
CHANGE DEFAULT TEMPLATE NAME
==================================================================*/
add_filter('default_page_template_title', function() {
	return __('- Generic One Column');
});



/*==================================================================
CUSTOM EXCERPT LENGTH
==================================================================*/
function ld_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'ld_custom_excerpt_length', 999 );


/*==================================================================
ACF CUSTOM SEARCH FIELDS
https://support.advancedcustomfields.com/forums/topic/making-acf-data-available-to-wp_search/
==================================================================*/
function cf_search_join( $join ) {
	global $wpdb;
	if ( is_search() ) {
		$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}
	return $join;
}
add_filter('posts_join', 'cf_search_join' );


// Modify the search query with posts_where
function cf_search_where( $where ) {
	global $pagenow, $wpdb;
	if ( is_search() ) {
		$where = preg_replace(
			"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
		}
		return $where;
	}
	add_filter( 'posts_where', 'cf_search_where' );


// Prevent duplicates
function cf_search_distinct( $where ) {
	global $wpdb;
	if ( is_search() ) {
		return "DISTINCT";
	}
	return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );



/*==================================================================
STOP EMTPY SEARCH
==================================================================*/
function SearchFilter($query) {
	// If 's' request variable is set but empty
	if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
		$query->is_search = true;
		$query->is_home = false;
}
return $query;}
add_filter('pre_get_posts','SearchFilter');


/*==================================================================
CUT STRING AFTER SET WORK COUNT
==================================================================*/
function limit_words($words, $limit, $append = ' &hellip;') {
    $limit = $limit+1;
    $words = explode(' ', $words, $limit);
    array_pop($words);
    $words = implode(' ', $words) . $append;
    return $words;
}

/*==================================================================
SETUP ACF GOOGLE MAPS
==================================================================*/
function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyAmmvkoPA2evn0of5_sXcmyk5uoiDRBe-Q');
}
add_action('acf/init', 'my_acf_init');

// update_option( 'siteurl', 'http://docs.framework.d3z.uk' );
// update_option( 'home', 'http://docs.framework.d3z.uk' );

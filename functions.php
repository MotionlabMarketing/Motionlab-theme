<?php
define("TEMPLATE_DIR", get_template_directory() . "/template-parts/");
define("BLOCKS_DIR", get_template_directory() . "/template-parts/newBlocks/");
define("GLOBAL_DIR", get_template_directory() . "/template-parts/global");
define("CHILD_BLOCKS_DIR", get_stylesheet_directory() . "/blocks/");
define("CONTROLLERS_DIR", get_template_directory() . "/controllers/");
define("MODELS_DIR", get_template_directory() . "/models/");
define("CHILD_MODELS_DIR", get_stylesheet_directory() . "/models/");
define("MASTER_CPT_DIR", get_template_directory() . "/cpt-registry/");
define("CHILD_CPT_DIR", get_stylesheet_directory() . "/cpt-registry/");
define("AJAX_DIR", get_template_directory() . "/template-parts/ajax/");
define("CHILD_AJAX_DIR", get_stylesheet_directory() . "/ini/ajax/");


/**
 * INCLUDE ALL CUSTOM THEME FUNCTIONS.
 *
 * @added 15 Mar 2018
 * @author Joe Curran
 * @var  $filename
 */
foreach (glob(get_template_directory() . "/inc/_functions/*.php") as $filename) {
    include $filename;
}

/**
 * INCLUDE ALL CUSTOM THEME PHP PLUGINS.
 *
 * @added 3 May 2018
 * @author Joe Curran
 * @var  $filename
 */
foreach (glob(get_template_directory() . "/inc/plugins/*.php") as $filename) {
    include $filename;
}

/*==================================================================
UNDERSCORES STUFF
==================================================================*/

if (! function_exists('motionlabtheme_setup')) :
    function motionlabtheme_setup()
    {
        load_theme_textdomain('motionlabtheme', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Main Menu', 'motionlabtheme'),
            'top-menu' => esc_html__('Top Menu', 'motionlabtheme'),
            'footer_1' => esc_html__('Footer 1', 'motionlabtheme'),
            'footer_2' => esc_html__('Footer 2', 'motionlabtheme'),
            'footer_3' => esc_html__('Footer 3', 'motionlabtheme'),
            'tnc' => esc_html__('Footer (To Be Removed)', 'motionlabtheme'), // TODO: REMOVE SUPPROT FOR THIS.
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }

endif;
add_action('after_setup_theme', 'motionlabtheme_setup');

/*==================================================================
CUSTOM POST TYPE REGISTRATION CONTROLLER
==================================================================*/
add_action('init', 'ml_register_custom_post_types', 0);
function ml_register_custom_post_types()
{
    include_once(CONTROLLERS_DIR . 'CPTController.php');
}

/*==================================================================
ML BLOCKS - AJAX CONTROL
==================================================================*/
add_action('wp_ajax_update_block', 'ml_update_block');
add_action('wp_ajax_nopriv_update_block', 'ml_update_block');
function ml_update_block()
{
    if (have_rows('building_blocks', $_POST['page_id'])) :
        while (have_rows('building_blocks', $_POST['page_id'])) :
            the_row();

    // Varibales for the Blocks – TODO: Needs looking over!
    include(get_template_directory() .'/inc/block-variables.php');

    // CHECK FOR NEW BLOCKS //
    if ($_POST['block_name'] == get_row_layout()):

                $current = get_row_layout();
    include(BLOCKS_DIR . '_blocks_settings.php');

    if ($block['enabled'] == true || empty($block['enabled'])): // TODO: ONCE ALL BLOCKS ARE UPDATED THIS NEED TO BE UPDATED.

                    // TODO: Need to move blocks folder structure and update the routing.
                    if (file_exists(MODELS_DIR . '_' . $current . '.php')) {
                        include_once(CONTROLLERS_DIR . 'BlocksController.php');
                    } else {
                        include(BLOCKS_DIR . '_'. $current .'.php');
                    }

    endif;
    endif;
    endwhile;
    endif;
    die();
}

/*==================================================================
ML BLOCKS - TEMPLATES CONTROL
==================================================================*/
add_action('wp_ajax_fetch_news', 'ml_update_news');
add_action('wp_ajax_nopriv_fetch_news', 'ml_update_news');
function ml_update_news()
{

    /* Load in team block controller to access posts easily. */
    include_once(MODELS_DIR . '_block_news.php');
    $news_controller = new _block_news(null, null);

    $count = 8;
    if ($_POST['news_page'] == 1) :
        $count = 9;
    endif;

    $block = $news_controller->fetchFeedPosts($count, $_POST['news_page']);

    if (file_exists(CHILD_AJAX_DIR . 'template-news-ajax.php')) :
        include_once(CHILD_AJAX_DIR . 'template-news-ajax.php');
    else:
        include_once(AJAX_DIR . 'template-news-ajax.php');
    endif;

    die();
}

add_action('wp_ajax_fetch_csr', 'ml_update_csr');
add_action('wp_ajax_nopriv_fetch_csr', 'ml_update_csr');
function ml_update_csr()
{

    /* Load in team block controller to access posts easily. */
    include_once(MODELS_DIR . '_block_news.php');
    $news_controller = new _block_news(null, null);
    $block = $news_controller->fetchCSRPosts(8, $_POST['news_page']);


    if (file_exists(CHILD_AJAX_DIR . 'template-csr-ajax.php')) :
        include_once(CHILD_AJAX_DIR . 'template-csr-ajax.php');
    else:
        include_once(AJAX_DIR . 'template-csr-ajax.php');
    endif;

    die();
}

add_action('wp_ajax_fetch_jobs', 'ml_update_jobs');
add_action('wp_ajax_nopriv_fetch_jobs', 'ml_update_jobs');
function ml_update_jobs()
{

    /* Load in team block controller to access posts easily. */
    include_once(MODELS_DIR . '_block_jobs.php');
    $jobs_controller = new _block_jobs(null, null);
    $block = $jobs_controller->fetchFeedPosts(6, $_POST['jobs_page']);

    if (file_exists(CHILD_AJAX_DIR . 'template-jobs-ajax.php')) :
        include_once(CHILD_AJAX_DIR . 'template-jobs-ajax.php');
    else:
        include_once(AJAX_DIR . 'template-jobs-ajax.php');
    endif;

    die();
}

add_action('wp_ajax_fetch_talent', 'ml_update_talent');
add_action('wp_ajax_nopriv_fetch_talent', 'ml_update_talent');
function ml_update_talent()
{

    /* Load in team block controller to access posts easily. */
    include_once(MODELS_DIR . '_block_jobs.php');
    $jobs_controller = new _block_jobs(null, null);
    $block = $jobs_controller->fetchFeedPosts(4, $_POST['jobs_page'], 'talents');

    if (file_exists(CHILD_AJAX_DIR . 'template-talent-ajax.php')) :
        include_once(CHILD_AJAX_DIR . 'template-talent-ajax.php');
    else:
        include_once(AJAX_DIR . 'template-talent-ajax.php');
    endif;

    die();
}

add_action('wp_ajax_fetch_testimonials', 'ml_update_testimonials');
add_action('wp_ajax_nopriv_fetch_testimonials', 'ml_update_testimonials');
function ml_update_testimonials()
{

    /* Load in team block controller to access posts easily. */
    include_once(MODELS_DIR . '_testimonials.php');
    $testimonials_controller = new _testimonials();
    $testimonials = $testimonials_controller->getBlock();

    if (file_exists(CHILD_AJAX_DIR . 'template-testimonials-ajax.php')) :
        include_once(CHILD_AJAX_DIR . 'template-testimonials-ajax.php');
    else:
        include_once(AJAX_DIR . 'template-testimonials-ajax.php');
    endif;

    die();
}

add_action('wp_ajax_fetch_gallery', 'ml_update_gallery');
add_action('wp_ajax_nopriv_fetch_gallery', 'ml_update_gallery');
function ml_update_gallery()
{

    /* Load in team block controller to access posts easily. */
    include_once(MODELS_DIR . '_galleries.php');
    $galleries_controller = new _galleries();
    $gallery  = $galleries_controller ->getBlock();

    if (file_exists(CHILD_AJAX_DIR . 'template-gallery-ajax.php')) :
        include_once(CHILD_AJAX_DIR . 'template-gallery-ajax.php');
    else:
        include_once(AJAX_DIR . 'template-gallery-ajax.php');
    endif;

    die();
}

function custom_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Footer Column 1',
        'id'            => 'footer_column_1',
        'before_widget' => '<div class="footer-menu relative mb5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="mb4">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => 'Footer Column 2',
        'id'            => 'footer_column_2',
        'before_widget' => '<div class="footer-menu relative">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="mb4 h4">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => 'Footer Column 3',
        'id'            => 'footer_column_3',
        'before_widget' => '<div class="footer-menu relative">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="mb4">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'custom_widgets_init');




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

function websiteadvanced_scripts()
{

    // deregister default jQuery included with Wordpress
    wp_deregister_script('jquery');

    $jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js';
    wp_enqueue_script('jquery', $jquery_cdn, array(), '20130115', false);

    //Main Scripts
    wp_enqueue_script('map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAmmvkoPA2evn0of5_sXcmyk5uoiDRBe-Q&#038;extension=.js', array('jquery'), '', true);
    wp_enqueue_script('motionlab-theme-js', get_template_directory_uri() . '/assets/scripts/main-min.js', array('jquery'), '', true);

    //Main Styles
    wp_enqueue_style('motionlab-theme-css', get_template_directory_uri() . '/assets/css/main-min.css');

    //Maps
    //wp_enqueue_script ('map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDEN3LHOOKqILWrucfQaF1THTHI2bCw-00', array('jquery'),'', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'websiteadvanced_scripts');


/*==================================================================
ACF OPTIONS PAGES
==================================================================*/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
    acf_add_options_sub_page('Theme');
    acf_add_options_sub_page('Global Banner');
}


/*==================================================================
DEFAULT IMAGES
==================================================================*/
function remove_default_image_sizes($sizes)
{
    unset($sizes['thumbnail']);
    //unset( $sizes['medium']);
    //unset( $sizes['medium_large']);
    unset($sizes['large']);
    //unset( $sizes['full']);

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');


add_theme_support('post-thumbnails');
add_image_size('logoCrop', 300, 300, true);
add_image_size('medium', 480, 480, false);
add_image_size('mediumCrop', 400, 280, true);
add_image_size('galleryMedium', 800, 560, true);



/*==================================================================
ALLOW SVGs TO BE UPLOADED
==================================================================*/
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*==================================================================
REMOVE PRE TEXT FROM CATEGORIES
==================================================================*/
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }

    return $title;
});

/*==================================================================
WORK OUT MENU NAMES
==================================================================*/
function get_menu_by_location($location)
{
    if (empty($location)) {
        return false;
    }

    $locations = get_nav_menu_locations();
    if (! isset($locations[$location])) {
        return false;
    }

    $menu_obj = get_term($locations[$location], 'nav_menu');

    return $menu_obj;
}


/*==================================================================
LOOP THROUGH ALL FIELDS IN AN ACF FIELD GROUP!
Remember to change the group ID per pull
==================================================================*/
function get_specifications_fields()
{
    global $post;

    $specifications_group_id = 569; // Post ID of the specifications field group.
    $specifications_fields = array();

    $fields = acf_get_fields($specifications_group_id);

    foreach ($fields as $field) {
        $field_value = get_field($field['name']);

        if ($field_value && !empty($field_value)) {
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
add_filter('default_page_template_title', function () {
    return __('Basic Page');
});



/*==================================================================
CUSTOM EXCERPT LENGTH
==================================================================*/
function ld_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'ld_custom_excerpt_length', 999);


/*==================================================================
ACF CUSTOM SEARCH FIELDS
https://support.advancedcustomfields.com/forums/topic/making-acf-data-available-to-wp_search/
==================================================================*/
function cf_search_join($join)
{
    global $wpdb;
    if (is_search()) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}
add_filter('posts_join', 'cf_search_join');


// Modify the search query with posts_where
function cf_search_where($where)
{
    global $pagenow, $wpdb;
    if (is_search()) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)",
            $where
        );
    }
    return $where;
}
    add_filter('posts_where', 'cf_search_where');


// Prevent duplicates
function cf_search_distinct($where)
{
    global $wpdb;
    if (is_search()) {
        return "DISTINCT";
    }
    return $where;
}
add_filter('posts_distinct', 'cf_search_distinct');



/*==================================================================
STOP EMTPY SEARCH
==================================================================*/
function SearchFilter($query)
{
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()) {
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
}
add_filter('pre_get_posts', 'SearchFilter');


/*==================================================================
CUT STRING AFTER SET WORK COUNT
==================================================================*/
function limit_words($words, $limit, $append = ' &hellip;')
{
    $limit = $limit+1;
    $words = explode(' ', $words, $limit);
    array_pop($words);
    $words = implode(' ', $words) . $append;
    return $words;
}

/*==================================================================
SETUP ACF GOOGLE MAPS
==================================================================*/
function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyAmmvkoPA2evn0of5_sXcmyk5uoiDRBe-Q');
}
add_action('acf/init', 'my_acf_init');

// update_option( 'siteurl', 'http://docs.framework.d3z.uk' );
// update_option( 'home', 'http://docs.framework.d3z.uk' );

/*==================================================================
CUSTOM POST TYPES
==================================================================*/
function create_posttype()
{
    register_post_type(
        'videos',
        array(
            'labels' => array(
                'name' => __('Videos'),
                'singular_name' => __('Video')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'videos'),
            'menu_icon'           => 'dashicons-format-video',
        )
    );
}
add_action('init', 'create_posttype');

function ml_get_contact($type, $id = null, $array)
{
    $value = "";

    if (!is_array($id)) {
        $id = strtolower(trim(str_replace(" ", "", $id)));
    }

    $phoneCalls = ["number", "phone", "tel"];

    if (in_array($type, $phoneCalls)) {
        $contacts = get_field("brand_contactNumbers", "option");

        $value = $contacts;

        if ($id !== null) {
            if (is_array($id)) {
                $value = [];

                foreach ($id as $i) {
                    foreach ($contacts as $contact) {
                        if ($contact['slug'] == $i) {
                            $value[] = ["name" => $contact['name'], "number" => $contact['number']];
                        }
                    }
                }

                return $value;
            } else {
                foreach ($contacts as $contact) {
                    if ($contact['slug'] == $id) {
                        return $value = $contact['number'];
                    }
                }
            }
        }
    }

    return $value;
}

/**
 * Removes the width and height attributes of <img> tags for SVG
 *
 * Without this filter, the width and height are set to "1" since
 * WordPress core can't seem to figure out an SVG file's dimensions.
 *
 * For SVG:s, returns an array with file url, width and height set
 * to null, and false for 'is_intermediate'.
 *
 * @wp-hook image_downsize
 * @param mixed $out Value to be filtered
 * @param int $id Attachment ID for image.
 * @return bool|array False if not in admin or not SVG. Array otherwise.
 */
function wpse240579_fix_svg_size_attributes($out, $id)
{
    $image_url  = wp_get_attachment_url($id);
    $file_ext   = pathinfo($image_url, PATHINFO_EXTENSION);

    if (is_admin() || 'svg' !== $file_ext) {
        return false;
    }

    return array( $image_url, null, null, false);
}
add_filter('image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2);


// RETURN THE NAME OF THE FUNCTIONS FILES.
function ml_get_template()
{
    $template = get_page_template_slug();
    $template = explode('templates/', $template);

    if (!empty($template[0])) {
        return $template[0];
    } else {
        return false;
    }
}


/*==================================================================
    Custom rewrite masking for news categories
    This is what handles sending /news/%category% to the /news template.
==================================================================*/

function ml_categories_rewrite()
{
    add_rewrite_rule(
        'news/([a-zA-Z0-9-]+)/?$',
        'index.php?pagename=news&news_category=$matches[1]',
        'top'
    );

    /*Rewrite for testimonials*/
    add_rewrite_rule(
        'testimonials/([a-zA-Z0-9-]+)/?$',
        'index.php?pagename=testimonials&testimonials_category=$matches[1]',
        'top'
    );

    add_rewrite_rule(
        'gallery/([a-zA-Z0-9-]+)/?$',
        'index.php?pagename=gallery&gallery_category=$matches[1]',
        'top'
    );
}
add_action('init', 'ml_categories_rewrite');

function ml_query_vars($query_vars)
{
    $query_vars[] = 'news_category';
    $query_vars[] = 'testimonials_category';
    $query_vars[] = 'gallery_category';

    return $query_vars;
}
add_filter('query_vars', 'ml_query_vars');


/*
 * Used to convert a given timestamp to a "4 days ago" style message
 * */
function ml_time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


// Remove tags support from posts
function ml_unregister_tags()
{
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'ml_unregister_tags');

// TEMPLATE CACHING REMOVEAL - NO IDEA IF THIS WORKS.
function wp_42573_fix_template_caching(WP_Screen $current_screen)
{
    // Only flush the file cache with each request to post list table, edit post screen, or theme editor.
    if (! in_array($current_screen->base, array( 'post', 'edit', 'theme-editor' ), true)) {
        return;
    }
    $theme = wp_get_theme();
    if (! $theme) {
        return;
    }
    $cache_hash = md5($theme->get_theme_root() . '/' . $theme->get_stylesheet());
    $label = sanitize_key('files_' . $cache_hash . '-' . $theme->get('Version'));
    $transient_key = substr($label, 0, 29) . md5($label);
    delete_transient($transient_key);
}
add_action('current_screen', 'wp_42573_fix_template_caching');



/**
 * ---------------------------------------------------------------------------------------------------------------------
 * MOTIONLAB THEME WORDPRESS FUNCTION SETTINGS
 * WordPress fucntions used by the Theme.
 * ---------------------------------------------------------------------------------------------------------------------
 */

// DISABLE SRCSET ON FRONTEND
add_filter('max_srcset_image_width', create_function('', 'return 1;'));

add_action('admin_enqueue_scripts', 'ml_custom_admin_styles');


/**
 * ---------------------------------------------------------------------------------------------------------------------
 * MOTIONLAB THEME FUNCTIONS
 * New functions used by the Motion Lab theme.
 * ---------------------------------------------------------------------------------------------------------------------
 */

// PRINT ALL FUNCTION
function pa($value)
{
    print_r("<pre style='background-color: #f1f1f1; color: black; text-align: left; padding: 1rem;'>");
    print_r($value);
    print_r("</pre>");
}

// SHORTEN CONTENT TO NUMBER OF WORDS
function shorten_string($string, $target)
{
    $retval = $string;

    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
    $string = str_replace("\n", " ", $string);
    $array = explode(" ", $string);

    if (count($array)<=$target) {
        $retval = $string;
    } else {
        array_splice($array, $target);
        $retval = implode(" ", $array)."...";
    }
    echo $retval;
}

function get_shorten_string($string, $target)
{
    $return = new stdClass();
    $retval = $string;

    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
    $string = str_replace("\n", " ", $string);
    $array = explode(" ", $string);

    if (count($array)<=$target) {
        $return->updated = false;
        $return->value = $string;
    } else {
        array_splice($array, $target);
        $return->updated = true;
        $return->value = implode(" ", $array)."...";
    }
    return $return;
}


// GET A MENU OBJECT BASED ON THE THEME LOCATION
function ml_get_menu_object_by_location($location)
{
    // GET THE LOCATIONS
    $locations = get_nav_menu_locations();

    // GET THE MENU ID
    $menu_id = $locations[$location];

    // RETURN THE MENU OBJECT
    return $menu = wp_get_nav_menu_object($menu_id);
}

// GET PARENT OF CURRENT PAGE
function get_highest_most_parent($post)
{
    if ($post->post_parent) {
        $ancestors=get_post_ancestors($post->ID);
        $root=count($ancestors)-1;
        $parent = $ancestors[$root];
    } else {
        $parent = $post->ID;
    }
    return $parent = get_post($parent);
}


// LOAD CUSTOM ADMIN STYLESHEET
function ml_custom_admin_styles()
{
    wp_register_style('ml_custom_admin_style', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0');

    wp_enqueue_style('ml_custom_admin_style');
}

//Move that pesky Yoast box to the bottom of pages and posts
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

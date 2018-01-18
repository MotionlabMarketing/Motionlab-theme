<?php
$queried_object = get_queried_object();
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$orderby = (get_query_var('orderby')) ? get_query_var('orderby') : 'title'; // https://codex.wordpress.org/Function_Reference/WP_Query#Order_.26_Orderby_Parameters
$order = (isset($_GET['order']) && !empty($_GET['order'])) ? $_GET['order'] : 'ASC';
$postsperpage = (isset($_GET['postsperpage']) && !empty($_GET['postsperpage'])) ? $_GET['postsperpage'] : 15;
$args = array(
	'post_type' => $postTypeSlug, // without this set, it will just loop through the default posts (blog)
	'tax_query' => array(
		array(
			'taxonomy' => $categoryName,
			'terms' => $queried_object->name,
			'field' => 'slug',
		),
	),
	'order'   => $order,
	'orderby' => $orderby,
	'posts_per_page' => $postsperpage,
	'paged' => $paged,
);
$loop = new WP_Query( $args );
?>

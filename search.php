<?php
get_header();
$queried_object = get_queried_object();

include(get_template_directory() .'/inc/filters-order-paging.php');

$totalPosts = $wp_query->found_posts;
$currentPosts = $wp_query->post_count;

?>

<section>
	<div class="container px5 mb6">
		<section class="clearfix col-12 mb5 sm-mb0">
			<?php if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : ?>

				<?php include(get_template_directory() .'/template-parts/search.php'); ?>

			<?php else: ?>

				<?php include(get_template_directory() .'/template-parts/search-noresults.php'); ?>

			<?php endif; ?>
		</section>
	</div>
</section>



<?php get_footer(); ?>

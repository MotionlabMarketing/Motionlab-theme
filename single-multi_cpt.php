<?php
get_header();
include_once(get_template_directory() . '/inc/MenuController.php');

$postTypeName = 'multi_cpt';
$categoryName = 'multi_category';

include(get_template_directory() .'/inc/filters-order-paging.php');

$totalPosts = $loop->found_posts;
$currentPosts = $loop->post_count;
$totalPages = $loop->max_num_pages;
?>

<section>
	<div class="container px5 bg-white">
		<div class="clearfix py5">

			<section class="mb5">
				<?php echo (new MenuController())->get_hansel_and_gretel_breadcrumbs(); ?>

				<div class="mt4 flex items-center mb3">
					<h1 class="m0"><?php echo the_title(); ?></h1>
				</div>

			</section>


			<section class="flex">

				<aside class="col col-12 lg-col-3 mr4">
					<?php include(get_template_directory() .'/template-parts/global/sidebar-multi.php'); ?>
				</aside>


				<section class="col col-12 lg-col-9 mb5 sm-mb0">
					<div class="clearfix">
						<?php while ( have_posts() ) : the_post(); ?>
							<img src="<?php if( !empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('medium'); else: echo get_field('fallback_placeholder_image','option'); endif;?>" />
							<?php the_content() ?>
							<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>
						<?php endwhile; ?>
					</div>
				</section>

			</section>


		</div>
	</div>
</section>


	<?php
	get_footer();

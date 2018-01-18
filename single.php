<?php
get_header();
?>



<section>
	<div class="container px5 bg-white">
		<div class="clearfix py5">

			<?php echo (new MenuController())->get_hansel_and_gretel_breadcrumbs(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="mt4 mb3 m0"><?php the_title(); ?></h1>
				<img src="<?php if( !empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('large'); else: echo get_field('fallback_placeholder_image','option'); endif;?>" />
					<?php the_content() ?>
					<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

					<div class="clearfix mxn4 pt5 post-pagination">
						<div class="col col-12 px4">
							<?php
							previous_post_link('<span class="left border border-darken-2 hover-bg-darken-1 p2 cursor">%link</span>','<span class="body">Previous post</span>', false);
							next_post_link('<span class="right border border-darken-2 hover-bg-darken-1 p2 cursor">%link</span>', '<span class="body">Next post</span>', false);
							?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>


			<?php
			$related = get_posts(
				array(
					'category__in' => wp_get_post_categories($post->ID),
					'numberposts' => 3,
					'post__not_in' => array($post->ID)
				)
			);
			?>
			<?php if( $related ) : ?>
				<div class="clearfix py5">
					<h2 class="text-center">Related Stories</h2>
					<div class="mxn3 clearfix">
						<?php foreach( $related as $post ) { ?>
							<?php setup_postdata($post); ?>
							<?php include(get_template_directory() .'/template-parts/blog/post.php'); ?>
						<?php } ?>
					</div>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>



		</div>
	</section>

	<?php
	get_footer();

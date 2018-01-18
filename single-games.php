<?php
get_header();
include_once(get_template_directory() . '/inc/MenuController.php');

$postTypeName = 'games';
//$categoryName = 'multi_category';

include(get_template_directory() .'/inc/filters-order-paging.php');

$totalPosts = $loop->found_posts;
$currentPosts = $loop->post_count;
$totalPages = $loop->max_num_pages;
?>

<section>
	<div class="container px5 bg-white">
		<div class="clearfix py5">

			<?php echo (new MenuController())->get_hansel_and_gretel_breadcrumbs(); ?>

			<h1 class="mt4 mb5"><?php the_title(); ?></h1>
			<img src="<?php if( !empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('large'); else: echo get_field('fallback_placeholder_image','option'); endif;?>" />

			<?php if(!empty(get_field('short_description'))) : ?>
				<div class="py3">
					<?php echo get_field('short_description'); ?>
				</div>
			<?php endif; ?>


			<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>


			<div class="flex pt5">
				<h4 class="pr2">Key:</h4>
				<div class="flex">
					<span style="height:20px;width:20px" class="block bg-light-blue mr2"></span>
					<p class=m0"">:Block Specific</p>
				</div>
			</div>

			<table class="my3 col-12 border border-bottom-none border-left-none border-darken-1" style="table-layout:fixed">
				<thead class="bg-smoke">
					<tr>
						<th class="border-bottom border-left border-darken-1 py3">Tab</th>
						<th class="border-bottom border-left border-darken-1 py3">Title</th>
						<th class="border-bottom border-left border-darken-1 py3">Options</th>
						<th class="border-bottom border-left border-darken-1 py3 || col-6">Description</th>
					</tr>
				</thead>

				<tbody class="body">
					<?php if( have_rows('default_cpt_table_options') ) {
						while ( have_rows('default_cpt_table_options') ) { ?>
							<?php the_row() ?>

							<?php $post_object = get_sub_field('option'); ?>
							<?php $post = $post_object; ?>
							<?php setup_postdata( $post ); ?>
							<tr class="<?php echo get_field('cpt_option_tab') == 'Copy' ? 'bg-darken-1 ' : '' ; ?><?php echo get_field('cpt_option_block_specific') == TRUE ? 'bg-light-blue' : '' ; ?>">
								<td class="border-bottom border-left border-darken-1 ">
									<?php echo get_field('cpt_option_tab'); ?>
								</td>
								<td class="border-bottom border-left border-darken-1">
									<?php the_title(); ?>
								</td>
								<td class="border-bottom border-left border-darken-1">
									<?php echo get_field('cpt_option_options'); ?>
								</td>
								<td class="border-bottom border-left border-darken-1 || col-6">
									<?php echo get_field('cpt_option_description'); ?>
								</td>
							</tr>
							<?php wp_reset_postdata(); ?>
						<?php     }; ?>
					<?php }; ?>
				</tbody>
			</table>




			<div class="mt3 pt3">


				<?php $posts = query_posts($query_string); if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="pagination">
						<div class="page-titles flex">
							<?php previous_post_link('<div class="">%link</div>'); ?>
							<?php next_post_link('<div class="ml-auto">%link</div>'); ?>
						</div>
					</div>
				<?php endwhile; endif; ?>


			</div>

		</div>
	</div>
</section>

<?php get_footer();?>

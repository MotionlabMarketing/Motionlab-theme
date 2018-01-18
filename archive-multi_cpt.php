<?php
get_header();
include_once(get_template_directory() . '/inc/MenuController.php');

$postTypeSlug = 'multi_cpt';
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
					<h1 class="m0"><?php echo post_type_archive_title(); ?></h1>
					<span class="ml-auto"><?php echo $currentPosts ?> of <?php echo $totalPosts ?> posts</span>
				</div>

				<div class="clearfix">
					<form action="" method="get" class="flex">
						<select name="orderby" id="orderby" style="min-width:13rem;" class="select md-mr3 width-100 md-width-auto" onchange="this.form.submit()" >
							<option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>Title</option>
							<option value="date" <?php echo ($orderby == 'date') ? 'selected' : '' ; ?>>Date</option>
						</select>

						<?php include(get_template_directory() .'/template-parts/global/filter.php'); ?>

					</form>

				</div>
			</section>


			<section class="flex">

				<aside class="col col-12 lg-col-3 mr4">
					<?php include(get_template_directory() .'/template-parts/global/sidebar-multi.php'); ?>
				</aside>


				<section class="col col-12 lg-col-9 mb5 sm-mb0">
					<div class="clearfix">
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
							<?php include(get_template_directory() .'/template-parts/multi-level/post.php'); ?>
						<?php endwhile; ?>
					</div>
					<nav class="pagination || block text-center mb5">
						<?php
						if ($totalPages > 1) {
							echo paginate_links([
								'format' => '?page=%#%',
								'current' => max(1, $paged),
								'total' => $totalPages
							]);
						}
						?>
					</nav>
				</section>

			</section>

		</div>
	</div>
</section>

<?php get_footer(); ?>

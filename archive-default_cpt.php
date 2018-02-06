<?php
get_header();
include_once(get_template_directory() . '/inc/MenuController.php');

$postTypeSlug = 'default_cpt';
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

            <?php $blockTitle[0]['title'] = get_the_archive_title('', false); $blockTitle[0]['title'] = str_replace("Archives: ", "", $blockTitle[0]['title']); $blockTitle[0]['type']['heading'] = "h3"; $blockTitle[0]['color']['system_text_colours'] = "brand-primary"; $blockTitle[0]['size']['heading_size'] = "h1" ?>
            <div class="m4 mb5 || text-center">

                <div class="mb3">
                    <?php
                    if (!empty($blockTitle[0]['title'])) {
                        include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
                </div>

                <div class="text-center limit-p limit-p-80">
                    <?=get_sub_field('block_pods_content')?>
                </div>
            </div>

			<div class="clearfix mb4">
				<form action="" method="get" class="flex">
    					<select name="orderby" id="orderby" style="min-width:13rem;" class="select md-mr3 width-100 md-width-auto" onchange="this.form.submit()" >
    						<option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>Title</option>
							<option value="date" <?php echo ($orderby == 'date') ? 'selected' : '' ; ?>>Date</option>
    					</select>

						<!--
                        <input type="hidden" name="order" value="<?php echo $order; ?>" id="order" />
    					<button onclick="document.getElementById('order').value = 'desc'; this.form.submit();" class="border border-smoke black p3 lh1 mr3 hover-bg-smoke display-none md-inline-block"><i class="fa fa-arrow-down"></i></button>
    					<button onclick="document.getElementById('order').value = 'asc'; this.form.submit();" class="border border-smoke black p3 lh1 mr3 hover-bg-smoke display-none md-inline-block"><i class="fa fa-arrow-up"></i></button>
						-->

						<?php include(get_template_directory() .'/template-parts/global/filter.php'); ?>

					</form>
			</div>

			<div class="mxn3 clearfix">
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<?php include(get_template_directory() .'/template-parts/defaultCPT/post.php'); ?>
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

		</div>
	</div>
</section>

<?php get_footer(); ?>

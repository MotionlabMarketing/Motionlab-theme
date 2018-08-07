<?php
// TODO: Review all code in this file.
get_header();
include(get_template_directory() .'/inc/filters-order-paging.php');

$totalPosts = $loop->found_posts;
$currentPosts = $loop->post_count;
$totalPages = $loop->max_num_pages;

$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'large');
$featured_image = $img[0];

?>


<section>
	<div class="overflow-hidden pt5">

		<div class="container bg-black px5 py7 white text-center bg-center bg-cover" style="background-image:url(<?php echo $featured_image; ?>)">
			<h5 class="sans uppercase ls3 md-ls4 lh1 md-mb4">tailored for you</h5>
			<h1 class="xl-h0 mb0 xl-lsn2 lh1"><?php echo single_post_title() ?></h1>
		</div>

		<div class="container bg-white">

			<!-- header block -->
			<div class="py5">
				<div class="lg-flex items-center clearfix">
					<form method="get">
						<select style="min-width:13rem;" class="select md-mr3 width-100 md-width-auto" onchange="this.form.submit()" name="orderby" id="orderby">
							<option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>Title</option>
							<option value="date" <?php echo ($orderby == 'date') ? 'selected' : '' ; ?>>Date</option>
						</select>
					</form>
					<form method="get" action="/">
						<div class="px2 col-100">
							<div class="relative flex">
								<i class="fa fa-search absolute left-0 pl3 top-50 translate-y"></i>
								<input type="hidden" name="post_type[]" value="posts">
								<input type="text" name="s" value="" placeholder="Search news" class="input width-100" style="padding-left:2.6rem" />
							</div>
						</div>
					</form>
					<div class="px2 py3 lg-py0">
						<ul class="list-reset mb0 mxn2">
							<?php
							$categories = get_categories();
							//var_dump($categories);
							foreach($categories as $category) : ?>

							<li class="inline-block p1">
								<a href="/category/<?php echo $category->slug ?>" class="px2 py1 border border-smoke black block rounded hover-bg-darken-1 h5"><span class="bold pr1"><?php echo $category->name ?></span><small>(<?php echo $category->count ?>)</small></a>
							</li>

						<?php endforeach; ?>
					</ul>
				</div>
				<div class="ml-auto">
					<span class="ml-auto"><?php echo $currentPosts ?> of <?php echo $totalPosts ?> posts</span>
				</div>
			</div>
		</div>


		<?php if ( have_posts() ) : ?>
			<div class="mxn3 clearfix">
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<?php include(get_template_directory() .'/template-parts/blog/post.php'); ?>
				<?php endwhile; ?>
			</div>
			<nav class="pagination || clearfix block text-center border-top border-darken-1 py4 mt5">
				<?php
				echo paginate_links([
					'format' => '?page=%#%',
					'current' => max(1, $paged),
					'total' => $loop->max_num_pages
				]);
				?>
			</nav>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>


</div>
</section>


<?php get_footer(); ?>

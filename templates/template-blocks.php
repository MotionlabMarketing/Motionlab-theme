<?php
/* Template Name: Archive Blocks Template */
get_header();
include_once(get_template_directory() . '/inc/MenuController.php');

$postTypeSlug = 'default_cpt';
//$categoryName = 'multi_category';

include(get_template_directory() .'/inc/filters-order-paging.php');

$totalPosts = $loop->found_posts;
$currentPosts = $loop->post_count;
$totalPages = $loop->max_num_pages;

$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'large');
$featured_image = $img[0];

?>

<section>
    <div class="container px5 bg-white">
        <div class="clearfix py5">

            <?php echo (new MenuController())->get_hansel_and_gretel_breadcrumbs(); ?>

            <div class="container bg-black px5 py7 white text-center bg-center bg-cover mb4" style="background-image:url(<?php echo $featured_image; ?>)">
                <h1 class="xl-h0 mb0 xl-lsn2 lh1"><?php echo the_title() ?></h1>
            </div>

            <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

            <div class="flex items-center || clearfix mb4">
                <form action="" method="get" class="flex">
                    <select name="orderby" id="orderby" style="min-width:13rem;" class="select md-mr3 width-100 md-width-auto" onchange="this.form.submit()" >
                        <option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>Title</option>
                        <option value="date" <?php echo ($orderby == 'date') ? 'selected' : '' ; ?>>Date</option>
                    </select>

                    <?php include(get_template_directory() .'/template-parts/global/filter.php'); ?>

                </form>
                <span class="ml-auto"><?php echo $currentPosts ?> of <?php echo $totalPosts ?> posts</span>
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

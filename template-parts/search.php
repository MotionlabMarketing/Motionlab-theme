<h1 class="xl-h1 xl-lsn1 lh1 py6 pt7">
    <span>We found <?php echo $totalPosts ?>  "<?php printf(get_search_query()); ?>"</span>
</h1>


<section class="flex">
    <aside class="col col-12 lg-col-3 mr4">
        <?php include(get_template_directory() .'/template-parts/global/sidebar-full.php'); ?>
    </aside>

    <section class="col col-12 lg-col-9 mb5 sm-mb0">
        <div class="clearfix">
            <?php while (have_posts()) : the_post(); ?>
                <?php include(get_template_directory() .'/template-parts/multi-level/post.php'); ?>
            <?php endwhile; ?>
        </div>
    </section>
</section>

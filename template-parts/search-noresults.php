<h1 class="xl-h1 xl-lsn1 lh1 py6 pt7">
    <span>Sorry, but nothing matched your search terms</span>
</h1>


<section class="flex">
    <aside class="col col-12 lg-col-3 mr4">
        <?php include(get_template_directory() .'/template-parts/global/sidebar-full.php'); ?>
    </aside>

    <section class="col col-12 lg-col-9 mb5 sm-mb0">
        <div class="clearfix">
            <p class="py6 text-center">Please try again with some different keywords.</p>
            <!-- <form method="get" class="mx-auto mb6 flex items-center width-100" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                <input id="js-search-id" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search this site" class="input lg-rounded-left width-100" autofocus>
                <input type="submit" class="btn btn-primary lg-rounded-right border-none" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'shape' ); ?>" />
            </form> -->
        </div>
    </section>
</section>

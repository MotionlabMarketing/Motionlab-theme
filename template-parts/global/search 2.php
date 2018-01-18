<div class="absolute top-0 left-0 width-100 height-100 bg-black" id="search" style="display:none;">
    <div class="flex bg-darken-5 height-100 relative">

        <form method="get" class="flex items-center width-100" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <input id="js-search-id" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" data-placeholder='Search site,Search other' class="bg-transparent width-100 height-100 bold white border-none h3 px4 || js-search" autofocus>

            <!-- restrict results to onlly show products CPT -->
            <!-- <input type="hidden" name="post_type[]" value="products"> -->

            <!-- <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'shape' ); ?>" /> -->
        </form>
        <p class="mb0 right-0 top-50 translate-y white absolute h5 pr4 || opacity-4">press enter to search</p>
    </div>
</div>

<header class="width-100 top-0 fixed bg-blue z5 shadow-bottom || js-pinned-header" id="masthead" data-role="header">

    <!-- desktop header view -->
    <div class="display-none lg-block">
        <div class="bg-repeat bg-blue flex">
            <div class="self-stretch flex items-center || logo-wrapper">
                <a href="/" class="flex items-center height-100 px3 lg-px4 border-box">
                    <img src="<?php the_field('brand_logo', 'options') ?>" alt="" class="block mx-auto">
                </a>
            </div>
            <div class="flex-auto width-100">
                <?php include(get_template_directory() .'/template-parts/global/menus/top_menu.php')?>
                <div class="flex">
                    <div class="flex-auto" toggle-relative-search>
                        <?php include(get_template_directory() .'/template-parts/global/menus/main_menu_advanced.php')?>
                        <?php include(get_template_directory() .'/template-parts/global/search.php')?>
                    </div>
                    <div class="flex">
                        <a href="#" class="flex flex-column justify-center btn p3 px4 xl-p4 xl-px5 white border-none nowrap bg-darken-3 || js-hide-show" data-show="search" data-icon-show="&#xf002;" data-icon-hide="&#xf00d;" data-blur="true">
                            <i class="fa">&#xf002;</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mobile header view -->
    <div class="lg-display-none">
        <?php include(get_template_directory() .'/template-parts/global/mobile_header.php')?>
    </div>

</header>
<?php include(get_template_directory() .'/template-parts/global/menus/mobile_menu.php')?>

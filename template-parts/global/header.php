<header class="width-100 top-0 fixed z5 border-bottom border-light border-lighten-3" id="masthead" data-role="header" data-smallification="true">

    <!-- desktop header view -->
    <div class="header-size <?=(!is_front_page())? "bg-white" : "";?> display-none lg-block">
        <div class="holder || bg-repeat flex">

            <div class="self-stretch flex items-center flex-wrap flex-column || logo-wrapper ml4 mbn4">
                <a href="/" class="logo block white">
                    <img src="<?=get_field('brand_logo', 'options')?>" alt="" id="main-logo" class="block mx-auto" data-logo="<?=get_field('brand_logo', 'options')?>" data-scrolllogo="<?=get_field('brand_logo_white', 'options')?>">
                    <img src="<?=get_field('brand_logo_white', 'options')?>" style="display: none">
                </a>

                <?php GLOBAL $post; $parent_id = wp_get_post_parent_id($post); if ($parent_id !== 0): ?>

                    <a href="<?=get_permalink($parent_id)?>" class="back-btn || mt3 white bold flex-row"><i class="fa fa-chevron-left"></i> <?=get_the_title($parent_id)?></a>

                <?php endif; ?>
            </div>

            <div class="header-size flex-auto width-100 black text-right border-bottom border-solid border-light">
                <?php include(get_template_directory() .'/template-parts/global/menus/top_menu.php')?>
                <div class="flex">
                    <div class="flex-auto" toggle-relative-search>
                        <?php include(get_template_directory() .'/template-parts/global/menus/main_menu_advanced.php')?>
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

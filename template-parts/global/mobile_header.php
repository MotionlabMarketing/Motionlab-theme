<div class="p3 bg-brand-primary flex items-center h3 relative z3">
    <a href="/" class="mobile-logo flex items-center height-100 border-box">

        <?php if(strpos($_SERVER['REQUEST_URI'], '/work-for-us') === FALSE ): ?>
            <img src="<?php the_field('brand_logo_white', 'options') ?>" alt="" class="block mx-auto width-100" style="max-width:12rem;">
        <?php else: ?>
            <img src="<?= get_stylesheet_directory_uri() . "/assets/img/cummins-mellor-family.svg"; ?>" alt="" id="main-logo-family" class="block mx-auto" data-logo="<?= get_stylesheet_directory_uri() . "/assets/img/cummins-mellor-family.svg"; ?>" data-scrolllogo="<?= get_stylesheet_directory_uri() . "/assets/img/cummins-mellor-family.svg"; ?> ">
        <?php endif; ?>

    </a>
    <div class="flex-auto">
        <div class="flex justify-end">
<!--            <a href="#" class="block px3 white hover-primary js-hide-show" data-show="mobile-search" data-icon-show="&#xf002;" data-icon-hide="&#xf00d;"><i class="fa">&#xf002;</i></a>-->
<!--            <a href="/" class="block px3 white hover-primary"><i class="fa">&#xf015;</i></a>-->
            <a href="tel:<?=str_replace(" ", "", get_field('brand_phone', 'option'))?>" class="white"><i class="fa fa-phone"></i></a>
            <a href="#" class="block px3 white text-center js-menu-trigger" style="width:18px"><i class="fa fa-navicon"></i></a>
        </div>
    </div>
</div>
<!--<form class="p3 bg-smoke flex" action="index.html" method="post" id="mobile-search" style="display:none;">-->
<!--    <input type="text" name="" value="" placeholder="search" class="input width-100" autofocus>-->
<!--    <button type="submit" class="btn btn-primary"><i class="fa">&#xf002;</i></button>-->
<!--</form>-->

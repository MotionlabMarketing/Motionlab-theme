<div class="p1 bg-brand-primary flex items-center h3 md-px2 md-py3">
    <a href="/" class="flex items-center height-100 border-box">
        <img src="<?php the_field('brand_logo_white', 'options') ?>" alt="" class="block mx-auto width-100" style="max-width:12rem;">
    </a>
    <div class="flex-auto">
        <div class="flex justify-end">
<!--            <a href="#" class="block px3 white hover-primary js-hide-show" data-show="mobile-search" data-icon-show="&#xf002;" data-icon-hide="&#xf00d;"><i class="fa">&#xf002;</i></a>-->
<!--            <a href="/" class="block px3 white hover-primary"><i class="fa">&#xf015;</i></a>-->
            <a href="<?=str_replace(" ", "", get_field('brand_phone', 'option'))?>" class="white"><i class="fa fa-phone"></i></a>
            <a href="#" class="block px3 white text-center js-menu-trigger" style="width:18px"><i class="fa fa-navicon"></i></a>
        </div>
    </div>
</div>
<!--<form class="p3 bg-smoke flex" action="index.html" method="post" id="mobile-search" style="display:none;">-->
<!--    <input type="text" name="" value="" placeholder="search" class="input width-100" autofocus>-->
<!--    <button type="submit" class="btn btn-primary"><i class="fa">&#xf002;</i></button>-->
<!--</form>-->

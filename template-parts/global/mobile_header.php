<div class="p3 bg-repeat bg-darkgrey flex items-center h3" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/stripe.png')">
    <a href="/" class="flex items-center height-100 border-box">
        <img src="<?php the_field('brand_logo', 'options') ?>" alt="" class="block mx-auto width-100" style="max-width:7rem;">
    </a>
    <div class="flex-auto">
        <div class="flex justify-end">
            <a href="#" class="block px3 white hover-primary js-hide-show" data-show="mobile-search" data-icon-show="&#xf002;" data-icon-hide="&#xf00d;"><i class="fa">&#xf002;</i></a>
            <a href="/" class="block px3 white hover-primary"><i class="fa">&#xf015;</i></a>
            <a href="#" class="block px3 white hover-primary text-center js-menu-trigger" style="width:18px"><i class="fa fa-navicon"></i></a>
        </div>
    </div>
</div>
<form class="p3 bg-smoke flex" action="index.html" method="post" id="mobile-search" style="display:none;">
    <input type="text" name="" value="" placeholder="search" class="input width-100" autofocus>
    <button type="submit" class="btn btn-primary"><i class="fa">&#xf002;</i></button>
</form>

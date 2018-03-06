<!-- top menu -->
<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = motionlab_menu_walker('top-menu');

?>

<div class="display-none lg-flex justify-between items-center">


    <ul class="list-reset ml-auto mr3 mb0">

        <?php if ( have_rows('social_links','option')) : ?>
            <?php while ( have_rows('social_links','option')) : ?>
                <?php the_row() ?>
                <li class="inline-block h3">
                    <a target="_blank" href="<?php echo get_sub_field('link','option') ?>" class="grey">
                        <i class="fa <?= get_sub_field('icon','option') ?> pl3 pt1"></i>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>

    </ul>

    <ul class="list-reset mb0 bg-grey bg-lighten-3 <?=(is_front_page())? "opacity-8" : "";?>">

        <?php $i=1; ?>
        <?php foreach($menu as $menuitem) : ?>
            <li class="inline-block <?php if($i!=1) : ?><?php endif; ?>hover-bg-darken-3">
                <a href="<?php echo $menuitem->url; ?>" class="px4 py2 block white hover-white"><?php echo $menuitem->title; ?></a>
            </li>

            <?php $i++; ?>
        <?php endforeach ?>

        <li class="phone || inline-block <?php if($i!=1) : ?>border-lighten-2 bg-brand-primary<?php endif; ?> hover-bg-darken-6 white">
            <a href="tel:<?= str_replace(" ", "", get_field('brand_phone', 'option'));  ?>" class="px4 py2 block bold white hover-white"><i class="fa fa-phone pr2 mr2 border-right border-white"></i> <?= get_field('brand_phone', 'option') ?></a>
        </li>
    </ul>
</div>

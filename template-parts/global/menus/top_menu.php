<!-- top menu -->
<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = motionlab_menu_walker('top-menu');

?>

<div class="display-none lg-flex justify-between items-center">
    <ul class="ml-auto list-reset mb0 bg-grey bg-lighten-3">
        <?php $i=1; ?>
        <?php foreach($menu as $menuitem) : ?>
            <li class="inline-block <?php if($i!=1) : ?><?php endif; ?>bg-grey bg-lighten-3 hover-bg-darken-3">
                <a href="<?php echo $menuitem->url; ?>" class="px4 py2 block bold white hover-white"><?php echo $menuitem->title; ?></a>
            </li>

            <?php $i++; ?>
        <?php endforeach ?>

        <li class="inline-block <?php if($i!=1) : ?>border-lighten-2 bg-brand-primary<?php endif; ?> hover-bg-darken-6 white">
            <a href="tel:<?= str_replace(" ", "", get_field('brand_phone', 'option'));  ?>" class="px4 py2 block bold white hover-white"><i class="fa fa-phone pr2 mr2 border-right border-light"></i> <?= get_field('website_name_phone', 'option') ?></a>
        </li>
    </ul>
</div>

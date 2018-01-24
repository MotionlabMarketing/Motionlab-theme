<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = motionlab_menu_walker('tnc');
?>


<div class="col col-12 md-col-8 px5">
    <?php if(!empty($menu)) : ?>
        <ul class="list-reset md-mb0 text-center md-text-left">
            <?php foreach($menu as $menuitem) : ?>
                <li class="inline-block px2 md-px0 md-mr5"><a href="<?php echo $menuitem->url; ?>" class="white hover-primary"><?php echo $menuitem->title; ?></a></li>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>
</div>
<div class="col col-12 md-col-4 text-center md-text-right px5">
    <p class="mb0 white">Site design by <a href="#" target="_blank" class="white underline hover-primary">motionlab</a></p>
</div>

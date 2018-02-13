<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = motionlab_menu_walker('footer_3');
?>

<div class="col col-12 mb4 md-mb0 md-col-3 px5">
    <?php if(!empty($menu)) : ?>
        <nav>
            <h3 class="white mb3"><?php echo gymgear_get_menu_by_location('footer_3')->name ?></h3>
            <ul class="list-reset mb0">
                <?php foreach($menu as $menuitem) : ?>
                    <li><a href="<?php echo $menuitem->url; ?>" target="_blank" class="white hover-white"><?php echo $menuitem->title; ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    <?php endif; ?>
    &nbsp;
</div>

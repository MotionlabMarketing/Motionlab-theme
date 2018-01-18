<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();
$menu = $menuController->menuWalk(wp_get_nav_menu_items('Footer 1'));
?>


<div class="col col-12 mb4 md-mb0 md-col-3 px5">
    <?php if(!empty($menu)) : ?>
        <nav>
            <h3 class="white mb4"><?php echo gymgear_get_menu_by_location('footer_1')->name ?></h3>
            <ul class="list-reset mb0">
                <?php foreach($menu as $menuitem) : ?>
                    <li><a href="<?php echo $menuitem->url; ?>" target="_blank" class="white hover-primary"><?php echo $menuitem->title; ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    <?php endif; ?>
    &nbsp;
</div>

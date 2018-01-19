<!-- top menu -->
<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = has_nav_menu('Top Menu') ? motionlab_menu_walker('Top Menu') : [];

?>

<div class="display-none p2 lg-flex justify-between items-center bg-navy">
    <ul class="ml-auto list-reset mb0 p0 ">
        <?php $i=1; ?>
        <?php foreach($menu as $menuitem) : ?>
            <li class="inline-block <?php if($i!=1) : ?>border-left border-lighten-2<?php endif; ?>">
                <a href="<?php echo $menuitem->url; ?>" class="px3 py0 bold white hover-primary"><?php echo $menuitem->title; ?></a>
            </li>

            <?php $i++; ?>
        <?php endforeach ?>
    </ul>
</div>

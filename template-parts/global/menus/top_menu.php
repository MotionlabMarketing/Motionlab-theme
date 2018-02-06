<!-- top menu -->
<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = motionlab_menu_walker('top-menu');

?>

<div class="display-none lg-flex justify-between items-center">
    <ul class="ml-auto list-reset mb0 p0 bg-navy p2">
        <?php $i=1; ?>
        <?php foreach($menu as $menuitem) : ?>
            <li class="inline-block <?php if($i!=1) : ?>border-left border-lighten-2<?php endif; ?>">
                <a href="<?php echo $menuitem->url; ?>" class="px3 py0 bold white hover-primary"><?php echo $menuitem->title; ?></a>
            </li>

            <?php $i++; ?>
        <?php endforeach ?>
    </ul>
</div>

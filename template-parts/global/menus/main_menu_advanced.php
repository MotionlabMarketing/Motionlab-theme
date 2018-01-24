<!-- main menu -->
<?php
//$menu = menuWalk(wp_get_nav_menu_items('Main Menu'));
?>

<?php
include_once(get_template_directory() . '/inc/MenuController.php');

$menu = motionlab_menu_walker('primary');
?>

<nav class="js-priority-nav">
    <ul class="list-reset inline-block m0 p0">

        <?php foreach($menu as $menuitem) : ?>
            <li class="inline-block hover-bg-darken-2 animate <?php if(!empty($menuitem->children)){ ?>has-dropdown <?php } ?>">
                <a href="<?php echo $menuitem->url ?>" class="btn border-none text-center block white bold p3 xl-p4 nowrap">
                    <?php echo $menuitem->title; ?>
                    <?php if(!empty($menuitem->children)) : ?>
                        <small class="ml2"><i class="fa fa-chevron-down primary"></i></small>
                    <?php endif; ?>
                </a>
                <?php if(!empty($menuitem->children)) : ?>

                    <?php// include(get_template_directory() .'/template-parts/menus/mega-dropdown.php' ); ?>

                <?php endif ?>
            </li>
        <?php endforeach ?>

    </ul>
</nav>

<!-- main menu -->
<?php
//$menu = menuWalk(wp_get_nav_menu_items('Main Menu'));
?>

<?php
include_once(get_template_directory() . '/inc/MenuController.php');

$menu = motionlab_menu_walker('primary');
?>

<nav class="js-priority-nav">

    <ul class="mr4 ml4 mt2 list-reset inline-block m0 p0 text-right">

        <?php foreach($menu as $menuitem) : ?>

            <li class="inline-block bg-white <?php if(!empty($menuitem->children)){ ?>has-dropdown <?php } ?>">

                <a href="<?php echo $menuitem->url ?>" class="border-none text-center block black bold p3 xl-p4 nowrap">
                    <?php echo $menuitem->title; ?>
                    <?php if(!empty($menuitem->children)) : ?>
                        <small class="ml2"><i class="fa fa-chevron-down brand-primary"></i></small>
                    <?php endif; ?>
                </a>

                <?php if(!empty($menuitem->children)) : ?>

                    <?php include(get_template_directory() .'/template-parts/menus/mega-dropdown.php' ); ?>

                <?php endif ?>
            </li>

        <?php endforeach ?>

    </ul>
</nav>

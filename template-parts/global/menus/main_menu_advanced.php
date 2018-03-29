<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menu = motionlab_menu_walker('primary');
?>

<nav class="js-priority-nav">

    <ul class="mr3 mt2 list-reset inline-block flex justify-end">

        <?php foreach($menu as $menuitem) : ?>

            <li class=" relative <?=(!empty($menuitem->children))? "has-dropdown" : ""; ?>">

                <a href="<?=$menuitem->url?>" class="border-none text-center block bold px2 xl-px3 lg-h4 xl-h3 py2 white hover-brand-primary">
                    <?=$menuitem->title?>
                </a>

                <?php if(!empty($menuitem->children)):?>

                    <?php include(get_template_directory() .'/inc/header/menu-dropdown.php'); ?>

                <?php endif ?>

            </li>

        <?php endforeach ?>

    </ul>

</nav>

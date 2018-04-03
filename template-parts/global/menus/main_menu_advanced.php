<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menu = motionlab_menu_walker('primary');
?>

<nav class="js-priority-nav">

    <ul class="mr4 ml4 mt2 list-reset inline-block m0 p0 text-right">

        <?php foreach($menu as $menuitem) : ?>

            <li class="inline-block relative <?=(!empty($menuitem->children))? "has-dropdown" : ""; ?>" style="font-size: 1.2rem">

                <a href="<?=$menuitem->url?>" class="border-none text-center block bold px4 py2 white hover-brand-primary">
                    <?=$menuitem->title?> <?php if(!empty($menuitem->children)):?><i class="fa fa-caret-down" data-fa-transform="up-6"></i><?php endif ?>
                </a>

                <?php if(!empty($menuitem->children)):?>

                    <?php include(get_template_directory() .'/inc/header/menu-dropdown.php'); ?>
                
                <?php endif ?>

            </li>

        <?php endforeach ?>

    </ul>

</nav>
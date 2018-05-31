<?php
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();

$menu = motionlab_menu_walker('primary');
?>

<!-- mobile menu -->
<div class="menu || js-mobile-menu">
    <ul class="list-reset m0 p0" id="accordion-mobile-header">
        <?php $i=1; ?>
        <?php foreach($menu as $menuitem) : ?>
            <li class="bg-white">
                <div class="flex border-bottom border-smoke bg-white">
                    <a href="<?php echo $menuitem->url ?>" class="block bg-white p3 text-left bold h4 flex-auto black hover-bg-smoke uppercase">
                        <?php echo $menuitem->title; ?>
                    </a>
                    <?php if(!empty($menuitem->children)) : ?>
                        <a class="px4 bg-white flex items-center items-justify body hover-bg-smoke" href="#accordion-mobile-<?php echo $i;?>" data-toggle="collapse" data-parent="#accordion-mobile-header" data-icon-open="fa-caret-up" data-icon-closed="fa-caret-down">
                            <i class="fa fa-caret-down" style="pointer-events:none;"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <?php if(!empty($menuitem->children)) : ?>
                    <div id="accordion-mobile-<?php echo $i;?>" class="collapse" style="display: none;">
                        <?php foreach($menuitem->children as $child) : ?>
                        <a href="<?php echo $child->url ?>" class="block bg-white p3 text-left black h4 hover-bg-smoke border-bottom border-smoke">
                            <?php echo $child->title; ?>
                        </a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </li>
            <?php $i++; ?>
        <?php endforeach ?>
    </ul>

</div>

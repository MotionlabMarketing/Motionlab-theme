<?php
/**
 * MENUS BLOCKS – INTERNAL -------------------------------------
 * This block adds a customisable menu block into the page
 * where the user can link to the internal scroll to points.
 *
 * @author Joe Curran
 * @created 29 May 2018
 *
 * @version 1.00
 */

 // TODO: Needs Waypoints adding and related classes. 

$block['logo'] = get_sub_field($current . '_logo');
$block['buttons'] = get_sub_field($current . '_buttons'); 
$block['enable_sticky'] = get_sub_field($current . '_enable_sticky_navigation'); 

$block['sticky_nav'] = "";
if ($block['enable_sticky'] == true) { $block['sticky_nav'] = "js-sticky-nav"; } ?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "menu-internal {$block['sticky_nav']}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="container bg-white px4 py2 border-radius-2 box-shadow-2 flex items-center justify-between <?=$block['button_alignment']?>">

          <?php render_attachment_image($block['logo'], ["200", "80"], false, ["class" => ""]); ?><div class="border-right border-light-1 border-solid pr3">&nbsp;</div>

          <ul class="list-reset mb0 ml-auto">

            <?php render_buttons($block['buttons'], "none", ["class" => "p0"]); ?>

          </ul>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

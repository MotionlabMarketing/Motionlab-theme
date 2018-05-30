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
$block['buttons'] = get_sub_field($current . '_buttons'); ?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "menu-internal")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="container bg-white px4 py2 border-radius-2 box-shadow-2 flex items-center justify-between <?=$block['button_alignment']?>">

          <?php render_attachment_image($block['logo'], ["200", "80"], false, ["class" => ""]); // NEEDS LOGO/ICON FOR MODEL. ?>

          <ul class="list-reset mb0">

              <?php foreach ($block['buttons'] as $button):?>

                  <li class="inline-block mx3"><a href="<?=$button['button_button_link']['url']?>" class="brand-base hover-brand-base" <?=($button['button_button_link']['target'] ? 'target="'.$button['button_button_link']['target'].'"' : '')?>><?=$button['button_button_link']['title']?></a></li>

              <?php endforeach; ?>

          </ul>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

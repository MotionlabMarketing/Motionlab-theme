<?php
/**
 * MENUS BLOCKS – INTERNAL -------------------------------------
 * This block adds a customisable menu block into the page
 * where the user can link to the internal scroll to points.
 *
 * @author Joe Curran
 * @created 27 Feb 2018
 *
 * @version 1.00
 */

$block['buttons'] = get_sub_field($current . '_buttons');
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "menu-internal")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="links <?=$block['button_alignment']?>">

        <?php foreach ($block['buttons'] as $button):?>

            <a href="<?=$button['button_button_link']['url']?>" <?=($button['button_button_link']['target'] ? 'target="'.$button['button_button_link']['target'].'"' : '')?> class="btn btn-medium <?=$button['button_system_text_colours']?> <?=$button['button_system_background_colours']?>"><?=$button['button_button_link']['title']?></a>

        <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
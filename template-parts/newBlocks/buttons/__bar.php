<?php
/**
 * BUTTON BLOCK BAR --------------------------
 * Add buttons in the style of a bar to the
 * page.
 *
 * @author Joe Curran
 * @created 5 Feb 2018
 * @updated 28 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "buttons-bar")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="buttons-holder <?=$block['button']['alignment']?>">

        <?php foreach ($block['buttons'] as $button): ?>

            <a href="<?=$button['button_link']['url']?>" class="<?=$block['button']['size']?> bold inline-block border-top border-bottom border-left border-right-none min-width-5 my1 <?=$block['border']['colour']?> <?=$button['system_background_colours']?> <?=$button['system_text_colours']?> <?=($block['button']['current'] == $button['button_link']['url'])? 'active' : '';?>" <?=($button['button_link']['title'] ? 'title="'.$button['button_link']['title'].'"' : '')?> <?=($button['button_link']['target'] ? 'target="'.$button['button_link']['target'].'"' : '')?> style="border-radius: 0;">
                <?=$button['button_link']['title']?>
            </a>

        <?php endforeach; ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

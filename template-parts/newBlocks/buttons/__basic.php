<?php
/**
 * REPEATING BUTTON BLOCK --------------------------
 * Add support for single buttons blocks or button
 * bars.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 * @updated 28 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "buttons-basic")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="<?=$block['button']['alignment']?>">

            <?php foreach ($block['buttons'] as $button): ?>

                <a href="<?=$button['button_link']['url']?>" class="btn <?=$block['button']['size']?> border-radius-<?=$block['button']['radius']?> inline-block <?=$button['system_text_colours']?> <?=$button['system_background_colours']?>" <?=($button['button_link']['title'] ? 'title="'.$button['button_link']['title'].'"' : '')?> <?=($button['button_link']['target'] ? 'target="'.$button['button_link']['target'].'"' : '')?>>
                    <?=$button['button_link']['title']?>
                </a>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
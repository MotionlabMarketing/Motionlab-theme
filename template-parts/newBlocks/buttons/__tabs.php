<?php
/**
 * TABS BUTTON BLOCK --------------------------------
 * Add
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "buttons-tabs")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="<?=$block['button']['alignment']?> border-bottom border-light">

        <?php foreach ($block['buttons'] as $button): ?>

            <a href="<?=$button['button_link']['url']?>" class="btn <?=$block['button']['size']?> inline-block border-top border-left border-right border-light <?=$button['system_text_colours']?> <?=$button['system_background_colours']?> <?=($block['button']['current'] == $button['button_link']['url'])? 'active' : '';?>" <?=($button['button_link']['title'] ? 'title="'.$button['button_link']['title'].'"' : '')?> <?=($button['button_link']['target'] ? 'target="'.$button['button_link']['target'].'"' : '')?> style="border-radius: 0">
                <?=$button['button_link']['title']?>
            </a>

        <?php endforeach; ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
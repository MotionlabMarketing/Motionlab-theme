<?php
/**
 * REPEATING BUTTON BLOCK --------------------------
 * Add support for single buttons blocks or button
 * bars.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$buttons = get_sub_field('block_buttons');
$size    = get_sub_field('block_buttons_size');
$border  = str_replace(".", "-", str_replace(".", "-", get_field('buttons_border_radius', 'option')));

$customCSS  = get_sub_field('block_button_css');

?>

<section class="buttons-basic || overflow-hidden p3 mb4 || <?=$customCSS?>">

    <div class="container">

        <div class="px4 lg-px0 text-center">

            <?php foreach ($buttons as $btn): ?>

                <a href="<?=$btn['button_link']['url']?>" class="btn btn-<?=$size?> border-radius-<?=$border['border_radius_strength']?> <?=$btn['system_text_colours']?> inline-block <?=$btn['system_background_colours']?> <?=$btn['custom_class']?>" <?=($btn['button_link']['title'] ? 'title="'.$btn['button_link']['title'].'"' : '')?> <?=($btn['button_link']['target'] ? 'target="'.$btn['button_link']['target'].'"' : '')?>>
                    <?=$btn['button_text']?>
                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>

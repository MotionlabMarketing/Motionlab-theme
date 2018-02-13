<?php
/**
 * BUTTON BLOCK BAR --------------------------
 * Adds support for a button bar.
 *
 * @author Joe Curran
 * @created 5 Feb 2018
 *
 * @version 1.00
 */

$buttons    = get_sub_field('block_buttons');
$size       = get_sub_field('block_buttons_size');
$border     = str_replace(".", "-", str_replace(".", "-", get_field('buttons_border_radius', 'option')));
$arrows     = get_sub_field('block_button_arrows');

$current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$customCSS  = get_sub_field('block_button_css');
?>

<section class="buttons-bar || relative z-index-100 overflow-hidden p3 mb4 || <?=$customCSS?>">

    <div class="container">

        <div class="px4 lg-px0 text-center">

            <?php foreach ($buttons as $btn): ?>

                <a href="<?=$btn['button_link']['url']?>" class="btn btn-<?=$size?> relative regular border-radius-<?=$border['border_radius_strength']?> <?=$btn['system_text_colours']?> inline-block <?=$btn['system_background_colours']?> <?=($arrows == true)? "btn-arrows" : " ";?><?=$btn['custom_class']?> <?=($current_url == $btn['button_link']['url'])? 'active' : '';?>" <?=($btn['button_link']['title'] ? 'title="'.$btn['button_link']['title'].'"' : '')?> <?=($btn['button_link']['target'] ? 'target="'.$btn['button_link']['target'].'"' : '')?>>
                    <?=$btn['button_text']?>
                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>

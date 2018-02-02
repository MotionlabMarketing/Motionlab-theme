<?php
/**
 * TABS BUTTON BLOCK --------------------------------
 * Adds support for tabs buttons to link to other
 * pages.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */


$bgColor     = get_sub_field( $current . '_background_system_background_colours');

$blockTitle  = get_sub_field('block_linkBoxes_title_title');
$buttons     = get_sub_field('block_buttons');

$size        = get_sub_field('block_buttons_size');

$current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<section class="buttons-tabs || overflow-hidden p3 mb4 || <?=$bgColor?>">

    <div class="container">

        <div class="px4 lg-px0 text-center border-bottom border-light">

            <?php foreach ($buttons as $btn): ?>

                <a href="<?=$btn['button_link']['url']?>" class="btn btn-<?=$size?> <?=$btn['system_text_colours']?> inline-block <?=$btn['system_background_colours']?> <?=$btn['custom_class']?> <?=($current_url == $btn['button_link']['url'])? 'active' : '';?>" <?=($btn['button_link']['title'] ? 'title="'.$btn['button_link']['title'].'"' : '')?> <?=($btn['button_link']['target'] ? 'target="'.$btn['button_link']['target'].'"' : '')?>>
                    <?=$btn['button_text']?>
                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>
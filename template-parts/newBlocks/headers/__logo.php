<?php
/**
 * HEADER BLOCKS ---------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page with included logo/image.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

$blockLogo = get_sub_field($current . '_logo');

?>
<section <?=get_blockID($block)?> class="clearfix relative <?=get_blockVisibility($block)?> <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="<?=get_sub_field($current . '_alignment_align')?>">

            <div class="mb4">
                <?= wp_get_attachment_image($blockLogo['ID'], array(120, 120), "", ["class" => "block ml-auto mr-auto"]  )?>
            </div>

            <?php

                $order = [];
                $a = get_sub_field($current . '_subPosition');

                if ($a == "before"):
                    $order[0] = $current . "_titleSecondly_title";
                    $order[1] = $current . "_title_title";
                else:
                    $order[0] = $current . "_title_title";
                    $order[1] = $current . "_titleSecondly_title";
                endif;

            $blockTitle = get_sub_field($order[0]);
            if (!empty($blockTitle[0]['title'])) {
                include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); }

            $blockTitle = get_sub_field($order[1]);
            if (!empty($blockTitle[0]['title'])) {
                include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); } ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
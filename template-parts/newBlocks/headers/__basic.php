<?php
/**
 * HEADER BLOCKS ---------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 2.00
 */

?>
<section id="<?=$block['custom_id']?>" class="clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="<?=get_sub_field($current . '_alignment_align')?>">

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

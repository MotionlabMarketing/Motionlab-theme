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
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="<?=get_sub_field($current . '_alignment_align')?>">

            <?php render_attachment_image($block['logo'], array('120', '120'), "", ['class' => 'block mb4 ml-auto mr-auto']); ?>

            <?php render_heading( "{$block['headings'][0]->title}", "{$block['headings'][0]->type}", "{$block['headings'][0]->size}", "{$block['headings'][0]->color}", "{$block['headings'][0]->case}"); ?>

            <?php render_heading( "{$block['headings'][1]->title}", "{$block['headings'][1]->type}", "{$block['headings'][1]->size}", "{$block['headings'][1]->color}", "{$block['headings'][1]->case}"); ?>


        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
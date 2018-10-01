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


 $block['headings'][0]->class = ["class" => "demo"];

 pa( $block['headings'][0]);
?>
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="<?=$block['txt']['alignment']?>">

            <?php render_heading( "{$block['headings'][0]->title}", "{$block['headings'][0]->type}", "{$block['headings'][0]->size}", "{$block['headings'][0]->color}", "{$block['headings'][0]->case}", "{$block['headings'][0]->class}" ); ?>

            <?php render_heading( "{$block['headings'][1]->title}", "{$block['headings'][1]->type}", "{$block['headings'][1]->size}", "{$block['headings'][1]->color}", "{$block['headings'][1]->case}", "{$block['headings'][1]->class}"); ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<?php
/**
 * SPACERS BLOCKS ---------------------------------------
 * A basic block that allow the user to add space between
 * other blocks.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

?>
<section <?=get_blockID($block)?> class="spacer-ruled || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container '.$block['padding'].'">' : ""?>

        <div class="block py3">

            <hr class="relative <?=get_sub_field($current . '_rule')?> border-<?=get_sub_field($current . '_ruleSize')?> <?=get_sub_field($current . '_ruleStyle')?>">

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
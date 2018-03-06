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
<section id="<?=$block['custom_id']?>" class="spacer-ruled || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container '.$block['padding'].'">' : ""?>

        <div class="block py3">

            <hr class="relative <?=get_sub_field($current . '_rule')?> border-<?=get_sub_field($current . '_ruleSize')?> <?=get_sub_field($current . '_ruleStyle')?>">

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
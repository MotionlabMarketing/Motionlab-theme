<?php
/**
 * CTA – BASIC LAYOUT BLOCK ------------------------
 * A basic message which can be linked to a page.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */
?>

<section id="<?=$block['custom_id']?>" class="cta-basic || clearfix  relative || <?=($block['grid'] == 'container')? 'container' : ""?> <?=$block['spacing']?> <?=$block['padding']?> <?=($block['bgImage']['enable'] !== true)? $block['background']['colour']:''?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

            <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

            <div class="<?=get_sub_field($current . '_alignment_align')?>">

                <div class="col col-12 || text-center p4">

                    Hello

                </div>

            </div>

            <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
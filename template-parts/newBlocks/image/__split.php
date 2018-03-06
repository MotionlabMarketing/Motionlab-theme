<?php
/**
 * SLIP IMAGE BLOCK ---------------------------------------
 * This block show two images side-by-side.
 *
 * @author Joe Curran
 * @created 14 Feb 2018
 *
 * @version 1.00
 */

$images    = get_sub_field($current . '_items');
$minHeight = get_sub_field($current . '_height_min_height');
?>

<section id="<?=$block['custom_id']?>" class="clearfix relative <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col col-12 md-col-6 mb2 md-pt2 md-pr2 md-pb2 relative <?=$minHeight?>">

            <?=(!empty($images[0]['link']['url']))? '<a href="'.$images[0]['link']['url'].'">' : '' ?>

                <div class="image-holder || absolute height-100 width-100 bg-<?=$images[0]['background_position']?>" style="background-image: url('<?=$images[0]['image']['url']?>');"></div>

            <?=(!empty($images[0]['link']['url']))? '</a>' : '' ?>

        </div>

        <div class="col col-12 md-col-6 mb2 md-pt2 md-pl2 md-pb2 relative <?=$minHeight?>">

            <?=(!empty($images[1]['link']['url']))? '<a href="'.$images[1]['link']['url'].'">' : '' ?>

                <div class="image-holder || absolute height-100 width-100 bg-<?=$images[1]['background_position']?>" style="background-image: url('<?=$images[1]['image']['url']?>');"></div>

            <?=(!empty($images[1]['link']['url']))? '</a>' : '' ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
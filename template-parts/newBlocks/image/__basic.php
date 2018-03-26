<?php
/**
 * BASIC IMAGE BLOCK ---------------------------------------
 * This block show two images side-by-side.
 *
 * @author Joe Curran
 * @created 14 Feb 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "jobs-talent")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="col col-12 mb2 md-pt2 md-pr2 md-pb2 relative <?=$block['images']['minHeight']?>">
        
        <?=(!empty($block['images'][0]['link']['url']))? '<a href="'.$block['images'][0]['link']['url'].'">' : '' ?>

        <div class="image-holder || absolute height-100 width-100 bg-<?=$block['images'][0]['background_position']?>" style="background-image: url('<?=$block['images'][0]['image']['url']?>');"></div>

        <?=(!empty($block['images'][0]['link']['url']))? '</a>' : '' ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

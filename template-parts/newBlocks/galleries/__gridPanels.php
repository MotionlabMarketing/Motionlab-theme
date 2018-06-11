<?php
/**
 * GALLERY BLOCK: GRID PANEL --------------------------------------
 * A gallery block that shows a panel grid of 4 by 2 which can be
 * navigated.
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "px6")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="container clearfix || gallery item-slider p2">

        <div data-slick="galleryGridPanels-slider">

            <?php
            $i = 0;
            $images = get_field('image', get_sub_field($current . '_gallery'));
            foreach ($images as $img): ?>

            <?php if ($i === 0): ?><div class="panel-holder"><?php endif; ?>

                <a href="<?=$img['url']?>" class="col col-6 md-col-3 p1" data-image="<?=$i?>">
                    <img src="<?=$img['sizes']['medium']?>" class="" alt="<?=$img['alt']?>">
                </a>

            <?php $i++; if ($i > 7) {
                echo "</div>";
                $i = 0;
            } endforeach; ?>

        </div>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

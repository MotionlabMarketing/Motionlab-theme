<?php
/**
 * BASIC GALLERY SLIDER BLOCK --------------------------------------
 *
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */

 pa($block['content']['images']);
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "gallery")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <h1> this is a test</h1>

        <div class="container clearfix || gallery item-slider">

            <div data-slick="galleryThin-slider">

            <?php

              foreach ($block['content']['images'] as $img): ?>

                <a href="<?=$img['url']?>" style="margin: 0 5px">
                    <img src="<?=$img['sizes']['medium']?>" class="" alt="<?=$img['alt']?>">
                </a>

            <?php endforeach; ?>

            </div>

            <div data-slick="galleryThin-slider">

            <?php
              foreach ($block['content']['images'] as $img): ?>

                <a href="<?=$img['url']?>" style="margin: 0 5px">
                    <img src="<?=$img['sizes']['medium']?>" class="" alt="<?=$img['alt']?>">
                </a>

            <?php endforeach; ?>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

<?php
/**
 * BASIC GALLERY BLOCK --------------------------------------
 *
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "gallery")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="container clearfix || gallery item-slider">

            <div data-slick="galleryThin-slider">

            <?php
              $images = get_field('image', get_sub_field($current . '_gallery'));
              foreach ($images as $img): ?>

                <a href="<?=$img['url']?>" style="margin: 0 5px">
                    <img src="<?=$img['sizes']['galleryMedium']?>" class="" alt="<?=$img['alt']?>">
                </a>

            <?php endforeach; ?>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

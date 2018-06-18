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

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "gallery")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="container clearfix gallery item-slider">

        <div data-slick="gallery-slider-main" class="mb2">

            <?php foreach ($block['content']['images'] as $img): ?>

                <a href="<?=$img['sizes']['galleryMedium']?>" class="block">
                    <div class="ratio-16-9 bg-cover bg-repeat-none " style="background-image:url('<?=$img['sizes']['galleryMedium']?>')"></div>
                </a>

            <?php endforeach; ?>

        </div>

        <div data-slick="gallery-slider-thumb" class="px5">

            <?php foreach ($block['content']['images'] as $img): ?>

                <div style="margin: 0 5px">
                    <img src="<?=$img['sizes']['mediumCrop']?>" class="" alt="<?=$img['alt']?>">
                </div>

            <?php endforeach; ?>

        </div>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

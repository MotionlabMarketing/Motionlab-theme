<?php
/**
 * LOGO BASICS BLOCKS ---------------------------------------
 * This block add logos to the page in a single line that
 * will auto scroll if needed.
 *
 * @author Joe Curran
 * @created 28 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="item-slider md-pl5" data-slick="logo-slider">&nbsp;<?php // NEEDED TO KEEP BOX HEIGHT. ?>

            <?php foreach ($block['logos'] as $logo): ?>

                <div class="logo px2 js-match-height">

                    <div class="flex items-center height-100">
                    <?=wp_get_attachment_image($logo['ID'], array(160, 160), "", ["class" => "block mx-auto"])?>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>


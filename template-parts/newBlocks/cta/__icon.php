<?php
/**
 * CTA – ICON SECTIONS ---------------------------
 * A CTA with an icon and message.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block)?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : '' ?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="mxn2">

            <?php foreach ($block['content']['iconCTA'] as $cta): ?>
                <div class="px2 col col-12 sm-col-6 mt3 sm-mt0 flex justify-center items-start icon-cta-font-sizer">
                    <?php include(get_template_directory() .'/template-parts/newBlocks/_parts/__icon_cta.php'); ?>
                </div>
            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

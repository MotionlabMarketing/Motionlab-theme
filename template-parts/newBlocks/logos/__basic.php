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

<section id="<?= $block['custom_id'] ?>" class="clearfix <?= $block['spacing'] ?> <?= $block['padding'] ?> <?= $block['background']['colour'] ?> <?= $block['border']['sides'] ?> <?= $block['border']['size'] ?> <?= $block['border']['colour'] ?> <?= $block['custom_css'] ?>" <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <?php if (!empty($blockTitle[0]['title'])): ?>

            <?php if (!empty($block['title']) || !empty($block['content'])): ?>
                <div class="col col-12 md-col-12 lg-col-12 mb5 text-center">

                    <?php if (!empty($blockTitle[0]['title'])): ?>
                        <div class="m4 text-center">
                            <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($block['content'])): ?>
                        <div class="text-center mb2 limit-p limit-p-70">
                            <?= $block['content'] ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

    <?php endif; ?>

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


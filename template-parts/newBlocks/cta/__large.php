<?php
/**
 * CTA – LARGE LAYOUT BLOCK ------------------------
 * A block that contains a title, content, link
 * and buttons in the 2 column grid.
 *
 * @author Joe Curran
 * @created 2 March 2018
 *
 * @version 1.00
 */
?>

<section id="<?= $block['custom_id'] ?>" class="cta-large || clearfix  relative || <?= ($block['grid'] == 'container') ? 'container' : "" ?> <?= $block['spacing'] ?> <?= $block['padding'] ?> <?= ($block['bgImage']['enable'] !== true) ? $block['background']['colour'] : '' ?> <?= $block['border']['sides'] ?> <?= $block['border']['size'] ?> <?= $block['border']['colour'] ?> <?= $block['custom_css'] ?>" <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <div class="content">

        <div class="col col-12 md-col-6 p4">

            <?php $blockTitle = $block['content']['title'];
            if (!empty($blockTitle[0]['title'])): ?>
                <div class="mb3">
                    <?php include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($block['content']['content'])): ?>
                <div class="wysiwyg <?= $block['content']['txtColor'] ?> bold" style="max-width: 80%">
                    <?= $block['content']['content'] ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="col col-12 md-col-6 p4">

            <?php if (!empty($block['content']['preline'])): ?>

                <p class="mb2 bold"><?= $block['content']['preline'] ?></p>

            <?php endif; ?>

            <?php if (!empty($block['content']['link']['url'])): ?>

                <a href="<?= $block['content']['link']['url'] ?>"
                   class="block brand-primary bold h2 mb2"><?= $block['content']['link']['title'] ?></a>

            <?php endif; ?>

            <?php if ($block['buttons']['enabled'] == true): ?>

                <div class="">

                    <?php foreach ($block['content']['buttons'] as $button): ?>

                        <a href="<?= $button['button_button_link']['url'] ?>"
                           class="btn btn-medium <?= $button['button_system_text_colours'] ?> <?= $button['button_system_background_colours'] ?> mr2"><?= $button['button_button_link']['title'] ?></a>

                    <?php endforeach; ?>

                </div>


            <?php endif; ?>

        </div>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>
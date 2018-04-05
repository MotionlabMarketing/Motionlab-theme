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

$limit = ($block['grid'] == 'container')? 'container' : "";
$image = ($block['bgImage']['enable'] !== true)? $block['background']['colour'] : '';
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "cta-iconPanels {$limit} {$image}")?> <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <div class="content <?=$block['content']['txtAlign']?>">

        <div class="col col-12 md-col-6 p4">
            
            <?php $heading = convert_heading($block['content']['title']); ?>

            <?php render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}"); ?>

            <?php render_wysiwyg($block['content']['content'], true, ["class" => "bold mb0", "style" => "margin-bottom: 0rem"]); ?>

        </div>

        <div class="col col-12 md-col-6 p4 limit-p limit-p-70">

            <?php if (!empty($block['content']['link']['url'])): ?>

                <a href="<?= $block['content']['link']['url'] ?>"
                   class="block brand-primary bold <?=$heading->size?> mb2"><?= $block['content']['link']['title'] ?></a>

            <?php endif; ?>

            <?php if (!empty($block['content']['preline'])): ?>

                <p class="mb2 bold"><?= $block['content']['preline'] ?></p>

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
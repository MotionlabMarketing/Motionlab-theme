<?php
/**
 * STORE BLOCK – PRODUCT RANGE ---------------------------------------
 * This block outputs a number of product ranges.
 *
 * @author Joe Curran
 * @created 26 Mar 2018
 *
 * @version 1.00
 */

// TODO: NEED THE IMAGE HOOKING UP, CHEERS LAD!

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col-12 mb5 text-center" data-element="introduction">

            <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

            <?php render_wysiwyg("{$block['intro']}", true, ["class" => "regular"])?>

        </div>

        <div class="col-12 mxn2">

            <?php if (is_array($block['models']) && !empty($block['models'])): foreach ($block['models'] as $model): ?>
                <div class="model-item col col-12 sm-col-6 md-col-3 p3 text-center">

                    <a href="<?=get_category_link($model->term_id)?>">
                        <?=render_attachment_image("8007", "large", false,  ["class" => "mb4"])?> <?php //NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                    </a>

                    <a href="<?=get_category_link($model->term_id)?>" class="btn brand-primary">View <?=$model->name?> Range</a>

                </div>
            <?php endforeach; else: ?>

            <div class="block-contentsEmpty text-center mb4">

                <p class="h4 italic lead"><strong>Sorry</strong>, we couldn't find anything for this section. Please select some products.</p>

            </div>

            <?php endif; ?>

        </div>

        <?php if (!empty($block['pageLink'])): ?>

            <div class="text-center mt4" data-element="pageButton">

                <?php render_button($block['pageLink'], "medium", ["class" => "bold"]) ?>

            </div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
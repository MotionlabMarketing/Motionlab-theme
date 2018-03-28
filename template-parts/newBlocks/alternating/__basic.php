<?php
/**
 * HEADER BLOCKS ---------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 2.00
 */


?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="clearfix <?=$block['content']['bg']?> <?=$block['content']['sides']?> <?=$block['content']['borders']['color']?> <?=$block['content']['borders']['size']?>">

        <div class="relative col col-12 md-col-6 <?=$block['content']['position']?> <?=$block['content']['padding']?> js-match-height min-height-v50 overflow-hidden">

            <?php if ($block['content']['type'] == "image"): ?>

                <?=($block['content']['padding'] !== 'p0')? '<div class="relative height-100 overflow-hidden '.$block['content']['padding'].'">' : '' ?>

                    <div class="image-holder top-0 left-0 height-100 width-100 absolute bg-cover bg-center min-height-v50 mb4 md-mb0" style="background-image: url('<?=wp_get_attachment_url($block['content']['image'])?>')"></div>

                <?=($block['content']['padding'] !== 'p0')? '</div>' : '' ?>

            <?php endif; ?>

            <?php if ($block['content']['type'] == "gallery"): ?>

                <div class="js-match-height overflow-hidden">

                    <div class="slider relative height-100" data-slick="slider-auto-arrows">

                        <?php foreach ($block['content']['gallery'] as $slide): ?>

                            <img src="<?=$slide['url']?>">

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endif; ?>

            <?php if ($block['content']['type'] == "video"): ?>

                <div class="overflow-hidden">

                    <div class="relative no-resize">

                        <?php $block['content']['video'] = explode("=", $block['content']['video']); ?>
                        <iframe width="100%" height="280" data-imatch="video" src="https://www.youtube.com/embed/<?=$block['content']['video'][1]?>" frameborder="0" allow="encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <div class="col col-12 md-col-6 p4 lg-p6 <?=$block['content']['align']?> <?=$block['content']['color']?> js-match-height  items-center">

            <div data-imatchto="video">

                <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}", ["class" => "mb2"]); ?>

                <?php render_wysiwyg($block['intro']); ?>

                <div class="mt4 text-center lg-text-left lg-flex items-center border-smoke border-top pt4 border-darken-3">

                    <?php foreach ($block['content']['buttons'] as $button): ?>

                        <a href="<?=$button['button_link']['link']?>" class="btn btn-medium <?=$button['system_text_colours']?> <?=$button['system_background_colours']?>" <?=($button['button_link']['title'] ? 'title="'.$button['button_link']['title'].'"' : '')?> <?=($button['button_link']['target'] ? 'target="'.$button['button_link']['target'].'"' : '')?> ><?=$button['button_link']['title']?></a>

                    <?php endforeach; ?>

                    <?php if(!empty($block['content']['cta']['append'])): ?>

                        <p class="lg-inline bold mb2 mt3 lg-mt0 lg-mb0 lg-mb0 lg-ml4 lg-mr2"><?=$block['content']['cta']['append']?></p>

                    <?php endif; ?>

                    <?php if(!empty($block['content']['cta']['link'])): ?>

                        <a href="<?=$block['content']['cta']['link']['url']?>" class="h3 bold brand-primary mx2"><?=$block['content']['cta']['link']['title']?></a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
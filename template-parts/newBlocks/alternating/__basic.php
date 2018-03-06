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
<section id="<?=$block['custom_id']?>" class="alternating-basic clearfix relative <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="clearfix <?=$block['content']['bg']?> <?=$block['content']['sides']?> <?=$block['content']['borders']['color']?> <?=$block['content']['borders']['size']?>">

        <div class="relative col col-12 md-col-6 <?=$block['content']['position']?> <?=$block['content']['padding']?> js-match-height min-height-v50">

            <?php if ($block['content']['type'] == "image"): ?>

                <?=($block['content']['padding'] !== 'p0')? '<div class="relative height-100 '.$block['content']['padding'].'">' : '' ?>

                    <div class="image-holder top-0 left-0 height-100 width-100 absolute bg-cover bg-center min-height-25" style="background-image: url('<?=wp_get_attachment_url($block['content']['image'])?>')"></div>

                <?=($block['content']['padding'] !== 'p0')? '</div>' : '' ?>

            <?php endif; ?>

            <?php if ($block['content']['type'] == "gallery"): ?>

                <div class="js-match-height overflow-hidden">

                    <div class="slider relative height-100" data-slick="slider-auto-arrows">

                        <?php foreach ($block['content']['gallery'] as $slide): ?>

                            <img src="<?=$slide['url']?>" class="">

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <div class="col col-12 md-col-6 p4 lg-p6 <?=$block['content']['align']?> <?=$block['content']['color']?> js-match-height  items-center">

            <?php $blockTitle = $block['content']['title'];
            if (!empty($blockTitle[0]['title'])): ?>
                <div class="mb2">
                    <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($block['content']['content'])): ?>
                <div class="wysiwyg">
                    <?=$block['content']['content']?>
                </div>
            <?php endif; ?>

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

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<?php
/**
 * NEWS ROW VIEW BLOCK ---------------------------------------
 * This block outputs a number of blog post on to the page
 * which can be selected or latest.
 *
 * @author Joe Curran
 * @created 2 Mar 2018
 *
 * @version 1.00
 */

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "pod-row")?> <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <?php foreach ($block['content'] as $item):?>

        <div class="col col-12 p2">

            <div class="relative col <?=$item['mediaAlignment']?> col-12 md-col-3">

                <?php if ($item['type'] == "image"): ?>

                    <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'].'">' : "")?>

                        <?= wp_get_attachment_image($item['image'], "large", "", ["class" => "box-shadow-1 js-match-height"]) // NEEDS IMAGE ID ADDING. ?>

                    <?=(!empty($item['button']['button_link']['url'])? '</a>' : "")?>

                <?php elseif ($item['type'] == "slider"): ?>

                    <div class="mb2" data-slick="slider-auto-arrows">
                        <?php foreach ($item['slider'] as $slide): ?>

                            <img src="<?=$slide['url']?>" alt="" class="js-match-height">

                        <?php endforeach; ?>
                    </div>

                <?php else: ?>
                    <?php // DO NOTHING. ?>
                <?php endif; ?>

            </div>

            <div class="col col-12 md-col-9 px4 flex items-center js-match-height <?=$block['pod']['textColor']?> <?=$item['align']?>">

                <div class="clearfix relative <?= $block['content']['txtColor'] ?>">

                    <h3 class="mb2 brand-primary" style="font-size: 1.3rem">

                        <?=(!empty($item['button']['button_link']['url'])? '<a href="'.$item['button']['button_link']['url'].'">' : "")?>

                        <?=$item['title']?>

                        <?=(!empty($item['button']['button_link']['url'])? '</a>' : "")?>

                    </h3>

                    <p class="h4 mb0"><?=$item['pod_content']?></p>

                    <?php if(!empty($item['button']['button_link']['url'])): ?>
                        <a href="<?=$item['button']['button_link']['url']?>" class="btn btn-medium mt3 <?=$item['button']['button_text_colour']['system_text_colours']?> <?=$item['button']['button_background_colour']['system_background_colours']?> bold "><?=$item['button']['button_link']['title']?></a>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>
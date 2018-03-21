<?php
/**
 * BASIC POD LAYOUT – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 7 Mar 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> class="pod-column || clearfix relative <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> mxn2 p2 js-match-height">

                <?php foreach ($block['content'] as $item): pa ?>

                    <div class="pod || col <?=$block['columns']?>  mb4 p2 relative">

                        <div class="internal-padding <?=$block['pod']['bgColour']?> <?=$block['pod']['padding']?>">

                            <?php if ($item['type'] == "image"): ?>

                                <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'] .'">' : "")?>

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

                            <div class="<?=$block['pod']['textColor']?> <?=$block['pod']['textAlign']?>  py3 px3 mb2 js-match-height-alt">

                                <h3 class="mb2 brand-primary" style="font-size: 1.3rem">

                                    <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'] .'">' : "")?>

                                        <?=$item['title']?>

                                    <?=(!empty($item['button']['button_link']['url'])? '</a>' : "")?>

                                </h3>

                                <p class="h5"><?=$item['pod_content']?></p>

                                <?php if(!empty($item['button']['button_link']['url'])): ?>
                                    <a href="<?=$item['button']['button_link']['url']?>" class="btn <?=$item['button']['button_text_colour']['system_text_colours']?> <?=$item['button']['button_background_colour']['system_background_colours']?> bold "><?=$item['button']['button_link']['title']?></a>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php include(BLOCKS_DIR . '_parts/__backgroundImageContainer.php'); ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__backgroundImageFullWidth.php'); ?>

</section>
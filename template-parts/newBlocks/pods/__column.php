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

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "pod-column")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container clearfix">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="mxn3 flex justify-center flex-wrap">

            <?php foreach ($block['content'] as $item): ?>

                <div class="pod col <?=$block['columns']?> px3 mb5 relative">

                    <div class="internal-padding <?=$block['pod']['bgColour']?> <?=$block['pod']['padding']?> <?php if($block['pod']['shadow']): ?>box-shadow-2<?php endif; ?>">

                        <?php if ($item['type'] == "image"): ?>

                            <div class="flex items-center justify-center">

                                <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'] .'" class="block overflow-hidden hover-zoom">' : "")?>

                                    <?=wp_get_attachment_image($item['image'],'galleryMedium')?>

                                <?=(!empty($item['button']['button_link']['url'])? '</a>' : "")?>

                            </div>

                        <?php elseif ($item['type'] == "slider"): ?>

                            <div class="mb2" data-slick="slider-auto-arrows">
                            <?php foreach ($item['slider'] as $slide): ?>

                                <img src="<?=$slide['url']?>" alt="" class="js-match-height">

                            <?php endforeach; ?>
                            </div>

                        <?php else: ?>
                            <?php // DO NOTHING. ?>
                        <?php endif; ?>

                        <?php if($block['pod']['icon']): ?>

                        <div class="bg-brand-primary mx-auto relative z2" style="width:4em; margin-top:-2rem; border-radius:50%;">
                            <div class="square relative" style="font-size:1.8em;">
                                <?php if($item['icon__image'] == 'icon'):?>
                                <i class="fa <?= $item['icon'];?> white absolute top-50 left-50 translate"></i>
                                <?php else:?>
                                    <img src="<?= $item['icon_image'];?>" alt="" class="absolute top-50 left-50 translate">
                                <?php endif;?>
                            </div>
                        </div>

                        <?php endif; ?>

                        <div class="<?=$block['pod']['textColor']?> <?=$block['pod']['textAlign']?> py3 <?=($block['pod']['shadow'])? "px3" : ""?> mb2 js-match-height-alt">

                            <h3 class="mb2 brand-primary" style="font-size: 1.3rem" data-mh="pod-title">

                                <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'] .'">' : "")?>

                                    <?=$item['title']?>

                                <?=(!empty($item['button']['button_link']['url'])? '</a>' : "")?>

                            </h3>

                            <div class="h4 mb0" data-mh="pod-content"><?=$item['pod_content']?></div>

                            <?php render_button($item['button'], "medium", ["class" => "bold hover-white hover-bg-brand-primary"]); ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <?php include(BLOCKS_DIR . '_parts/__backgroundImageContainer.php'); ?>


    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__backgroundImageFullWidth.php'); ?>

</section>

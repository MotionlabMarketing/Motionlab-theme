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

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="mxn3">

            <?php foreach ($block['content'] as $item): ?>

                <div class="pod || col <?=$block['columns']?> px3 mb4 relative">

                    <div class="internal-padding <?=$block['pod']['bgColour']?> <?=$block['pod']['padding']?> <?php if($block['pod']['shadow']): ?>box-shadow-2<?php endif; ?>">

                        <?php if ($item['type'] == "image"): ?>

                            <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'] .'">' : "")?>

                                <figure class="ratio-3-2 m0 bg-center bg-cover" style="background-image:url('<?= wp_get_attachment_image_url($item['image'],'medium') ?>')"></figure>

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

                        <div class="<?=$block['pod']['textColor']?> <?=$block['pod']['textAlign']?>  py3 px3 mb2 js-match-height-alt">

                            <h3 class="mb2 brand-primary" style="font-size: 1.3rem">

                                <?=(!empty($item['button']['button_link']['url'])? '<a href="'. $item['button']['button_link']['url'] .'">' : "")?>

                                    <?=$item['title']?>

                                <?=(!empty($item['button']['button_link']['url'])? '</a>' : "")?>

                            </h3>

                            <p class="h5"><?=$item['pod_content']?></p>

                            <?php if(!empty($item['button']['button_link']['url'])): ?>
                                <a href="<?=$item['button']['button_link']['url']?>" class="<?php if($item['button']['button_background_colour']['system_background_colours'] !== 'bg-transparent'):?>btn <?php endif;?><?=$item['button']['button_text_colour']['system_text_colours']?> <?=$item['button']['button_background_colour']['system_background_colours']?> bold "><?=$item['button']['button_link']['title']?></a>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <?php include(BLOCKS_DIR . '_parts/__backgroundImageContainer.php'); ?>


    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__backgroundImageFullWidth.php'); ?>

</section>

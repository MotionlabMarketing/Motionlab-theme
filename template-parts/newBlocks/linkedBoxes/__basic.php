<?php
/**
 * LINKED BOXES – BASIC LAYOUT BLOCK ------------------------
 * A basic block which allows images to be linked to other
 * pages or URLs.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

 // TODO: Needs support for content on hover.
 // TODO: Needs support for colour hover overlay.
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "linkedBox-basic {$hoverShow}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix pb5">

            <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

            <div class="flex items-center justify-center flex-wrap">

                <?php if (!empty($block['content']['items'])): foreach ($block['content']['items'] as $item): ?>

                    <div class="item col-12 md-col-<?=$block['columns']?> p3">

                        <?php if (!empty($item['block_linkBoxes_button']['button_link'])): ?>
                            <a href="<?=$item['block_linkBoxes_button']['button_link']['url']?>" class="block relative overflow-hidden bg-cover bg-center box-shadow-3 py4 <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?>" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">
                        <?php else: ?>
                            <div class="block relative overflow-hidden bg-cover bg-center box-shadow-3 py4 <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?>" style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">
                        <?php endif; ?>
                        
                                <div class="content absolute top-0 width-100 height-100 js-match-height py6 flex items-center justify-center text-center <?=($item['block_linkBoxes_overlay_strength']['add_overlay'] == true)? "bg-".$item['block_linkBoxes_overlay_strength']['overlayType']."-".$item['block_linkBoxes_overlay_strength']['overlayStrength'] : ""?>">

                                    <div class="z-index-40 <?=($block['content']['overlay'] == true)? "opacity-10" : ""; ?>">

                                        <h3 class="mb0 z-index-20 <?=$item['block_linkBoxes_button']['system_text_colours']?>"><?=strip_tags($item['block_linkBoxes_content'])?></h3>

                                        <?php if (!empty($item['block_linkBoxes_button']['button_link']['url'])):?>
                                            <p class="link block mt2 text-center mb0 h4 bold <?=$item['block_linkBoxes_button']['system_text_colours']?> <?=($item['enableButton'] == true)? $item['block_linkBoxes_button']['system_text_colours'] . 'btn btn-medium ' . $item['block_linkBoxes_button']['system_background_colours'] : ''?>"><?=$item['block_linkBoxes_button']['button_link']['title']?></p>
                                        <?php endif; ?>

                                    </div>

                                    <?php if (!empty($item['block_linkBoxes_overlay_strength']) && !empty($item['block_linkBoxes_content'])): ?>
                                        <div class="overlay absolute width-100 height-100 z-index-20 bg-<?=$item['block_linkBoxes_overlay_strength']['overlayType']?>-<?=$item['block_linkBoxes_overlay_strength']['overlayStrength']?>"></div>
                                    <?php endif; ?>

                                </div>

                        <?php if (!empty($item['block_linkBoxes_button']['button_link'])): ?>
                            </a>
                        <?php else: ?>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endforeach; endif; ?>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

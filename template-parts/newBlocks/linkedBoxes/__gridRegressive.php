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
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "linkedBox-grid {$block['enableHover']}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="clearfix pb5 mxn3">

            <?php $i = 1; if (!empty($block['content']['items'])): foreach ($block['content']['items'] as $item):?>

                <div class="item item-<?=$i?> p3 block relative">

                    <?php if (!empty($item['pageLink']['button_link']['url'])): ?>
                        <a href="<?=$item['pageLink']['button_link']['url']?>" class="block relative width-100 height-100 hover-white white bg-cover bg-center box-shadow-3 <?=$block['content']['bgColor']?>" <?=($item['block_linkBoxes_button']['button_link']['title'] ? 'title="'.$item['block_linkBoxes_button']['button_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_button']['button_link']['target'] ? 'target="'.$item['block_linkBoxes_button']['button_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">
                    <?php else: ?>
                        <div class="block relative width-100 height-100 hover-white white bg-cover bg-center box-shadow-3 <?=$block['content']['bgColor']?>" style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">
                    <?php endif; ?>

                        <div class="content relative width-100 height-100 py6 flex items-center justify-center  <?=($item['block_linkBoxes_overlay_strength']['add_overlay'] == true)? "bg-".$item['block_linkBoxes_overlay_strength']['overlayType']."-".$item['block_linkBoxes_overlay_strength']['overlayStrength'] : ""?>">

                            <?php if (!empty($item['block_linkBoxes_title']) || !empty($item['block_linkBoxes_content']) || !empty($item['block_linkBoxes_button']['button_link']['title'])): ?>
                            <div class="z-index-40">

                                <?php if (!empty($item['block_linkBoxes_title'])): ?>
                                    <p class="title block mt2 text-center mb0 h3 white"><?=$item['block_linkBoxes_title']?></p>
                                <?php endif; ?>

                                <?php if (!empty($item['block_linkBoxes_content'])): ?>
                                    <?=$item['block_linkBoxes_content']?>
                                <?php endif; ?>

                                <?php if (!empty($item['block_linkBoxes_button']['button_link']['title'])): ?>
                                    <p class="link block mt2 text-center mb0 h4 white"><?=$item['block_linkBoxes_button']['button_link']['title']?></p>
                                <?php endif; ?>

                            </div>
                            <?php endif; ?>

                            <?php if (!empty($item['block_linkBoxes_overlay_strength'])): ?>
                                <div class="overlay absolute width-100 height-100 z-index-20<?php if (!empty($item['block_linkBoxes_overlay_strength']['overlayType'])):?> bg-<?=$item['block_linkBoxes_overlay_strength']['overlayType']?>-<?=$item['block_linkBoxes_overlay_strength']['overlayStrength']?><?php endif; ?>"></div>
                            <?php endif; ?>

                        </div>

                    <?php if (!empty($item['pageLink']['button_link']['url'])): ?>
                        </a>
                    <?php else: ?>
                        </div>
                    <?php endif; ?>

                </div>

            <?php $i++; endforeach; endif; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

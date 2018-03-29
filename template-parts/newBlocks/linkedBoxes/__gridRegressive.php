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

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "linkedBox-grid mt6 {$block['enableHover']}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="clearfix pb5 mxn2">

            <?php $i = 1; foreach ($block['content']['items'] as $item):?>

                <div class="item item-<?=$i?> || p2 || block relative">

                    <a href="<?=$item['block_linkBoxes_button_button_link']['url']?>" class="block relative width-100 height-100 hover-white white bg-cover bg-center box-shadow-3 <?=$block['content']['bgColor']?>" <?=($item['block_linkBoxes_button_button_link']['title'] ? 'title="'.$item['block_linkBoxes_button_button_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_button_button_link']['target'] ? 'target="'.$item['block_linkBoxes_button_button_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">

                        <div class="content relative width-100 height-100 py6 flex items-center justify-center <?=($block['content']['darken'] == true)? "darken-background" : ""?> <?=($block['content']['darken'] == true)? $block['content']['darkenStrength'] : ""?>">

                            <div class="z-index-40">

                                <?php if (!empty($item['block_linkBoxes_title'])): ?>
                                    <p class="block mt2 text-center mb0 h3 white"><?=$item['block_linkBoxes_title']?></p>
                                <?php endif; ?>

                                <?php if (!empty($item['block_linkBoxes_button_button_link']['title'])): ?>
                                    <p class="block mt2 text-center mb0 h4 white"><?=$item['block_linkBoxes_button_button_link']['title']?></p>
                                <?php endif; ?>

                            </div>

                            <?php if ($block['enableOverlay'] == true): ?>
                                <div class="overlay || absolute width-100 height-100 z-index-20 bg-brand-primary-overlay"></div>
                            <?php endif; ?>

                        </div>
                    </a>

                </div>

            <?php $i++; endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
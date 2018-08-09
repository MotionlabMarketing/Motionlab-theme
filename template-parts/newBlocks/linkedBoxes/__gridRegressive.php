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

        <div class="clearfix pb5 mxn3" style="width: 100%; margin-left: auto; margin-right: auto;">

                <div class="backpacker">

                    <!-- no cols makes this a single image row -->
                    <div class="bp-press bp-2-3 bp-width-50">
                        <div class="bp-insert">
                            <?php if (!empty($block['content']['items'][0]['block_linkBoxes_button']['button_link']['url'])): ?><a href="<?=$block['content']['items'][0]['block_linkBoxes_button']['button_link']['url']?>"><?php endif; ?>
                                <img class="vert" src="<?=$block['content']['items'][0]['block_linkBoxes_image'];?>" />
                            <?php if (!empty($block['content']['items'][0]['block_linkBoxes_button']['button_link']['url'])): ?></a><?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- 2 cols width 100% makes this a two image row -->
                    <div class="bp-col bp-width-50">
                        <div class="bp-press bp-2-1">
                            <div class="bp-insert"><a href="<?=$block['content']['items'][1]['block_linkBoxes_button']['button_link']['url']?>"><img src="<?=$block['content']['items'][1]['block_linkBoxes_image'];?>" style="max-height: 325px;" /></a></div>
                        </div>
                    </div>
                    <div class="bp-col bp-smallist">
                        <div class="bp-press bp-3-2">
                            <div class="bp-insert"><a href="<?=$block['content']['items'][2]['block_linkBoxes_button']['button_link']['url']?>"><img class="vert" src="<?=$block['content']['items'][2]['block_linkBoxes_image'];?>" /></a></div>
                        </div>
                    </div>
                    <div class="bp-col bp-smallist">
                        <div class="bp-press bp-3-2">
                            <div class="bp-insert"><a href="<?=$block['content']['items'][3]['block_linkBoxes_button']['button_link']['url']?>"><img class="vert" src="<?=$block['content']['items'][3]['block_linkBoxes_image'];?>" /></a></div>
                        </div>
                    </div>
            
                </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

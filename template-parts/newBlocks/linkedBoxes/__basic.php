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

<section <?=get_blockID($block)?> <?=get_blockClasses($block)?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix pb5">

            <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

            <div class="clearfix mt4 flex items-center justify-center flex-wrap mxn3">

                <?php if (!empty($block['content']['items'])): foreach ($block['content']['items'] as $item): ?>

                    <div class="px3 col-12 md-col-<?=$block['columns']?> <?=$block['content']['txtColor']?>">

                        <?php if (!empty($item['block_linkBoxes_button']['button_link'])): ?>
                            <a href="<?=$item['block_linkBoxes_button']['button_link']['url']?>" class="block relative bg-cover bg-center box-shadow-2" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">
                        <?php else: ?>
                            <div class="block relative bg-cover bg-center box-shadow-2" style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">
                        <?php endif; ?>

                                <div class="content flex items-center justify-center text-center px5 py5" data-mh="<?=$block['id']?>-panel">

                                    <div class="z-index-40 <?=($block['content']['overlay'] == true)? "opacity-10" : ""; ?>">

                                        <?php 
                                            render_wysiwyg($item['content']); 

                                            if ($item['enableButton']):
                                                render_button($item['pageLink'], "medium", ["class" => "mb0"]);
                                            endif; 
                                            ?>

                                        <?php if (!empty($item['block_linkBoxes_button']['button_link']['url'])):?>
                                            <p class="link block mt2 text-center mb0 h4 bold <?=$item['block_linkBoxes_button']['system_text_colours']?> <?=($item['enableButton'] == true)? $item['block_linkBoxes_button']['system_text_colours'] . 'btn btn-medium ' . $item['block_linkBoxes_button']['system_background_colours'] : ''?>"><?=$item['block_linkBoxes_button']['button_link']['title']?></p>
                                        <?php endif; ?>

                                    </div>

                                </div>

                                <?php render_image_alteration($item['image_alteration']); ?>

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

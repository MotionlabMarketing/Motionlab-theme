<?php
/**
 * CTA – BASIC LAYOUT BLOCK ------------------------
 * A basic message which can be linked to a page.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */
?>

<section id="<?=$block['custom_id']?>" class="cta-basic || clearfix  relative || <?=($block['grid'] == 'container')? 'container' : ""?> <?=$block['spacing']?> <?=$block['padding']?> <?=($block['bgImage']['enable'] !== true)? $block['background']['colour']:''?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['link']['enabled'] == true)? '<a href="'.$block['content']['link']['url'].'">':''?>

        <div class="container">

            <div class="content">

                <div class="col col-12 || text-center p4">

                    <?php $blockTitle = $block['content']['title'];
                    if (!empty($blockTitle[0]['title'])): ?>
                        <div class="mb2">
                            <?php include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($block['content']['content'])): ?>
                        <div class="wysiwyg <?=$block['content']['txtColor']?> limit-p limit-p-70">
                            <?=$block['content']['content']?>
                        </div>
                    <?php endif; ?>

                    <?php if ($block['buttons']['enabled'] == true): ?>

                        <div class="mt4">

                            <?php foreach ($block['content']['buttons'] as $button): ?>

                                <a href="<?=$button['button_button_link']['url']?>" class="btn <?=$button['button_system_text_colours']?> <?=$button['button_system_background_colours']?> mx2"><?=$button['button_button_link']['title']?></a>

                            <?php endforeach; ?>

                        </div>


                    <?php endif; ?>

                </div>

            </div>

        <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?=($block['link']['enabled'] == true)? '</a>':''?>

     <?php if($block['bgImage']['enable'] == true): ?>

        <div class="bg-image || absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?> <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: center; background-size: cover"></div>

     <?php endif; ?>

</section>
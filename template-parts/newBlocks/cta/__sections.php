<?php
/**
 * CTA – STRIP SECTIONS ---------------------------
 * A CTA with a message and three linked sections.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$sections = get_sub_field($current . '_sections');
?>

<section id="<?=$block['custom_id']?>" class="cta-sections || clearfix relative || <?=($block['grid'] == 'container')? 'container' : ""?> <?=$block['spacing']?> <?=$block['padding']?> <?=($block['bgImage']['enable'] !== true)? $block['background']['colour']:''?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

        <div class="content">

            <a class="section || flex items-center || col col-12 lg-col-3 || py4 px4 || js-match-height text-center lg-text-left">

                <div class="introduction">

                    <?php $blockTitle = $block['content']['title'];
                    if (!empty($blockTitle[0]['title'])): ?>
                        <div class="mb2">
                            <?php include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($block['content']['content'])): ?>
                        <div class="wysiwyg <?=$block['content']['txtColor']?>">
                            <?=$block['content']['content']?>
                        </div>
                    <?php endif; ?>

                </div>

            </a>

            <?php foreach ($sections as $section): ?>

                <a href="<?=$section['link']['url']?>" class="section relative || col col-12 lg-col-3 p4 || text-center <?=$block['content']['txtColor']?> || js-match-height">
                    <p class="h3 mb2"><?=$section['title']?></p>
                    <p class="mb0 || btn btn-small bg-<?=$block['content']['txtColor']?> brand-primary"><?=$section['link']['title']?></p>
                </a>

            <?php endforeach; ?>

        </div>

        <?php if($block['bgImage']['enable'] == true): ?>

            <div class="bg-image || absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?> <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: center; background-size: cover"></div>

        <?php endif; ?>

</section>
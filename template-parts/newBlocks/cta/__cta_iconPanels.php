<?php
/**
 * CTA – 3 PANELS WITH ICONS (CTA2) ------------------------
 * A CTA that outputs 3 panels with content and icons.
 *
 * @author Joe Curran
 * @created 13 Mar 2018
 *
 * @version 1.00
 */

$limit = ($block['grid'] == 'container')? 'container' : "";
$image = ($block['bgImage']['enable'] !== true)? $block['background']['colour'] : '';
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "cta-iconPanels {$limit} {$image}")?> <?=get_blockData($block)?>>

    <div class="container">

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

        <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
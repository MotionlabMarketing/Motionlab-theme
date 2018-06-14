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

 // TODO: Need updating to new system and all support checking.

$bgColor          = get_sub_field($current . '_background_system_background_colours');
$txtColor         = get_sub_field($current . '_text_system_text_colours');

$blockTitle       = get_sub_field($current . '_title_title');
$blockColumns     = get_sub_field($current . '_columns');

$content          = get_sub_field($current . '_content');

$block['columns'] = 12 / $blockColumns;

$block['content']['txtColor'] = get_sub_field($current . '_txtColour_system_text_colours');

$blockItems       = get_sub_field($current . '_items');

$block['content']['button'] = get_sub_field($current . '_button_button_link');

?>
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "linkedBox-titleBelow")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix pt5 pb3">

            <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

            <?php foreach ($blockItems as $item): ?>
                <?php
                // STANDARD BOXES WITH IMAGE AND TITLE //
                if ($item['block_linkBoxes_breakout_true'] !== true): ?>
                    <div class="item col col-12 md-col-<?=$block['columns']?> p3 block relative hover-zoom" data-mh="box-height">
                        <a href="<?= $item['block_linkBoxes_button_button_link']['url'] ?>"
                           class="block relative overflow-hidden bg-cover bg-center border-light border-top border-left border-right box-shadow-3 border-bottom <?=$item['block_linkBoxes_button_system_text_colours']?> <?=$item['block_linkBoxes_button_system_background_colours']?> || zoom" <?= ($item['block_linkBoxes_button_button_link']['title'] ? 'title="' . $item['block_linkBoxes_button_button_link']['title'] . '"' : '') ?> <?= ($item['block_linkBoxes_button_button_link']['target'] ? 'target="' . $item['block_linkBoxes_button_button_link']['target'] . '"' : '') ?>>

                            <?php if ($item['block_linkBoxes_media'] == "video"): ?>
                                <div class="no-resize" style="margin-bottom: -8px">
                                    <?php $video['id'] = explode("=", $item['block_linkBoxes_videoURL']); ?>
                                    <iframe width="100%" height="270" src="https://www.youtube.com/embed/<?=$video['id'][1]?>" class="js-match-height" frameborder="0" allow="encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            <?php else: ?>
                                <div class="image-holder js-match-height bg-grey <?= $txtColor ?>"
                                 style="background-image: url('<?=$item['block_linkBoxes_image']?>')"></div>
                            <?php endif; ?>
                            <div class="content flex items-center justify-center p3 bold bg-white" data-mh="box-title">
                                <?=$item[$current . '_title']?>
                            </div>
                        </a>
                    </div>
                <?php
                // BOX WITH JUST CONTENT AND ICON - BREAKOUT BOX //
                else: ?>

                    <div class="item col col-12 md-col-<?=$block['columns']?> md-p0 lg-p4 || block relative" data-mh="box-height">

                        <div class="content-breakout">

                            <div class="flex items-center">
                                <span class="icon"><?= $item['block_linkBoxes_breakout_icon'] ?></span>
                                <h3><?=$item['block_linkBoxes_title']?></h3>
                            </div>

                            <div class="wysiwyg"><?=$item['block_linkBoxes_content']?></div>
                        </div>

                    </div>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

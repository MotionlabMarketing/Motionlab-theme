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

$bgColor          = get_sub_field($current . '_background_system_background_colours');
$txtColor         = get_sub_field($current . '_text_system_text_colours');

$blockTitle       = get_sub_field($current . '_title_title');
$blockColumns     = get_sub_field($current . '_columns');

$content          = get_sub_field($current . '_content');

$block['columns'] = 12 / $blockColumns;

$blockItems       = get_sub_field($current . '_items');

?>

<section class="linkedBox-titleBelow || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix py5">


                <?php if (!empty($blockTitle[0]['title'])): ?>
                    <div class="m4 text-center">
                        <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($content)): ?>
                <div class="text-center mb2 limit-p limit-p-70">
                    <?=$content?>
                </div>
                <?php endif; ?>


            <?php foreach ($blockItems as $item): ?>

                <?php
                // STANDARD BOXES WITH IMAGE AND TITLE //
                if ($item['block_linkBoxes_breakout_true'] !== true):?>
                    <div class="item || col col-12 md-col-<?=$block['columns']?> p2 || block relative">
                        <a href="<?= $item['block_linkBoxes_link']['url'] ?>"
                           class="block relative overflow-hidden || bg-cover bg-center box-shadow-3 <?= $item['background_colour']['system_background_colours'] ?> <?= $item['text_colour']['system_text_colours'] ?> || zoom" <?= ($item['block_linkBoxes_link']['title'] ? 'title="' . $item['block_linkBoxes_link']['title'] . '"' : '') ?> <?= ($item['block_linkBoxes_link']['target'] ? 'target="' . $item['block_linkBoxes_link']['target'] . '"' : '') ?>>

                            <div class="image-holder || js-match-height || bg-grey <?= $txtColor ?>"
                                 style="background-image: url('<?= $item['block_linkBoxes_image_basic_image']['url']; ?>')"></div>
                            <div class="content || h3">
                                <?= $item[$current . '_title'] ?>
                            </div>
                        </a>
                    </div>
                <?php
                // BOX WITH JUST CONTENT AND ICON - BREAKOUT BOX //
                else: ?>

                    <div class="item || col col-12 md-col-<?=$block['columns']?> p2 || block relative">

                        <div class="content-breakout">

                            <span class="icon"><?= $item['block_linkBoxes_breakout_icon'] ?></span>
                            <h3><?php print_r($item['block_linkBoxes_title']) ?></h3>

                            <div class="wysiwyg"><?=$item['block_linkBoxes_content']?></div>
                        </div>

                    </div>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
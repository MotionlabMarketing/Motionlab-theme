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
$blockContent     = get_sub_field($current . '_content');
$blockColumns     = get_sub_field($current . '_columns');

$overlayEnabled   = get_sub_field($current . '_enableOverlay');

$darkenImages     = get_sub_field($current . '_darken');
$darkenStrength   = get_sub_field($current . '_darkenStrength');

$block['columns'] = 12 / $blockColumns;

$blockItems       = get_sub_field($current . '_items');

$hoverContent     = get_sub_field($current . '_hoverContent');

$hoverShow        = ($hoverContent == true)? "show-hover" : "";
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "linkedBox-grid mt6 {$hoverShow}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix pb5">

            <div class="m4 text-center">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                <?=$blockContent?>
            </div>

            <?php $i = 1; foreach ($blockItems as $item): ?>

                <div class="item item-<?=$i?> || p2 || block relative">

                    <a href="<?=$item['block_linkBoxes_link']['url']?>" class="block relative width-100 height-100 overflow-hidden hover-white || bg-cover bg-center box-shadow-3 <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?> || zoom" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image_basic_image']['url'];?>')">

                        <div class="content relative width-100 height-100 || <?=$txtColor?> py6 || flex items-center justify-center || <?=($darkenImages == true)? "darken-background" : ""?> <?=($darkenImages == true)? $darkenStrength : ""?>">
                            <div class="z-index-40">
                                <p class="mb0 bold text-center z-index-20 h4"><?=strip_tags($item['block_linkBoxes_content']); ?></p>

                                <?php if (!empty($item['block_linkBoxes_link']['title'])):?>
                                    <p class="block mt2 text-center mb0 h5"><?=$item['block_linkBoxes_link']['title']?></p>
                                <?php endif; ?>
                            </div>

                            <?php if ($overlayEnabled == true): ?>
                                <div class="overlay || absolute width-100 height-100 z-index-20 bg-brand-primary-overlay"></div>
                            <?php endif; ?>
                        </div>
                    </a>

                </div>

            <?php $i++; endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
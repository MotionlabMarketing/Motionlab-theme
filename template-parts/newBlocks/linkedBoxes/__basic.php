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

$block['content']['overlay']  = get_sub_field($current . '_enableOverlay');
$block['content']['txtColor'] = get_sub_field($current . '_txtColour_system_text_colours');

$darkenImages     = get_sub_field($current . '_darken');
$darkenStrength   = get_sub_field($current . '_darkenStrength');

$block['columns'] = 12 / $blockColumns;

$blockItems       = get_sub_field($current . '_items');

$hoverContent     = get_sub_field($current . '_hoverContent');

$hoverShow = ($hoverContent == true)? "show-hover" : "";

//TODO: Update to new block array system and move block specific settings to controller.
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "linkedBox-basic {$hoverShow}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix pb5">

            <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

            <?php foreach ($blockItems as $item):?>

                <div class="item || col col-12 md-col-<?=$block['columns']?> p2 || block relative">
                    <a href="<?=$item['block_linkBoxes_link']['url']?>" class="block relative overflow-hidden || bg-cover bg-center <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?> || zoom" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image'];?>')">

                        <div class="content relative || js-match-height || <?=$txtColor?> py6 || flex items-center justify-center text-center || <?=($darkenImages == true)? "darken-background" : ""?> <?=($darkenImages == true)? $darkenStrength : ""?>">


                            <div class="z-index-40 <?=($block['content']['overlay'] == true)? "opacity-10" : ""; ?>">

                                <h3 class="mb0 z-index-20 white"><?=$item['block_linkBoxes_content']; ?></h3>

                                <?php if (!empty($item['block_linkBoxes_button_button_link']['url'])):?>
                                    <p class="inline-block mx-auto mt1 mb0 h5 bold <?=($item['enableButton'] == true)? $item['block_linkBoxes_button_system_text_colours'] . 'btn btn-medium ' . $item['block_linkBoxes_button_system_background_colours'] : ''?> "><?=$item['block_linkBoxes_button_button_link']['title']?></p>
                                <?php endif; ?>

                            </div>

                            <?php if ($block['content']['overlay'] == true): ?>
                                <div class="overlay || absolute width-100 height-100 z-index-20 bg-gray bg-brand-primary-overlay"></div>
                            <?php endif; ?>


                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
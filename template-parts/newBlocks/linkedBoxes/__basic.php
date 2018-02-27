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

$overlayEnabled   = get_sub_field($current . '_enableOverlay');

$darkenImages     = get_sub_field($current . '_darken');
$darkenStrength   = get_sub_field($current . '_darkenStrength');

$block['columns'] = 12 / $blockColumns;

$blockItems       = get_sub_field($current . '_items');

$hoverContent     = get_sub_field($current . '_hoverContent');

//TODO: Update to new block array system and move block specific settings to controller.
?>

<section class="linkedBox-basic || clearfix <?=($hoverContent == true)? "show-hover" : "";?> <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="clearfix pb5">

            <div class="m4 text-center">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                <?=get_sub_field('block_linkBoxes_content')?>
            </div>

            <?php foreach ($blockItems as $item):?>

                <div class="item || col col-12 md-col-<?=$block['columns']?> p2 || block relative">
                    <a href="<?=$item['block_linkBoxes_link']['url']?>" class="block relative overflow-hidden || bg-cover bg-center box-shadow-3 <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?> || zoom" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image_basic_image']['url'];?>')">

                        <div class="content relative || js-match-height || <?=$txtColor?> bg-grey py6 || flex items-center justify-center text-center || <?=($darkenImages == true)? "darken-background" : ""?> <?=($darkenImages == true)? $darkenStrength : ""?>">

                            <div class="z-index-40">

                                <p class="mb0 z-index-20 h3"><?=$item['block_linkBoxes_content']; ?></p>

                                <?php if (!empty($item['block_linkBoxes_link']['title'])):?>
                                    <p class="inline-block mx-auto mt1 mb0 h5 <?=($item['enableButton'] == true)? $item['button_background']['system_background_colours'] . ' btn-medium ' . $item['button_textColor']['system_text_colours'] : ''?> "><?=$item['block_linkBoxes_link']['title']?></p>
                                <?php endif; ?>

                            </div>

                            <?php if ($overlayEnabled == true): ?>
                                <div class="overlay || absolute width-100 height-100 z-index-20 bg-brand-primary-overlay"></div>
                            <?php endif; ?>

                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
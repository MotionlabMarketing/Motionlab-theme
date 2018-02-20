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

$block['columns'] = 12 / $blockColumns;

$blockItems       = get_sub_field($current . '_items');

$hoverContent     = get_sub_field($current . '_hoverContent');

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

            <?php foreach ($blockItems as $item): ?>

                <div class="item || col col-12 md-col-<?=$block['columns']?> p2 || block relative || hover-zoom">
                    <a href="<?=$item['block_linkBoxes_link']['url']?>" class="block relative overflow-hidden || bg-cover bg-center box-shadow-3 <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?> || zoom" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image_basic_image']['url'];?>')">

                        <div class="content relative || js-match-height || <?=$txtColor?> py6 || flex items-center justify-center || darken-background darken-background-4 ">
                            <p class="m0 bold text-center hover z-index-20"><?=strip_tags($item['block_linkBoxes_content']); ?></p>
                            <div class="overlay || absolute width-100 height-100 bg-brand-primary-overlay"></div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
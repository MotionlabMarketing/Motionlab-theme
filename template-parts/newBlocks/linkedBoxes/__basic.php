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

$bgColor     = get_sub_field('block_cta_background_system_background_colours');
$txtColor    = get_sub_field('block_cta_text_system_text_colours');

$blockTitle  = get_sub_field('block_linkBoxes_title_title');

$blockItems  = get_sub_field('block_linkBoxes_items');

?>

<section class="<?=$bgColor?>">

    <div class="container">

        <div class="clearfix py5">

            <div class="m4 text-center">
                <?php
                if (!empty($blockTitle)) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
            </div>

            <?php foreach ($blockItems as $item): ?>

                <div class="item || col col-12 md-col-4 p2 || block relative || hover-zoom">
                    <a href="<?=$item['block_linkBoxes_link']['url']?>" class="block relative overflow-hidden || bg-cover bg-center <?=$item['background_colour_system_background_colours']?> <?=$item['text_colour_system_text_colours']?> || zoom" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image_basic_image']['url'];?>')">

                        <div class="js-match-height || height-v25 <?=$txtColor?> py6 || flex items-center justify-center || darken-background darken-background-4">
                            <p class="m0 bold text-center"><?=strip_tags($item['block_linkBoxes_content']); ?></p>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>
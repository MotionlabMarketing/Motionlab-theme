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

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');

$borders          = ""; // TODO: Needs Fixing...
$bordersColor     = get_sub_field($current . '_borders_border_colour');
$bordersSides     = get_sub_field($current . '_borders_border_sides');

foreach ($bordersSides as $item) {
    $borders = $borders . " " . $item;
}
$borders          = "||" . $borders . " " . $bordersColor;

$blockTitle  = get_sub_field($current . '_title_title');

$blockItems  = get_sub_field($current . '_items');

?>

<section class="linkedBox-basic || <?=$bgColor?> <?=$borders?>">

    <div class="container">

        <div class="clearfix pb5">

            <div class="m4 text-center">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                <?=get_sub_field('block_linkBoxes_content')?>
            </div>

            <?php foreach ($blockItems as $item): ?>

                <div class="item || col col-12 md-col-4 p2 || block relative || hover-zoom">
                    <a href="<?=$item['block_linkBoxes_link']['url']?>" class="block relative overflow-hidden || bg-cover bg-center box-shadow-3 <?=$item['background_colour']['system_background_colours']?> <?=$item['text_colour']['system_text_colours']?> || zoom" <?=($item['block_linkBoxes_link']['title'] ? 'title="'.$item['block_linkBoxes_link']['title'].'"' : '')?> <?=($item['block_linkBoxes_link']['target'] ? 'target="'.$item['block_linkBoxes_link']['target'].'"' : '')?> style="background-image: url('<?=$item['block_linkBoxes_image_basic_image']['url'];?>')">

                        <div class="content || js-match-height || <?=$txtColor?> py6 || flex items-center justify-center || darken-background darken-background-4">
                            <p class="m0 bold text-center"><?=strip_tags($item['block_linkBoxes_content']); ?></p>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>
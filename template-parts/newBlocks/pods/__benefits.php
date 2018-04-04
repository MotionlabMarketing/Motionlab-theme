<?php
/**
 * BENIFITS POD – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 30 Jan 2018
 *
 * @version 1.00
 */

//TODO: Need to move this to a general settings page.
$bgColor          = get_sub_field($current . '_background_system_background_colours');
$txtColor         = get_sub_field($current . '_text_system_text_colours');

$borders          = "";
$bordersColor     = get_sub_field($current . '_borders_border_colour');
$bordersSides     = get_sub_field($current . '_borders_border_sides');

foreach ($bordersSides as $item) {
    $borders = $borders . " " . $item;
}
$borders          = "||" . $borders . " " . $bordersColor;

$blockTitle  = get_sub_field($current . '_title_title');

$blockItems  = get_sub_field($current . '_icons');
$columns     = get_sub_field($current . '_columns');

$content         = get_sub_field($current . '_content');
$contentLocation = get_sub_field($current . '_content_location');

if ($columns == 4):
    $col = "col-6 md-col-3";
elseif ($columns == 5):
    $col = "col-grid-5";
endif;

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "pod-benefits {$bgColor} {$txtColor} {$borders}")?> <?=get_blockData($block)?>>

    <div class="container py5">

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="clearfix mxn4">
        <?php foreach ($blockItems as $item): ?>

            <?php if (!empty($item['pod_item_link'])): ?>
                <a href="<?=$item['pod_item_link']['url']?>" class="<?=$txtColor?>" <?=($item['pod_item_link']['title'] ? 'title="'.$item['pod_item_link']['title'].'"' : '')?> <?=($item['pod_item_link']['target'] ? 'target="'.$item['pod_item_link']['target'].'"' : '')?>>
            <?php endif; ?>

            <div class="item col <?=$col?> px4 mb5 text-center js-match-height">

                <?php if ($item['enable_custom_icons'] == true): ?>
                    <img src="<?=wp_get_attachment_image_url($item['pod_item_custom_icon'], array(70, 70))?>" style="max-width: 6rem; max-height: 6rem; text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);">
                <?php else: ?>
                    <p class="block mb2 brand-primary text-center" style="text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);"><?=$item['pod_item_icon']?></p>
                <?php endif; ?>

                <h4 class="h4"><?=$item['pod_item_title']?></h4>

                <p class="h5"><?=strip_tags($item['pod_item_description'])?></p>

            </div>

             <?php if (!empty($item['pod_item_link'])): ?>
                </a>
             <?php endif; ?>

        <?php endforeach; ?>
        </div>

        <?php if ($contentLocation == "after" && !empty($content)): ?>
            <div class="clearfix text-center limit-p limit-p-70">
                <?=$content?>
            </div>
        <?php endif; ?>

    </div>

</section>

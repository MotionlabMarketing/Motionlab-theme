<?php
/**
 * NUMBERED POD SQUARE – LAYOUT BLOCK ------------------------
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

$blockItems  = get_sub_field($current . '_basic');

?>

<section class="pod-numbered-square mb4 || <?=$bgColor?> <?=$txtColor?> <?=$borders?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <div class="container">

        <div class="clearfix md-py5 text-center">

            <div class="m4 mb5">

                <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
                </div>

                <div class="text-left md-text-center limit-p limit-p-80">
                    <?=get_sub_field('block_pods_content')?>
                </div>
            </div>

            <div class="px2 md-px6">
            <?php $i = 1; foreach ($blockItems as $item):?>

                <div class="item || col col-3 px2 mb3 || text-center <?=$txtColor?> || col-grid-5">

                    <div class="content p3 || js-match-height">

                        <p class="block mb2 || text-center || brand-primary h3 bold"><?=$i?>.</p>

                        <p class="h5"><?=$item['pod_content']?></p>

                        <div class="rule"></div>

                    </div>

                </div>

            <?php $i++; endforeach; ?>
            </div>

        </div>

    </div>

</section>
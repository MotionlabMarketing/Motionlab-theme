<?php
/**
 * NUMBERED POD CIRCLES – LAYOUT BLOCK ------------------------
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

<section class="pod-numbered-circles mb4 || <?=$bgColor?> <?=$txtColor?> <?=$borders?>"  data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <div class="container">

        <div class="clearfix py5">

            <div class="m4 mb5 || text-center">

                <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
                </div>

                <div class="text-center limit-p limit-p-80">
                    <?=get_sub_field('block_pods_content')?>
                </div>
            </div>

            <div class="px2 md-px6">
            <?php $i = 1; foreach ($blockItems as $item):?>

                <div class="item || col col-3 px2 mb3 || flex items-center justify-center  <?=$txtColor?> || col-grid-5">

                    <div class="content p3 || js-match-height flex items-center flex-wrap justify-center content-center">

                        <p class="block m0 width-100 || text-center || white h2">#<?=$i?>.</p>

                        <p class="h3 m0 text-center white bold"><?=$item['pod_content']?></p>

                    </div>

                </div>

            <?php $i++; endforeach; ?>
            </div>

        </div>

    </div>

</section>
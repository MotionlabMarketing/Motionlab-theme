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

$bgColor    = get_sub_field($current . '_background_system_background_colours');
$txtColor   = get_sub_field($current . '_text_system_text_colours');

$borders          = "";
$bordersColor     = get_sub_field($current . '_borders_border_colour');
$bordersSides     = get_sub_field($current . '_borders_border_sides');

foreach ($bordersSides as $item) {
    $borders = $borders . " " . $item;
}
$borders          = "||" . $borders . " " . $bordersColor;

$blockTitle = get_sub_field($current . '_title_title');

$blockItems = get_sub_field($current . '_slider');
$blockItems = $blockItems['logos'];
?>

<section class="py4 pb6 mb4 || <?=$bgColor?> <?=$txtColor?> <?=$borders?>">

    <div class="container">

        <div class="m4 text-center">
            <?php
            if (!empty($blockTitle['title'])) {
                include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
            } ?>
        </div>

        <div class="wysiwyg mb4 || text-center">
            <?=get_sub_field($current . '_content')?>
        </div>

        <div class="mxn2 clearfix">

            <div class="flex justify-center flex-wrap" <?=get_sub_field('scroll_logos') == TRUE ? 'data-slick="logo-slider"' : '' ?>>
                <?php foreach ($blockItems as $item): ?>

                    <div class="px4 mb3 col-6 md-col-3 sm-col-4 lg-col-2 flex items-center justify-center">
                        <img src="<?=$item['sizes']['large']?>" alt="<?=$item['alt']?>"/>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>

    </div>

</section>
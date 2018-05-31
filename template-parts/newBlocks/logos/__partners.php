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

if (!empty($bordersSides)) {
    foreach ($bordersSides as $item) {
        $borders = $borders . " " . $item;
    }
}
$borders    = $borders . " " . $bordersColor;

$blockTitle = get_sub_field($current . '_title_title');

$blockItems = get_sub_field($current . '_slider');
$blockItems = $blockItems['logos'];
?>

<?php
/**
 * LOGO BASICS BLOCKS ---------------------------------------
 * This block add logos to the page in a single line that
 * will auto scroll if needed.
 *
 * @author Joe Curran
 * @created 28 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <?php if (!empty($blockTitle[0]['title'])): ?>

        <?php if (!empty($block['title']) || !empty($block['content'])): ?>
            <div class="col-12 md-col-12 lg-col-12 mb5 text-center">

                <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

                <?php render_wysiwyg("{$block['intro']}", "", ["class" => "regular"])?>

            </div>
        <?php endif; ?>

    <?php endif; ?>

    <div class="col-12">

        <div class="item-slider md-pl5" data-slick="logo-slider-partners">&nbsp;<?php // NEEDED TO KEEP BOX HEIGHT. ?>

            <?php foreach ($block['logos'] as $logo):?>

                <div class="col col-grid-5 flex items-center justify-center p5" data-mh="partners-slider">
                  <img src="<?=$logo['url']?>" alt="<?=$logo['title']?>" style="max-height: 6rem; margin: 0 auto;">
                </div>

            <?php endforeach; ?>

        </div>

    </div>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>

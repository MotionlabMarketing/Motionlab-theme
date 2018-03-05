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

<section id="<?= $block['custom_id'] ?>" class="clearfix <?= $block['spacing'] ?> <?= $block['padding'] ?> <?= $block['background']['colour'] ?> <?= $block['border']['sides'] ?> <?= $block['border']['size'] ?> <?= $block['border']['colour'] ?> <?= $block['custom_css'] ?>">

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <?php if (!empty($blockTitle[0]['title'])): ?>

        <?php if (!empty($block['title']) || !empty($block['content'])): ?>
            <div class="col-12 md-col-12 lg-col-12 mb5 text-center">

                <?php if (!empty($blockTitle[0]['title'])): ?>
                    <div class="m4 text-center">
                        <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($block['content'])): ?>
                    <div class="text-center mb2 limit-p limit-p-70">
                        <?= $block['content'] ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    <?php endif; ?>

    <div class="col-12 flex justify-center flex-wrap">

        <?php foreach ($block['logos'] as $logo): ?>

            <div class="col px4 mb3 col-6 md-col-3 sm-col-4 lg-col-2 flex items-center justify-center">
                <?=wp_get_attachment_image($logo['ID'], "large", "", ["class" => "block mx-auto"]);?>
            </div>

        <?php endforeach; ?>
    </div>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>


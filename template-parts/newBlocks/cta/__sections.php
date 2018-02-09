<?php
/**
 * CTA – SECTIONS LAYOUT BLOCK ------------------------
 * This block add support for a CTA block allowing the
 * user to link to other website areas.
 *
 * @author Joe Curran
 * @created 5 Feb 2018
 *
 * @version 1.00
 */

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');
$blockWidth  = get_sub_field($current . '_width_block_width');

$blockTitle  = get_sub_field($current . '_title_title');

$sections    = get_sub_field($current . '_sections');

?>

<section class="cta-sections || <?=($blockWidth == "container")? 'container' : '';?> mt6 mb6 clearfix || <?=$bgColor?> <?=$txtColor?>">

        <div class="col-12 || flex items-center justify-center">

            <div class="section || col col-6 md-col-3 || py4 px4 || js-match-height">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                <?php
                    if (!empty(get_sub_field('block_cta_content'))): ?>
                    <div class="wysiwyg || mx6 px6 <?=$txtColor?>">
                        <?=get_sub_field('block_cta_content');?>
                    </div>
                <?php endif; ?>
            </div>

            <?php foreach ($sections as $section): ?>

                <a href="<?=$section['link']['url']?>" class="section || col col-6 md-col-3 p4 || text-center <?=$txtColor?> || js-match-height">
                    <p class="h3 mb1"><?=$section['title']?></p>
                    <p class="mb0"><small><?=$section['button_content']?></small></p>
                </a>

            <?php endforeach; ?>

        </div>

</section>
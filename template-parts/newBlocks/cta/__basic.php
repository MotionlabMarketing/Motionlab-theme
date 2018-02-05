<?php
/**
 * CTA – BASIC LAYOUT BLOCK ------------------------
 * A basic message which can be linked to a page.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');
$blockWidth  = get_sub_field($current . '_width_block_width');

$blockTitle  = get_sub_field($current . '_title_title');

?>

<section class="cta-basic || clearfix || <?=$bgColor?> <?=$txtColor?>">

    <?php ($blockWidth == "container")? '<div class="container">' : ''; ?>

        <div class="col-12 || text-center">

            <?php
            if (!empty($blockTitle[0]['title'])) {
            include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

            <div class="wysiwyg || mx6 px6 <?=$txtColor?>">
                <?=get_sub_field('block_cta_content');?>
            </div>

        </div>

    <?php ($blockWidth == "container")? '</div>' : ''; ?>

</section>
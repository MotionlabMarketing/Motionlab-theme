<?php
$index = 0;
$previousBgColor = "";
$blockNumber = 0;
if( have_rows('building_blocks') ) {
    while ( have_rows('building_blocks') ) {
        the_row();

        // Varibales for the Blocks
        include(get_template_directory() .'/inc/block-variables.php');


        if ( get_row_layout() == 'heading'){
            include(get_template_directory() .'/template-parts/newBlocks/heading.php');
        } elseif( get_row_layout() == 'columns'){
            include(get_template_directory() .'/template-parts/newBlocks/column_text.php');
        } elseif( get_row_layout() == 'tabs_simple'){
            include(get_template_directory() .'/template-parts/newBlocks/tabs_simple.php');
        } elseif( get_row_layout() == 'full_width_banner'){
            include(get_template_directory() .'/template-parts/newBlocks/full_width_banner.php');
        } elseif( get_row_layout() == 'media_object'){
            include(get_template_directory() .'/template-parts/newBlocks/media_object.php');
        } elseif( get_row_layout() == 'slider_simple'){
            include(get_template_directory() .'/template-parts/newBlocks/slider_simple.php');
        } elseif( get_row_layout() == 'alternating_media'){
            include(get_template_directory() .'/template-parts/newBlocks/alternating_media.php');
        } elseif( get_row_layout() == 'gallery_simple'){
            include(get_template_directory() .'/template-parts/newBlocks/gallery_simple.php');
        } elseif( get_row_layout() == 'pods'){
            include(get_template_directory() .'/template-parts/newBlocks/pods.php');
        } elseif( get_row_layout() == 'form'){
            include(get_template_directory() .'/template-parts/newBlocks/form.php');
        } elseif( get_row_layout() == 'table'){
            include(get_template_directory() .'/template-parts/newBlocks/table.php');
        } elseif( get_row_layout() == 'spacer'){
            include(get_template_directory() .'/template-parts/newBlocks/spacer.php');
        } elseif( get_row_layout() == 'sticky_menu'){
            include(get_template_directory() .'/template-parts/newBlocks/menu_sticky.php');
        } elseif( get_row_layout() == 'sticky_menu_anchor'){
            include(get_template_directory() .'/template-parts/newBlocks/menu_sticky_anchor.php');
        }  elseif( get_row_layout() == 'logo_slider'){
            include(get_template_directory() .'/template-parts/newBlocks/logo_slider.php');
        }  elseif( get_row_layout() == 'hotspot_image'){
            include(get_template_directory() .'/template-parts/newBlocks/hotspots.php');
        } elseif( get_row_layout() == 'testimonial'){
            include(get_template_directory() .'/template-parts/newBlocks/testimonial.php');
        } elseif( get_row_layout() == 'post_news'){
            include(get_template_directory() .'/template-parts/newBlocks/post_news.php');
        } elseif( get_row_layout() == 'post_cpt'){
            include(get_template_directory() .'/template-parts/newBlocks/post_cpt.php');
        } elseif( get_row_layout() == 'hotspots'){
            include(get_template_directory() .'/template-parts/newBlocks/hotspots.php');
        } elseif( get_row_layout() == 'parallax'){
            include(get_template_directory() .'/template-parts/newBlocks/parallax.php');
        } elseif( get_row_layout() == 'test'){
            include(get_template_directory() .'/template-parts/newBlocks/test.php');
        } elseif (get_row_layout() == 'block_button') {
            include(get_template_directory() .'/template-parts/newBlocks/_block_buttons.php');
        } elseif (get_row_layout() == 'debug') {
            include(get_template_directory() .'/template-parts/newBlocks/_block_debug.php');
        }

        $previousBg = $bgColor;
        $index++;
    }
}
?>

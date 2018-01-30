<?php
$index = 0; // NOTE: No idea what this does.
$previousBgColor = "";
$blockNumber = 0;

if( have_rows('building_blocks') ) {
    while ( have_rows('building_blocks') ) {
        the_row();

        // Varibales for the Blocks – TODO: Needs looking over!
        include(get_template_directory() .'/inc/block-variables.php');

        // CHECK FOR NEW BLOCKS //
        $blocks = ['block_button', 'block_debug', 'block_team', 'block_cta', 'block_linkBoxes', 'block_videos', 'block_social'];
        if (in_array(get_row_layout(), $blocks)) {

            // TODO: Need to move blocks folder structure and update the routing.
            include(get_template_directory() . '/template-parts/newBlocks/_'. get_row_layout() .'.php');

        } else {

            // OLD BLOCK SUPPORT //
            // TODO: Old blocks need updating to support new settings and controller.
            if (get_row_layout() == 'heading') {
                include(get_template_directory() . '/template-parts/newBlocks/heading.php');
            } elseif (get_row_layout() == 'columns') {
                include(get_template_directory() . '/template-parts/newBlocks/column_text.php');
            } elseif (get_row_layout() == 'tabs_simple') {
                include(get_template_directory() . '/template-parts/newBlocks/tabs_simple.php');
            } elseif (get_row_layout() == 'full_width_banner') {
                include(get_template_directory() . '/template-parts/newBlocks/full_width_banner.php');
            } elseif (get_row_layout() == 'media_object') {
                include(get_template_directory() . '/template-parts/newBlocks/media_object.php');
            } elseif (get_row_layout() == 'slider_simple') {
                include(get_template_directory() . '/template-parts/newBlocks/slider_simple.php');
            } elseif (get_row_layout() == 'alternating_media') {
                include(get_template_directory() . '/template-parts/newBlocks/alternating_media.php');
            } elseif (get_row_layout() == 'gallery_simple') {
                include(get_template_directory() . '/template-parts/newBlocks/gallery_simple.php');
            } elseif (get_row_layout() == 'pods') {
                include(get_template_directory() . '/template-parts/newBlocks/pods.php');
            } elseif (get_row_layout() == 'form') {
                include(get_template_directory() . '/template-parts/newBlocks/form.php');
            } elseif (get_row_layout() == 'table') {
                include(get_template_directory() . '/template-parts/newBlocks/table.php');
            } elseif (get_row_layout() == 'spacer') {
                include(get_template_directory() . '/template-parts/newBlocks/spacer.php');
            } elseif (get_row_layout() == 'sticky_menu') {
                include(get_template_directory() . '/template-parts/newBlocks/menu_sticky.php');
            } elseif (get_row_layout() == 'sticky_menu_anchor') {
                include(get_template_directory() . '/template-parts/newBlocks/menu_sticky_anchor.php');
            } elseif (get_row_layout() == 'logo_slider') {
                include(get_template_directory() . '/template-parts/newBlocks/logo_slider.php');
            } elseif (get_row_layout() == 'hotspot_image') {
                include(get_template_directory() . '/template-parts/newBlocks/hotspots.php');
            } elseif (get_row_layout() == 'testimonial') {
                include(get_template_directory() . '/template-parts/newBlocks/testimonial.php');
            } elseif (get_row_layout() == 'post_news') {
                include(get_template_directory() . '/template-parts/newBlocks/post_news.php');
            } elseif (get_row_layout() == 'post_cpt') {
                include(get_template_directory() . '/template-parts/newBlocks/post_cpt.php');
            } elseif (get_row_layout() == 'hotspots') {
                include(get_template_directory() . '/template-parts/newBlocks/hotspots.php');
            } elseif (get_row_layout() == 'parallax') {
                include(get_template_directory() . '/template-parts/newBlocks/parallax.php');
            }
        }

        $previousBg = $bgColor;
        $index++;
    }
}
?>

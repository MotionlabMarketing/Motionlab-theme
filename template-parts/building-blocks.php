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
        $blocks = ['block_button', 'block_debug', 'block_team', 'block_cta', 'block_linkBoxes', 'block_videos', 'block_social', 'block_pods', 'block_button', 'block_logos', 'block_tabs', 'block_jobs', 'block_timeline', 'block_utilities'];
        if (in_array(get_row_layout(), $blocks)) {

            $current = get_row_layout();
            // TODO: Need to move blocks folder structure and update the routing.
            include(BLOCKS_DIR . '_'. $current .'.php');

        } else {

            // OLD BLOCK SUPPORT //
            // TODO: Old blocks need updating to support new settings and controller.
            if (get_row_layout() == 'heading') {
                include(BLOCKS_DIR . 'heading.php');
            } elseif (get_row_layout() == 'columns') {
                include(BLOCKS_DIR . 'column_text.php');
            } elseif (get_row_layout() == 'tabs_simple') {
                include(BLOCKS_DIR . 'tabs_simple.php');
            } elseif (get_row_layout() == 'full_width_banner') {
                include(BLOCKS_DIR . 'full_width_banner.php');  
            } elseif (get_row_layout() == 'media_object') {
                include(BLOCKS_DIR . 'media_object.php');
            } elseif (get_row_layout() == 'slider_simple') {
                include(BLOCKS_DIR . 'slider_simple.php');
            } elseif (get_row_layout() == 'alternating_media') {
                include(BLOCKS_DIR . 'alternating_media.php');
            } elseif (get_row_layout() == 'gallery_simple') {
                include(BLOCKS_DIR . 'gallery_simple.php');
            } elseif (get_row_layout() == 'form') {
                include(BLOCKS_DIR . 'form.php');
            } elseif (get_row_layout() == 'table') {
                include(BLOCKS_DIR . 'table.php');
            } elseif (get_row_layout() == 'spacer') {
                include(BLOCKS_DIR . 'spacer.php');
            } elseif (get_row_layout() == 'sticky_menu') {
                include(BLOCKS_DIR . 'menu_sticky.php');
            } elseif (get_row_layout() == 'sticky_menu_anchor') {
                include(BLOCKS_DIR . 'menu_sticky_anchor.php');
            } elseif (get_row_layout() == 'hotspot_image') {
                include(BLOCKS_DIR . 'hotspots.php');
            } elseif (get_row_layout() == 'testimonial') {
                include(BLOCKS_DIR . 'testimonial.php');
            } elseif (get_row_layout() == 'post_news') {
                include(BLOCKS_DIR . 'post_news.php');
            } elseif (get_row_layout() == 'post_cpt') {
                include(BLOCKS_DIR . 'post_cpt.php');
            } elseif (get_row_layout() == 'hotspots') {
                include(BLOCKS_DIR . 'hotspots.php');
            } elseif (get_row_layout() == 'parallax') {
                include(BLOCKS_DIR . 'parallax.php');
            }
        }

        $previousBg = $bgColor;
        $index++;
    }
}
?>

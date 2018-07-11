<?php
/**
 * CTA BLOCK --------------------------------------
 * Add support for CTAs Blocks.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

// OPTIONS SETTINGS (ENABLED/DISABLED).
$global_cta_post            = get_sub_field($current . '_cta');
$block['layout']            = get_field('cta_layout', $global_cta_post);
$block['columns']           = get_field('block_content_columns_cta', $global_cta_post);
$block['content']['ctas']   = get_field('block_content_cta', $global_cta_post);

switch ($block['layout']):
    default:
        include('globalCta/__basic.php');
        break;
endswitch;

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
$global_cta_post = get_sub_field($current . '_cta');

$block['layout']                    = get_field('cta_layout', $global_cta_post);
$block['content']['heading']        = get_field('cta_heading', $global_cta_post);
$block['content']['sub_heading']    = get_field('cta_sub_heading', $global_cta_post);
$block['content']['message']        = get_field('cta_message', $global_cta_post);
$block['content']['buttons']        = get_field('cta_buttons', $global_cta_post);
$block['content']['contact_number'] = get_field('cta_contact_number', $global_cta_post);
$block['content']['contact_email']  = get_field('cta_contact_email', $global_cta_post);
$block['content']['image']          = get_field('cta_image', $global_cta_post);
$block['content']['icon']           = get_field('cta_icon', $global_cta_post);

switch ($block['layout']):
    default:
        include('globalCta/__basic.php');
        break;
endswitch;

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
$block['link']['enabled']    = get_sub_field($current . '_fullBannerLink');
$block['buttons']['enabled'] = get_sub_field($current . '_enabledButtons');

if ($block['link']['full'] == true):

    $block['link']['url']    = get_sub_field($current . '_link');

endif;

// BLOCK CONTENT
$block['content']['title']    = get_sub_field($current . '_title_title');
$block['content']['content']  = get_sub_field($current . '_content');
$block['content']['preline']  = get_sub_field($current . '_preLink');
$block['content']['link']     = get_sub_field($current . '_link');
$block['content']['buttons']  = get_sub_field($current . '_buttons');

$block['content']['txtColor'] = get_sub_field($current . '_txtColour_system_text_colours');
$block['content']['txtAlign'] = get_sub_field($current . '_txtAlign')['align'];

switch ($block['layout']):
    case "large":
        include('cta/__large.php');
        break;
    case "sections":
        include('cta/__sections.php');
        break;
    case "basic":
        include('cta/__basic.php');
        break;
    default:
        include('cta/__basic.php');
        break;
endswitch;
<?php
/**
 * PODS BLOCK --------------------------------------
 * Added PODs Support in new controllers.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$block['title']            = get_sub_field($current . '_title_title');
$block['content']          = get_sub_field($current . '_content');

$block['pod']['columns']   = get_sub_field($current . '_columns');
$block['pod']['bgColour']  = get_sub_field($current . '_bgColour_system_background_colours');
$block['pod']['textAlign'] = get_sub_field($current . '_txtAlign_align');
$block['pod']['textColor'] = get_sub_field($current . '_txtColor_system_text_colours');

$blockTitle = $block['title'];

$temp['columns']           = get_sub_field($current . '_columns');

if ($temp['columns']  == 4):
    $block['columns'] = "col-6 sm-col-3";
elseif ($temp['columns']  == 5):
    $block['columns'] = "col-grid-5";
endif;


switch ($block['layout']):
    case "icon_usp":
        include('pods/__usp_banner.php');
        break;
    case "numbered_circles":
        include('pods/__numbered_circles.php');
        break;
    case "numbered_square":
        include('pods/__numbered_square.php');
        break;
    case "benefits":
        include('pods/__benefits.php');
        break;
    default:
        include('pods/__basic.php');
        break;
endswitch;
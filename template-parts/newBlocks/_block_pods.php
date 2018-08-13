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

//$block['title']            = get_sub_field($current . '_title_title');
$block['content']          = get_sub_field($current . '_content');

$block['pod']['columns']   = get_sub_field($current . '_columns');
$block['pod']['bgColour']  = get_sub_field($current . '_bgColour_system_background_colours');
$block['pod']['textAlign'] = get_sub_field($current . '_txtAlign_align');
$block['pod']['textColor'] = get_sub_field($current . '_txtColor_system_text_colours');
$block['pod']['padding']   = get_sub_field($current . '_padding_system_padding');
$block['pod']['shadow']    = get_sub_field($current . '_shadow');
$block['pod']['icon']      = get_sub_field($current . '_icon');

// ERROR ON BASIC BLOCK - NO IDEA IF THIS IS USED STILL FOR THE INTRODUCTION.
//$blockTitle = $block['title']; // REMOVE WHEN ALL UPDATED
//$block['content']['title'] = $block['heading'];

$temp['columns']           = get_sub_field($current . '_columns');

switch ($temp['columns']):
    case "3":
        $block['columns'] = "col-12 sm-col-12 md-col-4";
        break;
    case "4":
        $block['columns'] = "col-12 md-col-6 lg-col-3";
        break;
    case "5":
        $block['columns'] = "col-grid-5";
        break;
endswitch;

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
    case "pillars_icons":
        $block['content']  = get_sub_field($current . '_icons');
        include('pods/__'.$block['layout'].'.php');
        break;
    case "row":
        $block['content']  = get_sub_field($current . '_basic');
        include('pods/__row.php');
        break;
    case "column":
        $block['content']  = get_sub_field($current . '_basic');
        include('pods/__column.php');
        break;
    default:
        $block['content']  = get_sub_field($current . '_basic');
        include('pods/__column.php');
        break;
endswitch;

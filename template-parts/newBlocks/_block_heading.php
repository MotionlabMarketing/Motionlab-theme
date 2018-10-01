<?php
/**
 * HEADER BLOCKS --------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

$block['txt']['alignment'] = get_sub_field($current . '_alignment_align');
$block['display_order']    = get_sub_field($current . '_subPosition');

$block['headings'][0]      = convert_heading(get_sub_field($current . "_title_title"));
$block['headings'][1]      = convert_heading(get_sub_field($current . "_titleSecondly_title"));

// $block['headings'][0]->classes = ["class" => "mb0"];

// if (!empty($block['headings'][1]))
//     $block['headings'][1]->classes = ["class" => "mt4"];

$block['logo']             = get_sub_field($current . '_logo');

if ($block['display_order'] == "before")
    $block['headings'] = array_reverse($block['headings']);

switch ($block['layout']):
    case "logo":
        include('headers/__logo.php');
        break;
    default:
        include('headers/__basic.php');
        break;
endswitch;
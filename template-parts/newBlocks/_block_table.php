<?php
/**
 * TABLE BLOCK -------------------------------------
 * Adds a table support into the theme in the form
 * of an ACF table field.
 *
 * @author Joe Curran
 * @created 25 Apr 2018
 *
 * @version 1.00
 */

$block['layout']   = get_sub_field($current . '_layout');

$block['table']    = get_sub_field($current . '_table');
$block['options']  = get_sub_field($current . '_options');

if (in_array("table_strips", $block['options']))
    $block['options']['stripped'] = "table-striped";

if (in_array("bold_first_column", $block['options']))
    $block['options']['firstBold'] = "table-bold-first";

if (in_array("limit_width", $block['options']))
    $block['options']['limitWidth'] = "table-limited";

if (in_array("table_borders", $block['options']))
    $block['options']['tableBorders'] = "table-bordered";

switch ($block['layout']):
    case "basic":
        include('table/__basic.php');
        break;
    default:
        include('table/__basic.php');
        break;
endswitch;
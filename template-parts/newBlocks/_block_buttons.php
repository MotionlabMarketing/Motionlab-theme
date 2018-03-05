<?php
/**
 * BUTTONS BLOCK --------------------------------------
 * Adds support for the buttons on the page.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 * @updated 28 Feb 2018
 *
 * @version 1.00
 */

$block['buttons']             = get_sub_field($current . '_items');
$block['button']['size']      = get_sub_field($current . '_size');
$block['button']['alignment'] = get_sub_field($current . '_alignment');
$block['button']['radius']    = get_sub_field($current . '_radius_border_radius_strength');

$block['button']['current']   = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

switch ($block['layout']):
    case "bar":
        include ('buttons/__bar.php');
        break;
    case "tabs":
        include ('buttons/__tabs.php');
        break;
    default:
        include ('buttons/__basic.php');
        break;
endswitch;
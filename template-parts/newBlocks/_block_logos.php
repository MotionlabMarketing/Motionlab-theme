<?php
/**
 * LOGOS BLOCK --------------------------------------
 * Add support for logos to be added to the page.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 * @updated 28 Feb 2018
 *
 * @version 2.00
 */

$block['title']   = get_sub_field($current . '_title_title');
$block['content'] = get_sub_field($current . '_content');
$block['logos']   = get_sub_field($current . '_items');

$blockTitle = $block['title']; // REPLACE WHEN HEADER UPDATED.

switch ($block['layout']):
    case "partners":
        include('logos/__partners.php');
        break;
    default:
        include('logos/__basic.php');
        break;
endswitch;
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
$block['content']['content'] = get_sub_field($current . '_content');
$block['logos']   = get_sub_field($current . '_items');
$block['content']['txtColor'] = get_sub_field($current . '_txtColour_system_text_colours');

$blockTitle = $block['title']; // REPLACE WHEN HEADER UPDATED.

switch ($block['layout']):
    default:
        include('logos/__basic.php');
        break;
endswitch;
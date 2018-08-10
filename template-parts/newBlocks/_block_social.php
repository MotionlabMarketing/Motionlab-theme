<?php
/**
 * SOCIAL BLOCK --------------------------------------
 * Add support for social sharing buttons.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

$hideClasses = "";
$hideBtns    = get_sub_field('block_social_hide_share_buttons');

foreach ((array)$hideBtns as $item) {
    $hideClasses .= " " . $item;
}

switch ($layout):
    case "basic":
        include('social/__basic.php');
        break;
    default:
        include('social/__basic.php');
        break;
endswitch;
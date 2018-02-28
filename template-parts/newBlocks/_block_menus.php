<?php
/**
 * MENUS BLOCKS --------------------------------------
 * The menu blocks allows you to include in page
 * navigation. Note: some layouts can be used with
 * other blocks such as buttons.
 *
 * @author Joe Curran
 * @created 27 Feb 2018
 *
 * @version 1.00
 */

$block['button_alignment'] = get_sub_field($current . '_alignment_align');

switch ($block['layout']):
    case "internal":
        include('menus/__internal.php');
    case "jumpto":
        include('menus/__jumpto.php');
        break;
    default:
        include('menus/__basic.php');
        break;
endswitch;
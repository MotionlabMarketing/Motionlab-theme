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

switch ($layout):
    case "basic":
        include('social/__basic.php');
        break;
    default:
        include('social/__basic.php');
        break;
endswitch;
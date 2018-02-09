<?php
/**
 * VIDEO BLOCK --------------------------------------
 * Add support for Videos.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

switch ($layout):
    case "partners":
        include('logos/__partners.php');
        break;
    default:
        include('logos/__basic.php');
        break;
endswitch;
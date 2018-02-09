<?php
/**
 * TEAM BLOCK -------------------------------------
 * Add support for outputting team members from a
 * custom post type "team".
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

switch ($layout):
    case "basic":
        include('team/__basic.php');
        break;
    default:
        include('team/__basic.php');
        break;
endswitch;


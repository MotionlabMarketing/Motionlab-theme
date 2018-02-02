<?php
/**
 * LINKED BOXES BLOCK --------------------------------
 * Add support for CTAs Blocks.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

switch ($layout):
    case "basic":
        include ('tabs/__basic.php');
        break;
    case "dot_tabs":
        include ('tabs/__dot_tabs.php');
        break;
    default:
        include ('tabs/__basic.php');
        break;
endswitch;


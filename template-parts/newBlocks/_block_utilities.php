<?php
/**
 * JOBS BLOCK --------------------------------------
 * Add support for jobs block.
 *
 * @author Joe Curran
 * @created 07 Feb 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

switch ($layout):
    case "code":
        include('utilities/__code.php');
        break;
    default:
        include('utilities/__code.php');
        break;
endswitch;
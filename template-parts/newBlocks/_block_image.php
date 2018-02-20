<?php
/**
 * IMAGE BLOCKS --------------------------------------
 * These blocks output images onto the page.
 *
 * @author Joe Curran
 * @created 16 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    case "split":
        include('image/__split.php');
        break;
    default:
        include('image/__basic.php');
        break;
endswitch;
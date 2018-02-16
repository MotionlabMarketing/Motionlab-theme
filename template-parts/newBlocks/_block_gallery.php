<?php
/**
 * HEADER BLOCKS --------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    case "sliderThin":
        include('galleries/__sliderThin.php');
        break;
    default:
        include('galleries/__basic.php');
        break;
endswitch;
<?php
/**
 * REVIEWS BLOCKS --------------------------------------
 * This allows you to include reviews on the page.
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    case "basic":
        include('reviews/__basic.php');
        break;
    default:
        include('reviews/__basic.php');
        break;
endswitch;
<?php
/**
 * BANNERS BLOCKS --------------------------------------
 * These blocks add banner to the header of the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    case "video":
        include('banners/__video.php');
        break;
    case "slider":
        include('banners/__slides.php');
        break;
    default:
        include('banners/__basic.php');
        break;
endswitch;
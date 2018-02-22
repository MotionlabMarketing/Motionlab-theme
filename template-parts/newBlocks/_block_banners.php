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

// TOOD: Convert the basic image to use the slider options but only display one image, then remove these fields.

switch ($block['layout']):
    case "image":
        include('banners/__image.php');
        break;
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
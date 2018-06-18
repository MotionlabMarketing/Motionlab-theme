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

$block['content']['images'] = get_field('image', get_sub_field($current . '_gallery'));

switch ($block['layout']):
    case "gridPanels":
        include('galleries/__'.$block['layout'].'.php');
        break;
    case "sliderThin":
        include('galleries/__sliderThin.php');
        break;
    case "gallerySlider":
        include('galleries/__gallerySlider.php');
        break;
    default:
        include('galleries/__gallerySlider.php');
        break;
endswitch;

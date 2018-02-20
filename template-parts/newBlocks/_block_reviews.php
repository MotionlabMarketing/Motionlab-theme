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


function get_stars($stars) {

    $output = "";
    $full   =  0;
    $half   =  0;
    $stars  = str_replace("star_", "", $stars);

    if ($stars % 2 == 0):
        // EVEN.
        $full = $stars / 2;
    else:
        // OLD.
        $stars = $stars - 1;
        $full = $stars / 2;
        $half = 1;
    endif;

    $i = 0;
    while ($i < $full):
        $output .= '<i class="fa fa-star h3 mx1 brand-primary"></i>';
        $i++;
    endwhile;

    if ($half == 1):
        $output .= '<i class="fa fa-star-half h3 mx1 brand-primary"></i>';
    endif;

    return $output;
}
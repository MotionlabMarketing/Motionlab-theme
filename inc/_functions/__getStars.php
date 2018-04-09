<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 06/04/18
 * Time: 11:33
 */
/************************************************************
 * THIS IS USED TO GET A STAR RATING USING HALF STARS. WILL
 * RETURN A SET OF ICONS TO MATCH THE RATING 1-5
 ***********************************************************/
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

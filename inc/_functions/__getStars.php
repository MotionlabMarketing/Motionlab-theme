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
    $remaining = 10 - (($full * 2) + $half);

    $i = 0;
    while ($i < $full):
        $output .= '<i class="fa fa-star h3 mx1 brand-primary"></i>';
        $i++;
    endwhile;

    if ($half == 1):
        $output .= '<i class="fa fa-star-half h3 ml1 brand-primary"></i>';
    endif;

    if ($remaining > 0):
        $i = 0;
        if ($remaining % 2 == 0):

            while($i < $remaining):            
                $output .= '<i class="fa fa-star h3 mx1 black opacity-2"></i>';
                $i++; $i++;
            endwhile;
            
        else:
            
            $evened = false;
            while($i < $remaining):

                if ($i % 2 == 0 && $evened == false):
                    $output .= '<i class="fa fa-star-half fa-flip-horizontal h3 black opacity-2"></i>';
                    $evened = true;
                    $i++;
                else:

                    while($i < $remaining):            
                        $output .= '<i class="fa fa-star h3 mx1 black opacity-2"></i>';
                        $i++; $i++;
                    endwhile;

                endif;
                
            endwhile;

        endif;
    endif;
        
    return $output;
}

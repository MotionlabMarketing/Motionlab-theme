<?php
/**
 * GET BLOCK VISIBILITY
 * This function returns the block visibility settings.
 *
 * @return string
 */

function get_blockVisibility(&$block) {

    $classes = "";

    if($block['hide']['mobile'])
        $classes .= "display-none ";
    else
        $classes .= "block ";

    if($block['hide']['tablet'])
        $classes .= "md-display-none ";
    else
        $classes .= "md-block ";

    if($block['hide']['desktop'])
        $classes .= "lg-display-none ";
    else
        $classes .= "lg-block ";

    return $classes;

}

/**
 * THE BLOCK VISIBILITY
 * This function echos the block visibility settings.
 *
 * @return string
 */

function the_blockVisibility(&$block) {

    $classes = "";

    if($block['hide']['mobile'])
        $classes .= "display-none ";
    else
        $classes .= "block ";

    if($block['hide']['tablet'])
        $classes .= "md-display-none ";
    else
        $classes .= "md-block ";

    if($block['hide']['desktop'])
        $classes .= "lg-display-none ";
    else
        $classes .= "lg-block ";

    echo $classes;

}
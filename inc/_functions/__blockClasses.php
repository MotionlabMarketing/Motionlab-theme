<?php

function get_blockClasses(&$block, $custom = null) {

    // TODO: Handle backgorund images.
    // TODO: MOVE THE MARGIN AND PADDING PROCESSING TO THIS FUNCTION.

    $base   = 'clearfix relative';
    $output = '';

    if ($block['bgImage']['enable'] == true):
        $background_image = $block['bgImage']['image']['sizes']['large'];
    endif;

    // MARGIN.
    if (!empty($block['spacing']))
        $output .= trim($block['spacing']) . ' ';

    // PADDING.
    if (!empty($block['padding']))
        $output .= trim($block['padding']) . ' ';

    // BACKGROUND COLOUR.
    if (!empty($block['background']['colour']))
        $output .= $block['background']['colour'] . ' ';

    // BORDERS SIDES.
    if (!empty($block['border']['sides']))
        $output .= $block['border']['sides'] . ' ';

    // BORDERS SIZE.
    if (!empty($block['border']['size']))
        $output .= $block['border']['size']  . ' ';

    // BORDERS COLOUR.
    if (!empty($block['border']['colour']))
        $output .= $block['border']['colour']  . ' ';

    // CUSTOM CSS ADDED TO ACF.
    if (!empty($block['custom_css']))
        $output .= $block['custom_css']  . ' ';

    // CUSTOM CLASSES PASSED INTO FUNCTION FROM TEMPLATE.
    if (!is_null($custom))
        $output .= $custom . " ";
    
    //TODO: Needs to work with the other background options.
    if (!empty($background_image))
        $background_image = 'style="background-position: center; background-size: cover; background-repeat: no-repeat; background-image: url(\''.$background_image.'\')"';

    return 'class="' . $base . ' ' . get_blockVisibility($block) . trim($output) . '" '. $background_image;
}
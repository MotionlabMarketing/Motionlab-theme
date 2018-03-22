<?php

function get_blockClasses(&$block, $custom = null) {

    // TODO: MOVE THE MARGIN AND PADDING PROCESSING TO THIS FUNCTION.

    $base   = 'clearfix relative';
    $output = '';

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

    return 'class="' . $base . ' ' . get_blockVisibility($block) . trim($output) . '"';
}
<?php
/**
 * LOCATIONS BLOCKS ---------------------------------------------
 * These blocks allow you to enter details about a given location
 * this could be a store location or an event.
 *
 * @author Joe Curran
 * @created 7 Jun 2018
 *
 * @version 1.00
 */

$block['content']['position'] = get_sub_field($current . '_visual_alignment');

if ($block['layout'] === "basic_map") {
    $block['content']['type'] = "map";
    $block['content']['location'] = get_sub_field($current . '_map');
}

switch ($block['layout']):
    case 'basic':
        include('location/__basic.php');
        break;
    default:
        include('location/__basic.php');
        break;
endswitch;

<?php
/**
 * LINKED BOXES BLOCK --------------------------------
 * Add support for CTAs Blocks.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$block['content']['columns'] = get_sub_field($current . '_columns');

$block['content']['bgColor']          = get_sub_field($current . '_background_system_background_colours');
$block['content']['txtColor']         = get_sub_field($current . '_text_system_text_colours');

$block['content']['buttons']          = get_sub_field($current . '_button_button_link');
// $block['content']['overlay']          = get_sub_field($current . '_enableOverlay');  // DEPRCATED: To be removed in new builds. 31 May 2018
// $block['content']['darken']           = get_sub_field($current . '_darken');         // DEPRCATED: To be removed in new builds. 31 May 2018
// $block['content']['darkenStrength']   = get_sub_field($current . '_darkenStrength'); // DEPRCATED: To be removed in new builds. 31 May 2018

$block['columns']                     = 12 / $block['content']['columns'][0];

$block['content']['hover']            = get_sub_field($current . '_hoverContent');

$block['enableHover']                 = ($block['content']['hover'] == true)? "show-hover" : "";

// $block['enableOverlay']               = get_sub_field($current . '_enableOverlay');  // DEPRCATED: To be removed in new builds. 31 May 2018


switch ($block['layout']):
    case "button_below":
        include ('linkedBoxes/__button_below.php');
        break;
    case "gridRegressive":
        $block['content']['items'] = get_sub_field($current . '_items');
        include ('linkedBoxes/__gridRegressive.php');
        break;
    case "title_below":
        include ('linkedBoxes/__title_below.php');
        break;
    default:
        $block['content']['items'] = get_sub_field($current . '_items');
        include ('linkedBoxes/__basic.php');
        break;
endswitch;

<?php
/**
 * ALTERNATING MEDIA BLOCKS --------------------------------------
 * These blocks allow you to add content aside some form of media
 * including video or images.
 *
 * @author Joe Curran
 * @created 2 Mar 2018
 *
 * @version 1.00
 */

$block['content']['type']             = get_sub_field($current . '_type');
$block['content']['position']         = get_sub_field($current . '_position');
$block['content']['align']            = get_sub_field($current . '_contentAlign_align');
$block['content']['color']            = get_sub_field($current . '_txtColor_system_text_colours');
$block['content']['padding']          = get_sub_field($current . '_mediaPadding');
$block['content']['bg']               = get_sub_field($current . '_containmentBG_system_background_colours');
$block['temp']['sides']               = get_sub_field($current . '_areaBorders_block_border_sides');
$block['content']['borders']['color'] = get_sub_field($current . '_areaBorders_block_border_sides_colour');
$block['content']['borders']['size']  = get_sub_field($current . '_areaBorders_block_border_sides_size');

foreach ($block['temp']['sides']  as $a):

    $block['content']['sides'] = $block['content']['sides'] . " border-" . $a;

endforeach;

$block['content']['title']            = get_sub_field($current . '_title_title');
$block['content']['content']          = get_sub_field($current . '_content');
$block['content']['buttons']          = get_sub_field($current . '_buttons');
$block['content']['image']            = get_sub_field($current . '_image');
$block['content']['video']            = get_sub_field($current . '_video');
$block['content']['gallery']          = get_sub_field($current . '_gallery');
$block['content']['cta']['append']    = get_sub_field($current . '_ctaAppend');
$block['content']['cta']['link']      = get_sub_field($current . '_ctaLink');

$block['content']['iconCTA']          = get_sub_field('block_alternating_facts');

switch ($block['layout']):
    case 'facts':
        include('alternating/__facts.php');
        break;
    default:
        include('alternating/__basic.php');
        break;
endswitch;

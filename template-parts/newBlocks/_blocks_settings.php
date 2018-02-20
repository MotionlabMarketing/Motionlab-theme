<?php
/**
 * BLOCK SETTING -------------------------------------
 * Sets up all of the setting for each block using the
 * General Block Settings.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

/* TODO: ADD SUPPORT FOR BLOCK TITLE AND CONTENT */

$block = [];

// HAS THIS BLOCK BEEN ENABLED?
$block['enabled'] = get_sub_field($current . '_settings_enable_block');

if ($block['enabled'] == true || empty($block['enabled'])): // TODO: Needs correcting after all blocks updated.

    // GET THE BLOCK LAYOUT.
    $block['layout']            = get_sub_field($current . '_layout');

    // GET CUSTOM CLASS & IDS.
    $block['custom_id']         = get_sub_field($current . '_settings_block_customID');
    $block['custom_css']        = get_sub_field($current . '_settings_block_customClass');

    // GET THE SPACING (MARGIN) BEFORE AND AFTER THIS BLOCK.
    $block['spacing']           = "";
    $block['temp']['top']       = get_sub_field($current . '_settings_enable_block_bspacing');
    $block['temp']['bottom']    = get_sub_field($current . '_settings_enable_block_aspacing');

    foreach ($block['temp'] as $a):

        $block['spacing'] = $block['spacing'] . $a . " ";

    endforeach;

    // GET THE BLOCK INTERNAL (PADDING) SPACING.
    $block['padding']           = "";
    $block['temp']['top']       = get_sub_field($current . '_settings_block_tpadding');
    $block['temp']['bottom']    = get_sub_field($current . '_settings_block_bpadding');
    $block['temp']['left']      = get_sub_field($current . '_settings_block_lpadding');
    $block['temp']['right']     = get_sub_field($current . '_settings_block_rpadding');

    foreach ($block['temp'] as $a):

        $block['padding'] = $block['padding'] . $a . " ";

    endforeach;

    // GET THE BACKGROUND COLOUR.
    $block['background']['colour'] = get_sub_field($current . '_settings_system_background_colours');

    // GET THE REQUIRE GRID OPTIONS.
    $block['grid']                 = get_sub_field($current . '_settings_block_containment');

    // HAS BORDERS FOR THIS BLOCK BEEN ENABLED.
    $block['border']['enable']     = get_sub_field($current . '_settings_enable_borders');

    if ($block['border']['enable'] == true):

        // GET THE SIDES TO INCLUDE THE BORDER.
        $block['temp']             = get_sub_field($current . '_settings_block_border_sides');

        foreach ($block['temp'] as $a):

            $block['border']['sides'] = $block['border']['sides'] . " border-" . $a;

        endforeach;

        // GET THE BORDER SIZE.
        $block['border']['size']   = get_sub_field($current . '_settings_block_border_sides_size');

        // GET THE BORDER COLOUR OPTION.
        $block['border']['colour'] = get_sub_field($current . '_settings_block_border_sides_colour');

    endif;

    // HAS BORDERS FOR THIS BLOCK BEEN ENABLED.
    $block['bgImage']['enable']     = get_sub_field($current . '_settings_enable_image_background');

    if ($block['bgImage']['enable'] == true):

        $block['bgImage']['image']        = get_sub_field($current . '_settings_background_image');
        $block['bgImage']['position']     = get_sub_field($current . '_settings_background_position');
        $block['bgImage']['tint']         = get_sub_field($current . '_settings_background_tint');
        $block['bgImage']['tintStrength'] = get_sub_field($current . '_settings_background_tint_strength');
        $block['bgImage']['occupancy']    = get_sub_field($current . '_settings_background_occupancy');

        $block['bgImage']['position']     = $block['bgImage']['position']['background_position'];
        $block['bgImage']['image']['url'] = $block['bgImage']['image']['basic_image']['url'];
        $block['bgImage']['occupancy']    = $block['bgImage']['occupancy']['system_occupancy'];

    endif;

endif;

unset($block['temp']);
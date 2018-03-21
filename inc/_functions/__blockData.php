<?php


/**
 * GET BLOCK DATA
 * This block returns a string containing the HTML data tags for the provided block instance.
 *
 * @param $block
 * @return string
 */
function get_blockData($block) {

    return 'data-block-id="'. $block['id'] . '" data-block-name="' . $block['name'] . '" data-block-layout="' . $block['layout'] . '"';

}

/**
 * THE BLOCK DATA
 * This block echos a string containing the HTML data tags for the provided block instance.
 *
 * @param $block
 * @return string
 */
function the_blockData($block) {

    echo 'data-block-id="'. $block['id'] . '" data-block-name="' . $block['name'] . '" data-block-layout="' . $block['layout'] . '"';

}
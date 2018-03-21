<?php
/**
 * GET BLOCK CUSTOM ID
 * This function returns a blocks custom ID, if set, which has been entered into the CMS.
 *
 * @param $block
 * @return bool|string
 */

function get_blockID($block) {

    if (!empty($block['customID']))
        return 'id="' . str_replace(" ", "", lcfirst(ucwords($block['customID']))) . '"';

    return false;
}

/**
 * THE BLOCK CUSTOM ID
 * This function echos a blocks custom ID, if set, which has been entered into the CMS.
 *
 * @param $block
 * @return bool|string
 */
function the_blockID($block) {

    if (!empty($block['customID']))
        echo 'id="' . str_replace(" ", "", lcfirst(ucwords($block['customID']))) . '"';

    return false;
}
<?php
/**
 * RENDER ATTACHMENT IMAGE
 * This function
 *
 * @param $imageID
 * @param array $size
 * @param bool $icon
 * @param array $attr
 * @return bool
 */

function render_attachment_image($imageID, $size = array('120', '120'), $icon = false, $attr = array("")) {

    $attr['class']         = $attr['class'] . implode(" ", "block img");
    $attr['data-function'] = "__attachmentImage";
    $attr['alt']           = $imageID['alt'];

    if (!empty($imageID))
        $output = wp_get_attachment_image($imageID['id'], $size, $icon, $attr);

    if (!empty($output))
        echo $output;

    return false;

}

<?php
/**
 * RENDER ATTACHMENT IMAGE
 * This function renders an image or icon onto the page.
 *
 * @param $imageID
 * @param array $size
 * @param bool $icon
 * @param array $attr
 * @return bool
 */

function render_attachment_image($imageID, $size = array('120', '120'), $icon = false, $attr = array("")) {

    $attr['class']         = $attr['class'] . implode(" ", [" block", "img"]);
    $attr['data-function'] = "__attachmentImage";

    if (isset($imageID['alt']))
        $attr['alt']           = $imageID['alt'];

    if (!is_string($imageID) && isset($imageID['id']))
        $imageID = $imageID['id'];

    if (!empty($imageID))
        $output = wp_get_attachment_image($imageID, $size, $icon, $attr);

    if (!empty($output))
        echo $output;

    return false;

}


/**
 * RENDER ATTACHMENT IMAGE
 * This function returns an image or icon onto the page.
 *
 * @param $imageID
 * @param array $size
 * @param bool $icon
 * @param array $attr
 * @return bool|string
 */

function get_render_attachment_image($imageID, $size = array('120', '120'), $icon = false, $attr = array("")) {

    $attr['class']         = $attr['class'] . implode(" ", "block img");
    $attr['data-function'] = "__attachmentImage";
    $attr['alt']           = $imageID['alt'];

    if (!is_string($imageID))
        $imageID = $imageID['id'];

    if (!empty($imageID))
        $output = wp_get_attachment_image($imageID, $size, $icon, $attr);

    if (!empty($output))
        return $output;

    return false;

}

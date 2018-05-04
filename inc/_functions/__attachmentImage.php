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


/**
 * GET IMAGE URL BY ID
 * This function returns an image URL based on its ID number.
 *
 * @param $imageID
 * @param array $size
 * @param bool $icon
 * @param array $attr
 * @return bool|string
 */

function get_attachment_image_url($image_id) {

    return wp_get_attachment_url( $image_id, 'full');

}


/**
 * GET ATTACHMENT IMAGE RESIZE AND CROPPED
 * This function returns an image URL which has been cropped to the
 * passed size with/without crop.
 *
 * @param $imageID
 * @param array $size
 * @param bool $icon
 * @param array $attr
 * @return bool|string
 */

function resize_attachment_image($image_url, $width, $height, $crop) {

    return aq_resize($image_url, $width, $height, $crop);

}
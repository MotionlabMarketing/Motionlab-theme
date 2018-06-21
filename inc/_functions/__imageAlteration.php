<?php
/**
 * RENDER AN IMAGE ALTERATION ELEMENT
 * This function renders a image alteration element on to the page.
 *
 * @param $data
 * @return bool|string
 */

function render_image_alteration($data) {

    if (!empty($data))
        echo '<div class="absolute width-100 height-100 z-index-20 top-0 bg-' . $data['type'] . '-' . $data['strength'] .'" data-function="__imageAlterations"></div>';

    return false;

}

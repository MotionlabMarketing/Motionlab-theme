<?php

/**
 * RENDER WYSIWYG CONTENT
 * This funciton renders a content block for a wysiwyg content field.
 *
 * @param $data
 * @param bool $limitWidth
 * @param $classes
 */

function render_wysiwyg($data, $limitWidth = false, $classes) {

    if ($limitWidth)
        $classes .= " limit-p limit-p-70";

    if (!empty($data))
        echo '<div class="wysiwyg mb4 '. $classes. '">' . $data . '</div>';

}
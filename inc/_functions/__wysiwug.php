<?php

/**
 * RENDER WYSIWYG CONTENT
 * This funciton renders a content block for a wysiwyg content field.
 *
 * @param $data
 * @param bool $limitWidth
 * @param array $attr
 */

function render_wysiwyg($data, $limitWidth = false, $attr = ["class" => ""]) {

    $attr['class'] = "wysiwyg mb4 " . $attr['class'];

    if ($limitWidth == true)
        $attr['class'] = $attr['class'] . " limit-p limit-p-70";

    if (!empty($data))
        echo '<div '.  attrConvert($attr) .' data-function="__wysiwug">' . $data . '</div>';

}
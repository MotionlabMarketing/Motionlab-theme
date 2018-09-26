<?php
/**
 * RENDER HEADER
 * This functions renders a header on the page with the defined or pre-defined settings.
 *
 * @added 15 Mar 2018
 * @author Joe Curran
 *
 * @param string $title
 * @param string $type
 * @param string $size
 * @param string $color
 * @param string $case
 * @param string $classes
 */

function render_heading($title = "", $type = "h3", $size = "h4", $color = "brand-primary", $case = "", $attr = ["class" => "mb2 p0"]) {
    
    // if (!empty($attr['class'])) { BLOCKING CLASS RENDERING...
        $attr['class'] = "{$size} {$color} {$case} " . $attr['class'];
    // }
    
    if (!empty($title))
        echo '<' . $type . ' ' . attrConvert($attr) . ' data-function="__heading">' . $title . '</' .$type . '>';

}

/**
 * GET HEADER HTML STRING
 * This functions returns a HTML string for a header with the defined or pre-defined settings.
 *
 * @added 15 Mar 2018
 * @author Joe Curran
 *
 * @param string $title
 * @param string $type
 * @param string $size
 * @param string $color
 * @param string $case
 * @param string $classes
 * @return string
 */

function get_render_heading($title = "", $type = "h3", $size = "h4", $color = "brand-primary", $case = "", $attr = ["class" => "mb2"]) {

    $attr = attrConvert($attr);

    if (!empty($attr['class'])) {
        $attr['class'] = "pb2 {$size} {$color} {$case}" . $attr['class'];
    }

    if (!empty($title))
        return '<' . $type . ' ' . $attr . ' data-function="__heading">' . $title . '</' .$type . '>';

    return false;
}

/**
 * CONVERT BLOCK HEADING TO OBJECT
 * This function takes the old block heading format and converts it into a new object for the
 * the render_heading functions.
 *
 * @param $data
 * @return stdClass
 */
function convert_heading($data) {

    $heading = new stdClass();

    $heading->title  = $data[0]['title'];
    $heading->type   = $data[0]['type']['heading'];
    $heading->size   = $data[0]['size']['heading_size'];
    $heading->color  = $data[0]['color']['system_text_colours'];
    $heading->case   = $data[0]['title_case']['system_text_transform'];

    return $heading;

}
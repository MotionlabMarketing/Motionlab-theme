<?php
/**
 * COVERT ATTR TO DATA ELEMENTS
 *
 *
 * @param $attr
 * @return bool|string
 */

function attrConvert($attr) {

    $attrString = "";

    if (is_array($attr) && !empty($attr)) {
        foreach ($attr as $key => $value)
            $attrString .= $key . '="'.$value.'"';

        return $attrString;

    }

    return false;

}
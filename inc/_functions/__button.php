<?php
/**
 * RENDER HEADER
 * This functions renders a header on the page with the defined or pre-defined settings.
 *
 * @added 27 Mar 2018
 * @author Joe Curran
 *
 * @param array $data
 * @param string $size
 * @param string $classes
 * @return bool|string
 */

function render_button($data, $size = "medium",  $attr = ["class" => "mb2"]) {

    if (!empty($data['button_link']['url']) && !empty($data['button_link']['title'])) {

        $classes["class"] = $classes["class"] . "btn btn-{$size} {$data['system_text_colours']} {$data['system_background_colours']}";

        $classes = attrConvert($classes);

        // CHECK IF ICON HAS BEEN ADDED.
        if (!empty($data['button_icon']))
            $icon = '<div class="flex items-center">' .  wp_get_attachment_image($data['button_icon'], array(32, 32), true, ["class" => "size-32x32 mr2"]) . $data['button_link']['title'] . '</div>';

        // CHECK IF TARGET HAS BEEN SET.
        if (!empty($data['button_link']['target']))
            $btn['target'] = 'target="' . $data['button_link']['target'] . '"';

        // BUILD THE BUTTON.
        $btn = '<a href="' . $data['button_link']['url'] . '" ' . $classes . ' data-function="__button">';

            if (!empty($icon))
                $btn .= $icon;
            else
                $btn .= $data['button_link']['title'];

        $btn .= '</a>';

        echo $btn;
    }

    return false;

}

/**
 * GET HEADER HTML STRING
 * This functions returns a HTML string for a header with the defined or pre-defined settings.
 *
 * @added 27 Mar 2018
 * @author Joe Curran
 *
 * @param string $size
 * @param string $classes
 * @return bool|string
 */

function get_render_button($data, $size = "btn-medium",  $classes = ["class" => "mb2"]) {

    if (!empty($data['button_link']['url']) && !empty($data['button_link']['title'])) {

        $classes["class"] = $classes["class"] . " btn btn-{$size} {$data['system_text_colours']} {$data['system_background_colours']}";

        $classes = attrConvert($classes);

        // CHECK IF ICON HAS BEEN ADDED.
        if (!empty($data['button_icon']))
            $icon = '<div class="flex items-center">' .  wp_get_attachment_image($data['button_icon'], array(32, 32), true, ["class" => "size-32x32 mr2"]) . $data['button_link']['title'] . '</div>';

        // CHECK IF TARGET HAS BEEN SET.
        if (!empty($data['button_link']['target']))
            $btn['target'] = 'target="' . $data['button_link']['target'] . '"';

        // BUILD THE BUTTON.
        $btn = '<a href="' . $data['button_link']['url'] . '" ' . $classes . ' data-function="__button">';

        if (!empty($icon))
            $btn .= $icon;
        else
            $btn .= $data['button_link']['title'];

        $btn .= '</a>';

        return $btn;
    }

    return false;

}

function render_buttons($data, $size, $classes = ["class" => "mb2 mr2"]) {

    $btn = "";

    foreach ($data as $button) {

        $btn .= get_render_button($button, $size, $classes);

    }

    echo $btn;

}
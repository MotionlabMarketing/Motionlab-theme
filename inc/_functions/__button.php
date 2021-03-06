<?php
/**
 * RENDER BUTTON
 * This functions renders a button on the page with the defined or pre-defined settings.
 *
 * @added 27 Mar 2018
 * @author Joe Curran
 *
 * @param array $data
 * @param string $size
 * @param array $classes
 * @return bool|string
 */

function render_button($data, $size = "medium",  $classes = ["class" => "mb2"]) {

    if (!empty($data['button_link']['url']) && !empty($data['button_link']['title'])) {

        if(empty($data['system_background_colours']))
            $data['system_background_colours'] = "bg-transparent";

        $classes["class"] = "btn btn-{$size} {$data['system_text_colours']} {$data['system_background_colours']} {$data['button_text_colour']['system_text_colours']} {$data['button_background_colour']['system_background_colours']} " . $classes["class"];

        $classes = attrConvert($classes);

        // CHECK IF ICON HAS BEEN ADDED.
        if (!empty($data['button_icon']))
            $icon = '<div class="flex items-center">' .  wp_get_attachment_image($data['button_icon'], array(32, 32), true, ["class" => "size-32x32 mr2"]) . $data['button_link']['title'] . '</div>';

        // CHECK IF TARGET HAS BEEN SET.
        if (!empty($data['button_link']['target']))
            $btn['target'] = 'target="' . $data['button_link']['target'] . '"';

        //CHECK IF BUTTON CUSTOM ID HAS BEEN SET
	    $btn['custom_id'] = '';
	    if(!empty($data['button_custom_id'])):
			$btn['custom_id'] = str_replace(" ", "_", preg_replace("#[[:punct:]]#", " ", $data['button_custom_id']));
	    endif;

        // BUILD THE BUTTON.
        $btn = '<a id="'.$btn['custom_id'].'" href="' . $data['button_link']['url'] . '" ' . $classes . ' role="button" data-function="__button">';

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
 * GET BUTTON HTML STRING
 * This functions returns a HTML string for a button with the defined or pre-defined settings.
 *
 * @added 27 Mar 2018
 * @author Joe Curran
 *
 * @param $data
 * @param string $size
 * @param array $classes
 * @return bool|string
 */

function get_render_button($data, $size = "btn-medium",  $classes = ["class" => "mb2"]) {

    if (!empty($data['button_link']['url']) && !empty($data['button_link']['title'])) {

        if(empty($data['system_background_colours']))
            $data['system_background_colours'] = "bg-transparent"; 

        $classes["class"] = "btn btn-{$size} {$data['system_text_colours']} {$data['system_background_colours']} {$data['button_text_colour']['system_text_colours']} {$data['button_background_colour']['system_background_colours']} " . $classes["class"];

        $classes = attrConvert($classes);

        // CHECK IF ICON HAS BEEN ADDED.
        if (!empty($data['button_icon']))
            $icon = '<div class="flex items-center">' .  wp_get_attachment_image($data['button_icon'], array(32, 32), true, ["class" => "size-32x32 mr2"]) . $data['button_link']['title'] . '</div>';

        // CHECK IF TARGET HAS BEEN SET.
        if (!empty($data['button_link']['target']))
            $btn['target'] = 'target="' . $data['button_link']['target'] . '"';

        //CHECK IF BUTTON CUSTOM ID HAS BEEN SET
	    $btn['custom_id'] = '';
	    if(!empty($data['button_custom_id'])):
			$btn['custom_id'] = str_replace(" ", "_", preg_replace("#[[:punct:]]#", " ", $data['button_custom_id']));
	    endif;

        // BUILD THE BUTTON.
        $btn = '<a id="'.$btn['custom_id'].'" href="' . $data['button_link']['url'] . '" ' . $classes . ' role="button" data-function="__button">';

        if (!empty($icon))
            $btn .= $icon;
        else
            $btn .= $data['button_link']['title'];

        $btn .= '</a>';

        return $btn;
    }

    return false;
}

/**
 * RENDER BUTTONS HTML STRING
 * This functions returns a collection of buttons with the defined or pre-defined settings.
 *
 * @added 27 Mar 2018
 * @author Joe Curran
 *
 * @param string $size
 * @param array $classes
 * @return bool|string
 */

function render_buttons($data, $size, $classes = ["class" => "mb2"]) {

    $btn = "";
    $classes['class'] = $classes['class'] . " ml2 mr2";

    if (!empty($data)) {
        foreach ($data as $button) {

            if (!empty($button['buttons_button_link']) || !empty($button['button_button_link']))
                $button = convert_buttons_key($button);
            $btn .= get_render_button($button, $size, $classes);

        }
    }

    echo $btn;
}

/**
 * CONVERT OLD ARRAY KEY SUPPORT
 * Converts a only array key to a new one for a newer function.
 *
 * @param $arr
 * @return mixed
 */

function convert_buttons_key($arr) {

    foreach($arr as $key => $value) :

        if(strpos($key, "buttons_") !== false || strpos($key, "button_button_") !== false) :
            $arr[str_replace('buttons_', '', $key)] = $value;
            $arr[str_replace('button_button_', 'button_', $key)] = $value;
            unset($arr[$key]);
        endif;

        if ($key == "button_system_text_colours" || $key == "button_system_background_colours"):
            $array[str_replace('button_', '', $key)] = $value;
            unset($array[$key]);
        endif;

    endforeach;

    foreach($arr as $index => $array):

        if (is_array($array)):

            foreach($array as $key => $value):
                if(strpos($key, "button_button_") !== false) :
                    $array[str_replace('button_button_', 'button_', $key)] = $value;
                    unset($array[$key]);
                endif;

                $arr[$index] = $array;

                if ($key == "button_system_text_colours" || $key == "button_system_background_colours"):
                    $array[str_replace('button_', '', $key)] = $value;
                    unset($array[$key]);
                endif;
            endforeach;

        endif;

    endforeach;

    if ($arr['button_system_text_colours'])
        $arr['system_text_colours'] = $arr['button_system_text_colours'];

    if ($arr['button_system_background_colours'])
        $arr['system_background_colours'] = $arr['button_system_background_colours'];

    return $arr;

}

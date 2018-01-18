<?php

$paddingTop = 'normal';

if($index > 1){
    if($bgColor == $previousBg){
        $paddingTop = 'collapse-top';
    }
}

//default background color
if ( get_sub_field('background_color_color') ){
    $bgColor = 'bg-' . get_sub_field('background_color_color');
} else{
    $bgColor = 'bg-' . get_field('default_background_color', 'option');
}

//default text color
if ( get_sub_field('text_color') ){
    $txtColor = get_sub_field('text_color');
} else{
    $txtColor = get_field('default_text_color', 'option');
}

// default button color
if ( !empty(get_sub_field('button_color_color'))){
    $btnBgcolor = 'bg-' . get_sub_field('button_color_color');
} else {
    $btnBgcolor = 'bg-' . get_field('default_button_color', 'option');
}

// default button text color
if ( get_sub_field('button_text_color') ){
    $btnTxtcolor = get_sub_field('button_text_color');
} else {
    $btnTxtcolor = get_field('default_button_text_color', 'option');
}

// default animation settings
if( get_sub_field('animation_animate_block')){
    $animationType = 'data-aos="' . get_sub_field('animation_animation_type') . '"';
    $animationSpeed = 'data-aos-duration="' . get_sub_field('animation_animation_speed') . '"';
    $animationDelay = 'data-aos-delay="' . get_sub_field('animation_animation_delay') . '"';
    $animationRepeat = 'data-aos-once="' . get_sub_field('animation_animation_repeat') . '"';
}
else{
    $animationType = '';
    $animationSpeed = '';
    $animationDelay = '';
    $animationRepeat = '';
}

// default measure wide
if ( get_sub_field('narrow_columns') ){
    $measureWide = 'measure-wide';
} else {
    $measureWide = '';
}

?>

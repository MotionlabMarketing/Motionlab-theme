<?php

include_once(get_template_directory() . '/inc/MenuController.php');

$footer['version'] = get_field('footer_version', 'option');

switch ($footer['version']):
    case "plain":
        include "footers/__plain.php";
        break;
    default:
        include "footers/__basic.php";
        break;
endswitch;
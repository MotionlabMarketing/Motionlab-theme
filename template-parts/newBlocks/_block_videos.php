<?php
/**
 * VIDEO BLOCK --------------------------------------
 * Add support for Videos.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

switch ($layout):
    case "single":
        include('video/__video_single.php');
        break;
    case "video_stories":
        include('video/__video_stories.php');
        break;
    default:
        include('video/__basic.php');
        break;
endswitch;
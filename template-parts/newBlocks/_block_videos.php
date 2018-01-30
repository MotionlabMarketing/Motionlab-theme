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

    $layout = get_sub_field('block_videos_layout');

    switch ($layout):
        case "basic":
            include_once ('video/__basic.php');
            break;
        default:
            include_once ('video/__basic.php');
            break;
    endswitch;
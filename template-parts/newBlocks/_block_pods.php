<?php
/**
 * PODS BLOCK --------------------------------------
 * Added PODs Support in new controllers.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

    $layout = get_sub_field('block_pods_layout');

    switch ($layout):
        case "numbered":
            include ('pods/__numbered.php');
            break;
        case "benefits":
            include ('pods/__benefits.php');
            break;
        default:
            include ('pods/__basic.php');
            break;
    endswitch;
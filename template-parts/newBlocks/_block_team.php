<?php
/**
 * TEAM BLOCK -------------------------------------
 * Add support for outputting team members from a
 * custom post type "team".
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

    $team_layout = get_sub_field('block_team_layout');

    switch ($team_layout):
        case "basic":
            include ('team/__basic.php');
            break;
        default:
            include ('team/__basic.php');
            break;
    endswitch;


<?php
/**
 * CTA BLOCK --------------------------------------
 * Add support for CTAs Blocks.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

    $team_layout = get_sub_field('block_cta_layout');

    switch ($team_layout):
        case "sections":
            include ('cta/__sections.php');
            break;
        case "basic":
            include ('cta/__basic.php');
            break;
        default:
            include ('cta/__basic.php');
            break;
    endswitch;


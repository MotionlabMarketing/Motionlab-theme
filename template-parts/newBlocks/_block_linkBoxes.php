<?php
/**
 * LINKED BOXES BLOCK --------------------------------
 * Add support for CTAs Blocks.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */

$team_layout = get_sub_field('block_linkBoxes_layout');

switch ($team_layout):
    case "basic":
        include ('linkedBoxes/__basic.php');
        break;
    case "title_below":
        include ('linkedBoxes/__title_below.php');
        break;
    default:
        include ('linkedBoxes/__basic.php');
        break;
endswitch;


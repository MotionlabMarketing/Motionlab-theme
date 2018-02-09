<?php
/**
 * JOBS BLOCK --------------------------------------
 * Add support for jobs block.
 *
 * @author Joe Curran
 * @created 07 Feb 2018
 *
 * @version 1.00
 */

$layout = get_sub_field($current . '_layout');

switch ($layout):
    case "jobs_aside":
        include('jobs/__jobs_aside.php');
        break;
    case "talent_aside":
        include('jobs/__talent_aside.php');
        break;
    case "latest_jobs":
        include('jobs/__latest_jobs.php');
        break;
    case "talent":
        include('jobs/__talent.php');
        break;
    default:
        include('jobs/__talent.php');
        break;
endswitch;
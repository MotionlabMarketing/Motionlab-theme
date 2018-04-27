<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 06/03/18
 * Time: 12:22
 */

//Include core CPT model
include_once(MASTER_CPT_DIR . 'CPTCore.php');

//Load in any custom post types from the master theme.
foreach(array_slice(scandir(MASTER_CPT_DIR), 3) as $cpt_file) {
	include_once(MASTER_CPT_DIR . $cpt_file);
}

//Load in any custom post types from the child theme
if(defined('CHILD_CPT_DIR')) {
    pa(sizeof(scandir(CHILD_CPT_DIR)));
    if (sizeof(scandir(CHILD_CPT_DIR)) > 2) :
        foreach (array_slice(scandir(CHILD_CPT_DIR), 2) as $cpt_file) :
            include_once(CHILD_CPT_DIR . $cpt_file);
        endforeach;
    endif;
}

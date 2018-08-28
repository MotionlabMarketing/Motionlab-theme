<?php

if( have_rows('building_blocks') ) { while ( have_rows('building_blocks') ) { the_row();

    $current = get_row_layout();
    include (BLOCKS_DIR . '_blocks_settings.php');

    if ($block['enabled'] == true):
        //First we check if the child theme has it's own model/controller version of this block.
        if(file_exists(CHILD_MODELS_DIR . '_' . $current . '.php')):
		    include(CHILD_CONTROLLERS_DIR . 'BlocksController.php');

        //If not then we see if the main theme has a model/controller setup for this block.
        elseif(file_exists(MODELS_DIR . '_' . $current . '.php')) :
		        include(CONTROLLERS_DIR . 'BlocksController.php');

        //If we don't have a model/controller setup for this block anywhere then look in the child
	    //theme and the main theme for just the base template of the block.
        else :
            if(file_exists(CHILD_BLOCKS_DIR . '_'. $current .'.php')) :
                include(CHILD_BLOCKS_DIR . '_'. $current .'.php');
            else :
                include(BLOCKS_DIR . '_'. $current .'.php');
            endif;
        endif;
    endif;

}}

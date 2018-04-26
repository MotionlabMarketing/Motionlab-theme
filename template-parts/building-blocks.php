<?php

if( have_rows('building_blocks') ) { while ( have_rows('building_blocks') ) { the_row();

            $current = get_row_layout();
            include (BLOCKS_DIR . '_blocks_settings.php');

            if ($block['enabled'] == true):
	            if(file_exists(MODELS_DIR . '_' . $current . '.php')) {
		            include(CONTROLLERS_DIR . 'BlocksController.php');
	            } else {
            	    include(BLOCKS_DIR . '_'. $current .'.php');
	            }
            endif;

    }
}
<?php

class ML_Theme {

    function __construct() {

    }


    /**
     * SELF CLASS INSTANTIATION
     * This allows WordPress to instantiate this class on load.
     */
    public static function instance() {
        $class = __CLASS__;
        return (new $class);
    }

    

    /**
     * GET TEMPLATE PART
     * This function loads a template part if one can be found.
     * 
     * @param string $path The path for this file from the views directory.
     * @param string $name The name of the file.
     */
    public function get_template_part($path, $name, $type = null, $values = null)  {

        // Check if the file name has '.php'
        if (strpos($name, '.php') !== false) {
            $name = str_replace('.php', '', $name);
        }

        // If a content type has been provided, append
        if (!is_null($type))
            $name = $name . "-" . $type;

        if (file_exists(get_stylesheet_directory() . '/src/views/' . $path . '/' . $name . '.php')) {
            
            return include( get_stylesheet_directory() . '/src/views/' . $path . '/' . $name . '.php');
        
        } else if (file_exists(get_template_directory() . '/src/views/' . $path . '/' . $name . '.php')) {

            return include( get_template_directory() . '/src/views/' . $path . '/' . $name . '.php');

        } else {

            pa("The following file was not found in Master or Child Theme: \"" . '/src/views/' . $path . '/' . $name . '.php' . "\"");

        }
    }
}
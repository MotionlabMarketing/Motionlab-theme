<?php

class Global_CTA {

    private $id;
    private $enabled;
    private $template;
    private $prefix = "global_cta_";

    public function __construct() {

        // Check if global cta is enabled.
        $this->enabled = get_field($this->prefix."enable");

        if ($this->enabled):

            // Get global cta post id. [Field is Post Object]
            $this->id = get_field($this->prefix.'id')->ID;

            // If global cta has been selected, load relevent data & files.
            if (!empty($this->id)):
                $this->template = $this->get_template();
                $this->load_template();
            endif;

        endif;       
        
    }



    /**
     * WORDPRESS INIT CALL
     * This allows WordPress to call this class magicly if needed. 
     */
    public function init() {
        $class = __CLASS__;
        new $class;
    }



    /**
     * GET THE TEMPALTE NAME
     * This funcation get the template name which should match the tempalte file name.
     */
    public function get_template() {
        return get_field($this->prefix.'template', $this->id);
    }



    /**
     * GET CTA VALUES
     * Get the global cta content values based on the post id.
     */
    public function get_values() {

        // Get BLOCK Data.
        $block['id']       = $this->prefix."_".$this->id;
        $block['name']     = rtrim($this->prefix, "_");
        $block['layout']   = $this->template;
        $block['position'] = $this->prefix."_".$this->id;

        // Boxes - Get Custom Fields
        if ($this->template == "basic"):
            $block['content']['items_count']   = get_field($this->prefix."boxes", $this->id);
            $block['content']['items_content'] = get_field($this->prefix."content_boxes", $this->id);
        endif;

        // Strip - Get Custom Fields
        if ($this->template == "strip"):
            $block['content']['buttons']       = get_field($this->prefix."buttons", $this->id);
        endif;    
        
        return $block;
    }



    /**
     * LOAD TEMPLATE FILE
     * This function load the data for the template into $block and includes the template file.
     */
    public function load_template() {
        $block = $this->get_values();
        include_once(CTA_DIR."templates/_".$this->template.".php");
    }
}

(new Global_CTA)->init(); 
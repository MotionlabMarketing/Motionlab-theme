<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 06/03/18
 * Time: 12:46
 */
Class CPTCore {

	public $enabled = true;

	/**
	 * CPTCore constructor.
	 */
	public function __construct() {

		if($this->enabled) {
			if(method_exists($this, 'registerPostType'))   $this->registerPostType();

			if(method_exists($this, 'registerTaxonomies')) $this->registerTaxonomies();
		}

	}
}

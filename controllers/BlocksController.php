<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 05/03/18
 * Time: 17:18
 */
include_once(MODELS_DIR . '_' . $current . '.php');
$current_class = '_' . $current;
$_block = (new $current_class($block, $current, $_POST))->renderBlock();

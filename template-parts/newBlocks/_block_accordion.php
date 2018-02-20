<?php
/**
 * ACCORDION BLOCKS --------------------------------------
 * These blocks add content which can be togged on and
 * off.
 *
 * @author Joe Curran
 * @created 19 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    default:
        include('accordions/__basic.php');
        break;
endswitch;
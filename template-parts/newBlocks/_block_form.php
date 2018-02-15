<?php
/**
 * FORM BLOCKS --------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    default:
        include('form/__basic.php');
        break;
endswitch;
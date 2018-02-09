<?php
/**
 * SPACERS BLOCKS --------------------------------------
 * Added PODs Support in new controllers.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    case "ruled":
        include('spacers/__ruled.php');
        break;
    default:
        include('spacers/__basic.php');
        break;
endswitch;
<?php
/**
 * JOBS BLOCK --------------------------------------
 * Add support for jobs block.
 *
 * @author Joe Curran
 * @created 07 Feb 2018
 *
 * @version 1.00
 */

switch ($block['layout']):
    case "slidingPanels":
        include('store/__'.$block['layout'].'.php');
        break;
    default:
        include('jobs/__talent.php');
        break;
endswitch;

/// ///
///
/// basic : Basic Store Block (Disabled)
/// range : Selected Product Ranges
/// featured : Selected Featured Products (x3)
/// featurted_grid : Selected Featured Products (x7 (1 Large))
///
/// ///
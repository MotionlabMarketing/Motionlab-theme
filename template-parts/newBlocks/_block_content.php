<?php
/**
 * CONTENT BLOCKS --------------------------------------
 * The content block output basic content onto the page.
 *
 * @author Joe Curran
 * @created 3 Apr 2018
 *
 * @version 1.00
 */

$block['content']['cols'] = get_sub_field( $current . '_columns');

$block['content']['col'][1] = get_sub_field( $current . '_col1');
$block['content']['col'][2] = get_sub_field( $current . '_col2');
$block['content']['col'][3] = get_sub_field( $current . '_col3');
$block['content']['col'][4] = get_sub_field( $current . '_col4');

$block['content']['limitWidth'] = get_sub_field( $current . '_limitWidth');

if ($block['content']['cols'] > 1)
    $block['content']['limitWidth'] = "";

switch ($block['layout']):
    default:
        include('content/__basic.php');
        break;
endswitch;
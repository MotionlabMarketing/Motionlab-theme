<?php
/**
 * MENUS BLOCKS – SCROLL TO --------------------------------------
 * This block adds a scroll point into the page. This
 * is not visible on the front-end. The name field is
 * added to a hidden data value.
 *
 * @author Joe Curran
 * @created 27 Feb 2018
 *
 * @version 1.00
 */

$block['content']['scroll_name'] = get_sub_field($current . '_scrollLocation');
$block['content']['scroll_id']   = get_sub_field($current . '_scrollName');
?>

<div id="<?=strtolower(str_replace(" ", "_", $block['content']['scroll_id']))?>" data-scroll="<?=$block['content']['scroll_name']?>" class="scrollTo"></div>

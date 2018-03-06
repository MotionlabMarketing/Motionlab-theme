<?php
/**
 * HEADING BLOCK -----------------------------------
 * Adds support for outputting headings.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */
?>

<<?=$block['block_title'][0]['type']['heading']?> class="pb2 <?=$block['block_title'][0]['size']['heading_size']?> || <?=$block['block_title'][0]['color']['system_text_colours']?> <?=$block['block_title'][0]['title_case']['system_text_transform']?>">
    <?=$block['block_title'][0]['title']?>
</<?=$block['block_title'][0]['type']['heading']?>>

<?php unset($block['block_title']);?>

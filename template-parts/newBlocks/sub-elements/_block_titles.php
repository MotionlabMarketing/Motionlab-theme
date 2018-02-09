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

<<?=$blockTitle[0]['type']['heading']?> class="pb2 <?=$blockTitle[0]['size']['heading_size']?> || <?=$blockTitle[0]['color']['system_text_colours']?> <?=$blockTitle[0]['title_case']['system_text_transform']?>">
    <?=$blockTitle[0]['title']?>
</<?=$blockTitle[0]['type']['heading']?>>

<?php unset($blockTitle);?>
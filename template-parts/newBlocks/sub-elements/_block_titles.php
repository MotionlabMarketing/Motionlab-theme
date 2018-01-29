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

 $title = get_sub_field('title'); ?>

<<?=$title[0]['heading']?> class="<?=$title[0]['size_heading_size']?>">
    <?=$title[0]['title']?>
</<?=$title[0]['heading']?>>
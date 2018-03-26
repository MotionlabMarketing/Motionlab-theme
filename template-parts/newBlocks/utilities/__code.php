<?php
/**
 * UTILITY – BASIC CODE BLOCK ------------------------
 * A basic block that holds code.
 *
 * @author Joe Curran
 * @created 9 Fab 2018
 *
 * @version 1.00
 */

?>

<section <?=get_blockID($block)?> class="utilities-code" <?=get_blockData($block)?>>

    <?= get_sub_field($current . '_code')?>

</section>
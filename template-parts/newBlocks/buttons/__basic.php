<?php
/**
 * REPEATING BUTTON BLOCK --------------------------
 * Add support for single buttons blocks or button
 * bars.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 * @updated 28 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "buttons-basic")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="<?=$block['button']['alignment']?>">

            <?php render_buttons($block['buttons'] , "medium"); ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<?php
/**
 * SPACERS BLOCKS ---------------------------------------
 * A basic block that allow the user to add space between
 * other blocks.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

?>
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "spacer-ruled")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container '.$block['padding'].'">' : ""?>

        <div class="block py3">

            <div class="bg-angled-lines" style="height:0.4rem;"></div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

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
<section class="clearfix || <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <hr class="relative opacity-none">

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
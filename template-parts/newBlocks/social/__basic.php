<?php
/**
 * SOCIAL SHARE – BASIC LAYOUT BLOCK ------------------------
 * A basic block which allows images to be linked to other
 * pages or URLs.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="social-share text-center <?=$hideClasses?>">

            <?php if(function_exists('sharethis_inline_buttons')): ?>

                <?php echo sharethis_inline_buttons()?>

            <?php else: ?>

                <p class="lead text-center"><strong>SOCIAL BLOCK</strong><br/>Please ensure that the ShareThis plugin is installed and active.</p>

            <?php endif; ?>
            
        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

<?php
/**
 * CONTENT BLOCK ---------------------------------------
 * This block output content on the page. 
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 2.00
 */
$i = 1;
?>
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php foreach ($block['content']['col'] as $column): ?>

            <?php if ($i <= $block['content']['cols']): ?>
        
                <?php include(BLOCKS_DIR . '_parts/__basic_column.php'); ?>
        
            <?php endif; $i++; ?>

        <?php endforeach; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
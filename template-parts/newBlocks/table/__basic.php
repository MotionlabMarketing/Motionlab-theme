<?php
/**
 * TABLE BLOCK ---------------------------------------
 * This is a basic table block.
 *
 * @author Joe Curran
 * @created 25 Apr 2018
 *
 * @version 1.00
 */

//TODO: Add this to ACF. 
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <table class="<?=$block['options']['stripped']?> <?=$block['options']['firstBold']?> <?=$block['options']['limitWidth']?> <?=$block['options']['tableBorders']?>">

            <?php if ($block['table']['header']): ?>

                <thead>

                    <tr>

                        <?php foreach ($block['table']['header'] as $column): ?>

                            <td><?=$column['c']?></td>

                        <?php endforeach; ?>

                    </tr>

                </thead>

            <?php endif; ?>

            <?php if ($block['table']['body']): ?>

                <tbody>

                    <?php foreach ($block['table']['body'] as $row): ?>

                        <tr>

                            <?php foreach ($row as $column): ?>

                                <td><?=$column['c']?></td>

                            <?php endforeach; ?>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            <?php endif; ?>

        </table>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<?php
/**
 * NUMBERED POD SQUARE – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 30 Jan 2018
 *
 * @version 2.00
 */
// CUSTOM DATA SET FOR THIS BLOCK.
$blockItems  = get_sub_field($current . '_basic');

$width = ($block['grid'] == 'full_width')? $block['background']['colour'] : "";
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "pod-numbered-square {$width}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container' || $block['grid'] == 'full_width')? '<div class="container '.$block['background']['colour'].'">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="col-12">

        <?php $i = 1; foreach ($blockItems as $item): ?>

            <div class="item col col-3 p3 mb2 text-center col-grid-5">

                <div class="content p3 mb2 <?=$block['pod']['bgColour']?>" data-mh="<?=$block['id']?>-pods">

                    <h5 class="block brand-primary mb2 h2 bold"><?=$i?>.</h5>

                    <p class="h5"><?=$item['pod_content']?></p>

                    <div class="rule border-darken-3"></div>

                </div>

            </div>

        <?php $i++; endforeach; ?>

    </div>

        <?php if ($block['bgImage']['enable']  && $block['grid'] == 'container'): ?>

            <div class="absolute top-0 left-0 width-100 height-100 bg-center bg-cover zn1 <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?> bg-<?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>')"></div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php if ($block['grid'] == 'full_width' && $block['bgImage']['enable']): ?>

        <div class="absolute top-0 left-0 width-100 height-100 bg-center bg-cover zn1 <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?> <?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>')"></div>

    <?php endif; ?>

</section>
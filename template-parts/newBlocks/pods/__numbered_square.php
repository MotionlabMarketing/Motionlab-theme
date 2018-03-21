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
?>

<section <?=get_blockID($block)?> class="pod-numbered-square clearfix relative <?=get_blockVisibility($block)?> <?=$block['spacing']?> <?=$block['padding']?> <?=($block['grid'] == 'full_width')? $block['background']['colour'] : ""?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container' || $block['grid'] == 'full_width')? '<div class="container '.$block['background']['colour'].'">' : ""?>

    <?php if (!empty($blockTitle[0]['title'])): ?>

        <?php if (!empty($block['title']) || !empty($block['content'])): ?>
            <div class="col col-12 md-col-12 lg-col-12 mb5 text-center">

                <?php if (!empty($blockTitle[0]['title'])): ?>
                    <div class="m4 text-center">
                        <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($block['content'])): ?>
                    <div class="text-center mb2 limit-p limit-p-70">
                        <?= $block['content'] ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    <?php endif; ?>

    <div class="col-12">
        <?php $i = 1; foreach ($blockItems as $item):?>

            <div class="item || col col-3 px2 mb3 || <?=$block['pod']['textAlign']?> || col-grid-5">

                <div class="content p3 || <?=$block['pod']['bgColour']?> min-height-v15 js-match-height">

                    <h5 class="block brand-primary h2 bold"><?=$i?>.</h5>

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
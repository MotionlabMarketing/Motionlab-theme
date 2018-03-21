<?php
/**
 * NUMBERED POD CIRCLES – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 30 Jan 2018
 * @updated 28 Feb 2018
 *
 * @version 2.00
 */
// CUSTOM DATA SET FOR THIS BLOCK.
$blockItems  = get_sub_field($current . '_basic');
?>

<section <?=get_blockID($block)?> class="pod-numbered-circles relative clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=($block['grid'] == 'full_width')? $block['background']['colour'] : ""?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container' || $block['grid'] == 'full_width')? '<div class="container '.$block['background']['colour'].'">' : ""?>

    <?php if (!empty($blockTitle[0]['title'])): ?>

        <?php if (!empty($block['title']) || !empty($block['content'])): ?>
            <div class="col col-12 md-col-12 lg-col-12 mb5 text-center">
                
                <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

                <?php render_wysiwyg("{$block['intro']}", "", " || regular")?>

            </div>
        <?php endif; ?>

    <?php endif; ?>

    <div class="col-12">
        <?php $i = 1; foreach ($blockItems as $item):?>

            <div class="item || col col-3 px2 mb3 || <?=$block['pod']['textAlign']?> || col-grid-5">

                <div class="content p5 || <?=$block['pod']['bgColour']?> js-match-height text-center flex items-center flex-wrap justify-center content-center mx-auto">

                    <p class="block m0 width-100 || white h2">#<?=$i?>.</p>

                    <p class="m0 white h4"><?=$item['pod_content']?></p>

                </div>

            </div>

            <?php $i++; endforeach; ?>
    </div>

    <?php if ($block['bgImage']['enable']  && $block['grid'] == 'container'): ?>

        <div class="absolute top-0 left-0 width-100 height-100 bg-center bg-cover zn1 <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?> <?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>')"></div>

    <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php if ($block['grid'] == 'full_width' && $block['bgImage']['enable']): ?>

        <div class="absolute top-0 left-0 width-100 height-100 bg-center bg-cover zn1 <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?> <?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>')"></div>

    <?php endif; ?>

</section>
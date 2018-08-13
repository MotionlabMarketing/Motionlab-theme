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
$blockItems  = get_sub_field($current . '_icons'); ?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="border-last-item-right">

        <?php $i = 1; foreach ($blockItems as $item): ?>

            <div class="item col col-12 sm-col-6 md-col-3 p3 bg-smoke border-light border-top border-left border-bottom <?=$block['pod']['textAlign']?> <?=$block['pod']['textColor']?> flex items-center" data-mh="item">

                <?php if (!empty($item['pod_item_link']['url'])): ?>
                    <a href="<?=$item['pod_item_link']['url']?>" <?=($item['pod_item_link']['title'])? 'title="'.$item['pod_item_link']['url'].'"':''?> class="<?=$block['pod']['textColor']?> hover-brand-primary">
                <?php endif; ?>    

                    <div class="ml1 mr2 left" style="min-width: 20%">

                        <?php if ($item['enable_custom_icons'] == true): ?>

                            <?= wp_get_attachment_image($item['pod_item_custom_icon'], array(50, 80), "", ["class" => ""]  )?>

                        <?php else: ?>

                            <p class="h1 mb0"><?=$item['pod_item_icon'];?></p>

                        <?php endif; ?>

                    </div>

                    <div>

                    <?php if(!empty($item['pod_item_title'])): ?>
                        <h4 class="h4 mb0"><?=$item['pod_item_title']?></h4>
                    <?php endif; ?>

                    <?php if(!empty($item['pod_item_description'])): ?>
                        <p class="h5 mb0"><?=$item['pod_item_description']?></p>
                    <?php endif; ?>

                    </div>

                <?php if (!empty($item['pod_item_link']['url'])): ?>
                    </a>
                <?php endif; ?>

            </div>

        <?php $i++; endforeach; ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

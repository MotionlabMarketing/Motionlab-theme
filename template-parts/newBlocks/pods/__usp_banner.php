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
$blockItems  = get_sub_field($current . '_icons');
?>

<section id="<?=$block['custom_id']?>" class="usp- relative clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

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

    <div class="col-12 border-last-right-1">

        <?php $i = 1; foreach ($blockItems as $item): ?>

            <div class="item || col col-12 sm-col-6 md-col-3 px2 || bg-smoke border-light border-top border-left border-bottom <?=$block['pod']['textAlign']?> <?=$block['pod']['textColor']?> flex js-match-height">

                <div class="mr2 flex items-center justify-center" style="min-width: 20%">

                    <?php if ($item['enable_custom_icons'] == true): ?>

                        <?= wp_get_attachment_image($item['pod_item_custom_icon'], array(50, 80), "", ["class" => ""]  )?>

                    <?php else: ?>

                        <p class="h1 mb0"><?=$item['pod_item_icon'];?></p>

                    <?php endif; ?>

                </div>

                <div class="py3 px1">

                    <h4 class="h4"><?=$item['pod_item_title']?></h4>

                    <p class="m0 h5"><?=$item['pod_item_description']?></p>

                </div>

            </div>

            <?php $i++; endforeach; ?>
    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
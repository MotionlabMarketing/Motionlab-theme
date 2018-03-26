<?php
/**
 * PILLAR POD LAYOUT – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 7 Mar 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "pod-column")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> mxn2">

                <?php foreach ($block['content'] as $item): ?>

                    <div class="col <?=$block['columns']?> p2">

                        <div class="<?=$block['pod']['bgColour']?> hover-brand-primary <?=$block['pod']['textAlign']?> <?=$block['pod']['textColor']?> py6 px5 relative js-match-height">

                            <div class="js-match-height-alt">
                                <?= wp_get_attachment_image($item['pod_item_custom_icon'], array(80, 80), "", ["class" => "mb4 bg-white"]  )?>
                            </div>

                                <h3 class="mb3 brand-primary" style="font-size: 1.3rem">

                                    <?=(!empty($item['pod_item_link']['url'])? '<a href="'. $item['pod_item_link']['url'] .'">' : "")?>

                                        <?=$item['pod_item_title']?>

                                    <?=(!empty($item['pod_item_link']['url'])? '</a>' : "")?>

                                </h3>

                                <p class="h5"><?=$item['pod_item_description']?></p>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php include(BLOCKS_DIR . '_parts/__backgroundImageContainer.php'); ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__backgroundImageFullWidth.php'); ?>

</section>
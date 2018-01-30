<?php
/**
 * BENIFITS POD – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 30 Jan 2018
 *
 * @version 1.00
 */

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');

$blockTitle  = get_sub_field($current . '_title_title');

$blockItems  = get_sub_field($current . '_icons');

?>

<section class="<?=$bgColor?> <?=$txtColor?>">

    <div class="container">

        <div class="clearfix py5">

            <div class="m4 mb5 || text-center">

                <div class="mb4">
                <?php
                if (!empty($blockTitle)) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
                </div>

                <div class="text-center">
                    <?=get_sub_field('block_pods_content')?>
                </div>
            </div>

            <div class="px2 md-px6">
            <?php foreach ($blockItems as $item): ?>

                <?php if (!empty($item['pod_item_link'])): ?>
                    <a href="<?=$item['pod_item_link']['url']?>" class="<?=$txtColor?>" <?=($item['pod_item_link']['title'] ? 'title="'.$item['pod_item_link']['title'].'"' : '')?> <?=($item['pod_item_link']['target'] ? 'target="'.$item['pod_item_link']['target'].'"' : '')?>>
                <?php endif; ?>

                <div class="col col-3 px4 mb5 || text-center || col-grid-5">

                    <p class="block mb2 || h1 text-center"><?=$item['pod_item_icon']?></p>

                    <h4 class="h4"><?=$item['pod_item_title']?></h4>

                    <p class="h6"><?=strip_tags($item['pod_item_description'])?></p>

                </div>

                 <?php if (!empty($item['pod_item_link'])): ?>
                    </a>
                 <?php endif; ?>

            <?php endforeach; ?>
            </div>

        </div>

    </div>

</section>
<?php
    $tabNav= 'flex flex-column';
    $tabName = 'flex';
    $tab= 'btn md-text-left border-bottom-none || mr1 px3';
    $content = 'pt4';
    $pad = '';
    $contentPad = '';

if (get_sub_field('centre_tabs') == true) {

    $tab .= "|| tab-center bg-smoke btn-medium tab-arrowBottom";
    $tabName .= "|| flex items-center justify-center";

}

$blockTitle  = $block['title'];//get_sub_field($current . '_title_title');

$block['tabs_settings']['tab_size']      = get_sub_field($current . '_size');
$block['tabs_settings']['tab_weight']    = get_sub_field($current . '_weight');

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "tabs-employer")?> <?=get_blockData($block)?>>

    <div class="container">

        <div class="col col-6 || p4">

            <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
            </div>

            <div class="wysiwyg">
                <?=get_sub_field($current . '_content')?>
            </div>

        </div>


        <div class="col col-12 || p2 md-p4" data-tabs="wrapper">

            <div class="tabs || col col-12 || mb0 <?php echo $tabName ?> || flex items-center justify-center">

            <?php
                /**
                 * OUTPUT TAB BUTTONS
                 */
                $tabsCount = count(get_sub_field('block_tabs_employer'));

                if( have_rows('block_tabs_employer')): $i = 1; while ( have_rows('block_tabs_employer')): the_row() ?>

                    <div data-section="tab<?=$i?>" id="tab<?=$i?>" class="tab || relative text-center bold <?=$block['tabs_settings']['tab_size']?> <?=$block['tabs_settings']['tab_weight']?> <?=($i <= 1)? 'tab-active' : ''?>">
						<?=get_sub_field('tab_title')?>
					</div>

            <?php $i++; endwhile; endif; ?>

            </div>

            <div data-tabs="content" class="col-12 || clearfix">

            <?php

                /**
                 * OUTPUT TAB CONTENTS
                 */
                if( have_rows('block_tabs_employer')): $i = 1; while ( have_rows('block_tabs_employer')): the_row() ?>

                    <section id="tab<?php echo $i ?>" class="tab-content clearfix || <?php echo ($i > 1) ? 'hide' : '' ?> p1 md-p4">

                        <div class="col col-12 md-col-6 p3 pt5 md-px6 border-bottom border-light md-border-bottom-none">
                            <div class="wysiwyg">
                                <?=get_sub_field('col1_content') ?>
                             </div>
                        </div>

                        <div class="col col-12 md-col-6 p1 md-p3">
                            <?php foreach (get_sub_field('block') as $item): ?>

                                <div class="pb4 border border-light border-bottom">

                                    <p class="mr3 h1 mb0 mtn1 md-mtn3 inline-block left"><?=$item['icon']?></p>
                                    <div class="mt4">
                                        <?php
                                        $blockTitle = $item['title'];
                                        if (!empty($blockTitle[0]['title'])) {
                                            include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
                                    </div>

                                    <p class="clearfix"><?=$item['content']?></p>
                                    <?php if($item['show_filter'] == true):?>

                                        <form action="" method="get" class="flex">
                                            <select name="orderby" id="orderby" style="min-width:11rem;" class="select md-mr3 width-100 md-width-auto box-shadow-2" onchange="this.form.submit()" >
                                                <option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>By Sector</option>
                                                 <?php
                                                    foreach($block['select_terms'] as $term): ?>

                                                        <option value="<?= $term->name; ?>" data-redirect="<?= $term->taxonomy;?>/<?= $term->slug; ?>"> <?= $term->name; ?> </option>

                                                 <?php endforeach; ?>
                                            </select>
                                        </form>

                                    <?php else: ?>

                                        <a class="brand-primary h5 bold" href="<?=$item['link_url']['url']?>"><?=$item['link_url']['title']?></a>

                                    <?php endif; ?>

                                </div>

                            <?php endforeach; ?>
                        </div>

                    </section>

                <?php $i++; endwhile; endif; ?>

            </div>

        </div>

    </div>

</section>

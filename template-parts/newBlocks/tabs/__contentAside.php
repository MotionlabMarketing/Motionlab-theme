<?php
if ( get_sub_field('vertical_tabs') ){
    $tabNav= 'md-flex md-flex-row';
    $tabName= 'mb4 md-col-4 lg-col-3 md-mb0 md-border-right border-smoke';
    $tab= 'hover-bg-smoke inline-block md-block md-border-bottom-none md-border-left-none md-border-right-none px2';
    $content = '';
    $pad = '';
    $contentPad = 'md-px4 py3';
} else {
    $tabNav= 'flex flex-column';
    $tabName = 'flex';
    $tab= 'btn md-text-left border-bottom-none || mr1 px3';
    $content = 'pt4';
    $pad = '';
    $contentPad = '';
}

if (get_sub_field('centre_tabs') == true) {

    $tab .= "|| tab-center bg-smoke btn-medium tab-arrowBottom";
    $tabName .= "|| flex items-center justify-center";

}

$blockTitle  = get_sub_field($current . '_title_title');

// TODO: ADD BLOCK BORDER SETTINGS //
?>

<section class="tabs-contentAside || clearfix pb4">

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


        <div class="col col-6 || p4" data-tabs="wrapper">

            <div class="tabs || col col-12 || mb0 <?php echo $tabName ?> || flex items-center">

            <?php
                /**
                 * OUTPUT TAB BUTTONS
                 */
                $tabsCount = count(get_sub_field('tabs'));
                $tabClass  = "";
                if ($tabsCount == 1 || $tabsCount == 2):
                    $tabClass = "tab-50";
                elseif ($tabsCount == 3):
                    $tabClass = "tab-33";
                endif;

                if( have_rows('tabs')): $i = 1; while ( have_rows('tabs')): the_row() ?>

                    <div data-section="tab<?php echo $i ?>" class="tab <?=$tabClass?> || relative text-center bold <?=($i <= 1)? 'tab-active' : ''?>">
						<?=get_sub_field('tab_name')?>
					</div>

            <?php $i++; endwhile; endif; ?>

            </div>

            <div data-tabs="content" class="col-12 || clearfix">

            <?php

                /**
                 * OUTPUT TAB CONTENTS
                 */
                if( have_rows('tabs')): $i = 1; while ( have_rows('tabs')): the_row() ?>

                <?php $cols = get_sub_field('number_of_columns');

                    /**
                     * SINGLE COLUMN
                     */
                    if ($cols == 1): ?>

                        <section id="tab<?php echo $i ?>" class="tab-content || <?php echo ($i > 1) ? 'hide' : '' ?> p3">

                            <div class="wysiwyg p4">
                                <?php
                                $blockTitleCol1 = get_sub_field('col_one_title_title');?>
                                <<?=$blockTitleCol1[0]['type']['heading']?> class="pb2 <?=$blockTitleCol1[0]['size']['heading_size']?> || <?=$blockTitleCol1[0]['color']['system_text_colours']?> <?=$blockTitleCol1[0]['title_case']['system_text_transform']?>">
                                    <?=$blockTitleCol1[0]['title']?>
                                </<?=$blockTitleCol1[0]['type']['heading']?>>
                                <?=get_sub_field('col_one_title_content') ?>
                            </div>

                        </section>

                    <?php

                     /**
                     * DUAL COLUMN
                     */
                    else: ?>

                    <section id="tab<?php echo $i ?>" class="tab-content || <?php echo ($i > 1) ? 'hide' : '' ?> p4">

                        <div class="col col-12 md-col-6 p3">
                            <div class="wysiwyg">
                                <?php
                                $blockTitleCol1 = get_sub_field('col_one_title_title');?>
                                <<?=$blockTitleCol1[0]['type']['heading']?> class="pb2 <?=$blockTitleCol1[0]['size']['heading_size']?> || <?=$blockTitleCol1[0]['color']['system_text_colours']?> <?=$blockTitleCol1[0]['title_case']['system_text_transform']?>">
                                    <?=$blockTitleCol1[0]['title']?>
                                </<?=$blockTitleCol1[0]['type']['heading']?>>

                                <?=get_sub_field('col_one_title_content') ?>
                             </div>
                        </div>

                        <div class="col col-12 md-col-6 p3">
                            <div class="wysiwyg">
                                <?php
                                $blockTitleCol2 = get_sub_field('col_two_title_title');?>
                                <<?=$blockTitleCol2[0]['type']['heading']?> class="pb2 <?=$blockTitleCol2[0]['size']['heading_size']?> || <?=$blockTitleCol2[0]['color']['system_text_colours']?> <?=$blockTitleCol2[0]['title_case']['system_text_transform']?>">
                                <?=$blockTitleCol2[0]['title']?>
                            </<?=$blockTitleCol2[0]['type']['heading']?>>

                            <?=get_sub_field('col_two_title_content') ?>
                            </div>
                        </div>

                    </section>

                    <?php endif; ?>

                <?php $i++; endwhile; endif; ?>

            </div>

        </div>

    </div>

</section>
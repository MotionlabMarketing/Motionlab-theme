<?php
/**
 * TABS DOTS – LAYOUT BLOCK ------------------------
 * A dot based tab design.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

//$bgColor     = get_sub_field('profile_background_system_background_colours');
//$txtColor    = get_sub_field('block_team_text_system_text_colours');

$blockTitle  = get_sub_field('block_team_title_title');

// BACKEND NOTES – REMOVE ONCE ADDED
// Get posts from Custom Post Type.
// $membersShow – Number of Items to show.

?>


<?php
    $tabNav= 'flex flex-column';
    $tabName = 'flex';
    $tab= 'btn md-text-left border-bottom-none || mr1 px3';
    $content = 'pt4';
    $contentPad = '';

    $blockTitle  = get_sub_field($current . '_title_title');
?>

<!-- tabs - simple -->
<section class="tabs-dots || p2 md-p5 <?php echo $bgColor ?> <?php echo $txtColor ?>">

    <div class="container">

         <div class="m4 || text-center limit-p limit-p-70">

                <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
                </div>

                <div class="text-center">
                    <?=get_sub_field($current . '_content')?>
                </div>

         </div>

    </div>

    <div data-tabs="wrapper" class="container <?php echo $tabNav ?> <?php echo $measureWide ?>">

        <div class="tabs || col col-12 || mb4 <?php echo $tabName ?> || flex items-center justify-center">

            <?php if( have_rows('tabs')): $i = 1; while ( have_rows('tabs')): the_row() ?>

                    <div data-section="tab<?php echo $i ?>" class="tab || text-center bold <?=($i <= 1)? 'tab-active' : ''?>">
						<?=get_sub_field('tab_name')?>
					</div>

            <?php $i++; endwhile; endif; ?>

        </div>

        <div data-tabs="content" class="col-12 <?php echo $contentPad ?> <?php echo $txtColor ?>">

            <?php if( have_rows('tabs')): $i = 1; while ( have_rows('tabs')): the_row() ?>

                <?php $cols = get_sub_field('number_of_columns');

                    if ($cols == 1): ?>

                        <section id="tab<?php echo $i ?>" class="tab-content || <?php echo $content ?> <?php echo ($i > 1) ? 'hide' : '' ?> p4">

                            <div class="wysiwyg p4">
                                <?php
                                $blockTitleCol1 = get_sub_field('col_one_title_title');?>
                                <<?=$blockTitleCol1[0]['type']['heading']?> class="pb2 <?=$blockTitleCol1[0]['size']['heading_size']?> || <?=$blockTitleCol1[0]['color']['system_text_colours']?> <?=$blockTitleCol1[0]['title_case']['system_text_transform']?>">
                                    <?=$blockTitleCol1[0]['title']?>
                                </<?=$blockTitleCol1[0]['type']['heading']?>>
                                <?=get_sub_field('col_one_title_content') ?>
                            </div>

                        </section>

                    <?php else: ?>

                    <section id="tab<?php echo $i ?>" class="tab-content || <?php echo $content ?> <?php echo ($i > 1) ? 'hide' : '' ?> p4  || clearfix">

                        <div class="col col-12 md-col-6 p4">
                            <div class="wysiwyg">
                                <?php
                                $blockTitleCol1 = get_sub_field('col_one_title_title');?>
                                <<?=$blockTitleCol1[0]['type']['heading']?> class="pb2 <?=$blockTitleCol1[0]['size']['heading_size']?> || <?=$blockTitleCol1[0]['color']['system_text_colours']?> <?=$blockTitleCol1[0]['title_case']['system_text_transform']?>">
                                    <?=$blockTitleCol1[0]['title']?>
                                </<?=$blockTitleCol1[0]['type']['heading']?>>

                                <?=get_sub_field('col_one_title_content') ?>
                             </div>
                        </div>

                        <div class="col col-12 md-col-6 p4">
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

</section>

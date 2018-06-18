<?php
/**
 * DOT TABBED BLOCKS ---------------------------------------
 * Added dot tab block to theme.
 *
 * @author Joe Curran
 * @created 26 Feb 2018
 *
 * @version 1.00
 */

$bgImage = ($block['bgImage']['enable'] == true)? 'bg-image-active' : '';
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "tabs-dots {$bgImage}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="tabs" data-tabs="wrapper">

            <div class="tabs-bar clearfix col col-12 mt4 sm-flex items-start justify-<?=$block['tabs_settings']['tab_position']?>">

               <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <span data-section="tab<?=$i?>" data-tab="<?=$i?>" class="tab block <?=$block['tabs_settings']['tab_weight']?> text-left md-text-center relative <?=($i <= 1)? 'tab-active' : '' ?>">
                        <?=$tab['tab_title_short']?>
                    </span>

               <?php $i++; endforeach; ?>

            </div>

            <div class="content clearfix col-12" data-tabs="content">

                <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <section id="tab<?=$i?>" class="tab-content clearfix <?=($i > 1)? 'hide' : '' ?> p4"> <?php // TODO: NEEDS A BETTER SOLUTION. ?>

                        <?php if (!empty($tab['column_1']['column_content'])): ?>

                        <div class="col col-12 md-col-<?=($tab['columns'] == 2)? "6":"12"?> py4 px0 md-px4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                            <?php 
                                $heading = convert_heading($tab['column_1']['title']); 
                                render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}", ["data-mh" => "{$block['id']}-heading"]);
                                render_wysiwyg($tab['column_1']['column_content'], false);
                                render_buttons($tab['column_1']['column_buttons'], "medium", ["class" => "mt3"])
                            ?>

                        </div>

                        <?php endif; ?>

                         <?php if ($tab['columns'] > 1): ?>

                            <?php if (!empty($tab['column_2']['column_content'])): ?>

                                <div class="col col-12 md-col-6 py4 px0 md-px4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                                    <?php 
                                    $heading = convert_heading($tab['column_2']['title']); 
                                    render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}", ["data-mh" => "{$block['id']}-heading"]);
                                    render_wysiwyg($tab['column_2']['column_content'], false);
                                    render_buttons($tab['column_2']['column_buttons'], "medium", ["class" => "mt3"])
                                    ?>

                                </div>

                            <?php endif; ?>

                        <?php endif; ?>

                    </section>

                <?php $i++; endforeach; ?>

            </div>

       </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php if($block['bgImage']['enable'] == true): ?>

        <div class="bg-image absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?> <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: center; background-size: cover"></div>

    <?php endif; ?>

</section>
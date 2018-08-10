<?php
/**
 * TABS BLOCKS ---------------------------------------
 * Adds a basic tab set to the page with lots of
 * settings.
 *
 * @author Joe Curran
 * @created 26 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "tabs-basic")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>
    
    <div class="tabs" data-tabs="wrapper">

        <div class="tabs-bar clearfix col col-12 sm-flex items-start justify-<?=$block['tabs_settings']['tab_position']?><?=($block['tabs_settings']['box_radius'] == true)? " tab-border-radius":"" ?>">

            <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                <span data-section="tab<?=$i?>" class="tab block bg-white border-top border-left hover-bg-smoke <?=(count($block['tabs']) == $i)? ' border-right':''?> border-light cursor-pointer <?=$block['tabs_settings']['tab_size']?> <?=$block['tabs_settings']['tab_weight']?> relative <?=($i <= 1)? 'tab-active' : '' ?>">
                    <?=$tab['tab_title_short']?>
                </span>

            <?php $i++; endforeach; ?>

        </div>

        <div class="content clearfix <?=$block['tabs_settings']['box_bg']?><?=($block['tabs_settings']['box_borders'] == true)? ' border-left border-right border-bottom border-top border-light':''?><?=($block['tabs_settings']['box_radius'] == true)? ' border-radius-4':'' ?>" data-tabs="content">

            <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                <section id="tab<?=$i?>" class="tab-content flex items-center <?=($i > 1)? 'hide' : '' ?>">

                    <?php if (!empty($tab['column_1']['column_content'])): ?>

                        <div class="col col-12 md-col-<?=($tab['columns'] == 2)? "6":"12"?> p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                           <?php 
                           $heading = convert_heading($tab['column_1']['title']); 
                           render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}");
                           render_wysiwyg($tab['column_1']['column_content'], false);
                           render_buttons($tab['column_1']['column_buttons'], "medium", ["class" => "mt3"])
                           ?>

                        </div>

                    <?php endif; ?>

                    <?php if ($tab['columns'] > 1): ?>

                        <?php if (!empty($tab['column_2']['column_content'])): ?>

                            <div class="col col-12 md-col-6 p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                                <?php 
                                $heading = convert_heading($tab['column_2']['title']); 
                                render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}", ["data-mh" => "{$block['id']}-{$i}-heading"]);
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

</section>

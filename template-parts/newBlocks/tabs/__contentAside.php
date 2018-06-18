<?php
/**
 * CONTENT ASIDE TABS ---------------------------------------
 * Added support for pre-content to be positioned next to
 * tabs boxes.
 *
 * @author Joe Curran
 * @created 26 Feb 2018
 *
 * @version 2.00
 */
?>


<section <?=get_blockID($block)?> <?=get_blockClasses($block, "tabs-contentAside")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col col-12 md-col-6 px4 py5">

            <?php 
            render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}", ["data-mh" => "{$block['id']}-heading"]);
            render_wysiwyg($block['content'], false);
            ?>

        </div>

        <div class="col col-12 md-col-6">

            <div class="tabs" data-tabs="wrapper">

            <div class="tabs-bar clearfix col col-12 mt4 sm-flex items-start justify-<?=$block['tabs_settings']['tab_position']?>">

               <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <span data-section="tab<?=$i?>" class="tab block <?=$block['tabs_settings']['tab_weight']?> text-center sm-text-left relative <?=($i <= 1)? 'tab-active' : '' ?>">
                        <?=$tab['tab_title_short']?>
                    </span>

               <?php $i++; endforeach; ?>

            </div>

            <div class="content clearfix col-12" data-tabs="content">

                <?php $i = 1; foreach ($block['tabs'] as $tab):?>

                    <section id="tab<?=$i?>" class="tab-content clearfix <?=$block['tabs_settings']['box_bg']?> border-top border-light <?=$block['tabs_settings']['box_bg']?><?=($block['tabs_settings']['box_borders'] == true)? ' border-left border-right border-bottom':''?> || <?=($i > 1)? 'hide' : '' ?> p4">

                        <?php if (!empty($tab['column_1']['column_content'])): ?>

                        <div class="col col-12 md-col-12 p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

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

                                <div class="col col-12  p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

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

       </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

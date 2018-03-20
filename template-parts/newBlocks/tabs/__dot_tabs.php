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
?>

<section id="<?=$block['custom_id']?>" class="tabs-dots <?=($block['bgImage']['enable'] == true)? 'bg-image-active' : '';?> || relative clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>"  data-block-layout="<?=$block['layout']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="mt4 mb2 || text-center">

            <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

            <?php render_wysiwyg("{$block['intro']}", "", "|| md-mx6 md-px6  {$txtColor} || regular")?>

        </div>

       <div class="tabs" data-tabs="wrapper">

            <div class="tabs-bar clearfix || col col-12 || mt4 sm-flex items-start justify-<?=$block['tabs_settings']['tab_position']?>">

               <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <span data-section="tab<?=$i?>" class="tab || block <?=$block['tabs_settings']['tab_weight']?> text-left md-text-center relative || <?=($i <= 1)? 'tab-active' : '' ?>">
                        <?=$tab['tab_title_short']?>
                    </span>

               <?php $i++; endforeach; ?>

            </div>

            <div class="content clearfix || col-12" data-tabs="content">

                <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <section id="tab<?=$i?>" class="tab-content || <?=($i > 1)? 'hide' : '' ?> p4">

                        <?php if (!empty($tab['column_1']['column_content'])): ?>

                        <div class="col col-12 md-col-<?=($tab['columns'] == 2)? "6":"12"?> p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                            <?php $heading = convert_heading($tab['column_1']['title']); ?>
                            <?php render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}"); ?>

                            <?php render_wysiwyg("{$tab['column_1']['column_content']}", "", "|| regular")?>

                            <?php if (!empty($tab['column_1']['column_buttons'])): ?>
                                <div class="mt3">

                                    <?php foreach ($tab['column_1']['column_buttons'] as $button): ?>

                                        <a href="<?=$button['button_link']['url']?>" class="btn <?=$button['system_text_colours']?> <?=$button['system_background_colours']?>"><?=$button['button_link']['title']?></a>

                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>

                        </div>

                        <?php endif; ?>



                         <?php if ($tab['columns'] > 1): ?>

                            <?php if (!empty($tab['column_2']['column_content'])): ?>

                                <div class="col col-12 md-col-6 p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                                    <?php $heading = convert_heading($tab['column_2']['title']); ?>
                                    <?php render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}"); ?>

                                    <?php render_wysiwyg("{$tab['column_2']['column_content']}", "", "|| regular")?>

                                    <?php if (!empty($tab['column_2']['column_buttons'])): ?>
                                        <div class="mt3">

                                            <?php foreach ($tab['column_2']['column_buttons'] as $button): ?>

                                                <a href="<?=$button['button_link']['url']?>" class="btn <?=$button['system_text_colours']?> <?=$button['system_background_colours']?>"><?=$button['button_link']['title']?></a>

                                            <?php endforeach; ?>

                                        </div>
                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                        <?php endif; ?>

                    </section>

                <?php $i++; endforeach; ?>

            </div>

       </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

    <?php if($block['bgImage']['enable'] == true): ?>

        <div class="bg-image || absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?> <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: center; background-size: cover"></div>

    <?php endif; ?>

</section>
<?php
/**
 * TABS BLOCKS ---------------------------------------
 * Adds a basic tab set to the page with lots of
 * settings.
 *
 * @author Joe Curran
 * @created 26 Feb 2018
 *
 * @version 1.00
 */

//$block['tabs']                           = get_sub_field($current . '_tabs');
//$block['tabs_settings']['tab_position']  = get_sub_field($current . '_position');
//$block['tabs_settings']['tab_size']      = get_sub_field($current . '_size');
//$block['tabs_settings']['tab_weight']    = get_sub_field($current . '_weight');
//$block['tabs_settings']['box_borders']   = get_sub_field($current . '_box_borders');
//$block['tabs_settings']['box_radius']    = get_sub_field($current . '_box_radius');
//
//$block['tabs_settings']['box_bg']        = get_sub_field($current . '_box_background');
//$block['tabs_settings']['box_bg']        = $block['tabs_settings']['box_bg']['system_background_colours'];

// TODO: Add support for background images.

?>


<section <?=get_blockID($block)?> class="tabs-basic || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="tabs" data-tabs="wrapper">

        <div class="tabs-bar clearfix || col col-12 || sm-flex items-start justify-<?=$block['tabs_settings']['tab_position']?><?=($block['tabs_settings']['box_radius'] == true)? " tab-border-radius":"" ?>">

            <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                <span data-section="tab<?=$i?>" class="tab || block bg-white border-top border-left <?=(count($block['tabs']) == $i)? ' border-right':''?> border-light cursor-pointer <?=$block['tabs_settings']['tab_size']?> <?=$block['tabs_settings']['tab_weight']?> relative || <?=($i <= 1)? 'tab-active' : '' ?>">
                    <?=$tab['tab_title_short']?>
                </span>

                <?php $i++; endforeach; ?>

        </div>

        <div class="content clearfix  <?=$block['tabs_settings']['box_bg']?><?=($block['tabs_settings']['box_borders'] == true)? ' border-left border-right border-bottom border-top border-light':''?><?=($block['tabs_settings']['box_radius'] == true)? ' border-radius-4':'' ?>" data-tabs="content">

            <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                <section id="tab<?=$i?>" class="tab-content || <?=($i > 1)? 'hide' : '' ?>">

                    <?php if (!empty($tab['column_1']['column_content'])): ?>

                        <div class="col col-12 md-col-<?=($tab['columns'] == 2)? "6":"12"?> p4 <?=$tab['column_1']['align']?> <?=$tab['column_1']['system_text_colours']?>">

                            <?php
                            $blockTitle = $tab['column_1']['title'];
                            if (!empty($blockTitle[0]['title'])) {
                                include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); }
                            ?>

                            <div class="wysiwyg">

                                <?=$tab['column_1']['column_content']?>

                            </div>

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

                                <?php
                                $blockTitle = $tab['column_2']['title'];
                                if (!empty($blockTitle[0]['title'])) {
                                    include(BLOCKS_DIR . 'sub-elements/_block_titles.php'); }
                                ?>

                                <div class="wysiwyg">

                                    <?=$tab['column_2']['column_content']?>

                                </div>

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

</section>

<?php

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "tabs-employer")?> <?=get_blockData($block)?>>

    <div class="container">

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col col-12 p2 md-p4" data-tabs="wrapper">

            <div class="tabs col col-12 mb0 flex items-start justify-<?=$block['tabs_settings']['tab_position']?>">

                <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <span data-section="tab<?=$i?>" class="tab block text-center bg-white border-top border-left <?=(count($block['tabs']) == $i)? ' border-right':''?> border-2 border-smoke cursor-pointer <?=$block['tabs_settings']['tab_size']?> <?=$block['tabs_settings']['tab_weight']?> relative <?=($i <= 1)? 'tab-active' : '' ?>">
                        <?=$tab['tab_title']?>
                    </span>

                <?php $i++; endforeach; ?>

            </div>

            <div data-tabs="content" class="clearfix border-top border-left border-right border-bottom border-2 border-smoke <?=$block['tabs_settings']['box_bg']?>">

                <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                    <section id="tab<?=$i?>" class="tab-content p2 <?=($i > 1)? 'hide' : '' ?>">
                    
                        <div class="col col-12 md-col-6 p4">

                            <?php
                            render_heading( "{$tab['tab_title']}", "h3", "h3", "brand-primary", "normal", ["class" => "mb0", "data-mh" => "{$block['id']}-heading"]);
                            render_wysiwyg($tab['col1_content'], false);
                            ?>

                        </div>

                        <div class="col col-12 md-col-6 px4">

                            <?php foreach ($tab['block'] as $item): ?>
                                <div class="p4 border-light border-bottom">

                                    <p class="mr3 h1 mt3 mb0 mtn1 md-mtn3 md-inline-block md-left"><?=$item['icon']?></p>
                                    
                                    <?php 
                                        $heading = convert_heading($item['title']);
                                        render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}", ["data-mh" => "{$block['id']}-heading"]);
                                        render_wysiwyg($item['content'], false, ["class" => "clearfix"]);
                                        
                                        // TODO: Update Button to using correct include for the button function.
                                        $item['button']['button_link'] = $item['link_url'];
                                        $item['button']['system_text_colours'] = "white";
                                        $item['button']['system_background_colours'] = "bg-brand-primary";
                                        render_button($item['button'], 'medium');
                                    ?>

                                </div>
                            <?php endforeach; ?>

                        </div>
                        
                    </section>

                <?php $i++; endforeach; ?>

            </div>

        </div>

    </div>

</section>

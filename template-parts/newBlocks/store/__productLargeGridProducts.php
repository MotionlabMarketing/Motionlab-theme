<?php
/**
 * STORE BLOCK – FEATURED PRODUCTS GRID LARGE ---------------------------------------
 * This block outputs a grid of products onto the page.
 *
 * @author Joe Curran
 * @created 26 Mar 2018
 *
 * @version 1.00
 */

// TODO: NEEDS TO WORK KARL! GET IT DONE! DO IT :D

// TODO: BUG: Match Height has a problem with the second tab matching.

$selected_products = get_sub_field('block_store_products');

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="clearfix col-12">

            <?php if ($block['enable_tabs']): ?>

                <div data-tabs="wrapper">

                    <div data-element="tabs" class="col col-12 sm-flex items-center justify-center mb5">

                        <?php $i = 0; foreach ($block['tabs'] as $tab): ?>

                            <span data-section="tab<?=$i?>" class="block text-center bold bg-smoke border-top border-left border-bottom <?=(count($block['tabs']) == $i)? ' border-right':''?> border-light cursor-pointer py2 px5 relative <?=($i <= 0)? 'tab-active' : '' ?>">
                                <?=$tab['category_title']?>
                            </span>

                        <?php $i++; endforeach; ?>

                    </div>

                    <div class="clearfix" data-tabs="content">

                        <?php $i = 0; foreach ($block['tabs'] as $tab): ?>

                            <section id="tab<?=$i?>" class="clearfix <?=($i > 0)? 'hide' : '' ?>">

                                <?php

                                    //The first product in the list will be the "caravan/motorhome of the month. $i-1 because tabs are indexed at 1 whereas post are at 0"
                                    $cotm = array_shift($selected_products[$i]['items']);
                                    $prefix = $cotm->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                    $title  = get_the_title($cotm->ID);
                                    $price  = get_field($prefix.'_details_price', $cotm->ID);
                                    if (is_array($prefix.'_details_specifications'))
                                        $specs  = array_slice(get_field($prefix.'_details_specifications', $cotm->ID), 0, 4);
                                ?>

                                <div class="col col-12 md-col-5 relative">

                                        <div class="product-item p4 mr3 text-center mb4 ml2 box-shadow-2 flex items-center" data-mh="product-size-tab<?=$i?>">

                                            <div>

                                                <?=render_attachment_image("8200", ['180', '300'], false,  ["class" => "mt5 mb5 mx-auto"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>

                                                <div class="flex items-center justify-center">
                                                    <?=render_attachment_image("8199", "large", false,  ["class" => "mb4"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                                </div>

                                                <h3><?=$title?></h3>

                                                <?php if (!empty($specs)): ?>

                                                  <ul class="list-reset border-last-right-none">
                                                      <?php foreach($specs as $spec) : ?>
                                                          <li class="inline border-right px2"><?=get_term($spec)->name?></li>
                                                      <?php endforeach; ?>
                                                  </ul>

                                                <?php endif; ?>

                                                <p><strong><span class="brand-primary h2">£<?=number_format($price)?></span></strong></p>

                                                <?php

                                                $button['button_link']['url']        = get_permalink($cotm->ID);
                                                $button['button_link']['title']      = "View " . ucwords($prefix);
                                                $button['system_text_colours']       = "white";
                                                $button['system_background_colours'] = "transparent";

                                                ?>

                                                <?php render_button($button, "medium", ["class" => "bold bg-brand-secondary hover-white", "style" => "margin-bottom: 1.3rem"]) ?>

                                            </div>

                                        </div>

                                </div>

                                <div class="col col-12 md-col-7" data-mh="product-size-tab<?=$i?>">

                                    <?php $a = 0; foreach($selected_products[$i]['items'] as $selected_product): ?>

                                        <?php
                                            $prefix = $selected_product->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                            $title  = get_the_title($selected_product->ID);
                                            $price  = get_field($prefix.'_details_price', $selected_product->ID);
                                            $berth  = get_field($prefix.'_details_berth', $selected_product->ID);
                                        ?>

                                        <div class="col col-12 sm-col-6 md-col-4 pl3 pr3 <?=($a < 3)? "mb5" : ""?>">

                                            <div class="product-item col p4 text-center box-shadow-2" data-mh="product-item">

                                                <h3 class="h4 bold" data-mh="title"><?=$title?></h3>

                                                <div class="flex items-center justify-center" data-mh="product-item-image">
                                                    <?=render_attachment_image("8199", "medium", false,  ["class" => ""])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                                </div>

                                                <p class="mb2 bold"><?=$berth?> Berth</p>

                                                <p><strong><span class="brand-primary" data-element="price" style="font-size: 1.2rem">£<?=number_format($price)?></span></strong></p>

                                                <?php

                                                    // NEEDS TO BE ABLE TO THE CHANGE THE VALUE FROM 'RANGE' OR 'CARAVAN/MOTORHOME' //
                                                    $button['button_link']['url']        = get_permalink($selected_product->ID);
                                                    $button['button_link']['title']      = "View " . ucwords($prefix);
                                                    $button['system_text_colours']       = "white";
                                                    $button['system_background_colours'] = "transparent";

                                                    ?>

                                                <?php render_button($button, "medium", ["class" => "bold bg-brand-secondary hover-white py1 px2"]) ?>

                                            </div>

                                        </div>

                                    <?php $a++; endforeach; ?>
                                </div>

                            </section>

                        <?php $i++; endforeach; ?>

                    </div>

                </div>

            <?php else: ?>

                <div class="clearfix" data-tabs="content">

                    <?php $i = 0; ?>

                        <section id="tab<?=$i?>" class="clearfix <?=($i > 0)? 'hide' : '' ?>">

                            <?php

                                //The first product in the list will be the "caravan/motorhome of the month. $i-1 because tabs are indexed at 1 whereas post are at 0"
                                $cotm = array_shift($selected_products[$i]['items']);
                                $prefix = $cotm->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                $title  = get_the_title($cotm->ID);
                                $price  = get_field($prefix.'_details_price', $cotm->ID);
                                if (is_array($prefix.'_details_specifications'))
                                    $specs  = array_slice(get_field($prefix.'_details_specifications', $cotm->ID), 0, 4);
                            ?>

                            <div class="col col-12 md-col-5 relative">

                                    <div class="product-item p4 mr3 text-center mb4 ml2 box-shadow-2 flex items-center" data-mh="product-size-tab<?=$i?>">

                                        <div>

                                            <?=render_attachment_image("8200", ['180', '300'], false,  ["class" => "mt5 mb5 mx-auto"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>

                                            <div class="flex items-center justify-center">
                                                <?=render_attachment_image("8199", "large", false,  ["class" => "mb4"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                            </div>

                                            <h3><?=$title?></h3>

                                            <?php if (!empty($specs)): ?>

                                              <ul class="list-reset border-last-right-none">
                                                  <?php foreach($specs as $spec) : ?>
                                                      <li class="inline border-right px2"><?=get_term($spec)->name?></li>
                                                  <?php endforeach; ?>
                                              </ul>

                                            <?php endif; ?>

                                            <p><strong><span class="brand-primary h2">£<?=number_format($price)?></span></strong></p>

                                            <?php

                                            $button['button_link']['url']        = get_permalink($cotm->ID);
                                            $button['button_link']['title']      = "View " . ucwords($prefix);
                                            $button['system_text_colours']       = "white";
                                            $button['system_background_colours'] = "transparent";

                                            ?>

                                            <?php render_button($button, "medium", ["class" => "bold bg-brand-secondary hover-white", "style" => "margin-bottom: 1.3rem"]) ?>

                                        </div>

                                    </div>

                            </div>

                            <div class="col col-12 md-col-7" data-mh="product-size-tab<?=$i?>">

                                <?php $a = 0; foreach($selected_products[$i]['items'] as $selected_product): ?>

                                    <?php
                                        $prefix = $selected_product->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                        $title  = get_the_title($selected_product->ID);
                                        $price  = get_field($prefix.'_details_price', $selected_product->ID);
                                        $berth  = get_field($prefix.'_details_berth', $selected_product->ID);
                                    ?>

                                    <div class="col col-12 sm-col-6 md-col-4 pl3 pr3 <?=($a < 3)? "mb5" : ""?>">

                                        <div class="product-item col p4 text-center box-shadow-2" data-mh="product-item">

                                            <h3 class="h4 bold" data-mh="title"><?=$title?></h3>

                                            <div class="flex items-center justify-center" data-mh="product-item-image">
                                                <?=render_attachment_image("8199", "medium", false,  ["class" => ""])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                            </div>

                                            <p class="mb2 bold"><?=$berth?> Berth</p>

                                            <p><strong><span class="brand-primary" data-element="price" style="font-size: 1.2rem">£<?=number_format($price)?></span></strong></p>

                                            <?php

                                                // NEEDS TO BE ABLE TO THE CHANGE THE VALUE FROM 'RANGE' OR 'CARAVAN/MOTORHOME' //
                                                $button['button_link']['url']        = get_permalink($selected_product->ID);
                                                $button['button_link']['title']      = "View " . ucwords($prefix);
                                                $button['system_text_colours']       = "white";
                                                $button['system_background_colours'] = "transparent";

                                                ?>

                                            <?php render_button($button, "medium", ["class" => "bold bg-brand-secondary hover-white py1 px2"]) ?>

                                        </div>

                                    </div>

                                <?php $a++; endforeach; ?>
                            </div>

                        </section>

                </div>
                <?php endif; ?>

        </div>

        <?php if (!empty($block['pageLink'])): ?>
            <div class="text-center mt4" data-element="pageButton">
                <?php render_button($block['pageLink'], "large", ["class" => "bold"]) ?>
            </div>
        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

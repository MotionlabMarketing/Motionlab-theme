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

                                    // NOTE:The first product in the list will be the "caravan/motorhome of the month. $i-1 because tabs are indexed at 1 whereas post are at 0"
                                    $cotm = array_shift($selected_products[$i]['items']);
                                    $prefix = $cotm->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                    $title  = get_the_title($cotm->ID);
                                    $price  = get_field($prefix.'_details_price', $cotm->ID);
                                    $old_price  = get_field($prefix.'_details_old_price', $cotm->ID);
                                    $berth  = get_field($prefix.'_details_berth', $cotm->ID);

                                    $feature        = get_field($prefix.'_details_feature_image', $cotm->ID);
                                    $feature_image = get_field('image', $feature->ID);
                                    
                                    if (empty($feature_image) && !empty($feature)) {
                                        $feature_image  = array_slice($feature_image, 0, 1);
                                    }

                                    $brand = get_the_terms($cotm->ID, 'makes');
                                    $brand_image = get_field('taxonomy_image', 'term_'.$brand[0]->term_id);
                                    if (is_array(get_field($prefix.'_details_specifications', $cotm->ID))) {
                                        $specs  = array_slice(get_field($prefix.'_details_specifications', $cotm->ID), 0, 4);
                                    }
                                    ?>

                                    <div class="col col-12 md-col-5 relative">

                                        <div class="product-item p4 mr3 text-center b4 ml2 box-shadow-2 flex items-center justify-center" data-mh="product-size-tab<?=$i?>">

                                            <div>

                                                <div class="flex items-center justify-center">
                                                    <?php if (!empty($feature_image)) :
                                                        foreach ($feature_image as $image):
                                                            render_attachment_image($image, "large", false, ["class" => "inline-block mb2"]);
                                                        endforeach;
                                                    endif;?>
                                                </div>
                                                
                                                <?=render_attachment_image($brand_image, "small", false, ["class" => "brand-logo mx-auto sixe-90x90"])?>

                                                <h3><?=$title?></h3>

                                                <p class="mt1 mb2 bold"><?=$berth?> Berth</p>

                                                <?php if (!empty($specs)): ?>

                                                    <ul class="list-reset border-last-right-none h5">
                                                        <?php foreach ($specs as $spec) : ?>
                                                            <li class="inline border-right px2"><?=get_term($spec)->name?></li>
                                                        <?php endforeach; ?>
                                                    </ul>

                                                <?php endif; ?>

                                                <?php if (!empty($old_price)): ?>
                                                    <p class="brand-primary h2" data-mh="price">
                                                        Old price: <strike>£<?=number_format($old_price)?></strike>
                                                        <span class="bold block">Save £<?=number_format($old_price - $price)?></span>
                                                        <strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong>
                                                    </p>
                                                <?php else: ?>
                                                    <p data-mh="price"><strong><span class="brand-primary h2">£<?=number_format($price)?></span></strong></p>
                                                <?php endif; ?>

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

                                        <?php $a = 0; foreach ($selected_products[$i]['items'] as $selected_product): ?>

                                            <?php
                                            $prefix     = $selected_product->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                            $title      = get_the_title($selected_product->ID);
                                            $price      = get_field($prefix.'_details_price', $selected_product->ID);
                                            $old_price  = get_field($prefix.'_details_old_price', $selected_product->ID);
                                            $berth      = get_field($prefix.'_details_berth', $selected_product->ID);

                                            $feature        = get_field($prefix.'_details_feature_image', $selected_product->ID);
                                            $feature_image  = get_field('image', $feature->ID);

                                            if (empty($feature_image) && !empty($feature)) {
                                                $feature_image  = array_slice($feature_image, 0, 1);
                                            }

                                            ?>

                                            <div class="col col-12 sm-col-6 md-col-4 pl3 pr3 <?=($a < 3)? "mb5" : ""?>">

                                                <div class="product-item col p4 text-center box-shadow-2" data-mh="product-item">

                                                    <h3 class="h4 bold" data-mh="title"><?=$title?></h3>

                                                    <div class="flex items-center justify-center" data-mh="product-item-image">
                                                        <?php if (!empty($feature_image)) :
                                                            foreach ($feature_image as $image):
                                                                render_attachment_image($image, ["260", "120"], false, ["class" => "inline-block mb2"]);
                                                            endforeach;
                                                        endif;?>
                                                    </div>

                                                    <p class="mb2 bold"><?=$berth?> Berth</p>

                                                    <?php if (!empty($old_price)): ?>
                                                        <p class="brand-primary h4" data-mh="price">
                                                            <small>Old price: <strike>£<?=number_format($old_price)?></strike>
                                                            <?php /* <span class="bold block">Save £<?=number_format($old_price - $price)?></span> */ ?>
                                                            <strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong>
                                                        </p>
                                                    <?php else: ?>
                                                        <p data-mh="price"><strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong></p>
                                                    <?php endif; ?>

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

                                    $title          = get_the_title($cotm->ID);
                                    $price          = get_field($prefix.'_details_price', $cotm->ID);
                                    $berth          = get_field($prefix.'_details_berth', $cotm->ID);

                                    $feature        = get_field($prefix.'_details_feature_image', $cotm->ID);
                                    $feature_image = get_field('image', $feature->ID);

                                    $brand = get_the_terms($cotm->ID, 'makes');
                                    $brand_image = get_field('taxonomy_image', 'term_'.$brand[0]->term_id);

                                    if (is_array(get_field($prefix.'_details_specifications', $cotm->ID))) {
                                        $specs  = array_slice(get_field($prefix.'_details_specifications', $cotm->ID), 0, 4);
                                    }
                                    ?>

                                    <div class="col col-12 md-col-5 relative">

                                        <div class="product-item p4 mr3 text-center mb4 ml2 box-shadow-2 flex items-center" data-mh="product-size-tab<?=$i?>">

                                            <div>

                                                <div class="flex items-center justify-center">
                                                    <?php if (!empty($feature_image)) :
                                                        foreach ($feature_image as $image):
                                                            render_attachment_image($image, "large", false, ["class" => "inline-block"]);
                                                        endforeach;
                                                    endif;?>
                                                </div>

                                                <?=render_attachment_image($brand_image, "small", false, ["class" => "brand-logo mx-auto sixe-90x90"])?>

                                                <h3><?=$title?></h3>

                                                <p class="mb2 bold"><?=$berth?> Berth</p>

                                                <?php if (!empty($specs)): ?>

                                                    <ul class="list-reset border-last-right-none h5">
                                                        <?php foreach ($specs as $spec) : ?>
                                                            <li class="inline border-right px2"><?=get_term($spec)->name?></li>
                                                        <?php endforeach; ?>
                                                    </ul>

                                                <?php endif; ?>

                                                <?php if (!empty($old_price)): ?>
                                                    <p class="brand-primary h4" data-mh="price">
                                                        Old price: <strike>£<?=number_format($old_price)?></strike>
                                                        <span class="bold block">Save £<?=number_format($old_price-$price)?></span>
                                                        <strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong>
                                                    </p>
                                                    <?php else: ?>
                                                        <p data-mh="price"><strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong></p>
                                                    <?php endif; ?>

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

                                        <?php $a = 0; foreach ($selected_products[$i]['items'] as $selected_product): ?>

                                            <?php
                                            $prefix = $selected_product->post_type == 'caravans' ? 'caravan' : 'motorhome';

                                            $title  = get_the_title($selected_product->ID);
                                            $price  = get_field($prefix.'_details_price', $selected_product->ID);
                                            $berth  = get_field($prefix.'_details_berth', $selected_product->ID);

                                            $feature        = get_field($prefix.'_details_feature_image', $selected_product->ID);
                                            $feature_image  = get_field('image', $feature->ID);

                                            if (empty($feature_image) && !empty($feature)) {
                                                $feature_image  = array_slice($feature_image, 0, 1);
                                            }

                                            ?>

                                            <div class="col col-12 sm-col-6 md-col-4 pl3 pr3 <?=($a < 3)? "mb5" : ""?>">

                                                <div class="product-item col p4 text-center box-shadow-2" data-mh="product-item">

                                                    <h3 class="h4 bold" data-mh="title"><?=$title?></h3>

                                                    <div class="flex items-center justify-center" data-mh="product-item-image">
                                                        <?php if (!empty($feature_image)):
                                                            foreach ($feature_image as $image):
                                                                render_attachment_image($image, ["260", "120"], false, ["class" => "inline-block"]);
                                                            endforeach;
                                                        endif;?>
                                                    </div>

                                                    <p class="mt1 mb2 bold"><?=$berth?> Berth</p>

                                                    <?php if (!empty($old_price)): ?>
                                                        <p class="brand-primary h4" data-mh="price">
                                                            Old price: <strike>£<?=number_format($old_price)?></strike>
                                                            <span class="bold block">Save £<?=number_format($old_price-$price)?></span>
                                                            <strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong>
                                                        </p>
                                                    <?php else: ?>
                                                        <p data-mh="price"><strong><span class="brand-primary h3">£<?=ltrim(number_format($price), "-")?></span></strong></p>
                                                    <?php endif; ?>
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
<script>
    $('[data-block-layout="productLargeGridProducts"] [data-element="tabs"] span').on('click', function() {
        setTimeout(function () {

            $.fn.matchHeight._apply('[data-mh="product-item"]');
            $.fn.matchHeight._apply('[data-mh="product-item-image"]');

            $.fn.matchHeight._apply('[data-mh="product-size-tab1"]');
            $.fn.matchHeight._apply('[data-mh="product-size-tab2"]');

        }, 300);
    });
</script>

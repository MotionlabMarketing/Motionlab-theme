<?php
/**
 * STORE – BASIC LAYOUT BLOCK ------------------------
 * A basic listing layout for some of the products.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */


// TODO: Needs to check if this should load on of the following options: Latest Products (latestProducts_all), Latest In Range (latestProducts_range), Selected (selectedProducts).
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "team-basic")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : '' ?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="flex flex-wrap justify-center mxn2 mb4">

        <?php $i = 0; while($i < $block['itemsCount']): ?>

            <div class="product col col-grid-5 p3" data-mh="product-box">

                <a href="#"> <?php // TODO: LINK TO ITEM PAGE. ?>

                    <div class="member py5 px2 box-shadow-2">

                        <?=render_heading("Product Title", "h4", "h4", "", "", ["class" => "mb0 grey"])?>

                        <?=render_attachment_image("8199", "large", false, ["class" => "mb2"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>

                        <p class="mb0 h3"><span class="brand-primary" data-element="price"><strong>£18,685</strong></span></p>

                        <p class="mb2 bold grey">2 Berth</p>

                        <?php
                        // NEEDS TO BE ABLE TO THE CHANGE THE VALUE FROM 'RANGE' OR 'CARAVAN/MOTORHOME' //
                        $button['button_link']['url']        = "#";
                        $button['button_link']['title']      = "View Caravan";
                        $button['system_text_colours']       = "white";
                        $button['system_background_colours'] = "transparent";

                        render_button($button, "medium", ["class" => "bold bg-brand-secondary hover-white py1 px2"]) ?>


                    </div>

                </a>

            </div>

        <?php $i++; endwhile; ?>

    </div>

    <?php if (!empty($block['pageLink'])): ?>
        <div class="text-center mtn2" data-element="pageButton">
            <?php render_button($block['pageLink'], "medium", ["class" => "bold"]) ?>
        </div>
    <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

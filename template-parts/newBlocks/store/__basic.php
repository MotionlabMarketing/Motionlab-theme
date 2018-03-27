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

    <div class="flex flex-wrap justify-center mxn2">

        <?php $i = 0; while($i < 5): ?>

            <div class="product-box col col-grid-5 p3 hover-zoom" data-mh="product-box">

                <a href="<?=get_permalink($post->ID)?>">

                    <div class="member py5 px2 box-shadow-3 zoom">

                        <?php render_heading("Product Title", "h4", "h4", "", "", ["class" => "mb0 black"]) ?>

                        <?php $image_url = isset(get_field("staff_profileImage", $post->ID)['url']) ? get_field("staff_profileImage", $post->ID)['url'] : get_template_directory_uri() . '/assets/img/store-placeholder.jpg'; ?>
                        <div class="profile || mb2" style="background: url('<?=$image_url;?>'); background-position: center; background-size: cover;" data-mh="product-box-img"></div>

                        <p class="mb0"><strong><span class="brand-primary" data-element="price">£18, 685</span></strong></p>

                        <p class="mb2 bold">2 Berth</p>

                        <a href="" class="btn btn-primary">VIew Caravan</a>

                    </div>

                </a>

            </div>

        <?php $i++; endwhile; ?>

    </div>

    <?php if (!empty($block['page_button']['button_link']['url'])): ?>

        <div class="page-button || mt4 mb4 clearfix || text-center">

            <a href="<?=$block['page_button']['button_link']['url']?>" class="btn btn-outline btn-large <?=$block['page_button']['system_text_colours']?> <?=$block['page_button']['system_background_colours']?>"><?=$block['page_button']['button_link']['title'];?></a>

        </div>

    <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

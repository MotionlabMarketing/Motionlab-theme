<?php
/**
 * PRODUCT BLOCK: SLIDING PANELS ---------------------------------------
 * This block outputs a number of products onto the page which can be
 * clicked thought.
 *
 * @author Joe Curran
 * @created 12 Mar 2018
 *
 * @version 2.00
 */

?>
<section id="<?=$block['custom_id']?>" class="product-slidingPanels clearfix relative <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="filters || col-12 py3">

            <form action="#" class="width-100 || flex justify-center">

                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                    <option value="title">By Type</option>
                </select>

                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                    <option value="title">By Colour</option>
                </select>

            </form>

        </div>

        <div class="col-12 mt4 px6">


            <div data-slick="storeSlidingPanels-slider">

                <?php $i = 0; while ($i < 10): ?>

                    <div class="panels || col col-grid-5 p3">

                        <div class="panel || bg-grey mb3">
                            <img src="<?=wp_get_attachment_image_url(7910, 'large', '', ['class' => ''])?>">
                        </div>

                        <div class="data text-center">
                            <p class="name || h3-responsive brand-primary mb1">Door Name Here</p>
                            <p class="price || h4 brand-base">From only £200.00</p>
                        </div>

                    </div>

                <?php $i++; endwhile; ?>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<style>



</style>
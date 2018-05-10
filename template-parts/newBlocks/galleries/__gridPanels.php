<?php
/**
 * GALLERY BLOCK: GRID PANEL --------------------------------------
 * A gallery block that shows a panel grid of 4 by 2 which can be
 * navigated.
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "px6")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="container clearfix || gallery item-slider p2">

        <div data-slick="galleryGridPanels-slider">

            <?php
            $i = 0;
            $collection = get_sub_field($current . '_collection');
            $args = array(
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'post_type' => 'gallery',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'collections',
                        'terms' => $collection
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();  $image = get_field('image'); ?>

            <?php if ($i === 0): ?><div class="panel-holder"><?php endif; ?>

                <a href="<?=resize_attachment_image($image['url'], 900, 700, true)?>" class="col col-6 md-col-3 p1" data-image="<?=$i?>">
                    <img src="<?=resize_attachment_image($image['url'], 300, 250, true)?>" class="" alt="<?=$image['alt']?>">
                </a>

            <?php $i++; if ($i > 7) { echo "</div>"; $i = 0; }?>

            <?php endwhile; endif; wp_reset_postdata(); ?>

        </div>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

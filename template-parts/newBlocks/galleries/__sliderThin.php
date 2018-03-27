<?php
/**
 * GALLERY BLOCK --------------------------------------
 * A gallery block that allow you to add a thin gallery
 * to the page.
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "gallery")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php if (!empty($blockTitle[0]['title'])): ?>

            <div class="container clearfix">

                <div class="col-12 || mb5 || text-center">

                    <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

                        <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

                        <?php render_wysiwyg("{$block['intro']}", "", " || regular")?>

                    </div>

                </div>

            </div>

        <?php endif; ?>


        <div class="container clearfix || gallery item-slider">

            <div data-slick="galleryThin-slider">

            <?php
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
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                $image = get_field('image');
                ?>

                <a href="<?=$image['url']?>" style="margin: 0 5px">
                    <img src="<?=$image['url']?>" class="js-match-height" alt="">
                </a>

            <?php endwhile; endif; wp_reset_postdata(); ?>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
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

<section id="<?=$block['custom_id']?>" class="gallery || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>


        <?php if (!empty($blockTitle[0]['title'])): ?>

            <div class="container clearfix">

                <div class="col-12 || mb5 || text-center">

                    <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

                        <?php
                        if (!empty($blockTitle[0]['title'])) {
                            include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                        <div class="wysiwyg h4 limit-p limit-p-70">
                            <?=get_field('page_introduction')?>
                        </div>

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
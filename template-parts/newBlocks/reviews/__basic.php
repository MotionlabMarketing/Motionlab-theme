<?php
/**
 * BASIC REVIREW BLOCK ---------------------------------------
 * This block will output the three most recent reviews onto
 * the page.
 *
 * @author Joe Curran
 * @created 15 Feb 2018
 *
 * @version 1.00
 */

$blockTitle  = get_sub_field($current . '_title_title');
?>

<section id="<?=$block['custom_id']?>" class="clearfix relative || <?= $block['spacing'] ?> <?= $block['padding'] ?> <?= $block['background']['colour'] ?> <?= $block['border']['sides'] ?> <?= $block['border']['size'] ?> <?= $block['border']['colour'] ?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

        <?php  if (!empty($blockTitle[0]['title']) || !empty(get_sub_field('block_pods_content'))): ?>
        <div class="m4 mb5 || text-center">

            <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
            </div>

            <div class="text-center limit-p limit-p-80">
                <?=get_sub_field('block_pods_content')?>
            </div>

        </div>
        <?php endif; ?>

        <?php
        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'post_type' => 'reviews'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <div class="col col-12 md-col-4 text-center">

                <div class="p3">

                    <div class="mb4">
                        <?= get_stars(get_field('star_rating')) ?>
                    </div>

                    <div class="wysiwyg mb3 mx5">
                        <?= get_field('reviewer_body'); ?>
                    </div>

                    <h4 class="h4 mb0 brand-primary bold"><?= get_field('reviewer_name') ?></h4>
                    <p class="h4 brand-primary"><?= get_field('reviewer_locations') ?></p>

                </div>

            </div>

        <?php endwhile; endif;
        wp_reset_postdata(); ?>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>

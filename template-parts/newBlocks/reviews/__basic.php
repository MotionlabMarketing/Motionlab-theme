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

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <?php foreach($block['posts']->posts as $post): ?>

        <div class="col col-12 md-col-6 lg-col-4 mt5 px2 text-center">

            <div class="p5 bg-smoke" data-mh="testimonial">

                <?php
                  if ($block['include_stars'] == true):
                    echo '<div class="mt2 mb4">';
                      echo get_stars(get_field('star_rating', $post->ID));
                    echo '</div>';
                  endif;
                ?>

                <div class="wysiwyg mb3 mx5" data-mh="quote">
                    <?= get_field('reviewer_body', $post->ID); ?>
                </div>

                <hr class="my4">

                <h3 class="h4 brand-primary text-center mb1"><?= get_field('reviewer_name', $post->ID) ?></h3>

                <p class="text-center mb0"><?=get_field('reviewer_locations', $post->ID)?></p>

            </div>

        </div>

    <?php endforeach; ?>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>

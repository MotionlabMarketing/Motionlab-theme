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

 switch ($block['review_columns']):
     case "1":
         $block['review_columns'] = "col-12";
         break;
     case "2":
         $block['review_columns'] = "col-12 md-col-6";
         break;
     case "3":
         $block['review_columns'] = "col-12 sm-col-12 md-col-4";
         break;
 endswitch;

?>



<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <?php $i = 1; foreach ($block['posts']->posts as $post):
        $content = get_shorten_string(get_field('reviewer_body', $post->ID), 35); ?>


        <div class="col col <?=$block['review_columns']?> mt5 px2 text-center <?=($i > 2)? "block sm-display-none lg-block":"" ;?>">

            <div class="p5 bg-smoke" data-mh="testimonial">

                <?php
                  if ($block['include_stars'] == true):
                    echo '<div class="mt2 mb4">';
                      echo get_stars(get_field('star_rating', $post->ID));
                    echo '</div>';
                  endif;
                ?>

                <div class="wysiwyg mb3 mx5" data-mh="quote">
                    <?= $content->value; ?>
                </div>

                <hr class="my4">

                <h3 class="h4 brand-primary text-center mb1"><?=(!empty($name = get_field('reviewer_name', $post->ID)))? $name : "Anonymous" ?></h3>

                <p class="text-center mb0"><?=get_field('reviewer_locations', $post->ID)?></p>

            </div>

        </div>

    <?php $i++; endforeach; ?>

    <div class="clearfix col-12 text-center">
        <a href="<?=the_permalink(get_field('page_for_reviews', 'option')->ID)?>" class="btn btn-medium bg-brand-primary white my5 mx4">View All</a>
    </div>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>

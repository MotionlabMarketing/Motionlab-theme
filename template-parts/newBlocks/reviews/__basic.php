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

$block['columns']   = get_sub_field('block_reviews_columns');

switch ($block['columns']):
    case "1":
        $block['columns'] = "col-12";
        break;
    case "2":
        $block['columns'] = "col-12 md-col-6";
        break;
    case "3":
        $block['columns'] = "col-12 sm-col-12 md-col-4";
        break;
endswitch; ?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container') ? '<div class="container">' : ""?>

    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <div class="clearfix mxn4">
        <?php $i = 1; foreach ($block['posts']->posts as $post):
            $content = get_shorten_string(strip_tags(get_field('reviewer_body', $post->ID)), 35); ?>

            <div class="col col-12 md-col-6 lg-col-4 px3 text-center <?=($i > 2)? "block sm-display-none lg-block":"" ;?>">

                <div class="col <?=$block['columns']?> mt5 px2 text-center">

                    <div class="p5 <?=($block['include_background'])? "bg-smoke":"";?> <?=($block['include_border'])? "border-1 border-left border-right border-top border-bottom border-light":"";?>" data-mh="testimonial">

                        <?php
                        if ($block['include_stars'] == true):
                            echo '<div class="mt2 mb4 h3">';
                            echo get_stars(get_field('star_rating', $post->ID));
                            echo '</div>';
                        endif;

                        render_wysiwyg($content->value, false, ["data-mh" => "quote"]);
                        ?>

                        <hr class="my4">

                        <h3 class="h4 brand-primary text-center mb1"><?=(!empty($name = get_field('reviewer_name', $post->ID)))? $name : "Anonymous" ?></h3>

                        <?php if(!empty(get_field('reviewer_locations', $post->ID))): ?>
                            <p class="text-center mb0"><?=get_field('reviewer_locations', $post->ID)?></p>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

        <?php $i++; endforeach; ?>
    </div>

    <div class="clearfix md-flex items-center justify-center mt4">

        <?php render_button($block['page_button'], 'medium'); ?>

    </div>

    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>

</section>

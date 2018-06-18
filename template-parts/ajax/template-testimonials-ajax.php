<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 05/04/18
 * Time: 10:52
 */

$block['include_stars'] = get_field('template_testimonials_include_stars');
$block['include_border'] = get_field('template_testimonials_include_border');
$block['include_background'] = get_field('template_testimonials_include_background');?>

<div class="grid-sizer"></div>

<?php foreach($testimonials['posts']->posts as $post):
      $content = get_shorten_string(get_field('reviewer_body', $post->ID), 35); ?>

    <div class="col col-12 md-col-6 lg-col-4 grid-item mt5 px4 text-center">

            <div class="p5 <?=($block['include_background'])? "bg-smoke":"";?> <?=($block['include_border'])? "border-1 border-left border-right border-top border-bottom border-light":"";?>">

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
<?php endforeach; ?>

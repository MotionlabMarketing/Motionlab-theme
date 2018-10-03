<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 05/04/18
 * Time: 10:52
 */
$showStars = get_field('template_reviews_show_stars', $_POST['post_id']); ?>

<div class="grid-sizer"></div>

<?php foreach($testimonials['posts']->posts as $post): ?>
    <div class="col col-4 grid-item" id="">

        <div class="m3 bg-smoke text-center">

            <div class="content px3 pt4 pb0 px4 italic">

                <?php if ($showStars):
                          echo '<div class="mt2 mb4">';
                              echo get_stars(get_field('star_rating', $post->ID));
                          echo '</div>';
                      endif; ?>

                <?=get_field('reviewer_body', $post->ID)?>

            </div>

            <div class="content pb3 px4">

                <hr>

                <div class="author bold">

                    <p class="block h5 mb0 brand-primary"><?=get_field('reviewer_name', $post->ID)?></p>
                    <p class="block h6 mb2 normal"><?=get_field('reviewer_locations', $post->ID)?></p>

                </div>

            </div>

        </div>

    </div>
<?php endforeach; ?>


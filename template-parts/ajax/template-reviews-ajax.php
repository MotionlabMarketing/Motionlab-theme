<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 05/04/18
 * Time: 10:52
 */

?>
<div class="grid-sizer"></div>

<?php foreach($testimonials['posts']->posts as $post) : ?>

    <div class="col col-12 sm-col-6 md-col-4 p2 mt5 grid-item || text-center">

        <div class="px5 pt5 pb3 bg-smoke">

            <div class="mb4">
                <?=get_stars(get_field('star_rating'))?>
            </div>

            <?=get_field('reviewer_body')?>

            <hr class="my4">

            <h3 class="h4 brand-primary text-center mb1"><?=get_field('reviewer_name')?></h3>

            <p class="text-center"><?=get_field('reviewer_locations')?></p>

        </div>

    </div>
<?php endforeach; ?>

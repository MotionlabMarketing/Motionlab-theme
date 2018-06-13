<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 05/04/18
 * Time: 10:52
 */

?>
<div class="grid-sizer col-12 md-col-6 lg-col-4"></div>

<?php foreach($testimonials['posts']->posts as $post) : ?>

    <div class="col col-12 md-col-6 lg-col-4 mt5 px2 grid-item-inline-size || text-center">

        <div class="p5 bg-smoke" data-mh="testimonial">

            <?=get_field('reviewer_body')?>

            <hr class="my4">

            <h3 class="h4 brand-primary text-center mb1"><?=get_field('reviewer_name')?></h3>

            <p class="text-center mb0"><?=get_field('reviewer_locations')?></p>

        </div>

    </div>
<?php endforeach; ?>

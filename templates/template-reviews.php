<?php
/**
 * Template Name: Reviews (To Be Removed, Use Testimonials)
 *
 * TODO: To be removed.
 */

get_header();

include_once(MODELS_DIR . '_testimonials.php');
$testimonials = new _testimonials();
$testimonials = $testimonials->getBlock();
?>

    <?php
    include_once(get_template_directory() . '/templates/_parts/__banners.php')?>


    asassa

    <section class="clearfix mt5 mb4 mb4" id="gallery-standard">

        <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

        <div class="container clearfix">

            <div class="grid" id="testimonials-listing">

                <?php include_once(AJAX_DIR . 'template-reviews-ajax.php'); ?>

            </div>
    
    </div>

    </section>

<?php get_footer(); ?>

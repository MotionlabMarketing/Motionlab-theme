<?php
/**
 * Template Name: Reviews – Standard Layout
 */

get_header();


$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

include_once(MODELS_DIR . '_testimonials.php');
$testimonials = new _testimonials();
$testimonials = $testimonials->getBlock();

pa($blockTitle);
?>

    <?php
    // $blockTitle NEEDS $template_content.
    include_once(get_template_directory() . '/templates/_parts/__banners.php')?>

    <section class="clearfix my4 mb4" id="gallery-standard">

        <?php
        include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

        <div class="container clearfix">

            <div class="grid" id="testimonials-listing">

                <?php include_once(AJAX_DIR . 'template-reviews-ajax.php'); ?>

            </div>

        </div>

    </section>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Reviews – Standard Layout
 */

function get_stars($stars) {

    $output = "";
    $full   =  0;
    $half   =  0;
    $stars  = str_replace("star_", "", $stars);

    if ($stars % 2 == 0):
        // EVEN.
        $full = $stars / 2;
    else:
        // OLD.
        $stars = $stars - 1;
        $full = $stars / 2;
        $half = 1;
    endif;

    $i = 0;
    while ($i < $full):
        $output .= '<i class="fa fa-star h3 mx1 brand-primary"></i>';
        $i++;
    endwhile;

    if ($half == 1):
        $output .= '<i class="fa fa-star-half h3 mx1 brand-primary"></i>';
    endif;

    return $output;
}
get_header(); ?>

    <?php
    // $blockTitle NEEDS $template_content.
    include_once(get_template_directory() . '/templates/_parts/__banners.php')?>

    <section class="clearfix my4 mb4" id="gallery-standard">

        <?php
        include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

        <div class="container clearfix grid">

            <div class="grid-sizer"></div>

            <?php
            $collection = $_GET['t'];

            $args = array(
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'post_type' => 'reviews',
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                <div class="col col-12 sm-col-6 md-col-4 p2 grid-item || text-center">

                    <div class="px5 pt5 pb3 bg-smoke">

                        <div class="mb4">
                            <?=get_stars(get_field('star_rating'))?>
                        </div>

                        <?=get_field('reviewer_body')?>

                        <hr class="my4">

                        <h3 class="h4 brand-primary text-left mb1"><?=get_field('reviewer_name')?></h3>

                        <p class="text-left"><?=get_field('reviewer_locations')?></p>

                    </div>
    
                </div>

            <?php endwhile; endif; ?>

        </div>

    </section>

<?php get_footer(); ?>
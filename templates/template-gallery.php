<?php
/**
 * Template Name: Gallery – Standard Layout
 */


if (!empty($bgColor)):
    $bgColor = "bg-white";
endif;

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

get_header(); ?>

    <section class="clearfix my4 mb4" id="gallery-standard">

        <div class="container clearfix">

            <div class="col-12 || mb5 || text-center">

                <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

                    <?php
                    if (!empty($blockTitle[0]['title'])) {
                        include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                    <div class="wysiwyg h4 limit-p limit-p-70">
                        <?=get_field('page_introduction')?>
                    </div>

                </div>

            </div>

        </div>


        <div class="container text-center mb3">

            <?php
            $items = get_terms('collections', ['hide_empty' => true]);
            foreach ($items as $item): ?>

                <a href="?t=<?=$item->term_id?>" class="btn btn-medium btn-outline brand-base normal"><?=$item->name?></a>

            <?php endforeach; ?>

        </div>

        <div class="container clearfix gallery">

            <?php
            $collection = $_GET['t'];

            $args = array(
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'post_type' => 'gallery',
            'cat' => $collection
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                $image = get_field('image');
            ?>

                <div class="col col-3 || p2 || text-center">

                    <a href="http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892.jpg">
                        <img src="<?=$image['url']?>" class="box-shadow-3 js-match-height" alt="">
                    </a>
    
                </div>

            <?php endwhile; endif; ?>

        </div>

    </section>

<?php get_footer(); ?>
<?php
get_header();

$taxonomies = get_the_terms(get_the_ID(), 'category');

?>

    <section class="post-standard">

        <div class="container">
            <div class="post || clearfix py5">

                <?php while (have_posts()) : the_post();

                    // TODO:  THIS NEEDS TO BE UPDATED WITH SOME NEW SETTING
                    $block = get_field_objects();
                    $narrow = $block['building_blocks']['value'][0]['narrow_columns'];

                    if ($narrow == true):
                        $narrow = "measure-wide";
                    endif;
                ?>

                    <h1 class="mt4 mb3 m0 h2 text-center">
                        <?php the_title(); ?>
                    </h1>

                    <div class="mx-auto || container measure-wide">

                        <div class=" measure-wide ">
                            <p class="left || pt2 h5"><?=ml_time_elapsed_string(get_the_date())?></p>

                            <ul class="mt2 tags tags-right border-radius">
                                <?php foreach($taxonomies as $category) :?>
                                    <li><a href="/news/<?=$category->slug?>"><?=$category->name?></a></li>
                                <?php endforeach; ?>
                            </ul>

                        </div>

                    </div>

                    <div class="clearfix <?=$narrow?> image-holder img-center img-cover img-banner" style="background-image: url(<?php if (!empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('large'); else: echo get_field('fallback_placeholder_image', 'option'); endif; ?>)"></div>

                    <?php include(get_template_directory() . '/template-parts/building-blocks.php'); ?>

	                <div class="mt4 container measure-wide">
		                <?=the_content();?>
	                </div>

                <?php endwhile; ?>

            </div>


            <?php
            $related = get_posts( array(
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' => 4,
                'post__not_in' => array($post->ID),
                'orderby'       => 'date',
                'order'         => 'desc'
            ));
            if ($related): ?>
                <hr>
                <div class="clearfix py5">
                    <h2 class="text-center brand-primary h3">Related Articles</h2>
                    <div class="mxn3 clearfix">
                        <?php foreach ($related as $post) {
                            //TODO: Needs converting to callable single post listing output.
                            ?>
                            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                                <p class="h6 mb2"><?=get_the_date()?></p>

                                <h3 class="h4 brand-primary"><?=get_the_title()?></h3>

                                <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('<?php if (!empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('large'); else: echo get_field('fallback_placeholder_image', 'option'); endif; ?>');"></div></a>

                                <p class="h5 mb3"><?=the_content()?></p>

                                <a href="<?=the_permalink(get_the_id())?>" class="block mb4 || h5 bold">Read full story</a>

                                <?php $taxonomies = get_the_terms($post->ID, 'category');?>
                                <ul class="tags border-radius">
                                    <?php foreach($taxonomies as $category) :?>
                                        <li><a href="/news/<?=$category->slug?>"><?=$category->name?></a></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        <?php } ?>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); //TODO: Convert this to a system value. ?>" class="h5 bold">View all Articles</a>
                    </div>
                </div>
            <?php endif; wp_reset_postdata(); ?>


        </div>

    </section>

<?php
get_footer();

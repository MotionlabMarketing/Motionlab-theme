<?php
get_header();
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
                            <p class="left || pt2 h5">3 days ago</p>

                            <ul class="mt2 tags tags-right border-radius">
                                <li><a href="">Item 1</a></li>
                                <li><a href="">Item 2</a></li>
                                <li><a href="">Item 3</a></li>
                            </ul>

                        </div>

                    </div>

                    <div class="clearfix <?=$narrow?> image-holder img-center img-cover img-banner" style="background-image: url(<?php if (!empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('large'); else: echo get_field('fallback_placeholder_image', 'option'); endif; ?>)"></div>

                    <?php include(get_template_directory() . '/template-parts/building-blocks.php'); ?>

                <?php endwhile; ?>

            </div>


            <?php
            $related = get_posts( array(
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' => 3,
                'post__not_in' => array($post->ID)
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

                                <p class="h6 mb2">1st Jan, 18</p>

                                <h3 class="h4 brand-primary">News Story Title</h3>

                                <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892-480x320.jpg');"></div></a>

                                <p class="h5 mb3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                                <a href="#" class="block mb4 || h5 bold">Read full story</a>

                                <ul class="tags border-radius">
                                    <li><a href="">Item 1</a></li>
                                    <li><a href="">Item 2</a></li>
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

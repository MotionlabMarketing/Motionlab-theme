<!-- post - news -->
<section class="<?php echo $bgColor ?> <?php echo $txtColor ?> py6">
<div class="container <?php echo $masterPad ;?>">
    <h2>News Posts</h2>
    <!-- Loop through the repeater first -->
    <?php if ( have_rows('news_posts')) : ?>
        <?php while ( have_rows('news_posts')) : ?>
            <?php the_row() ?>

            <!-- now check for post objects -->
            <?php $post_object = get_sub_field('post'); ?>
            <?php $post = $post_object; ?>


            <?php setup_postdata( $post ); ?>
            <!-- just use the custom wp lookups in this loop. title, permalink etc -->
            <div class="flex mb4">
                <div class="col-3 mr3">
                    <a href="<?php the_permalink(); ?>" class="block ratio-16-9 || bg-cover bg-center" style="background-image:url(<?php if( !empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('medium'); else: echo get_field('fallback_placeholder_image','option'); endif;?>)"></a>
                    </div>
                    <div class="flex-auto">
                        <span><?php the_date(); ?></span>
                        <h3 class="mb2 <?php echo $txtColor ?>"><?php the_title(); ?></h3>
                        <?php the_excerpt(''); ?>
                        <a href="<?php the_permalink(); ?>" class="hover-primary <?php echo $txtColor ?>">Read more</a>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?><!-- this is needed to reset the lookup ready to loop through it again -->

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<!-- post - cpt -->
<section class="<?php echo $bgColor ?> <?php echo $txtColor ?> py6">
    <div class="container <?php echo $masterPad ;?>">
        <h2>CPT Posts</h2>
        <!-- Loop through the repeater first -->
        <?php if ( have_rows('cpt_post')) : ?>
            <?php while ( have_rows('cpt_post')) : ?>
                <?php the_row() ?>

                <!-- now check for post objects -->
                <?php $post_object = get_sub_field('post'); ?>
                <?php $post = $post_object; ?>
                <?php setup_postdata( $post ); ?>

                <!-- use the custom wp lookups, title, permalink etc AND ACF fields for the CPT -->
                <div class="flex mb4">
                    <div class="col-3 mr3">
                        <a href="<?php the_permalink(); ?>" class="block ratio-16-9 || bg-cover bg-center" style="background-image:url(<?php if( !empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('medium'); else: echo get_field('fallback_placeholder_image','option'); endif;?>)"></a>
                        </div>
                        <div class="flex-auto">
                            <h3 class="mb2 <?php echo $txtColor ?>"><?php the_title(); ?></h3>
                            <?php echo get_field('short_description'); ?><!-- ACF CPT specific field -->
                        </div>
                    </div>

                    <?php wp_reset_postdata(); ?><!-- this is needed to reset the lookup ready to loop through it again -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

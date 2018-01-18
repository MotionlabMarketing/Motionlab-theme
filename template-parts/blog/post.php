<?php
$categories = get_the_category();


/**
* Custom Excerpt Length WordPress using wp_trim_excerpt()
* Use directly in template
*/
$excerpt = get_the_content();
$excerpt = wp_trim_words( $excerpt , '20' );

?>



<div class="col col-12 sm-col-6 md-col-4 px3 mb3 md-mb4 || js-match-height-alt">
    <a href="<?php the_permalink() ?>" class="block black bg-white overflow-hidden ||  || hover-parent">
        <div class="overflow-hidden relative" style="padding-bottom: 60%;">
            <div class="absolute bg-cover bg-bottom top-0 left-0 bottom-0 right-0 || hover-grow" style="background-image: url(
            <?php if(get_the_post_thumbnail_url()) {
                the_post_thumbnail_url('medium');
            } else {
                echo get_field('fallback_placeholder_image','option');
            }
            ?>);">

                <!-- <div class="absolute bottom-0 right-0 bg-white p2 h6 uppercase semi-bold">
                    <?php foreach($categories as $category){ ?>
                        <span class="body mr2"><?php echo $category -> name ?></span>
                    <?php } ?>
                </div> -->
            </div>
        </div>
        <div class="p3 h5">
            <!-- <?php foreach($categories as $category){ ?>
                <h5 class="black hover-primary"><?php echo $category -> name ?></h5>
            <?php } ?> -->
            <h3 class="black hover-primary"><?php the_title(); ?></h3>
            <p class="mb0"><?php echo $excerpt ?></p>
        </div>
    </a>
</div>

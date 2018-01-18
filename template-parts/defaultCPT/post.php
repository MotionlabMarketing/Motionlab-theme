<?php
$categories = get_the_category();


/**
* Custom Excerpt Length WordPress using wp_trim_excerpt()
* Use directly in template
*/
$excerpt = get_the_content();
$excerpt = wp_trim_words( $excerpt , '20' );

?>



<div class="col col-12 sm-col-6- md-col-4- px3 mb3 md-mb4 || js-match-height-alt">
    <a href="<?php the_permalink() ?>" class="block black bg-white overflow-hidden || border border-darken-2 rounded hover-bg-darken-1 hover-body">
        <div class="p3 h5">
            <h3 class="mb0"><?php the_title(); ?></h3>
        </div>
    </a>
</div>

<?php
$categories = get_the_category();
?>


<div class="col col-12 mb3 md-mb4 || flex">
    <a href="<?php the_permalink() ?>" class="block col-2">
        <img class="block" src="<?php if( !empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('medium'); else: echo get_field('fallback_placeholder_image','option'); endif;?>">
    </a>
    <div class="px3 h5 flex-auto">
        <a href="<?php the_permalink() ?>"><h3 class="black hover-primary"><?php the_title(); ?></h3></a>
        <?php the_excerpt(''); ?>
    </div>
</div>

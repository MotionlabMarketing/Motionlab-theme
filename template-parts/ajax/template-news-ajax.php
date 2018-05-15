<?php foreach($block['posts']->posts as $post) :

    if (has_post_thumbnail($post->ID)) {
        $image_url = get_attachment_image_url(get_post_thumbnail_id( $post->ID ));
    } else {
        $image_url = "/wp-content/themes/motionlab-theme/assets/img/placeholder.jpg";
    }
    ?>

    <div class="relative col col-12 sm-col-6 md-col-3 lg-col-3 pt4 pl4 pr4 mb5" data-mh="post">

        <p class="h6 mb2"><?=date('d M Y', strtotime($post->post_date));?></p>

        <a href="<?= get_permalink($post->ID) ?>"><h3 class="h4 brand-primary" data-mh="post-title"><?=$post->post_title?></h3></a>

        <a href="<?=get_permalink($post->ID)?>"><div class="image-holder square img-cover img-center mb4" style="background-image: url('<?=resize_attachment_image($image_url, 500, 500, true)?>');"></div></a>

        <p class="h5 mb3" data-mh="post-content"><?= strlen($post->post_excerpt) > 1 ? strip_tags($post->post_excerpt) : shorten_string(strip_tags($post->post_content),30);?></p>

        <a href="<?=get_permalink($post->ID)?>" class="block mb4 h5 bold">Read full story</a>

        <ul class="tags mb3 border-radius" data-mh="post-tags">
            <?php foreach($post->categories as $category) : ?>
                <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php endforeach; ?>

<div class="clearfix relative">

    <?php include(BLOCKS_DIR . '_parts/__basic_pagination.php'); ?>

</div>

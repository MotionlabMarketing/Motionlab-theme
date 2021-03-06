<?php if($block['posts']->query['paged'] == 1): array_shift($block['posts']->posts); endif; ?>
<?php foreach($block['posts']->posts as $post) : ?>

    <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image_url = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), "large", "", ["class" => "box-shadow-1 js-match-height"] ) ?>
    <?php else: ?>
        <?php $image_url = "/wp-content/themes/motionlab-theme/assets/img/placeholder.jpg"?>
    <?php endif; ?>

    <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

        <p class="h6 mb2"><?=date('d M Y', strtotime($post->post_date));?></p>

        <a href="<?=get_permalink($post->ID)?>"><h3 class="h4 brand-primary" data-mh="post-title"><?=$post->post_title?></h3></a>

        <a href="<?=get_permalink($post->ID)?>"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('<?=$image_url?>');"></div></a>

        <p class="h5 mb3" data-mh="post-content"><?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr($post->post_content,0, 100);?></p>

        <a href="<?=get_permalink($post->ID)?>" class="block mb4 || h5 bold">Read full story</a>

        <ul class="tags border-radius" data-mh="post-tags">
            <?php foreach($post->categories as $category) : ?>
                <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
            <?php endforeach; ?>
        </ul>

    </div>
<?php endforeach; ?>

<?php include(BLOCKS_DIR . '_parts/__basic_pagination.php'); ?>

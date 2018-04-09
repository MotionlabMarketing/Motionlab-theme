<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 09/04/18
 * Time: 10:12
 */
foreach($gallery['posts']->posts as $post):
    $image = get_field('image', $post->ID);
?>

    <div class="col col-3 || p2 || text-center">

        <a href="<?php get_field('image_link', $post->ID) ?: $image['url'] ?>">
            <img src="<?=$image['url']?>" class="box-shadow-3 js-match-height" alt="">
        </a>

    </div>

<?php endforeach; ?>

<?php if($gallery['posts']->query['paged'] < $gallery['posts']->max_num_pages): ?>
	<span data-page-number="<?=$gallery['posts']->query['paged']?>" class="btn btn-outline cursor-pointer block gallery-load-more">Load More...</span>
<?php else: ?>
	<span class="btn btn-outline block cursor-pointer">No more posts to show...</span>
<?php endif; ?>

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

        <a href="<?=$image['url']?>">
            <img src="<?=$image['url']?>" class="box-shadow-3 js-match-height" alt="">
        </a>

    </div>

<?php endforeach; ?>

<?php if($gallery['posts']->query['paged'] < $gallery['posts']->max_num_pages): ?>
    <div class="clearfix text-center py4">
        <span data-page-number="<?=$gallery['posts']->query['paged']?>" class="btn btn-outline cursor-pointer block gallery-load-more brand-base">Load More...</span>
    </div>
<?php else: ?>
    <div class="clearfix text-center py4">
        <span class="btn btn-outline block cursor-pointer brand-base">No more posts to show...</span>
    </div>
<?php endif; ?>

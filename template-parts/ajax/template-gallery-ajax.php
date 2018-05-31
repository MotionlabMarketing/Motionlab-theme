<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 09/04/18
 * Time: 10:12
 */
foreach($gallery['posts']->posts as $post):
    foreach(get_field('image', $post->ID) as $image):
?>

    <div class="col col-3 p3">

        <a href="<?=$image['url']?>">
            <img src="<?=$image['url']?>" class="box-shadow-2 js-match-height" alt="">
        </a>

    </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php if($gallery['posts']->query['paged'] < $gallery['posts']->max_num_pages): ?>
    <div class="clearfix col-12 text-center py4" data-element="load-more">
        <span data-page-number="<?=$gallery['posts']->query['paged']?>" class="btn cursor-pointer block filter-more">Load More...</span>
    </div>
<?php else: ?>
    <div class="clearfix col-12 text-center py4">
        <hr>
        <p class="block py2 mb0 lead">End of Gallery</p>
        <hr>
    </div>
<?php endif; ?>

<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 20/03/18
 * Time: 17:02
 */

?>

<?php foreach($posts['posts']->posts as $post) :?>
<div class="col-12 md-col-12 p3 || left">
    <div class="box-shadow-2 p4">

        <h4 class="h3 mb1"><a
                    href="<?= get_permalink($post->ID) ?>"><?= get_field('talent_name', $post->ID); ?></a>
        </h4>
        <p class="bold mb2" style="font-size: 1rem">
            <?php $location = get_field('talent_location', $post->ID); ?>
            <?php if ($location != "") : ?>
                <span class="inline-block"><?= $location; ?></span>
            <?php endif; ?>
            <?php foreach ($post->types as $type) : ?>
                <span class="black">•</span>
                <span><?= $type->name; ?></span>
            <?php endforeach; ?>
        </p>

        <div class="block mb4" style="font-size: 1rem"><small class="mr3 mt2 block brand-primary">Roles available for</small>

            <ul class="inline-block tags tags-right right">
                <?php foreach ($post->roles as $role) : ?>
                    <li class="border-radius-3"><?= $role->name ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="h4 clearfix border border-light border-bottom">
            <?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr(get_field('talent_details', $post->ID), 0, 100) . "..."; ?>
        </div>

        <a href="<?= get_permalink($post->ID) ?>" class="btn mt3 btn-primary">Learn More</a>

    </div>

</div>
<?php endforeach;?>
<nav class="pagination || clearfix block text-center border-top border-darken-1 py4 mt5">

    <?php $page = $posts['posts']->query['paged'] ?: 1; ?>

    <?php if($page - 2 > 0) :?> <span aria-current="page" data-page-number="<?=$page-2?>" class="page-numbers page-number cursor-pointer"><?=$page-2?></span> <?php endif;?>
    <?php if($page - 1 > 0) :?> <span aria-current="page" data-page-number="<?=$page-1?>" class="page-numbers page-number cursor-pointer"><?=$page-1?></span> <?php endif;?>
    <span aria-current="page" class="page-numbers current cursor-pointer"><?=$page?></span>
    <?php if($page + 1 <= $posts['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+1?>" class="page-numbers page-number cursor-pointer"><?=$page+1?></span><?php endif;?>
    <?php if($page + 2 <= $posts['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+2?>" class="page-numbers page-number cursor-pointer"><?=$page+2?></span><?php endif;?>

</nav>

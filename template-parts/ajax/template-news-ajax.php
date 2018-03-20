<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 20/03/18
 * Time: 17:02
 */

?>

<?php foreach($posts->posts as $post) : ?>

    <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image_url = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), "large", "", ["class" => "box-shadow-1 js-match-height"] ) ?>
    <?php else: ?>
        <?php $image_url = wp_get_attachment_image_url(7303, "large", "", ["class" => "box-shadow-1 js-match-height"]) // TODO: Default Image ?>
    <?php endif; ?>

    <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

        <p class="h6 mb2"><?=date('d M Y', strtotime($post->post_date));?></p>

        <h3 class="h4 brand-primary"><?=$post->post_title?></h3>

        <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('<?=$image_url?>');"></div></a>

        <p class="h5 mb3"><?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr($post->post_content,0, 100);?></p>

        <a href="<?=$post->guid?>" class="block mb4 || h5 bold">Read full story</a>

        <ul class="tags border-radius">
            <?php foreach($post->categories as $category) : ?>
                <li><a href="<?=$category->taxonomy."/".$category->slug?>"><?=$category->name?></a></li>
            <?php endforeach; ?>
        </ul>

    </div>
<?php endforeach; ?>

<nav class="pagination || clearfix block text-center border-top border-darken-1 py4 mt5">

	<?php $page = $posts->query['paged']; ?>

	<?php if($page - 2 > 0) :?> <span aria-current="page" data-page-number="<?=$page-2?>" class="page-numbers page-number cursor-pointer"><?=$page-2?></span> <?php endif;?>
	<?php if($page - 1 > 0) :?> <span aria-current="page" data-page-number="<?=$page-1?>" class="page-numbers page-number cursor-pointer"><?=$page-1?></span> <?php endif;?>
	<span aria-current="page" class="page-numbers current cursor-pointer"><?=$page?></span>
	<?php if($page + 1 <= $posts->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+1?>" class="page-numbers page-number cursor-pointer"><?=$page+1?></span><?php endif;?>
	<?php if($page + 2 <= $posts->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+2?>" class="page-numbers page-number cursor-pointer"><?=$page+2?></span><?php endif;?>

</nav>

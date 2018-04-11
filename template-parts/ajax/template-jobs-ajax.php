<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 20/03/18
 * Time: 17:02
 */

?>

<?php foreach($posts['posts']->posts as $post) :?>
<div class="listItem || relative clearfix border-bottom border-light px5 py5 mb4 box-shadow-2">

    <div class="col col-9">

        <a href="<?=get_permalink($post->ID)?>"><h3 class="mb2 h4"><?=$post->post_title?></h3></a>

        <?php if(get_field('jobs_role_salary', $post->ID) != 0):
            $salary = "£".number_format(get_field('jobs_role_salary', $post->ID));
        else :
            $salary = "Salary not Specified";
        endif; ?>
        <p class="h5 mb0"><?=$post->locations[0]->name?><span class="muted"> •</span> <?=$salary?> <span class="muted">•</span> <?=$post->types[0]->name?></p>

    </div>

    <div class="col col-3 mt1">

        <a href="<?=get_permalink($post->ID)?>" class="btn btn-primary btn-small white width-100 h6 right">Apply Now</a>

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

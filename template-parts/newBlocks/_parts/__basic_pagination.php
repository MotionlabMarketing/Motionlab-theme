<nav class="pagination clearfix block text-center border-top border-darken-1 py4 mt4 mt5" data-element="pagination">
    <?php $page = $block['posts']->query['paged']; ?>

    <?php if($page - 1 > 0) :?> <span aria-current="page" data-page-number="<?=$page-1?>" data-page-type="prev" class="page-numbers page-number cursor-pointer bg-white box-shadow-2">Prev</span> <?php endif;?>

    <?php if($page - 2 > 0) :?> <span aria-current="page" data-page-number="<?=$page-2?>" class="page-numbers page-number cursor-pointer"><?=$page-2?></span> <?php endif;?>
    <?php if($page - 1 > 0) :?> <span aria-current="page" data-page-number="<?=$page-1?>" class="page-numbers page-number cursor-pointer"><?=$page-1?></span> <?php endif;?>
    <span aria-current="page" data-page-number="current" class="page-numbers current"><?=$page?></span>
    <?php if($page + 1 <= $block['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+1?>" class="page-numbers page-number cursor-pointer"><?=$page+1?></span><?php endif;?>
    <?php if($page + 2 <= $block['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+2?>" class="page-numbers page-number cursor-pointer"><?=$page+2?></span><?php endif;?>

    <?php if($page + 1 <= $block['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+1?>" data-page-type="next" class="page-numbers page-number cursor-pointer bg-white box-shadow-2">Next</span><?php endif;?>

</nav>

<?php foreach($gallery['posts'] as $image):?>
    <div class="col col-6 md-col-4 lg-col-3 p3">

        <a href="<?=$image['fullsize']?>">

            <img src="<?=$image['preview']?>" class="box-shadow-2" alt="" data-mh="gallery-image">

        </a>

    </div>
<?php endforeach; ?>

<?php if($gallery['total'] - ($gallery['from'] + 12) > 0 ): ?>

    <div class="loadmore-holder clearfix col-12 text-center py4 white " data-element="load-more">
        
        <span data-loadcount="<?=$gallery['from']?>" class="btn btn-medium bold cursor-pointer filter-more bg-brand-primary hover-white">
            View More
        </span>

    </div>

<?php else: ?>

    <div class="loadmore-holder clearfix col-12 text-center py4 white " data-element="load-more">

        <span class="bold btn-medium cursor-pointer bg-brand-smoke hover-white">End of Gallery</span>

    </div>

<?php endif; ?>

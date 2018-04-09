<?php
/**
 * Template Name: Gallery – Standard Layout
 */


if (!empty($bgColor)):
    $bgColor    = "bg-white";
endif;

$blockTitle     = get_field('page_title');
$blockTitle     = $blockTitle['title'];

include_once(MODELS_DIR . '_galleries.php');
$gallery        = new _galleries();
$gallery        = $gallery->getBlock();

get_header(); ?>

<section class="clearfix my4 mb4" id="gallery-standard" data-loadval="<?=get_query_var('gallery_category');?>">

    <div class="container clearfix">

        <div class="col-12 || mb5 || text-center">

            <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                <div class="wysiwyg h4 limit-p limit-p-70">
                    <?=get_field('page_introduction')?>
                </div>

            </div>

        </div>

    </div>


    <div class="container text-center mb3">

        <?php
        foreach ($gallery['select_terms'] as $item): ?>

            <span data-category="<?=$item->slug?>" class="btn btn-medium btn-outline cursor-pointer <?=get_query_var('gallery_category') == $item->slug ? "brand-secondary" : "brand-base"; ?> normal gallery-filter"><?=$item->name?></span>

        <?php endforeach; ?>

    </div>

    <div class="container clearfix gallery" id="gallery-listing">

        <?php include_once(AJAX_DIR . '/template-gallery-ajax.php'); ?>

    </div>

</section>

<script>

    jQuery(document).ready(function($) {
       $('.gallery-filter').on('click', function() {
            history.pushState({cat:$(this).val()}, "", "/gallery/"+$(this).data('category'));

            $('.gallery-filter').removeClass('brand-secondary').addClass('brand-base');
            $(this).removeClass('brand-base').addClass('brand-secondary');
       });



    });

</script>

<script>
    $(document).ready(function($){

        $('.gallery-filter').on('click', function(){
            fetchGallery(1, true);
        });

        $(document).on('click', '.gallery-load-more', function() {
            var page_number = $(this).data('page-number');
            $(this).data('page-number', page_number++);
            fetchGallery(page_number);
        });

        function fetchGallery(page_number, reset = false){
            var category_filter = $('.gallery-filter.brand-secondary').data('category');

            $.ajax({
                url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                method: 'POST',
                data: {
                    action: 'fetch_gallery',
                    page_number: page_number,
                    category_filter: category_filter
                },
                success: function (response) {
                    $('.gallery-load-more').remove();
                    if(reset) {
                        $('#gallery-listing').html(response);
                    } else {
                        $('#gallery-listing').append(response);
                    }
                }
            });
        }

    });
</script>

<?php get_footer(); ?>

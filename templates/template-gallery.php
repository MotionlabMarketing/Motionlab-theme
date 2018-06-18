<?php
/**
 * Template Name: Gallery – Standard Layout
 */


if (!empty($bgColor)):
    $bgColor = "bg-white";
endif;

$blockTitle = get_field('page_title');
$blockTitle = $blockTitle['title'];

include_once(MODELS_DIR . '_galleries.php');
$gallery = new _galleries();
$gallery = $gallery->getBlock();

get_header(); ?>

<section class="clearfix my4 mb4" id="gallery-standard" data-loadval="<?= get_query_var('gallery_category'); ?>" data-template="gallery-standard">

    <div class="container clearfix mt6">

        <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

    </div>


    <div class="container text-center mb3 border-bottom border-smoke border-1" data-element="filters">

        <?php foreach ($gallery['select_terms'] as $item): ?>

            <span data-category="<?=$item->slug?>" class="btn btn-large inline-block border-top border-left border-right border-light brand-primary bg-white cursor-pointer <?=get_query_var('gallery_category') == $item->slug ? "filter-active" : ""?> filter-option"><?=$item->name?></span>

        <?php endforeach; ?>

    </div>

    <div class="container clearfix gallery flex flex-wrap justify-center" id="gallery-listing" data-element="gallery-images">

        <?php include_once(AJAX_DIR . '/template-gallery-ajax.php'); ?>

    </div>

</section>

<script>

    jQuery(document).ready(function ($) {
        $('.filter-option').on('click', function () {
            history.pushState({cat: $(this).val()}, "", "/gallery/" + $(this).data('category'));

            $('.filter-option').removeClass('filter-active');
            $(this).addClass('filter-active');
        });

        $('.filter-option').on('click', function () {
            fetchGallery(1, true);
        });

        $(document).on('click', '.filter-more', function () {
            var page_number = $(this).data('loadcount');
            $(this).data('loadcount', page_number++);
            fetchGallery(page_number);
        });

        function fetchGallery(page_number, reset = false) {
            var category_filter = $('.filter-option.filter-active').data('category');

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                method: 'POST',
                data: {
                    action: 'fetch_gallery',
                    page_number: page_number,
                    category_filter: category_filter
                },
                success: function (response) {
                    $('.loadmore-holder').remove();
                    if (reset) {
                        $('#gallery-listing').html(response);
                    } else {
                        $('#gallery-listing').append(response);
                    }
                    setTimeout(function () {

                        $.fn.matchHeight._apply('[data-mh="gallery-image"]');

                    }, 900);
                }
            });
        }
    });
</script>

<?php get_footer(); ?>

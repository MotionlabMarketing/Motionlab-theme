<?php
/**
 * Template Name: Gallery – Standard Layout
 */
include_once(MODELS_DIR . '_galleries.php');
$gallery = new _galleries();
$gallery = $gallery->getBlock();

get_header(); ?>

<section class="clearfix mb4" id="gallery-standard" data-loadval="<?= get_query_var('gallery_category'); ?>" data-template="gallery-standard">

    <div class="container clearfix px3">

        <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

    </div>

    <div class="display-none md-block container text-center mt4 mb3 border-bottom border-smoke border-1" data-element="filters">

        <span data-category="" class="btn btn-large inline-block border-top border-left border-right border-light brand-primary bg-white cursor-pointer <?= !empty(get_query_var('gallery_category')) ? "filter-active" : ""?> filter-option">All</span>

        <?php foreach ($gallery['select_terms'] as $item): ?>

            <span data-category="<?=$item->slug?>" class="btn btn-large inline-block border-top border-left border-right border-light brand-primary bg-white cursor-pointer <?=get_query_var('gallery_category') == $item->slug ? "filter-active" : ""?> filter-option"><?=$item->name?></span>

        <?php endforeach; ?>

    </div>

    <div class="md-display-none container text-center mt4 mb3">
        <select id="filter-select" class="select width-70">
            <option value="<?=get_permalink()?>">All Images</option>
            <?php foreach($gallery['select_terms'] as $item): ?>
                <option data-category="<?=$item->slug?>" value="<?=get_permalink() . $item->slug?>" <?=$_SERVER['WP_HOME'].$_SERVER['REQUEST_URI'] == get_permalink().$item->slug.'/' ? 'selected' : ''?> ><?=$item->name?></option>
            <?php endforeach; ?>
        </select>

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

        $(document).on('click', '.filter-more', function (e) {
            e.preventDefault();
            var page_number = $(this).data('loadcount');
            $(this).data('loadcount', page_number+=12);
            fetchGallery(page_number);
        });

        $(document).on('change', '#filter-select', function() {
            fetchGallery(1, true);
            history.pushState({cat: $('#filter-select').find(":selected").data('category')}, "", "/gallery/" + $(this).find(":selected").data('category'));
        });

        function fetchGallery(page_number, reset = false) {
            var windowWidth = $( window ).width();

            if (windowWidth > 767) {
            var category_filter = $('.filter-option.filter-active').data('category');
            } else {
                var category_filter = $('#filter-select').find(":selected").data('category');
            }  

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                method: 'POST',
                data: {
                    action: 'fetch_gallery',
                    from: page_number,
                    category_filter: category_filter
                },
                success: function (response) {
                    console.log(response);
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

        fetchGallery(1, true);

        window.onpopstate = function (event) {
            var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1);
        }
    });
</script>

<?php get_footer(); ?>

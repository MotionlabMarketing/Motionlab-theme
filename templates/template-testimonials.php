<?php
/**
 * Template Name: Testimonials – Standard Layout
 */

include_once(MODELS_DIR . '_testimonials.php');
$testimonials = new _testimonials();
$testimonials = $testimonials->getBlock();

get_header(); ?>

    <section class="clearfix mt6 mb4 mb4" id="listing-testimonials">

        <div class="container">

            <div class="px4">
                <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>
            </div>

            <div class="col-12 mb5">

                <?php if (!empty($testimonials['select_terms'])) : ?>
                    <form method="get" class="text-center">

                        <select style="min-width:18rem;" class="select md-ml3 width-100 md-width-auto box-shadow-2 testimonials_filters" data-loadvalue="<?=get_query_var('testimonials_category')?>" id="testimonials_filtercats">
                            <option value="">All Testimonials</option>
                            <?php foreach ($testimonials['select_terms'] as $select_term) :?>
                                <option value="<?=$select_term->slug?>"><?=$select_term->name?></option>
                            <?php endforeach; ?>

                        </select>

                    </form>
                <?php endif; ?>
            </div>

        </div>

        <div class="container clearfix">

            <div class="grid clearfix overflow-hidden" id="testimonials-listing">

            </div>

            <div id="load-more" class="loadmore-holder clearfix col-12 text-center py4" data-element="load-more">
                <?php 

                $button['button_link']['url']        = "#";
                $button['button_link']['title']      = "View More...";
                $button['system_text_colours']       = "white";
                $button['system_background_colours'] = "bg-brand-primary";
                
                render_button($button, "medium", ["class" => "btn cursor-pointer block filter-more", "data-loadcount" => $testimonials['posts']->query['paged']]) ?>
            </div>

        </div>

    </section>


<script>

    //TODO: Move this into JS file

    function fetchTestimonialPosts(pageNumber = 1, reset = false) {

        //TODO: Add loader while fetching data.
        var category_filter = $('#testimonials_filtercats').val();

        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                page_number: pageNumber,
                action: 'fetch_testimonials',
                post_id: <?= get_the_ID(); ?>,
                category_filter: category_filter
            },
            success: function(response){
                if(response.indexOf('grid-item') < 0 ) {
                    $('.filter-more').text('No more to load.');
                } else {
                    var page_number = pageNumber + 1;
                    $('.filter-more').data('loadcount', page_number);
                    if (reset) {
                        $('#testimonials-listing').html(response);
                    } else {
                        $('#testimonials-listing').append(response);
                    }
                }
                $('.grid').masonry('destroy');
                $('.grid').masonry();

            }
        });
    }

    function updateFilterState(load_val) {
        $('#testimonials_filtercats').val(load_val);
        fetchTestimonialPosts();
    }

    $('#testimonials_filtercats').on('change', function() {
        history.pushState({cat:$(this).val()}, "", "/testimonials/"+$(this).val());
        fetchTestimonialPosts();
    });

    $(document).on("ready", function() {
        updateFilterState($('#testimonials_filtercats').data('loadvalue'));
    });

    window.onpopstate = function(event) {
        var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1) ;
        if(value != null)
            updateFilterState(value);
    };

    $(document).on('click', '.filter-more', function (e) {
        e.preventDefault();
        var page_number = $(this).data('loadcount');

        fetchTestimonialPosts(page_number);
    });

</script>

<?php wp_reset_postdata(); //TODO: This needs to be moved to the correct location where the query is made! ?>

<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

<?php get_footer(); ?>

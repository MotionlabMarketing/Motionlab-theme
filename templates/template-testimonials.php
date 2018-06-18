<?php
/**
 * Template Name: Testimonials – Standard Layout
 */

include_once(MODELS_DIR . '_testimonials.php');
$testimonials = new _testimonials();
$testimonials = $testimonials->getBlock();

get_header(); ?>

    <section class="clearfix mt6 mb4 mb4" id="listing-testimonials" data-template="testimonialStandard">

        <div class="container">

            <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

            <?php if (!empty($testimonials['select_terms'])) : //TODO: Sort this mess out! ?>
                <div class="col-12 mb5">
                    <form method="get" class="text-center">

                        <select style="min-width:18rem;" class="select md-ml3 width-100 md-width-auto box-shadow-2 testimonials_filters" data-loadvalue="<?=get_query_var('testimonials_category')?>" id="testimonials_filtercats">
                            <option value="">All Testimonials</option>
                            <?php foreach ($testimonials['select_terms'] as $select_term) :?>
                                <option value="<?=$select_term->slug?>"><?=$select_term->name?></option>
                            <?php endforeach; ?>

                        </select>

                    </form>
                </div>
            <?php endif; ?>
            
        </div>

        <div class="container clearfix mb6">

            <div class="grid" id="testimonials-listing">

                <?php include_once(AJAX_DIR . 'template-testimonials-ajax.php'); ?>

            </div>

        </div>

    </section>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

<script>

    //TODO: Move this into JS file

    function fetchTestimonialPosts() {

        //TODO: Add loader while fetching data.
        var category_filter = $('#testimonials_filtercats').val();

        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'fetch_testimonials',
                category_filter: category_filter
            },
            success: function(response){
                $('#testimonials-listing').html(response);
            }
            $grid.masonry();
        });
    }

    function updateFilterState(load_val) {
        $('#testimonials_filtercats').val(load_val);
        fetchTestimonialPosts();
    }

    $('.testimonials_filters').on('change', function() {
        if($(this).attr('id') == "testimonials_filtercats") {
            history.pushState({cat:$(this).val()}, "", "/testimonials/"+$(this).val());
        }
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

</script>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Testimonials – Listing
 *
 * TODO: Needs converting to news index when CPT has been added.
 */
$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

include_once(MODELS_DIR . '_testimonials.php');
$testimonials = new _testimonials();
$testimonials = $testimonials->getBlock();

get_header(); ?>

    <section class="clearfix my4 mb4" id="listing-testimonials">

        <div class="container">

            <div class="col-12 || mb5 || text-center">

                <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

                    <?php
                    if (!empty($blockTitle[0]['title'])) {
                        include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                    <div class="wysiwyg h4">
                        <?=get_field('page_introduction')?>
                    </div>

                </div>

            </div>

            <div class="col-12 || mb5">

                <form method="get" class="text-center">

                    <select style="min-width:18rem;" class="select md-ml3 width-100 md-width-auto box-shadow-3 testimonials_filters" data-loadvalue="<?=get_query_var('testimonials_category')?>" id="testimonials_filtercats">
                        <option value="">All Testimonials</option>
                        <?php foreach($testimonials['select_terms'] as $select_term) :?>
                            <option value="<?=$select_term->slug?>"><?=$select_term->name?></option>
                        <?php endforeach; ?>

                    </select>

                </form>

            </div>

        </div>

        <div class="container clearfix">

            <div class="grid" id="testimonials-listing">

                <?php include_once(AJAX_DIR . 'template-testimonials-ajax.php'); ?>

            </div>

        </div>

    </section>

<script>

    //TODO: Move this into JS file

    function fetchTestimonialPosts() {

        //TODO: Add loader while fetching data.
        var category_filter = $('#testimonials_filtercats').val();

        $.ajax({
            url: '<?php echo admin_url( "admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'fetch_testimonials',
                category_filter: category_filter
            },
            success: function(response){
                $('#testimonials-listing').html(response);
            }
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

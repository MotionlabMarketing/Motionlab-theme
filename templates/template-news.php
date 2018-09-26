<?php
/**
 * Template Name: News – Listing
 */

include_once(MODELS_DIR . '_block_news.php');
$news_controller = new _block_news(null, null);
$block = $news_controller->fetchFeedPosts(9);

get_header(); ?>

<div class="clearfix" id="news-featuredListing">

    <div class="container">

        <div class="container clearfix">

            <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 mb3 lg-mb5 bg-smoke">

            <?php $latest_post = array_shift($block['posts']->posts); ?>
            <div class="col col-12 md-col-6 pt4 px4 md-p5 left md-right flex items-center justify-center">

                <?php
                if (has_post_thumbnail($latest_post->ID)) {
                    $image_url = get_attachment_image_url(get_post_thumbnail_id( $latest_post->ID ), 'medium');
                } else {
                    $image_url = get_field('fallback_image_news_feature', 'option');
                }?>

                <a href="<?= get_permalink($latest_post->ID) ?>">
                    <img src="<?=$image_url?>" alt="<?=$latest_post->post_title?>">
                </a>

            </div>

            <div class="col col-12 md-col-6 relative pb4 px4 md-p5 right md-left">

                <p class="pt2 h5 mb2">Posted: <?= date('d M Y', strtotime($latest_post->post_date)); ?></p>

                <?php if (ML_POST_TAGS): ?>
                    <ul class="mt2 tags tags-right border-radius">
                        <?php foreach ($latest_post->categories as $category) : ?>
                            <li><a href="<?= $category->slug ?>"><?= $category->name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <a href="<?= get_permalink($latest_post->ID) ?>">

                    <?php $heading = convert_heading($blockTitle); ?>
                    <?php render_heading("{$latest_post->post_title}", "h2", "", "brand-primary", "{$heading->case}", ["class" => "brand-primary"]); ?>

                </a>

                <p><?=strlen($latest_post->post_excerpt) > 1 ? strip_tags($latest_post->post_excerpt, '<br><p>') : shorten_string(strip_tags($latest_post->post_content, '<br><p>'), 55); ?></p>

                <?php // TODO: Make this use the button function or have its only button render function. // ?> 
                <a href="<?= get_permalink($latest_post->ID) ?>" class="btn btn-primary border-primary btn-medium mt4 h5"><?=get_field('news_read_more_button_label', 'option');?></a>

            </div>

        </div>

        <div id="news-listing-header" class="mb5 px4 lg-flex lg-items-center lg-justify-center">

            <div class="col col-12 lg-col-4">

                <p class="bold brand-primary h3 mb3 lg-mb0 text-center lg-text-left">All Categories</p>

            </div>

            <div class="col col-12 lg-col-8 lg-text-right px4 lg-px0 flex justify-center lg-justify-end lg-items-center">

                <span class="mr3 display-none lg-block">Filter by: </span>

                <form method="get">

                    <select style="min-width:15rem;"
                            class="news_filters select md-ml3 mb3 md-mb0 width-100 md-width-auto box-shadow-2"
                            id="news_orderby">
                        <option value="">Order By</option>
                        <option value="title">Title</option>
                        <option value="date">Date</option>
                    </select>

                    <select style="min-width:15rem;"
                            class="news_filters select mb3 md-mb0 width-100 sm-width-auto md-width-auto md-ml3 box-shadow-2"
                            data-loadvalue="<?= get_query_var('news_category') ?>" id="news_filtercats">
                        <option value="">Filter Category</option>
                        <?php
                        $categories = get_categories(array("hide_empty" => 1));
                        foreach ($categories as $category) : ?>
                            <option value="<?= $category->slug ?>"
                                    data-url="/category/<?php echo $category->slug ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>

                </form>

            </div>

        </div>

        <div id="news-listing" class="mb4">

            <?php include_once(AJAX_DIR . 'template-news-ajax.php'); ?>

        </div>

    </div>

</div>

<script>

    jQuery(document).ready(function ($) {

        //TODO: Move this into JS file

        function fetchNewsPosts(page_number, firstLoad = false) {

            //TODO: Add loader while fetching data.
            var order_filter = $('#news_orderby').val();
            var category_filter = $('#news_filtercats').val();

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                method: 'POST',
                data: {
                    action: 'fetch_news',
                    news_page: page_number,
                    order_filter: order_filter,
                    category_filter: category_filter
                },
                success: function (response) {
                    $('#news-listing').html(response);

                    if (!firstLoad) {
                        $('html,body').animate({
                            scrollTop: $("#news-listing-header").offset().top - $('header').height() - $('#news-listing-header').height()
                        }, 'slow');
                    }
                },
                complete: function () {
                    setTimeout(function () {

                        $.fn.matchHeight._apply('[data-mh="post"]');
                        $.fn.matchHeight._apply('[data-mh="post-title"]');
                        $.fn.matchHeight._apply('[data-mh="post-tags"]');
                        $.fn.matchHeight._apply('[data-mh="post-content"]');

                    }, 300);
                }
            });
        }

        function updateFilterState(load_val, firstLoad = false) {
            $('#news_filtercats').val(load_val);
            fetchNewsPosts(1, firstLoad);
        }

        $(document).on('click', '.page-number', function () {
            var page_number = $(this).data('page-number');
            fetchNewsPosts(page_number);
        });

        $('.news_filters').on('change', function () {
            if ($(this).attr('id') == "news_filtercats") {
                history.pushState({cat: $(this).val()}, "", "/news/" + $(this).val());
            }
            fetchNewsPosts(1);
        });

        $(document).on("ready", function () {
            updateFilterState($('#news_filtercats').data('loadvalue'), true);
        });

        window.onpopstate = function (event) {
            var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1);
            if (value != null)
                updateFilterState(value);
        }

    });

</script>

<?php get_footer(); ?>

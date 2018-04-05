<?php
/**
 * Template Name: News – Listing
 *
 */

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

/* Load in team block controller to access posts easily. */
include_once(MODELS_DIR . '_block_news.php');
$news_controller = new _block_news(null, null);
$posts = $news_controller->fetchFeedPosts(9);

//pa($posts);

get_header(); ?>

<div class="clearfix ||  mt6" id="news-featuredListing">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

            <?php $heading = convert_heading($blockTitle); ?>
            <?php render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}"); ?>

            <?php render_wysiwyg(get_field('page_introduction'), true) ?>

        </div>


        <div class="col col-12 md-col-12 lg-col-12 || mb5 bg-smoke">

	        <?php $latest_post = array_shift($posts->posts); ?>
            <div class="col col-12 md-col-6 || px4 md-p5 left md-right || flex items-center justify-center">

                <?php if (has_post_thumbnail( $latest_post->ID ) ): ?>
                    <?php $image_url = wp_get_attachment_image( get_post_thumbnail_id( $latest_post->ID ), "large", "", ["class" => "box-shadow-1"] ) ?>
                <?php else: ?>
                    <?php $image_url = wp_get_attachment_image(7303, "large", "", ["class" => "box-shadow-1"]) // TODO: Default Image ?>
                <?php endif; ?>

                <a href="<?=$latest_post->guid?>">
                    <?=$image_url?>
                </a>

            </div>


            <div class="col col-12 md-col-6 || relative p4 md-p5 right md-left">

                <p class="left || pt2 h5"><?=date('d M Y', strtotime($latest_post->post_date));?></p>

                    <ul class="mt2 tags tags-right border-radius">
                        <?php foreach($latest_post->categories as $category) : ?>
                            <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
                        <?php endforeach; ?>
                    </ul>

                <a href="<?=$latest_post->guid?>">

                    <?php $heading = convert_heading($blockTitle); ?>
                    <?php render_heading( "{$latest_post->post_title}", "h2", "", "brand-primary", "{$heading->case}", ["class" => "clear-both mt3 md-mt5 brand-primary"]); ?>

                </a>

                <p><?= strlen($latest_post->post_excerpt) > 1 ? $latest_post->post_excerpt : substr($latest_post->post_content,0, 100);?></p>

                <a href="<?=get_permalink($latest_post->ID)?>" class="bottom-2 mt4 h5">Read full story</a>

            </div>

        </div>

        <div id="news-listing-header" class="mb5 px4 lg-flex lg-items-center lg-justify-center">

            <div class="col col-12 lg-col-4">

                <p class="bold brand-primary h3 mb3 lg-mb0 text-center lg-text-left">All Categories</p>

            </div>

            <div class="col col-12 lg-col-8 lg-text-right px4 lg-px0 flex justify-center lg-justify-end lg-items-center">

                <span class="mr3 display-none lg-block">Filter by: </span>

                <form method="get">

                    <select style="min-width:15rem;" class="news_filters select md-ml3 mb3 md-mb0 width-100 md-width-auto box-shadow-2" id="news_orderby">
                        <option value="">Order By</option>
                        <option value="title">Title</option>
                        <option value="date">Date</option>
                    </select>

                    <select style="min-width:15rem;" class="news_filters select mb3 md-mb0 width-100 sm-width-auto md-width-auto md-ml3 box-shadow-2" data-loadvalue="<?=get_query_var('news_category')?>" id="news_filtercats">
                        <option value="">Filter Category</option>
                        <?php
                        $categories = get_categories(array("hide_empty"=>1));
                        foreach($categories as $category) : ?>
                            <option value="<?=$category->slug?>" data-url="/category/<?php echo $category->slug ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>

                </form>

            </div>

        </div>

        <div id="news-listing" class="mb4">

            <?php foreach($posts->posts as $post) : ?>

                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image_url = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), "large", "") ?>
                <?php else: ?>
                    <?php $image_url = "/wp-content/themes/motionlab-theme/assets/img/placeholder.jpg" ?>
                <?php endif; ?>

                <div class="col col-12 sm-col-6 md-col-3 lg-col-3 p4 js-match-height">

                    <p class="h6 mb2" data-mh="post-date"><?=date('d M Y', strtotime($post->post_date));?></p>

                    <a href="<?=$post->guid?>"><h3 class="h4 brand-primary" data-mh="post-title"><?=$post->post_title?></h3></a>

                    <a href="<?=get_permalink($post->ID)?>"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('<?=$image_url?>');"></div></a>

                    <p class="h5 mb3" data-mh="post-content"><?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr($post->post_content,0, 100);?></p>

                    <a href="<?=get_permalink($post->ID)?>" class="block mb4 || h5 bold">Read full story</a>

                    <ul class="tags border-radius" data-mh="post-tags">
                         <?php foreach($post->categories as $category) : ?>
                            <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            <?php endforeach; $page = 1;?>

            <?php include(BLOCKS_DIR . '_parts/__basic_pagination.php'); ?>

        </div>



    </div>

</div>

<script>

    jQuery(document).ready(function ($) {

        //TODO: Move this into JS file

        function fetchNewsPosts(page_number) {

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


                    $('html,body').animate({
                        scrollTop: $("#news-listing-header").offset().top
                    }, 'slow');
                },
                complete: function () {
                    setTimeout(function () {

                        $.fn.matchHeight._apply('.js-match-height');
                        $.fn.matchHeight._apply('[data-mh="post-title"]');
                        $.fn.matchHeight._apply('[data-mh="post-tags"]');
                        $.fn.matchHeight._apply('[data-mh="post-content"]');

                    }, 300);
                }

            });
        }

        function updateFilterState(load_val) {
            $('#news_filtercats').val(load_val);
            fetchNewsPosts(1);
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
            updateFilterState($('#news_filtercats').data('loadvalue'));
        });

        window.onpopstate = function (event) {
            var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1);
            if (value != null)
                updateFilterState(value);
        };

    });

</script>

<?php get_footer(); ?>

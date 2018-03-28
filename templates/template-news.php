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

            <?php
            if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

            <div class="wysiwyg h4">
                <?=get_field('page_introduction')?>
            </div>

        </div>


        <div class="col col-12 md-col-12 lg-col-12 || mb5 bg-smoke">

	        <?php $latest_post = array_shift($posts->posts); ?>
            <div class="col col-12 md-col-6 || px5 md-p5 left md-right || flex items-center justify-center">
                <?php if (has_post_thumbnail( $latest_post->ID ) ): ?>
                    <?php $image_url = wp_get_attachment_image( get_post_thumbnail_id( $latest_post->ID ), "large", "", ["class" => "box-shadow-1"] ) ?>
                <?php else: ?>
                    <?php $image_url = wp_get_attachment_image(7303, "large", "", ["class" => "box-shadow-1"]) // TODO: Default Image ?>
                <?php endif; ?>

                <?=$image_url?>

            </div>


            <div class="col col-12 md-col-6 || relative p5 right md-left">

                <p class="left || pt2 h5"><?=date('d M Y', strtotime($latest_post->post_date));?></p>

                    <ul class="mt2 tags tags-right border-radius">
                        <?php foreach($latest_post->categories as $category) : ?>
                            <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
                        <?php endforeach; ?>
                    </ul>

                <h2 class="clear-both || mt5 || brand-primary"><?=$latest_post->post_title?></h2>

                <p><?= strlen($latest_post->post_excerpt) > 1 ? $latest_post->post_excerpt : substr($latest_post->post_content,0, 100);?></p>

                <a href="<?=$latest_post->guid?>" class="md-absolute bottom-2 h5">Read full story</a>

            </div>

        </div>
        <div id="news-listing-header" class="col col-12 md-col-12 lg-col-12 || mb5 px4 mxn2">

            <div class="col col-12 md-col-4">

                <p class="bold brand-primary h3 text-center md-text-left">All Categories</p>

            </div>

            <div class="col col-12 md-col-8 md-text-right flex justify-center md-justify-end">

                <form method="get">

                    <select style="min-width:13rem;" class="news_filters select md-ml3 width-100 sm-width-auto md-width-auto box-shadow-3" id="news_orderby">
                        <option value="">Order By</option>
                        <option value="title">Title</option>
                        <option value="date">Date</option>
                    </select>

                    <select style="min-width:13rem;" class="news_filters select width-100 sm-width-auto md-width-auto md-ml3 box-shadow-3" data-loadvalue="<?=get_query_var('news_category')?>" id="news_filtercats">
                        <option value="">Filter Category</option>
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category) : ?>
                            <option value="<?=$category->slug?>" data-url="/category/<?php echo $category->slug ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>

                </form>

            </div>

        </div>

        <div id="news-listing" class="col col-12 md-col-12 lg-col-12 mb4 mxn2">

            <?php foreach($posts->posts as $post) : ?>

                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image_url = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), "large", "", ["class" => "box-shadow-1 js-match-height"] ) ?>
                <?php else: ?>
                    <?php $image_url = wp_get_attachment_image_url(7303, "large", "", ["class" => "box-shadow-1 js-match-height"]) // TODO: Default Image ?>
                <?php endif; ?>

                <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                    <p class="h6 mb2"><?=date('d M Y', strtotime($post->post_date));?></p>

                    <h3 class="h4 brand-primary"><?=$post->post_title?></h3>

                    <a href="<?=$post->guid?>"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('<?=$image_url?>');"></div></a>

                    <p class="h5 mb3"><?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr($post->post_content,0, 100);?></p>

                    <a href="<?=$post->guid?>" class="block mb4 || h5 bold">Read full story</a>

                    <ul class="tags border-radius">
                         <?php foreach($post->categories as $category) : ?>
                            <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            <?php endforeach; $page = 1;?>
            <nav class="pagination || clearfix block text-center border-top border-darken-1 py4 mt5">

                <?php if($page - 2 > 0) :?> <span aria-current="page" data-page-number="<?=$page-2?>" class="page-numbers page-number cursor-pointer"><?=$page-2?></span> <?php endif;?>
                <?php if($page - 1 > 0) :?> <span aria-current="page" data-page-number="<?=$page-1?>" class="page-numbers page-number cursor-pointer"><?=$page-1?></span> <?php endif;?>
                <span aria-current="page" class="page-numbers current cursor-pointer"><?=$page?></span>
                <?php if($page + 1 <= $posts->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+1?>" class="page-numbers page-number cursor-pointer"><?=$page+1?></span><?php endif;?>
                <?php if($page + 2 <= $posts->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+2?>" class="page-numbers page-number cursor-pointer"><?=$page+2?></span><?php endif;?>

            </nav>
        </div>



    </div>

</div>

<script>

    //TODO: Move this into JS file

    function fetchNewsPosts(page_number) {

        //TODO: Add loader while fetching data.
        var order_filter = $('#news_orderby').val();
        var category_filter = $('#news_filtercats').val();

        $.ajax({
            url: '<?php echo admin_url( "admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'fetch_news',
                news_page: page_number,
                order_filter: order_filter,
                category_filter: category_filter
            },
            success: function(response){
                $('#news-listing').html(response);
                $('.js-match-height').matchHeight();
                $('html,body').animate({
                    scrollTop: $("#news-listing-header").offset().top},
                    'slow');
                }
        });
    }

    function updateFilterState(load_val) {
        $('#news_filtercats').val(load_val);
        fetchNewsPosts(1);
    }

    $(document).on('click', '.page-number', function(){
        var page_number = $(this).data('page-number');
        fetchNewsPosts(page_number);
    });

    $('.news_filters').on('change', function() {
        if($(this).attr('id') == "news_filtercats") {
            history.pushState({cat:$(this).val()}, "", "/news-2/"+$(this).val());
        }
        fetchNewsPosts(1);
    });

    $(document).on("ready", function() {
        updateFilterState($('#news_filtercats').data('loadvalue'));
    });

    window.onpopstate = function(event) {
        var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1) ;
        if(value != null)
            updateFilterState(value);
    };

</script>

<?php get_footer(); ?>

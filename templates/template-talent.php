<?php
/**
 * Template Name: Talent – Listing
 *
 * TODO: Needs converting to single when CPT has been added.
 */

$blockTitle = get_field('page_title');
$blockTitle = $blockTitle['title'];
get_header();

include_once(MODELS_DIR . '_block_jobs.php');
$jobs_controller = new _block_jobs(null, null);
$jobs_controller->fetchCategories();
$block = $jobs_controller->fetchFeedPosts(4, 1, 'talents');

$boxes = get_field('template_jobs_sidebarBoxes');
?>

<div class="clearfix || p4 mt6" id="listing-job">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center || limit-p limit-p-80">

            <?php
            if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
            } ?>

            <div class="wysiwyg h4">
                <?= get_field('page_introduction') ?>
            </div>

        </div>

        <div id="jobs-listing-header" class="col col-12 md-col-12 lg-col-12 clearfix">

            <div class="col col-12 mb5">

                <form action="#" class="width-100 || flex justify-center flex-wrap">

                    <?php $disabled = sizeof($block['sector_select_options']) == 0 ? "disabled" : ""; ?>
                    <select style="min-width:20%;"
                            class="select mb4 md-ml3 width-100 md-width-auto box-shadow-3 talent-filters"
                            id="sortby_sector" data-loadvalue="<?= get_query_var('sector') ?>" <?= $disabled ?>>
                        <option value="">Filter by Sector</option>
                        <?php
                        foreach ($block['sector_select_options'] as $option) :?>
                            <option value="<?= $option->slug ?>"
                                    data-taxonomy="<?= $option->taxonomy ?>"><?= $option->name ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>

                    <?php $disabled = sizeof($block['role_select_options']) == 0 ? "disabled" : ""; ?>
                    <select style="min-width:20%;"
                            class="select mb4  md-ml3 width-100 md-width-auto box-shadow-3 talent-filters"
                            id="sortby_role" <?= $disabled ?>>
                        <option value="">Filter by Role</option>
                        <?php foreach ($block['role_select_options'] as $option) : ?>
                            <option class="option" value="<?= $option->slug ?>"
                                    data-taxonomy="<?= $option->taxonomy ?>"><?= $option->name ?></option>
                            <?php foreach ($option->children as $option_children): ?>
                                <option class="optgroup" value="<?= $option_children->slug ?>"
                                        data-taxonomy="<?= $option_children->taxonomy ?>"><?= $option_children->name ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>

                    <?php $disabled = sizeof($block['type_select_options']) == 0 ? "disabled" : ""; ?>
                    <select style="min-width:20%;"
                            class="select mb4 md-ml3 width-100 md-width-auto box-shadow-3 talent-filters"
                            id="sortby_type" <?= $disabled ?>>
                        <option value="">Filter by Type</option>
                        <?php
                        foreach ($block['type_select_options'] as $option) :?>
                            <option value="<?= $option->slug ?>"
                                    data-taxonomy="<?= $option->taxonomy ?>"><?= $option->name ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>

                </form>

            </div>

            <div id="jobs-listing" class="col col-12 md-col-12 lg-col-8 mb6 clearfix">

                <?php foreach ($block['posts']->posts as $post) : ?>
                    <div class="col-12 md-col-12 p3 || left">

                        <div class="box-shadow-2 p4">

                            <h4 class="h3 mb1"><a
                                        href="<?= get_permalink($post->ID) ?>"><?= get_field('talent_name', $post->ID); ?></a>
                            </h4>
                            <p class="bold mb2" style="font-size: 1rem">
                                <?php $location = get_field('talent_location', $post->ID); ?>
                                <?php if ($location != "") : ?>
                                    <span class="inline-block"><?= $location; ?></span>
                                <?php endif; ?>
                                <?php foreach ($post->types as $type) : ?>
                                    <span class="black">•</span>
                                    <span><?= $type->name; ?></span>
                                <?php endforeach; ?>
                            </p>

                            <div class="block mb2 md-mb2 h6" data-mh="tags"><p class="block mb1 md-inline brand-primary">Roles available for</p>

                                <ul class="block tags border-radius">
                                    <?php foreach($post->roles as $role) : ?>
                                        <li class="mb1"><?=$role->name?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="h4 clearfix border border-light border-bottom">
                                <?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr(get_field('talent_details', $post->ID), 0, 100) . "..."; ?>
                            </div>

                            <a href="<?= get_permalink($post->ID) ?>" class="btn mt3 btn-primary">Learn More</a>

                        </div>

                    </div>
                <?php endforeach; ?>

                <?php include(BLOCKS_DIR . '_parts/__basic_pagination.php'); ?>

            </div>

            <div class="col col-12 md-col-4 lg-col-4  mb5 px4 display-none lg-block">

                <div class="p4 bg-smoke">

                    <?php foreach ($boxes as $item): ?>

                        <div class="block relative mb4 || min-height-v15 bg-cover bg-center bg-darken-3"
                             style="background-image: url('<?= $item['box_background_image']['sizes']['medium'] ?>')">

                            <a href="<?= $item['box_link']['url'] ?>"
                               class="flex items-center justify-center p4 text-center min-height-v15 darken-background darken-background-4">

                                <h5 class="h3 white mb0"><?= $item['box_title'] ?></h5>

                            </a>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>


        </div>

    </div>

</div>

<script>

    jQuery(document).ready(function ($) {
        //TODO: Move this into JS file

        function fetchTalent(page_number, firstLoad = false) {

            //TODO: Add loader while fetching data.
            var sector_filter = $('#sortby_sector option:selected').val();
            var type_filter = $('#sortby_type option:selected').val();
            var role_filter = $('#sortby_role option:selected').val();

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                method: 'POST',
                data: {
                    action: 'fetch_talent',
                    jobs_page: page_number,
                    sector_filter: sector_filter,
                    type_filter: type_filter,
                    role_filter: role_filter
                },
                success: function (response) {
                    $('#jobs-listing').html(response);
                    $('.js-match-height').matchHeight();

                    if (!firstLoad) {
                        $('html,body').animate({
                            scrollTop: $("#jobs-listing-header").offset().top
                        }, 'slow');
                    }
                }
            });
        }

        $('.talent-filters').on('change', function () {
            if ($(this).attr('id') == 'sortby_sector') {
                history.pushState("talents", "Cummins Mellor Recruitment", "/talents/" + $(this).val());
            }
            fetchTalent(1);
        });

        function updateFilterState(load_val, firstLoad = false) {
            $('#sortby_sector').val(load_val);
            fetchTalent(1, firstLoad);
        }

        $(document).on('click', '.page-number', function () {
            var page_number = $(this).data('page-number');
            fetchTalent(page_number);
        });

        window.onpopstate = function (event) {
            var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1);
            if (value != null)
                updateFilterState(value);
        };

        $(document).on("ready", function () {
            updateFilterState($('#sortby_sector').data('loadvalue'), true);
        });

    });


</script>

<?php get_footer(); ?>

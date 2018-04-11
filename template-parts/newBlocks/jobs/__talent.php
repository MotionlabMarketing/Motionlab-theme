<?php
/**
 * JOBS – TALENT LAYOUT BLOCK ------------------------
 * This block add support for a CTA block allowing the
 * user to link to other website areas.
 *
 * @author Joe Curran
 * @created 5 Feb 2018
 *
 * @version 1.00
 */

?>

<?php if (isset($_POST['action'])) : ?>

    <?php if (sizeof($block['posts']->posts) < 1) : ?>
        <h4 class="h4 mb1 text-center">No talent to show.</h4>
    <?php endif; ?>

    <?php
    foreach ($block['posts']->posts as $post) :
        ?>

        <div class="col-12 md-col-6 p3 left" data-mh="talent">
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
    <?php
    endforeach;
    exit();
    ?>

<?php endif; ?>

<section id="latestTalent" <?= get_blockClasses($block, "jobs-talent mt6 pt3 mb6") ?> <?= get_blockData($block) ?>>

    <div class="container">

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col-12 mb4">

            <form action="#" class="width-100 || flex justify-center flex-wrap">

                <?php $disabled = sizeof($block['sector_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;"
                        class="select mb4 md-ml3 width-100 md-width-auto box-shadow-3 talent-filter-select"
                        id="sortby_sector" <?= $disabled ?>>
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
                        class="select mb4  md-ml3 width-100 md-width-auto box-shadow-3 talent-filter-select"
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
                        class="select mb4 md-ml3 width-100 md-width-auto box-shadow-3 talent-filter-select"
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

        <div id="talent-listing" class="col-12 clearfix|| my6">
            <?php if (sizeof($block['posts']->posts) < 1) : ?>
                <h4 class="h4 mb1 text-center">No talent to show.</h4>
            <?php endif; ?>

            <?php
            foreach ($block['posts']->posts as $post) :
                ?>

                <div class="col-12 md-col-6 p3 || left">

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

            <?php
            endforeach;
            ?>

        </div>

    </div>

</section>

<script type="text/javascript">

    jQuery(document).ready(function ($) {

        <?php //TODO: MOVE THIS TO JS FILE ?>
        $('.talent-filter-select').on('change', function () {
            updateListing();
        });

        function updateListing() {
            //TODO: Update the two lines below to pull the page id and block name from the block itself.
            var pageID = $('#latestTalent').data('block-id').split('-')[0];
            //var blockName       = $('section.jobs-latest').data('block-name');
            var sector_filter = $('#sortby_sector option:selected').val();
            var type_filter = $('#sortby_type option:selected').val();
            var role_filter = $('#sortby_role option:selected').val();

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                method: 'POST',
                data: {
                    action: 'update_block',
                    page_id: pageID,
                    block_name: 'block_jobs',
                    sector_filter: sector_filter,
                    type_filter: type_filter,
                    role_filter: role_filter
                },
                success: function (response) {
                    $('#talent-listing').html(response);
                },
                complete: function () {
                    setTimeout(function () {

                        $.fn.matchHeight._apply('.js-match-height');
                        $.fn.matchHeight._apply('[data-mh="talent"]');
                        $.fn.matchHeight._apply('[data-mh="tags"]');

                    }, 300);
                }
            });
        }

        function updateFilterState(load_val, firstLoad = false) {
            $('#sortby_sector').val(load_val);
            updateListing();
        }

        $(document).on("ready", function () {
            updateFilterState($('#sortby_sector').data('loadvalue'), true);
        });

    });

</script>

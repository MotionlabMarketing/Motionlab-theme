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

$block['block_title']  = get_sub_field($current . '_title_title');
?>

<?php if(isset($_POST['action'])) :?>

    <?php
        foreach($block['posts']->posts as $post) :
    ?>

        <div class="listItem || col-12 md-col-6 relative left px2 pb2 mb2">

            <div class="border-bottom border-light clearfix p4 box-shadow-2">

                <div class="col col-12  md-col-9 || js-match-height">

                    <a href=""><h3 class="mb2 black h5"><?=$post->post_title?></h3></a>

                    <p class="h6 mb0 bold">LOCATION <span class="black">•</span> PERMANENT </p>

                </div>

                <div class="col col-12 md-col-3 || js-match-height || flex sm-items-center sm-justify-center">

                    <a href="" class="btn btn-primary btn-small white width-100 h6 right">Apply Now</a>

                </div>

            </div>

        </div>

    <?php
        endforeach;
        exit();
    ?>

<?php endif; ?>

<section <?=get_blockID($block)?> class="jobs-latest || mt6 mb6 clearfix" <?=get_blockData($block)?>>

    <div class="container">

        <div class="col-12 || mb3 || text-center">

            <div class="mb2">
                <?php

                if (!empty($block['block_title'][0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg limit-p limit-p-70">
                <?= get_sub_field($current . '_content'); ?>
            </div>

        </div>

        <div class="col-12 mb4">

            <form action="#" class="width-100 || flex justify-center">

                <?php $disabled = sizeof($block['sector_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 job-filter-select" id="sortby_sector" <?=$disabled?>>
                    <option value="">Filter by Sector</option>
                    <?php
                        foreach($block['sector_select_options'] as $option) :?>
                            <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                    <?php
                        endforeach;
                    ?>
                </select>

                <?php $disabled = sizeof($block['type_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 job-filter-select" id="sortby_type" <?=$disabled?>>
                    <option value="">Filter by Type</option>
                    <?php
                        foreach($block['type_select_options'] as $option) :?>
                            <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                    <?php
                        endforeach;
                    ?>
                </select>

                <?php $disabled = sizeof($block['location_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 job-filter-select" id="sortby_location" <?=$disabled?>>
                    <option value="">Filter by Location</option>
                    <?php foreach($block['location_select_options'] as $option) : ?>
                        <option class="option" value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php foreach($option->children as $option_children): ?>
                                <option class="optgroup" value="<?=$option_children->slug?>" data-taxonomy="<?=$option_children->taxonomy?>"><?=$option_children->name?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>

            </form>

        </div>

        <div id="job-listing" class="col-12 clearfix || md-px6 md-my6">

            <?php
                foreach($block['posts']->posts as $post) :
            ?>

                <div class="listItem || col-12 md-col-6 relative left px2 pb2 mb2">

                    <div class="border-bottom border-light clearfix p4 box-shadow-2">

                        <div class="col col-12  md-col-9 || js-match-height">

                            <a href=""><h3 class="mb2 black h5"><?=$post->post_title?></h3></a>

                            <p class="h6 mb0 bold"> <?=$post->locations[0]->name?> <span class="black">•</span> SALARY RANGE <span class="black">•</span> <?=$post->types[0]->name?> </p>

                        </div>

                        <div class="col col-12 md-col-3 || js-match-height || flex sm-items-center sm-justify-center">

                            <a href="<?=$post->guid?>" class="btn btn-primary btn-small white width-100 h6 right">Apply Now</a>

                        </div>

                    </div>

                </div>

            <?php
                endforeach;
            ?>

        </div>

    </div>

</section>

<script type="text/javascript">

    $('.job-filter-select').on('change', function(){
        updateListing();
    });

    function updateListing() {
        //TODO: Update the two lines below to pull the page id and block name from the block itself.
        //var pageID          = $('section.jobs-latest').data('page-id');
        //var blockName       = $('section.jobs-latest').data('block-name');
        var sector_filter   = $('#sortby_sector option:selected').val();
        var type_filter     = $('#sortby_type option:selected').val();
        var location_filter        = $('#sortby_location option:selected').val();

        $.ajax({
            url: '<?php echo admin_url( "admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'update_block',
                page_id: '6367',
                block_name: 'block_jobs',
                sector_filter: sector_filter,
                type_filter: type_filter,
                location_filter: location_filter
            },
            success: function(response){
                $('#job-listing').html(response);
            }
        });
    }
</script>

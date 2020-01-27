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
        if(!empty($block['posts']->posts)) :
            foreach($block['posts']->posts as $post) :
    ?>

                <div class="listItem || relative clearfix border-bottom border-light px5 py5 mb4 box-shadow-2 lg-flex items-center">

                    <div class="col col-12 lg-col-9 mb4">

                        <a href="<?= get_permalink($post->ID) ?>"><h3 class="mb2 h3"><?= $post->post_title ?></h3>
                        </a>

                        <?php if(get_field('jobs_role_salary', $post->ID) != ''):
                            $salary = get_field('jobs_role_salary', $post->ID);
                        else :
                            $salary = "Salary not Specified";
                        endif; ?>
                        <p class="h4 bold mb0"><?= $post->locations[0]->name ?><span
                                    class="muted"> •</span> <?= $salary ?> <span
                                    class="muted">•</span> <?= $post->types[0]->name ?></p>

                    </div>

                    <div class="col col-12 lg-col-3">

                        <a href="<?=get_permalink($post->ID)?>" class="btn btn-primary btn-small white lg-width-100 h6 lg-right">Find out more</a>

                    </div>

                </div>

    <?php
            endforeach;
        else:?>
            <?php if ($block['posts']->query['tax_query'][0]['terms'][0] == 'internal-vacancies') : ?>
                <p class="text-center p2 m1">Looks like we don’t have any specific vacancies at the moment, however we are always on the lookout for great people to join our team. If you’re interested in becoming a part of our business family, please contact Tracey on <a href="tel:01254 239363">01254 239363</a> or send your CV to <a href="mailTo:commercial@cumminsmellor.co.uk">commercial@cumminsmellor.co.uk</a></p><p class="text-center p2 m1"></p>
            <?php else: ?>
                <p class="text-center p2 m1">Oh dear, it looks like we don’t currently have any active vacancies in this sector. However we’re always on the lookout for great candidates and would love to speak to you to discuss your requirements and career goals. Please get in touch with us, we’d love to hear from you.</p><p class="text-center p2 m1"><strong>Contact the team on <a href="tel:01254 239363">01254 239363</a></strong></p>
            <?php endif; ?>
        <?php endif;
        exit();
    ?>

<?php endif; ?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "jobs-latest mt6 mb6")?> <?=get_blockData($block)?> data-page-id="<?=get_the_ID()?>">

    <div class="container">

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col-12 mb4">

            <form action="#" class="width-100 || md-flex justify-center">

                <?php $disabled = sizeof($block['sector_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 job-filter-select mb2" id="sortby_sector" <?=$disabled?>>
                    <option value="">Filter by Sector</option>

                    <?php if(isset($block['limited_categories']) && !empty($block['limited_categories'])) :
                        foreach($block['limited_categories'] as $option) :?>
                            <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php
                            endforeach;
                        ?>
                    <?php else:
                        foreach($block['sector_select_options'] as $option) :?>
                            <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php
                            endforeach;
                        ?>
                    <?php endif; ?>

                </select>

                <?php $disabled = sizeof($block['type_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 job-filter-select mb2" id="sortby_type" <?=$disabled?>>
                    <option value="">Filter by Type</option>
                    <?php
                        foreach($block['type_select_options'] as $option) :?>
                            <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                    <?php
                        endforeach;
                    ?>
                </select>

                <?php $disabled = sizeof($block['location_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 job-filter-select mb2" id="sortby_location" <?=$disabled?>>
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
            if(!empty($block['posts']->posts)) :
                foreach($block['posts']->posts as $post):
            ?>

                    <div class="listItem || relative clearfix border-bottom border-light px5 py5 mb4 box-shadow-2 lg-flex items-center">

                        <div class="col col-12 lg-col-9 mb4">

                            <a href="<?= get_permalink($post->ID) ?>"><h3 class="mb2 h3"><?= $post->post_title ?></h3>
                            </a>

                            <?php if(get_field('jobs_role_salary', $post->ID) != ''):
                                $salary = get_field('jobs_role_salary', $post->ID);
                            else :
                                $salary = "Salary not Specified";
                            endif; ?>
                            <p class="h4 bold mb0"><?= $post->locations[0]->name ?><span
                                        class="muted"> •</span> <?= $salary ?> <span
                                        class="muted">•</span> <?= $post->types[0]->name ?></p>

                        </div>

                        <div class="col col-12 lg-col-3">

                            <a href="<?=get_permalink($post->ID)?>" class="btn btn-primary btn-small white lg-width-100 h6 lg-right">Find out more</a>

                        </div>

                    </div>

            <?php
                endforeach;
            else: ?>
                <?php if ($block['posts']->query['tax_query'][0]['terms'][0] == 'internal-vacancies') : ?>
                    <p class="text-center p2 m1">Oh dear, it looks like we don’t currently have any active vacancies here at Cummins Mellor. However, we’re always on the lookout for ‘Cummins Mellor People’ and would love to speak to you if you feel you would be a great addition to our team. Please get in touch with us, we’d love to hear from you.</p><p class="text-center p2 m1"><strong>Contact Helen Jackson on <a href="tel:01254 239363">01254 239363</a> or email <a href="mailTo:helen@cumminsmellor.co.uk">helen@cumminsmellor.co.uk</a></strong></p>
                <?php else: ?>
                    <p class="text-center p2 m1">Oh dear, it looks like we don’t currently have any active vacancies in this sector. However we’re always on the lookout for great candidates and would love to speak to you to discuss your requirements and career goals. Please get in touch with us, we’d love to hear from you.</p><p class="text-center p2 m1"><strong>Contact Laura Garratt on <a href="tel:01254 239363">01254 239363</a></strong></p>
                <?php endif; ?>
            <?php endif;
            ?>

        </div>

    </div>

</section>

<script type="text/javascript">

    jQuery(document).ready(function ($) {

        $('.job-filter-select').on('change', function () {
            updateListing();
        });

        function updateListing() {
            //TODO: Update the two lines below to pull the page id and block name from the block itself.
            var pageID          = $('section.jobs-latest').data('page-id');
            //var blockName       = $('section.jobs-latest').data('block-name');
            var sector_filter = $('#sortby_sector option:selected').val();
            var type_filter = $('#sortby_type option:selected').val();
            var location_filter = $('#sortby_location option:selected').val();

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                method: 'POST',
                data: {
                    action: 'update_block',
                    page_id: pageID,
                    block_name: 'block_jobs',
                    sector_filter: sector_filter,
                    type_filter: type_filter,
                    location_filter: location_filter
                },
                success: function (response) {
                    $('#job-listing').html(response);
                }
            });
        }

    });
</script>

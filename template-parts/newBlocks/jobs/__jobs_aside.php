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

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');
$blockWidth  = get_sub_field($current . '_width_block_width');

$blockTitle  = get_sub_field($current . '_title_title');

$sections    = get_sub_field($current . '_sections');

?>

<section class="jobs-talent || mt6 mb6 clearfix || <?=$bgColor?> <?=$txtColor?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <div class="container">

        <div class="col-12 || mb5 || text-center">

            <div class="mb4">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg || mx6 px6">
                <?= get_sub_field($current . '_content'); ?>
            </div>

        </div>

            <div class="col-12 md-col-6 || p4 left">
                <?php
                $content = get_sub_field('block_jobs_aside_content');
                $blockTitle = $content['title'];

                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>

                <div class="wysiwyg">
                    <?= $content['content'] ?>
                </div>
            </div>

            <div class="col-12 md-col-6 || p4 left">

                <?php
                $content = get_sub_field('block_jobs_listing_content');
                $blockTitle = $content['title'];

                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>

                <div class="wysiwyg || pb3 mb4 border border-light border-bottom">
                    <?= $content['content'] ?>
                </div>

                <?php $i = 0; while($i < 2): ?>

                    <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                        <div class="col col-12">

                            <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                            <p class="h5 mb3">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                            <a href="/" class="btn btn-primary btn-small white px5">Read More</a>

                        </div>

                    </div>

                <?php $i++; endwhile; ?>

                <a href="/" class="btn btn-outline mt3">View all accountancy jobs</a>

            </div>

    </div>

</section>

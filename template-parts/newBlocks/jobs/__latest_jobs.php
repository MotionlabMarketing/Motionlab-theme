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

<section class="jobs-latest || mt6 mb6 clearfix || <?=$bgColor?> <?=$txtColor?>">

    <div class="container">

        <div class="col-12 || mb5 || text-center">

            <div class="mb4">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg limit-p limit-p-70 p2">
                <?= get_sub_field($current . '_content'); ?>
            </div>

        </div>

        <div class="col-12 clearfix || md-my6">

            <?php $i = 0; while($i < 6): ?>

                <div class="listItem || col-12 md-col-6 relative left px4 pb3">

                    <div class="border-bottom border-light clearfix pb3">

                        <div class="col col-12  md-col-9 || js-match-height">

                            <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                            <p class="h5 mb0">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                        </div>

                        <div class="col col-12 md-col-3 mt1 || js-match-height || flex sm-items-center sm-justify-center">

                            <a href="" class="btn btn-primary btn-small white right">Apply Now</a>

                        </div>

                    </div>

                </div>

            <?php $i++; endwhile; ?>

        </div>

    </div>

</section>
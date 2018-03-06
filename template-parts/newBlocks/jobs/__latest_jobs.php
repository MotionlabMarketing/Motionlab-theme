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

        <div class="col-12 || mb3 || text-center">

            <div class="mb2">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg limit-p limit-p-70">
                <?= get_sub_field($current . '_content'); ?>
            </div>

        </div>

        <div class="col-12 mb4">

            <form action="#" class="width-100 || flex justify-center">

                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                    <option value="title">By Sector</option>
                </select>

                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                    <option value="title">By Role</option>
                </select>

                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                    <option value="title">By Type</option>
                </select>

            </form>

        </div>

        <div class="col-12 clearfix || md-px6 md-my6">

            <?php $i = 0; while($i < 6): ?>

                <div class="listItem || col-12 md-col-6 relative left px2 pb2 mb2">

                    <div class="border-bottom border-light clearfix p4 box-shadow-2">

                        <div class="col col-12  md-col-9 || js-match-height">

                            <a href=""><h3 class="mb2 black h5">Account Manager – £POA</h3></a>

                            <p class="h6 mb0 bold">Blackburn <span class="black">•</span> £18,000 – £20,000 <span class="black">•</span> Permanent</p>

                        </div>

                        <div class="col col-12 md-col-3 || js-match-height || flex sm-items-center sm-justify-center">

                            <a href="" class="btn btn-primary btn-small white width-100 h6 right">Apply Now</a>

                        </div>

                    </div>

                </div>

            <?php $i++; endwhile; ?>

        </div>

    </div>

</section>
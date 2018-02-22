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

<section class="jobs-talent || mt6 mb6 clearfix || <?=$bgColor?> <?=$txtColor?>">

    <div class="container">

        <div class="col-12 || mb5 || text-center">

            <div class="mb2">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg || mx6 px6">
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

        <div class="col-12 clearfix|| my6">

            <?php $i = 0; while($i < 6): ?>

            <div class="col-12 md-col-6 || p4 left">

                <h4 class="h4 mb1">Stacy M Unknown</h4>
                <p class="bold mb2"><small class="inline-block mr4">Accrington</small><small>Permanent</small></p>

                <div class="block mb4"><span class="mr3 brand-primary">Roles available for</span>

                    <ul class="inline-block tags tags-right right">
                        <li>Administration</li>
                        <li>Accounts Clerk</li>
                        <li>Payroll</li>
                    </ul>
                </div>

                <p class="h6 pb4 || clearfix || border border-light border-bottom">
                    Lorem ipsum dolor sit amet, consectetur adipiscingelit. Vivamus id finibus justo. Phasellus aliquet odio mi, ac accumsan justo consectetur ut. Phasellus bibendum dui nisi.
                </p>

            </div>

            <?php $i++; endwhile; ?>

        </div>

    </div>

</section>
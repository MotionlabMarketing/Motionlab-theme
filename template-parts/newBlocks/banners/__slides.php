<?php
/**
* SLIDER IMAGE BANNER ---------------------------------------
* This block include images and content. This allows the
* content position to be moved from left, center or right.
*
* @author Joe Curran
* @created 16 Feb 2018
*
* @version 1.00
*/

$banner['height']                 = get_sub_field($current . '_height_min_height');
$banner['align']                  = get_sub_field($current . '_content_alignment');

$banner['text-align']             = get_sub_field($current . '_text_alignment_align');
$banner['text-color']             = get_sub_field($current . '_text_colour_system_text_colours');

$banner['slides']                 = get_sub_field($current . '_sliders');
$banner['image']['position']      = get_sub_field($current . '_image_position_background_position');

$banner['subheading']['position'] = get_sub_field($current . '_subheading_position');

$banner['image']['overlayType']     = get_sub_field('block_banners_image_overlay_overlayType');
$banner['image']['overlayStrength'] = get_sub_field('block_banners_image_overlay_overlayStrength');
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "banner z0 overflow-hidden overlay-{$banner['align']}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="col col-12 relative" data-slick="slider-auto-arrows">

        <?php foreach ($banner['slides'] as $slide): ?>

            <div id="<?=$block['custom_id']?>" class="bg-cover bg-<?=$banner['image']['position']?> <?=$banner['height']?> <?=$block['custom_css']?>" style="background-image: url('<?=$slide['image']['url']?>');" data-animation-in="fadeIn" data-delay-in=".5" data-duration-in="1">

                <div class="image-holder flex items-center <?=$banner['height']?> justify-<?=$banner['align']?>  bg-<?=$banner['image']['overlayType']?>-<?=$banner['image']['overlayStrength']?> width z-index-50 || p3 md-p6 py6">

                    <div class="content js-match-height || col-12 lg-col-9 xl-col-5 || p4 pb6 relative z5 <?=$banner['text-align']?> <?=$banner['text-color']?>">

                        <div class="pb4">
                            <?php if ($slide['logo_enableBefore'] == true && !empty($slide['logo_before']['url'])): ?>

                                <img src="<?=$slide['logo_before']['url']?>" alt="<?=$slide['logo_before']['alt']?>" class="logo-top || block mb3 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                            <?php endif; ?>

                            <?php /*SUBTITLE*/ if ($banner['subheading']['position'] == "top" && !empty($slide['titleSub_title'])): ?>

                                <?php $blockTitle = $slide['titleSub_title'];
                                    if (!empty($blockTitle[0]['title'])): ?>

                                <div class="subheading mb2">

                                    <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                                </div>

                            <?php endif; endif; ?>

                            <?php /*MAIN*/ $blockTitle = $slide['title'];
                                if (!empty($blockTitle[0]['title'])): ?>

                                <div class="title">

                                    <?php render_heading( "{$blockTitle[0]['title']}", "{$blockTitle[0]['type']['heading']}", "{$blockTitle[0]['size']['heading_size']}", "{$blockTitle[0]['color']['system_text_colours']}", "{$blockTitle[0]['title_case']['system_text_transform']}"); ?>

                                </div>

                            <?php endif; ?>

                            <?php /*SUBTITLE*/ if ($banner['subheading']['position'] == "bottom" && !empty($slide['titleSub_title'])): ?>

                                <?php $blockTitle = $slide['titleSub_title'];
                                if (!empty($blockTitle[0]['title'])): ?>

                                <div class="subheading mb2">

                                    <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                                </div>

                            <?php endif; endif; ?>

                            <?php render_wysiwyg($slide['content'], false, ["class" => "md-h3 bold"]); ?>

                            <?php if ($slide['button_buttons']): ?>
                                <div class="mt4">

                                    <?php render_buttons($slide['button_buttons'], "medium"); ?>

                                </div>
                            <?php endif; ?>

                            <?php if (!empty($slide['button_text_link']['title']) && !empty($slide['button_text_link']['url'])):  ?>

                                <a href="<?=$slide['button_text_link']['url']?>" class="btn btn-medium mx3" <?=($slide['button_text_link']['title'] ? 'title="'.$slide['button_text_link']['title'].'"' : '')?> <?=($slide['button_text_link']['target'] ? 'target="'.$slide['button_text_link']['target'].'"' : '')?> ><?=$slide['button_text_link']['title']?></a>

                            <?php endif; ?>

                            <?php if ($slide['logo_enableAfter'] == true && !empty($slide['logo_after']['url'])): ?>

                                <img src="<?=$slide['logo_after']['url']?>" alt="<?=$slide['logo_after']['alt']?>" class="logo-bottom || block mt3 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                            <?php endif; ?>
                        </div>

                    </div>

                </div>

                <?php if ($slide['add_overlay'] == true): ?>

                    <div class="absolute top-0 left-0 width-100 height-100 z-index-10 bg-<?=$slide['overlayType']?>-<?=$slide['overlayStrength']?>"></div>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

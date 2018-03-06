<?php
/**
 * BASIC IMAGE BANNER ---------------------------------------
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


$banner['title']                  = get_sub_field($current . '_title_title');
$banner['content']                = get_sub_field($current . '_content');
$banner['text-align']             = get_sub_field($current . '_text_alignment_align');
$banner['text-color']             = get_sub_field($current . '_text_colour_system_text_colours');

$banner['button']                 = get_sub_field($current . '_button');

$banner['image']                  = get_sub_field($current . '_image');
$banner['image']['position']      = get_sub_field($current . '_image_position_background_position');

$banner['subheading']['position'] = get_sub_field($current . '_subheading_position');
$banner['subheading']['title']    = get_sub_field($current . '_titleSub');

$banner['logos']['before']        = get_sub_field($current . '_logo_enableBefore');
$banner['logos']['after']         = get_sub_field($current . '_logo_enableAfter');

if ($banner['logos']['before'] == true):

    $banner['logos']['before']    = get_sub_field($current . '_logo_before');

endif;

if ($banner['logos']['after'] == true):

    $banner['logos']['after']    = get_sub_field($current . '_logo_after');

endif;

if ($banner['button'] == true):

    $banner['buttons'] = get_sub_field($current . '_buttons');

endif;

$banner['image']['overlay'] = get_sub_field($current . '_image_overlay_add_overlay');

if ($banner['image']['overlay'] == true):

    $banner['image']['overlayType']     = get_sub_field($current . '_image_overlay_type');
    $banner['image']['overlayStrength'] = get_sub_field($current . '_image_overlay_strength');

endif; ?>
<section id="<?=$block['custom_id']?>" class="clearfix relative z0 overflow-hidden <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> overlay-<?=$banner['align']?> <?=$block['custom_css']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col col-12 relative <?=$banner['height']?>">

            <div class="image-holder || absolute height-100 width-100 bg-<?=$banner['align'] ?> bg-<?=$banner['image']['position']?>" style="background-image: url('<?=$banner['image']['url']?>');">

                <?php if ($banner['image']['overlay'] == true): ?>

                    <div class="absolute top-0 left-0 width-100 height-100 z-index-10 bg-<?=$banner['image']['overlayType']?>-<?=$banner['image']['overlayStrength']?>"></div>

                <?php endif; ?>

                <div class="flex items-center justify-<?=$banner['align']?> || z-index-50 absolute width-100 height-100 || p3 md-p6">

                    <div class="content || width-100 || mt6 p4 z9 <?=$banner['text-align']?> <?=$banner['text-color']?>">

                        <?php if (!empty($banner['logos']['before']['url'])): ?>

                            <img src="<?=$banner['logos']['before']['url']?>" alt="<?=$banner['logos']['before']['alt']?>" class="logo-top || block mb4 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                        <?php endif; ?>

                        <?php /*SUBTITLE*/ if ($banner['subheading']['position'] == "top" && !empty($banner['subheading']['title']['title'])): ?>

                            <?php $blockTitle = $banner['subheading']['title']['title'];
                            if (!empty($blockTitle[0]['title'])): ?>

                                <div class="subheading || mb2">

                                    <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                                </div>

                            <?php endif; endif; ?>

                        <?php /*MAIN*/ $blockTitle = $banner['title'];
                        if (!empty($blockTitle[0]['title'])): ?>

                            <div class="title || mt4 mb2">

                                <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                            </div>

                        <?php endif; ?>

                        <?php /*SUBTITLE*/ if ($banner['subheading']['position'] == "bottom" && !empty($banner['subheading']['title']['title'])): ?>

                            <?php $blockTitle = $banner['subheading']['title']['title'];
                            if (!empty($blockTitle[0]['title'])): ?>

                                <div class="subheading || mb2">

                                    <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                                </div>

                            <?php endif; endif; ?>


                        <?php if (!empty($banner['content'])): ?>

                            <div class="wysiwyg || my4 limit-p limit-p-60">

                                <?=$banner['content']?>

                            </div>

                        <?php endif; ?>

                        <div class="mt4">
                        <?php foreach ($banner['buttons'] as $button): ?>

                                <a href="<?=$button['buttons_button_link']['url']?>" class="btn btn-medium <?=$button['buttons_system_text_colours']?> <?=$button['buttons_system_background_colours']?>" <?=($button['buttons_button_link']['title'] ? 'title="'.$button['button']['title'].'"' : '')?> <?=($button['buttons_button_link']['target'] ? 'target="'.$button['button']['target'].'"' : '')?> ><?=$button['buttons_button_link']['title']?></a>

                        <?php endforeach; ?>
                        </div>

                        <?php if (!empty($banner['logos']['after']['url'])): ?>

                            <img src="<?=$banner['logos']['after']['url']?>" alt="<?=$banner['logos']['after']['alt']?>" class="logo-bottom || block mt3 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
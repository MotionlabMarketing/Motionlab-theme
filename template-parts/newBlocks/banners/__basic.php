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
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "banner z0 overflow-hidden overlay-{$banner['align']}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="image-holder flex bg-<?=$banner['align'] ?> bg-<?=$banner['image']['position']?> <?=$banner['height']?>" style="background-image: url('<?=$banner['image']['url']?>');">

            <?php if ($banner['image']['overlay'] == true): ?>

                <div class="absolute top-0 left-0 width-100 height-100 z-index-10 bg-<?=$banner['image']['overlayType']?>-<?=$banner['image']['overlayStrength']?>"></div>

            <?php endif; ?>

            <div class="flex items-center justify-<?=$banner['align']?> || width-100 z-index-50 p3 md-p6 pt6">

                <div class="content || col-12 lg-col-9 xl-col-5 || p4 relative z9 <?=$banner['text-align']?> <?=$banner['text-color']?>">

                    <?php if (!empty($banner['logos']['before']['url'])): ?>

                        <img src="<?=$banner['logos']['before']['url']?>" alt="<?=$banner['logos']['before']['alt']?>" class="logo-top || block mb4 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                    <?php endif; ?>

                    <?php /*SUBTITLE*/ if ($banner['subheading']['position'] == "top" && !empty($banner['subheading']['title']['title'])): ?>

                        <?php $blockTitle = $banner['subheading']['title']['title'];
                        if (!empty($blockTitle[0]['title'])): ?>

                            <div class="subheading || mb2">

                                <?php render_heading( "{$blockTitle[0]['title']}", "{$blockTitle[0]['type']['heading']}", "{$blockTitle[0]['size']['heading_size']}", "{$blockTitle[0]['color']['system_text_colours']}", "{$blockTitle[0]['title_case']['system_text_transform']}"); ?>

                            </div>

                        <?php endif; endif; ?>

                    <?php /*MAIN*/ $blockTitle = $banner['title'];
                    if (!empty($blockTitle[0]['title'])): ?>

                        <div class="title"> <?php // pb2 h2 sm-h1 lg-h00 || mb0 || white text-none ?>

                            <?php render_heading( "{$blockTitle[0]['title']}", "{$blockTitle[0]['type']['heading']}", "{$blockTitle[0]['size']['heading_size']}", "{$blockTitle[0]['color']['system_text_colours']}", "{$blockTitle[0]['title_case']['system_text_transform']}"); ?>

                        </div>

                    <?php endif; ?>

                    <?php /*SUBTITLE*/ if ($banner['subheading']['position'] == "bottom" && !empty($banner['subheading']['title']['title'])): ?>

                        <?php $blockTitle = $banner['subheading']['title']['title'];
                        if (!empty($blockTitle[0]['title'])): ?>

                            <div class="subheading || mb2">

                                <?php render_heading( "{$blockTitle[0]['title']}", "{$blockTitle[0]['type']['heading']}", "{$blockTitle[0]['size']['heading_size']}", "{$blockTitle[0]['color']['system_text_colours']}", "{$blockTitle[0]['title_case']['system_text_transform']}"); ?>

                            </div>

                        <?php endif; endif; ?>

                    <?php render_wysiwyg($banner['content'], false, "md-h3 bold") ?>

                    <div class="mt4">
                    <?php foreach ($banner['buttons'] as $button): ?>

                        <a href="<?=$button['buttons_button_link']['url']?>" class="btn btn-medium mx4 min-width-8 <?=$button['buttons_system_text_colours']?> <?=$button['buttons_system_background_colours']?>" <?=($button['buttons_button_link']['title'] ? 'title="'.$button['button']['title'].'"' : '')?> <?=($button['buttons_button_link']['target'] ? 'target="'.$button['button']['target'].'"' : '')?>>

                            <?php if (!empty($button['buttons_button_icon'])): ?><div class="flex items-center"><?=wp_get_attachment_image($button['buttons_button_icon'], array(32, 32), "", ['class' => 'size-32x32 mr2'])?> <?php endif; ?>

                                <?=$button['buttons_button_link']['title']?>

                            <?php if (!empty($button['buttons_button_icon'])): ?></div><?php endif; ?>

                        </a>

                    <?php endforeach; ?>
                    </div>

                    <?php if (!empty($banner['logos']['after']['url'])): ?>

                        <img src="<?=$banner['logos']['after']['url']?>" alt="<?=$banner['logos']['after']['alt']?>" class="logo-bottom || block mt3 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                    <?php endif; ?>

                </div>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

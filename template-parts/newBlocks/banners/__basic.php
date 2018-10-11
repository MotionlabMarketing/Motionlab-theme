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

else:

    $banner['image']['overlayOld'] = get_sub_field($current . '_image_overlay_darken_strength');

endif;

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "banner z0 overflow-hidden overlay-{$banner['align']}")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="relative image-holder flex bg-<?=$banner['image']['position']?> min-height-20  md-<?=$banner['height']?> <?php if (empty($banner['image']['url'])):?>bg-smoke<?php endif; ?>" style="background-image: url('<?=$banner['image']['url']?>');">

            <?php
            // If image is missing or not set.
            if (empty($banner['image']['url'])): ?>
                <div class="content-container bg-smoke flex items-center justify-<?=$banner['align']?> width-100 relative z-index-50 p3 md-p6">
                    <p class="lead text-center"><strong>BANNER BLOCK</strong><br/>Please select or upload some images into this block!</p>
                </div>
            <?php else: ?>

                <?php 
                // Banner overlay.
                if ($banner['image']['overlay'] == true || $banner['image']['overlayOld']): ?>

                    <div class="absolute top-0 left-0 width-100 height-100 z-index-10 bg-<?=$banner['image']['overlayType']?>-<?=$banner['image']['overlayStrength']?> <?=$banner['image']['overlayOld']?>"></div>

                <?php endif;
                // Content area. ?>

                <div class="content-container flex items-center justify-<?=$banner['align']?> width-100 relative z-index-50 p3 md-p6">

                    <div class="content col-12 lg-col-9 xl-col-7 p4 relative z9 <?=$banner['text-align']?> <?=$banner['text-color']?>">

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

                        <?php 
                            if ($banner['text-align'] == "text-center")
                                $extra = "mx-auto";
                                
                            render_wysiwyg($banner['content'], false, ["class" => "md-h3 width-70 {$extra}"]) ?>

                        <?php if ($banner['buttons']): ?>
                            <div class="mt4 button-first">

                                <?php render_buttons($banner['buttons'], "medium", ["class" => "mr2"]); ?>

                            </div>
                        <?php endif; ?>

                        <?php if (!empty($banner['logos']['after']['url'])): ?>

                            <img src="<?=$banner['logos']['after']['url']?>" alt="<?=$banner['logos']['after']['alt']?>" class="logo-bottom || block mt3 <?=($banner['align'] == 'center')? "mx-auto" : "" ?>">

                        <?php endif; ?>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

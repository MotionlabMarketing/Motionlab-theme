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

$banner['height']             = get_sub_field($current . '_height_min_height');
$banner['align']              = get_sub_field($current . '_content_alignment');

$banner['text-align']         = get_sub_field($current . '_text_alignment_align');
$banner['text-color']         = get_sub_field($current . '_text_colour_system_text_colours');

$banner['slides']             = get_sub_field($current . '_sliders');
$banner['image']['position']  = get_sub_field($current . '_image_position_background_position');

if ($banner['button'] == true):

    $banner['button'] = get_sub_field($current . '_button_content');

endif;

$banner['image']['overlay']   = get_sub_field($current . '_image_overlay_add_overlay');

if ($banner['image']['overlay'] == true):

    $banner['image']['overlayType']     = get_sub_field($current . '_image_overlay_type');
    $banner['image']['overlayStrength'] = get_sub_field($current . '_image_overlay_strength');

endif;

?>

<section id="<?=$block['custom_id']?>" class="clearfix relative z0 overflow-hidden <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> overlay-<?=$banner['align']?> <?=$block['custom_css']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="col col-12 relative <?=$banner['height']?>" data-slick="slider-auto-arrows">

        <?php foreach ($banner['slides'] as $slide): ?>

        <div class="image-holder || js-match-height ||  absolute height-100 width-100 bg-<?=$banner['align'] ?> bg-<?=$banner['image']['position']?> <?=$banner['height']?>" style="background-image: url('<?=$slide['image']['url']?>');" data-animation-in="fadeIn" data-delay-in=".5" data-duration-in="1">

            <div class="flex items-center justify-<?=$banner['align']?> || z-index-50 absolute width-100 height-100 || p3 md-p6">

                <div class="content || max-width-50 || p4 <?=$banner['text-align']?> <?=$banner['text-color']?>">

                    <?php $blockTitle = $slide['title'];
                    if (!empty($blockTitle[0]['title'])): ?>

                        <div class="mb4">

                            <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                        </div>

                    <?php endif; ?>


                    <?php if (!empty($slide['content'])): ?>

                        <div class="wysiwyg || my4">

                            <?=$slide['content']?>

                        </div>

                    <?php endif; ?>

                    <?php if (!empty($slide['button_text_link']['title']) && !empty($slide['button_text_link']['url'])): ?>

                        <a href="<?=$slide['button_text_link']['url']?>" class="btn btn-medium" <?=($slide['button_text_link']['title'] ? 'title="'.$slide['button_text_link']['title'].'"' : '')?> <?=($slide['button_text_link']['target'] ? 'target="'.$slide['button_text_link']['target'].'"' : '')?> ><?=$slide['button_text_link']['title']?></a>

                    <?php endif; ?>
                </div>

            </div>

            <?php if ($banner['image']['overlay'] == true): ?>

                <div class="absolute top-0 left-0 width-100 height-100 z-index-10 bg-<?=$banner['image']['overlayType']?>-<?=$banner['image']['overlayStrength']?>"></div>

            <?php endif; ?>

        </div>

        <?php endforeach; ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
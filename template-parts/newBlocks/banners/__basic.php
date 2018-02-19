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

$banner['height']             = get_sub_field($current . '_height_min_height');
$banner['align']              = get_sub_field($current . '_content_alignment');


$banner['title']              = get_sub_field($current . '_title_title');
$banner['content']            = get_sub_field($current . '_content');
$banner['text-align']         = get_sub_field($current . '_text_alignment_align');
$banner['text-color']         = get_sub_field($current . '_text_colour_system_text_colours');

$banner['button']             = get_sub_field($current . '_button');

$banner['image']              = get_sub_field($current . '_image');
$banner['image']['position']  = get_sub_field($current . '_image_position_background_position');

if ($banner['button'] == true):

    $banner['button'] = get_sub_field($current . '_button_content');

endif;

$banner['image']['overlay'] = get_sub_field($current . '_image_overlay_add_overlay');

if ($banner['image']['overlay'] == true):

    $banner['image']['overlayType']     = get_sub_field($current . '_image_overlay_type');
    $banner['image']['overlayStrength'] = get_sub_field($current . '_image_overlay_strength');

endif;

?>

<section id="<?=$block['custom_id']?>" class="clearfix relative z0 overflow-hidden <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> overlay-<?=$banner['align']?> <?=$block['custom_css']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col col-12 relative <?=$banner['height']?>">

            <div class="image-holder || absolute height-100 width-100 bg-<?=$banner['align'] ?> bg-<?=$banner['image']['position']?>" style="background-image: url('<?=$banner['image']['url']?>');">

                <div class="flex items-center justify-<?=$banner['align']?> || z-index-50 absolute width-100 height-100 || p3 md-p6">

                    <div class="content || max-width-50 || p4 z9 <?=$banner['text-align']?> <?=$banner['text-color']?>">

                        <?php $blockTitle = $banner['title'];
                            if (!empty($blockTitle[0]['title'])): ?>

                            <div class="mb4">

                                <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($banner['content'])): ?>

                            <div class="wysiwyg || my4">

                                <?=$banner['content']?>

                            </div>

                        <?php endif; ?>

                        <?php if (!empty($banner['button']['title']) && !empty($banner['button']['url'])): ?>

                            <a href="<?=$banner['button']['url']?>" class="btn btn-medium" <?=($banner['button']['title'] ? 'title="'.$banner['button']['title'].'"' : '')?> <?=($banner['button']['target'] ? 'target="'.$banner['button']['target'].'"' : '')?> ><?=$banner['button']['title']?></a>

                        <?php endif; ?>
                    </div>

                    <?php if ($banner['image']['overlay'] == true): ?>

                        <div class="absolute top-0 left-0 width-100 height-100 z-index-10 bg-<?=$banner['image']['overlayType']?>-<?=$banner['image']['overlayStrength']?>"></div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<?php
$ctaId = get_sub_field('cta_picker');
$buttonText = get_field('button_text', $ctaId);

if( get_sub_field('half_as_much')){
    $halfAsMuch = get_sub_field('half_align_content');
} else{
    $halfAsMuch = "";
}

$image = get_sub_field('background_image')['sizes']['large'];

if( get_sub_field('banner_height_banner_height') == 'lg-min-height-v100' ) {
    $bannerHeight = "minus-js-header-height";
} else {
    $bannerHeight = get_sub_field('banner_height_banner_height');
};


$buttons        = get_sub_field('buttons');
$enable_buttons = get_sub_field('enabled_buttons');
$size           = get_sub_field('block_buttons_size');

?>

<!-- full width banner -->

<?php if( get_sub_field('banner_height_banner_height') == 'lg-min-height-v100' && $index == 0 ){ ?>
    <div headroom-negative-space class="display-none lg-block">
        <!-- A nasty fix to a nasty 100vh issue with a static header -->
    </div>
<?php } ?>

<section class="relative z1 overflow-hidden || bg-cover ||
<?php echo 'bg-' . get_sub_field('background_color_color') ?> <?php echo $txtColor ?> <?php echo 'bg-' . get_sub_field('background_position_background_position') ?> <?php echo get_sub_field('fake_parallax') == TRUE ? 'bg-fixed' : '' ?>" style="background-image:url('<?php echo $image?>')">

<?php if ( get_sub_field('overlay_add_overlay')){ ?>
    <div class="zn1 absolute top-0 left-0 right-0 bottom-0 <?php echo 'bg-' . get_sub_field('overlay_type') . '-' . get_sub_field('overlay_strength') ?> <?php echo $halfAsMuch ?>" data-aos="fade" <?php echo $animationSpeed ?> <?php echo $animationDelay ?> <?php echo $animationRepeat ?>></div>
<?php } ?>

<?php if (get_sub_field('bleed_out_colour') == TRUE && get_sub_field('bleed_color_top')) { ?>
    <div class="zn1 absolute top-0 left-0 right-0 bottom-0 banner-top-gradient-<?php echo get_sub_field('background_color_color') ?>"></div>
<?php } ?>
<?php if (get_sub_field('bleed_out_colour') == TRUE && get_sub_field('bleed_color_bottom')){ ?>
    <div class="zn1 absolute top-0 left-0 right-0 bottom-0 banner-bottom-gradient-<?php echo get_sub_field('background_color_color') ?>"></div>
<?php } ?>

<div class="<?php echo $halfAsMuch ?>">
    <div class=" container || lg-flex flex-column lg-flex-row items-center || px4 py5 || <?php echo get_sub_field('narrow_columns') == TRUE ? 'measure-wide' : '' ?> <?php echo $bannerHeight; ?>" <?php echo $animationType ?> <?php echo $animationSpeed ?> <?php echo $animationDelay ?> <?php echo $animationRepeat ?>>
        <!-- echo get_sub_field('banner_height_banner_height') -->
        <div class="col-12 flex flex-column lg-flex-row my2 <?php echo get_sub_field('text_align_align') ?>">
            <div class="spacer || display-none lg-block" <?php if( get_sub_field('banner_height_banner_height') == 'lg-min-height-v100' && $index == 0 ){ ?> headroom-space <?php } ?>> </div>

                <div class="flex flex-column col-12" >
                    <div class="">
                        <?php if(!empty(get_sub_field('subtitle'))){ ?>
                           <h5 class="sans uppercase ls3 md-ls4 lh1 md-mb4"><?php echo get_sub_field('subtitle') ?></h5>
                        <?php } ?>
                        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title-loop.php') ?>
                    </div>

                    <?php if (get_sub_field('copy')){ ?>
                        <div class="wysiwyg mb5 pt2"><?php echo get_sub_field('copy') ?></div>
                    <?php } ?>


                    <?php if ($enable_buttons == true):?>

                        <div class="my2">

                        <?php foreach ($buttons as $btn): ?>

                            <a href="<?=$btn['button_link']['url']?>" class="btn btn-<?=$size?> border-radius-<?=$border?> white inline-block bg-<?=$btn['colour_color']?> <?=$btn['custom_class']?>" <?=($btn['button_link']['title'] ? 'title="'.$btn['button_link']['title'].'"' : '')?> <?=($btn['button_link']['target'] ? 'target="'.$btn['button_link']['target'].'"' : '')?>>
                                <?=$btn['button_text']?>
                            </a>

                        <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</section>

<?php unset ($narrowColumns); ?>

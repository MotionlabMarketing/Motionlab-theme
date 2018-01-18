<?php
$ctaId = get_field('global_banner_cta_picker');
$buttonText = get_field('button_text', $ctaId);

if( get_field('global_banner_half_as_much', 'option')){
	$halfAsMuch = get_field('global_banner_half_align_content', 'option');
} else{
	$halfAsMuch = "";
}

if (get_field('global_banner_text_color', 'option') ){
	$txtColor =get_field('global_banner_text_color', 'option');
} else{
	$txtColor = get_field('default_text_color', 'option');
}

// default animation settings
if(get_field('global_banner_animation_animate_block', 'option')){
	$animationType = 'data-aos="' .get_field('global_banner_animation_animation_type', 'option') . '"';
	$animationSpeed = 'data-aos-duration="' .get_field('global_banner_animation_animation_speed', 'option') . '"';
	$animationDelay = 'data-aos-delay="' .get_field('global_banner_animation_animation_delay', 'option') . '"';
	$animationRepeat = 'data-aos-once="' .get_field('global_banner_animation_animation_repeat', 'option') . '"';
}
else{
	$animationType = '';
	$animationSpeed = '';
	$animationDelay = '';
	$animationRepeat = '';
}

// default button color
if ( !empty(get_sub_field('button_color_color'))){
	$btnBgcolor = get_sub_field('button_color_color');
} else{
	$btnBgcolor = get_field('default_button_color', 'option');
}

// default button text color
if ( get_sub_field('button_text_color') ){
	$btnTxtcolor = get_sub_field('button_text_color');
} else {
	$btnTxtcolor = get_field('default_button_text_color', 'option');
}

$image = get_field('global_banner_background_image', 'option')['sizes']['large'];

?>


<!-- GLOBAL full width banner -->

<?php if( get_field('global_banner_banner_height_banner_height', 'option') == 'lg-min-height-v100' && $index == 0 ){ ?>
	<div headroom-negative-space class="display-none lg-block">
		<!-- A nasty fix to a nasty 100vh issue with a static header -->
	</div>
<?php } ?>

<section class="relative z1 overflow-hidden || bg-cover || <?php echo 'bg-' . get_field('global_banner_background_color_color', 'option') ?> <?php echo $txtColor ?> <?php echo 'bg-' . get_field('global_banner_background_position_background_position', 'option') ?> <?php echo get_field('global_banner_fake_parallax', 'option') == TRUE ? 'bg-fixed' : '' ?>" style="background-image:url('<?php echo $image?>')">

	<?php if ( get_field('global_banner_overlay_add_overlay', 'option')){ ?>
		<div class="zn1 absolute top-0 left-0 right-0 bottom-0 <?php echo 'bg-' . get_field('global_banner_overlay_type', 'option') . '-' . get_field('global_banner_overlay_strength', 'option') ?> <?php echo $halfAsMuch ?>" data-aos="fade" <?php echo $animationSpeed ?> <?php echo $animationDelay ?> <?php echo $animationRepeat ?>></div>
	<?php } ?>

	<?php if (get_field('global_banner_bleed_out_colour', 'option') == TRUE && get_field('global_banner_bleed_color_top', 'option')) { ?>
		<div class="zn1 absolute top-0 left-0 right-0 bottom-0 banner-top-gradient-<?php echo get_field('global_banner_background_color_color', 'option') ?>"></div>
	<?php } ?>
	<?php if (get_field('global_banner_bleed_out_colour', 'option') == TRUE && get_field('global_banner_bleed_color_bottom', 'option')){ ?>
		<div class="zn1 absolute top-0 left-0 right-0 bottom-0 banner-bottom-gradient-<?php echo get_field('global_banner_background_color_color', 'option') ?>"></div>
	<?php } ?>

	<div class="<?php echo $halfAsMuch ?>">
		<div class="container || lg-flex flex-column lg-flex-row items-center || px4 py5 || <?php echo get_field('global_banner_banner_height_banner_height', 'option') ?> " <?php echo $animationType ?> <?php echo $animationSpeed ?> <?php echo $animationDelay ?> <?php echo $animationRepeat ?>>
			<div class="col-12 flex flex-column lg-flex-row my2 <?php echo get_field('global_banner_text_align_align', 'option') ?> <?php echo get_field('global_banner_narrow_columns', 'option') == TRUE ? 'measure-wide' : '' ?>">
				<div class="spacer || display-none lg-block" <?php if( get_field('global_banner_banner_height_banner_height', 'option') == 'lg-min-height-v100' && $index == 0 ){ ?> headroom-space <?php } ?>> </div>

				<div class="flex flex-column col-12" >
					<div class="">
						<?php if(!empty(get_field('global_banner_subtitle', 'option'))){ ?>
							<h5 class="sans uppercase ls3 md-ls4 lh1 md-mb4"><?php echo get_field('global_banner_subtitle', 'option') ?></h5>
						<?php } ?>
						<?php if ( have_rows('global_banner_block_title_title', 'option')) {
							while ( have_rows('global_banner_block_title_title', 'option')) {
								the_row();?>
								<?php if (get_sub_field('title')){ ?>
									<<?php echo get_sub_field('heading') ?> class="lh1 || <?php echo get_sub_field('size_heading_size') ?>">
									<?php echo get_sub_field('title') ?>
									</<?php echo get_sub_field('heading') ?>>

								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>

					<?php if (get_field('global_banner_copy', 'option')){ ?>
						<div class="wysiwyg mb5"><?php echo get_field('global_banner_copy', 'option') ?></div>
					<?php } ?>

					<?php
					if( get_field('global_banner_button_type', 'option') == 'page' ){
						$buttonURL = get_field('global_banner_button_url', 'option');
					} else{
						$buttonURL = get_field('global_banner_button_url_custom', 'option');
					}
					?>

					<!-- button -->
					<?php if (get_field('global_banner_button_add', 'option')){ ?>
						<div>
							<a href="<?php echo $buttonURL ?>" class="btn || <?php echo 'bg-' . $btnBgcolor ?> <?php echo $btnTxtcolor ?>">
								<span class=""><?php echo get_field('global_banner_button_text', 'option') ?></span>
							</a>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>

</section>

<?php unset ($narrowColumns); ?>

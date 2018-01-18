<?php
if( get_sub_field('media_placement') =='left' ){
	$layout = "left";
	$textAlign = "text-left";
} else{
	$layout = "right";
	$textAlign = "text-right";
}
if( get_sub_field('full_width_full_width') == 'container'){
   $extraPadding = $masterPad;
} else {
   $extraPadding = '';
}
?>



<!-- alternating media -->
<section class="<?php echo $bgColor ?> <?php echo $txtColor ?> overflow-hidden">
	<div class="<?php echo get_sub_field('full_width_full_width') ?> || lg-height-100 flex flex-column lg-flex-row items-center <?php echo $extraPadding ;?> <?php echo get_sub_field('spacing_top') == TRUE ? 'pt6' : '' ?> <?php echo get_sub_field('spacing_bottom') == TRUE ? 'pb6' : '' ?>">
		<?php if(get_sub_field('media_type') == 'Image') : ?>
			<div class="self-stretch bg-center <?php if ($layout == "left"){ ?> order-0 <?php } else { ?> order-1 <?php } ?> || col-12 lg-col-6 || <?php echo get_sub_field('background_position_background_position') ?> bg-cover || min-height-v25">
				<img src="<?php echo get_sub_field('image')['sizes']['large'] ?>" class="block" />
			</div>
		<?php else: ?>
			<div class="self-stretch bg-center <?php if ($layout == "left"){ ?> order-0 <?php } else { ?> order-1 <?php } ?> || col-12 lg-col-6 || <?php echo get_sub_field('background_position_background_position') ?> bg-cover || min-height-v25" style="background-image:url('<?php echo get_sub_field('image')['sizes']['large'] ?>')">
				<div class="video-wrapper">
					<?php echo get_sub_field('video') ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="<?php if($layout == 'left'){ ?> order-0 lg-pl6 lg-order-1 self-stretch flex items-center <?php } else { ?> order-1 lg-pr6 lg-order-0 self-stretch flex items-center <?php } ?> || col-12 lg-col-6 || py4"  <?php echo $animationType ?> <?php echo $animationSpeed ?> <?php echo $animationDelay ?>>
			<div class="container <?php echo get_sub_field('text_align_align') ?> <?php echo $measureWide ?>">
				<?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title-loop.php') ?>
				<?php if (!empty (get_sub_field('copy'))) { ?>
					<div class="wysiwyg pt3"><?php echo get_sub_field('copy') ?></div>
				<?php } ?>
				<?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/button.php') ?>
			</div>
		</div>
	</div>
</section>

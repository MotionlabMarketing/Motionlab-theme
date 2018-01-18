<?php
if( get_sub_field('media_placement') =='left' ){
	$imagePosition = "left-0";
	$imagePlacement = "background-position: 99%;";
	$copyPlacement = "md-offset-6 col-12 right";
} else{
	$imagePosition = "right-0";
	$imagePlacement = "background-position: 0%;";
	$copyPlacement = "";
}
?>

<!-- Product Alt Media -->
<div class="<?php echo $bgColor ?> relative <?php echo $txtColor ?>" id="features">
	<figure class="md-absolute <?php echo $imagePosition ?> top-0 col-12 md-col-6 height-100 m0 bg-cover <?php echo 'bg-' . get_sub_field('background_color_color') ?>" style="background-image:url('<?php echo get_sub_field('image')['sizes']['large'] ?>'); background-blend-mode: multiply; <?php echo $imagePlacement ?> center; min-height:350px;"></figure>
	<div class="container px5 md-py7 <?php echo $measureWide ?>">
		<div class="clearfix">
			<div class="col col-12 md-px5 py6 md-col-6 || <?php echo $copyPlacement ?> || <?php echo get_sub_field('text_align_align') ?>">
				<?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title-loop.php') ?>
				<?php if (!empty (get_sub_field('copy'))) { ?>
					<div class="wysiwyg pb3"><?php echo get_sub_field('copy') ?></div>
				<?php } ?>
				<?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/button.php') ?>
			</div>
		</div>
	</div>
</div>

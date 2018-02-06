<?php

// TODO: This block need refining. Short content with left align results in text looking centered.

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

// BLOCK BORDERS //
$borderColour = get_sub_field('block_border_border_colour');
$borderSides  = "";
$borderSidesA = get_sub_field('block_border_border_sides');
foreach ($borderSidesA as $side):
    $borderSides .=  $side . " ";
endforeach;

// BLOCK TITLE //
$blockTitle  = get_sub_field('block_title_title');
?>



<!-- alternating media -->
<section class=" mt6 mb6 <?php echo $bgColor ?> <?php echo $txtColor ?> overflow-hidden">
	<div class="<?=$borderSides?> <?=$borderColour?> <?php echo get_sub_field('full_width_full_width') ?> || lg-height-100 flex flex-column lg-flex-row items-center <?php echo get_sub_field('spacing_top') == TRUE ? 'pt6' : '' ?> <?php echo get_sub_field('spacing_bottom') == TRUE ? 'pb6' : '' ?>">
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
		<div class="<?php if($layout == 'left'){ ?> order-0 lg-p5 lg-order-1 self-stretch flex items-center <?php } else { ?> order-1 lg-p5 lg-order-0 self-stretch flex items-center <?php } ?> || col-12 lg-col-6 || py4"  <?php echo $animationType ?> <?php echo $animationSpeed ?> <?php echo $animationDelay ?>>
			<div class="container p3 <?php echo get_sub_field('text_align_align') ?> <?php echo $measureWide ?>">

                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

				<?php if (!empty (get_sub_field('copy'))) { ?>
					<div class="wysiwyg"><?php echo get_sub_field('copy') ?></div>
				<?php } ?>
				<?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/button.php') ?>
			</div>
		</div>
	</div>
</section>

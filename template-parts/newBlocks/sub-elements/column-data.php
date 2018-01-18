<?php
if ( get_sub_field('add_icon') ){
	$icons= "block";
} else {
	$icons= "display-none";
}
if( get_sub_field('button_type') == 'page' ){
	$buttonURL = get_sub_field('url');
} else{
	$buttonURL = get_sub_field('url_custom');
}
?>

<?php if(!empty(get_sub_field('copy'))){?>
	<div class="<?php echo $columnWidth ?> <?php echo $textAlign ?> || js-match-height">
		<div class="flex flex-column height-100 <?php echo $anchorButtons ?>">
			<div class="">
				<?php if ( have_rows('icon')){
					while ( have_rows('icon')){
						the_row();?>
						<div class="col-12 fa fa-fw <?php echo get_sub_field('icon_size'); ?> <?php echo get_sub_field('icon'); ?> || mb3 pt1  <?php echo $textAlign ?> <?php echo $icons ?>"></div>
					<?php };
				};?>

				<div class="wysiwyg col-12 <?php echo $textAlign ?>">
					<?php echo get_sub_field('copy'); ?>
				</div>
			</div>
			<?php if (get_sub_field('button_text')){ ?>
				<div class="">
					<a href="<?php echo $buttonURL ?>" class="btn regular uppercase mt4 text-center <?php echo $btnBgcolor ?> <?php echo $btnTxtcolor ?>">
						<span class=""><?php echo get_sub_field('button_text'); ?></span>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>

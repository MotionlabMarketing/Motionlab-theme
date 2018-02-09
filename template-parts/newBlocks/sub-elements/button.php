<?php
if( get_sub_field('button_type') == 'page' ){
	$buttonURL = get_sub_field('button_url');
} else{
	$buttonURL = get_sub_field('button_url_custom');
}
?>

<!-- button -->
<?php if (get_sub_field('button_add')){ ?>
	<div class="mt3">
		<a href="<?php echo $buttonURL ?>" class="btn btn-primary btn-medium || <?php echo $btnBgcolor ?> <?php echo $btnTxtcolor ?>">
			<span class=""><?php echo get_sub_field('button_text') ?></span>
		</a>
	</div>
<?php } ?>

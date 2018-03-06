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

$columnTitle          = get_sub_field('column_title');
$columnButtonsText    = get_sub_field('button_text');
$columnButtonsLink    = get_sub_field('button_link');
$columnButtonsColour  = get_sub_field('colour');
$columnButtonsClass   = get_sub_field('button_custom_class');

$buttonBorderRadius   = str_replace(".", "-", get_field('buttons_border_radius', 'option'));

$columnsCustomClass   = get_sub_field('columns_custom_class');

$blockTitle           = get_sub_field('column_title_title');

?>

<?php //print_r(get_field_objects()); ?>
<?php if(!empty(get_sub_field('copy'))){?>
	<div class="column-data relative flex flex-column <?php echo $columnWidth ?> <?php echo $textAlign ?> <?=$columnsCustomClass?>">

		<?php if (!empty($blockTitle[0]['title'])): ?>
        <div class="mb2">
            <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
        </div>
		<?php endif; ?>

		<?php if ( have_rows('icon')){
			while ( have_rows('icon')){
				the_row();?>
				<div class="col-12 fa fa-fw <?php echo get_sub_field('icon_size'); ?> <?php echo get_sub_field('icon'); ?> || mb3 pt1  <?php echo $textAlign ?> <?php echo $icons ?>"></div>
			<?php };
		};?>

		<div class="height-100 <?php echo $textAlign ?> <?php echo $anchorButtons ?>">
			<?php echo get_sub_field('copy'); ?>
            <?php if (!empty($columnButtonsLink) && !empty($columnButtonsText)):?>
            <div class="my3">
                <a href="<?=$columnButtonsLink['url']?>" class="btn btn-<?=$size?> border-radius-<?=$buttonBorderRadius['border_radius_strength']?> white inline-block bg-<?=$columnButtonsColour?>" <?=($btn['button_link']['title'] ? 'title="'.$btn['button_link']['title'].'"' : '')?> <?=($btn['button_link']['target'] ? 'target="'.$btn['button_link']['target'].'"' : '')?>>
                    <?=$columnButtonsText?>
                </a>
            </div>
            <?php endif; ?>
		</div>

	</div>
<?php } ?>

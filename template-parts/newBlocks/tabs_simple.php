<?php
if ( get_sub_field('vertical_tabs') ){
	$tabNav= 'md-flex md-flex-row';
	$tabName= 'mb4 md-col-4 lg-col-3 md-mb0 md-border-right border-smoke';
	$tab= 'hover-bg-smoke inline-block md-block md-border-bottom-none md-border-left-none md-border-right-none px2';
	$content = '';
	$pad = '';
	$contentPad = 'md-px4 py3';
} else {
	$tabNav= 'flex flex-column';
	$tabName = 'flex border-bottom border-smoke';
	$tab= 'btn md-text-left border-bottom-none || rounded-top mr1 px3';
	$content = 'pt4';
	$pad = '';
	$contentPad = '';
}
?>

<!-- tabs - simple -->
<section class="pt4 <?php echo $bgColor ?> <?php echo $txtColor ?>">
	<div data-tabs="wrapper" class="container <?php echo $extraPadding ;?> <?php echo $tabNav ?> <?php echo $measureWide ?> || traditional-tabs">
		<div class="col col-12 <?php echo $pad ?> <?php echo $tabName ?>">
			<?php if( have_rows('tabs')){
				$i = 1 ;
				while ( have_rows('tabs')){
					the_row() ?>

					<span data-section="tab<?php echo $i ?>" class="border border-smoke cursor-pointer narrow uppercase py3 bold || tab <?php echo $tab ?> || <?php echo $i <= 1 ? 'tab-active' : '' ?>">
						<?php echo get_sub_field('tab_name') ?>
					</span>

					<?php $i++ ; ?>
				<?php } ?>
			<?php } ?>
		</div>

		<div data-tabs="content" class="col-12 <?php echo $contentPad ?> <?php echo $txtColor ?>">
			<?php if( have_rows('tabs')){
				$i = 1 ;
				while ( have_rows('tabs')){
					the_row() ?>
					<section id="tab<?php echo $i ?>" class="<?php echo $content ?> <?php echo ($i > 1) ? 'hide' : '' ?>">
						<div class="wysiwyg">
							<h4><?php echo get_sub_field('title') ?></h4>
							<p><?php echo get_sub_field('content') ?></p>
						</div>
					</section>
					<?php $i++ ; ?>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>

<!-- sticky menu -->
<section class="<?php echo 'bg-' . get_sub_field('background_color_color') ?> <?php echo $txtColor ?>">
	<div class="pb4 md-pb5 <?php echo $paddingTop == 'collapse-top' ? 'pt4 lg-pt0' : 'pt4 md-pt5' ?>">
		<nav class="bg-white z4 width-100 display-none lg-block" data-sticky>
			<ul class="list-reset m0 p0 text-center">
				<?php if ( have_rows('menu_item')){
					while ( have_rows('menu_item')){
						the_row() ?>
						<li class="align-middle px1 inline-block">
							<a href="#menu_anchor_<?php echo get_sub_field('id') ?>" class="left charcoal hover-primary bold narrow uppercase px2 py3 text-decoration-none"><?php echo get_sub_field('title') ?></a>
						</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</nav>
	</div>
</section>

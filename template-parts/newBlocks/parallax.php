<!-- parallax -->
<!-- <section class="bg-blue bg-cover bg-center relative z1" style="background-image:url(<?php echo get_sub_field('parallax_main_image')['sizes']['large'] ;?>);height:<?php echo get_sub_field('parallax_height') . 'px'; ?>">
	<div class="container">
		<div class="col-1" style="margin-left:41%">
			<div class="bg-white rounded rellax" style="height:30px;width:30px" data-rellax-speed="<?php echo get_sub_field('parallax_speed'); ?>" data-rellax-percentage="0.5"></div>
		</div>
	</div>
</section> -->



<section class="bg-black bg-cover bg-center relative z1" style="height:800px">
	<div class="container">
		<?php if ( have_rows('parallax_items')) : ?>
            <?php while ( have_rows('parallax_items')) : ?>
                <?php the_row() ?>

				<div class="col-1" style="margin-left:<?php echo get_sub_field('margin_left'); ?>%">
					<div class="bg-<?php echo get_sub_field('color'); ?> rounded rellax" style="height:<?php echo get_sub_field('size'); ?>px;width:<?php echo get_sub_field('size'); ?>px" data-rellax-speed="<?php echo get_sub_field('speed'); ?>" data-rellax-percentage="0.5"></div>
				</div>

			<?php endwhile; ?>
		<?php endif; ?>


	</div>
</section>

<!-- hotspots - needs ACF plugin to work -->
<section class="<?php echo $bgColor ?> <?php echo $txtColor ?> overflow-hidden">
		<div class="relative container || lg-height-100 flex flex-column lg-flex-row items-center <?php echo $extraPadding ;?> <?php echo get_sub_field('spacing_top') == TRUE ? 'py5' : '' ?> <?php echo get_sub_field('spacing_bottom') == TRUE ? 'py5' : '' ?>">
	<?php $hotspotImage = get_sub_field('hotspot_image')['sizes']['large']; ?>
	<img class="block" src="<?php echo $hotspotImage ?>" alt="">


	<?php if ( have_rows('hotspots')) : ?>
		<?php while ( have_rows('hotspots')) : ?>
			<?php the_row() ?>
			<a class="absolute translate cursor-default ||  available_plot " data-toggle="popover" href="#" style=" top: <?php echo explode(',', get_sub_field('hotspot_location'))[1] ?>; left: <?php echo explode(',', get_sub_field('hotspot_location'))[0] ?>; ">
				<span class="border border-2 border-white absolute pulse bg-primary"></span>
			</a>


			<?php $post_object = get_sub_field('hotspot_product'); ?>
			<?php if( $post_object ) : ?>
				<?php $post = $post_object; ?>
				<?php $productImage = get_field('product_image')['sizes']['medium']; ?>
				<?php $productStatus = get_field('product_status'); ?>
				<?php setup_postdata($post); ?>
				<div class="webui-popover-content bg-white p2 text-center" style="width: 160px">
					<a href="<?php the_permalink(); ?>" class="block"><img alt="" class="block mb2" src="<?php echo $productImage ?>"></a>
					<h4 class="mb2"><?php the_title(); ?></h4>
					<a href="<?php the_permalink(); ?>" class="block bg-black p2 white text-center mt2">Details <i class="ml2 fa fa-angle-double-right"></i></a>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>



	<?php endwhile; ?>
<?php endif; ?>

</div>
</section>

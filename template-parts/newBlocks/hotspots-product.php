<?php $hotspotImage = get_sub_field('hotspot_image')['sizes']['large']; ?>

<!-- hotspot products -->
<div class="display-none md-block">
	<div class="container px5 py6">
		<h2 class="text-center"><?php echo get_sub_field('hotspot_title') ?></h2>
		<div class="flex items-center mxn3" data-hotspot="wrapper">
			<div class="col-4 px3">
				<ul class="list-reset">
					<!-- left hand side content - no more then three -->
					<?php if ( have_rows('hotspots_left')) : $i = 0; ?>
						<?php while ( have_rows('hotspots_left')) :  $i++; ?>
							<?php the_row() ?>
							<li class="mb4 hover-primary hotspot" data-spot="hot-left-<?php echo $i; ?>">
								<h3><i class="fa <?php echo get_sub_field('icon') ?> primary mr2"></i><?php echo get_sub_field('title') ?></h3>
								<p><?php echo get_sub_field('copy') ?></p>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</div>
			<div class="col-4 px3 relative" data-hotspot="content">
				<img src="<?php echo $hotspotImage ?>" alt="" class="block width-100">
				<!-- render all the dots from both sides -->
				<?php if ( have_rows('hotspots_left')) : $i = 0; ?>
					<?php while ( have_rows('hotspots_left')) :  $i++; ?>
						<?php the_row() ?>
						<div class="border border-2 border-white absolute pulse bg-primary" id="hot-left-<?php echo $i; ?>" style=" top: <?php echo explode(',', get_sub_field('hotspot_location'))[1] ?>; left: <?php echo explode(',', get_sub_field('hotspot_location'))[0] ?>; "></div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if ( have_rows('hotspots_right')) : $i = 0; ?>
					<?php while ( have_rows('hotspots_right')) :  $i++; ?>
						<?php the_row() ?>
						<div class="border border-2 border-white absolute pulse bg-primary" id="hot-right-<?php echo $i; ?>" style=" top: <?php echo explode(',', get_sub_field('hotspot_location'))[1] ?>; left: <?php echo explode(',', get_sub_field('hotspot_location'))[0] ?>; "></div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col-4 px3" >
				<ul class="list-reset">
					<!-- right hand side content - no more then three -->
					<?php if ( have_rows('hotspots_right')) : $i = 0; ?>
						<?php while ( have_rows('hotspots_right')) :  $i++; ?>
							<?php the_row() ?>
							<li class="mb4 hover-primary hotspot" data-spot="hot-right-<?php echo $i; ?>">
								<h3><i class="fa <?php echo get_sub_field('icon') ?> primary mr2"></i><?php echo get_sub_field('title') ?></h3>
								<p><?php echo get_sub_field('copy') ?></p>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>

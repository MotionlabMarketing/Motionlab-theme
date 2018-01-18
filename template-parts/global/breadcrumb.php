<!-- Breadcrumbs -->
<div class="mxn2 mb4">
	<ul class="list-reset m0">
		<li class="inline-block">
			<a class="mx2 text-decoration-none black opacity-4 hover-opacity-0" href="<?php echo home_url() ?>">Home</a>
		</li>
		<?php
		$crumbID = get_the_ID();
		?>
		<?php while(wp_get_post_parent_id($crumbID)): ?>
			<?php $crumbID = wp_get_post_parent_id( $crumbID); ?>
			<li class="inline-block"><i class="fa fa-angle-right"></i></li>
			<li class="inline-block">
				<a class="mx2 text-decoration-none black" href="<?php echo get_permalink($crumbID); ?>"><?php echo get_the_title($crumbID); ?></a>
			</li>
		<?php endwhile; ?>
		<li class="inline-block"><i class="fa fa-angle-right"></i></li>
		<li class="inline-block"><span class="mx2"><?php echo post_type_archive_title(); ?></span></li>
		<li class="inline-block"><i class="fa fa-angle-right"></i></li>
		<li class="inline-block"><span class="mx2"><?php echo get_the_title(); ?></span></li>
	</ul>
</div>

<?php $queried_object = get_queried_object(); ?>
<?php $idpost = $queried_object->ID; ?>

</div><!-- end of js-header-space -->


<footer class="bg-secondary clear-both">
	<div class="">
		<div class="container p5 md-py7">
			<div class="mxn5 clearfix">
				<div class="px5 col lg-col-3 display-none lg-block">
					<img src="<?php the_field('brand_logo', 'options') ?>" alt="">
				</div>
				<div class="px5 col col-12 lg-col-9">
					<div class="mxn5">
						<?php include(get_template_directory() .'/template-parts/global/menus/footer_menu_1.php'); ?>
						<?php include(get_template_directory() .'/template-parts/global/menus/footer_menu_2.php'); ?>
						<?php include(get_template_directory() .'/template-parts/global/menus/footer_menu_3.php'); ?>
						<?php include(get_template_directory() .'/template-parts/global/footer_social.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container px5 py5">
		<div class="mxn5 clearfix">
			<?php include(get_template_directory() .'/template-parts/global/menus/tnc_menu.php'); ?>
		</div>
	</div>
</footer>



<?php wp_footer(); ?>

</body>
</html>

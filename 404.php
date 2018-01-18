<?php
$image404 =  get_field('404_image', 'option')['sizes']['large'];
get_header(); ?>
<div class="bg-black || no-js-header-space || || bg-center bg-cover" style="background-image:url(<?php echo $image404 ;?>">
	<div class="container px4 flex flex-column height-100 || items-center- justify-center white">
		<h1 class="h1 md-h00 lh1">404<?php echo get_field('404_title', 'option'); ?></h1>
		<!-- <p class="h4 md-h3 col-12 md-col-7 mb4 md-mb6"><?php// echo get_field('404_copy', 'option'); ?></p>
		<div class="">
			<a href="<?php// echo get_field('404_link', 'option'); ?>" class="btn btn-primary"><?php echo get_field('404_link_text', 'option'); ?></a>
		</div> -->
	</div>
</div>
<?php
get_footer();

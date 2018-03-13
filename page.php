<?php
/*
used for 'default template'
*/
get_header();
$masterPad = 'px5';
?>

<main>
	<?php while ( have_posts() ) : the_post();?>

		<section class="col col-12">
			<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>
		</section>

	<?php endwhile;?>
</main>

<?php get_footer(); ?>

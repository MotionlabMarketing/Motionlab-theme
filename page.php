<?php
/*
used for 'default template'
*/
get_header();
$masterPad = 'px5';
?>

<main>
	<?php while ( have_posts() ) : the_post();?>

		<?php if(!empty(get_field('remove_default_page_title'))): ?>
		<?php else: ?>
			<div class="container px5">
				<h1 class="xl-h0 xl-lsn2 lh1 py6 pt7"><?php echo the_title() ?></h1>
			</div>
		<?php endif; ?>

		<section class="col col-12 mb5 md-mb0">
			<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>
		</section>


	<?php endwhile;?>
</main>

<?php get_footer(); ?>

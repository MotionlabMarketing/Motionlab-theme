<?php
get_header();
?>
<?php while ( have_posts() ) : the_post();?>

	<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

<?php endwhile; ?>
<?php get_footer();?>

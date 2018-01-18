<!-- used for sections that need a loop (heading, inner full width banner, inner pods) -->
<?php
if ( have_rows('block_title_title')) {
	while ( have_rows('block_title_title')) {
		the_row();
		if (get_sub_field('title')){
			include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title.php');
		}
	}
}
?>

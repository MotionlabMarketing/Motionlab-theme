<?php
get_header();
while ( have_posts() ) : the_post();

	include(get_template_directory() .'/template-parts/building-blocks.php' );

endwhile;
get_footer();
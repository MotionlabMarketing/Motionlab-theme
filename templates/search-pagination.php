<nav class="pagination || clearfix block text-center border-top border-darken-1 py4 mt5">
	<?php $total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));

		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
		));
	}
	?>

</nav>

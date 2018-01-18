<?php
// use this to check the parent CPT and create a link and name to be used in the sidebar menu - see ALL CPTs
$categoryName = 'multi_category';
$category = get_post_type();
$post_type_data = get_post_type_object( $category );
$post_type_name= $post_type_data->label;
$post_type_slug = $post_type_data->rewrite['slug'];

?>

<form method="get" class="mb3 flex items-center width-100" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <input id="js-search-id" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" data-placeholder='Search site,Search other' class="input flex-auto border-darken-2" autofocus>
    <input type="hidden" name="post_type[]" value="multi_cpt[], post[]"><!-- just search multi and posts -->
    <button class="btn btn-primary rounded-right" submit name="submit"><i class="fa">&#xf002;</i></button>
</form>

<?php $terms = get_terms( $categoryName ); ?> <!-- get the category terms from the specific taxonomy -->
<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
    <div class="border border-darken-2 mb4">
        <!-- <a class="block border-bottom border-darken-2 hover-bg-darken-1 px2 py3 body" href="/<?php echo $post_type_slug ?>" ><?php echo "All " . $post_type_name . "s" ?></a> -->
        <a class="block border-bottom border-darken-2 hover-bg-darken-1 px2 py3 body" href="/multi_cpt" >All Jobs</a>
        <?php foreach ( $terms as $term ) : ?> <!-- list them all out -->
            <?php $link = get_term_link($term); ?>
            <a class="block border-bottom border-darken-2 hover-bg-darken-1 px2 py3 body" href="<?php echo $link ?>"><?php echo $term->name ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php $terms = get_terms( 'list' ); ?> <!-- get the category terms from the specific taxonomy -->
<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
    <div class="border border-darken-2 mb4">
        <!-- <a class="block border-bottom border-darken-2 hover-bg-darken-1 px2 py3 body" href="/<?php echo $post_type_slug ?>" ><?php echo "All " . $post_type_name . "s" ?></a> -->
        <a class="block border-bottom border-darken-2 hover-bg-darken-1 px2 py3 body" href="/multi_cpt" >All Lists</a>
        <?php foreach ( $terms as $term ) : ?> <!-- list them all out -->
            <?php $link = get_term_link($term); ?>
            <a class="block border-bottom border-darken-2 hover-bg-darken-1 px2 py3 body" href="<?php echo $link ?>"><?php echo $term->name ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

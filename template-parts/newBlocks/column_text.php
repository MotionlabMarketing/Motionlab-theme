<?php
if( get_sub_field('columns') == 4 ) {
    $columnWidth= "col col-12 pb3 md-pb0 md-col-3 px3";
    $MarginNegative = 'mxn3';
} elseif( get_sub_field('columns') == 3 ) {
    $columnWidth= "col col-12 pb3 md-pb0 md-col-4 px3";
    $MarginNegative = 'mxn3';
} elseif( get_sub_field('columns') == 2 ) {
    $columnWidth= "col col-12 pb3 md-pb0 md-col-6 px3";
    $MarginNegative = 'mxn3';
} else {
    $columnWidth= "col-12";
    $MarginNegative = '';
}
if( get_sub_field('text_align_align') == 'text-left' ) {
    $textAlign = 'text-left';
} elseif( get_sub_field('text_align_align') == 'text-center') {
	$textAlign = 'text-center';
} else {
	$textAlign = 'text-right';
}
if( get_sub_field('anchor_buttons_bottom') == TRUE ) {
    $anchorButtons = 'justify-between';
} else {
    $anchorButtons = '';
}

$blockCustomClass = get_sub_field('columns_custom_class');
?>

<!-- column text NEW -->

<section class="<?php echo $bgColor ?> <?php echo $txtColor ?> relative <?=$blockCustomClass?>">
    <div class="<?php echo $masterPad; ?> pb4 md-pb5 mx-auto ||
    <?php echo $paddingTop == 'collapse-top' ? 'pt4 lg-pt0' : 'pt4 md-pt5' ?>
    <?php echo get_sub_field('full_width_full_width') ?>
    <?php echo $measureWide ?>">

    <div class="clearfix || <?php echo $MarginNegative ?>">

        <?php if ( have_rows('column_1')){
            while ( have_rows('column_1')){
                the_row();
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/column-data.php');
            }
        }

        if ( get_sub_field('columns') == 2 || get_sub_field('columns') == 3  || get_sub_field('columns') == 4 ){
            if ( have_rows('column_2')){
                while ( have_rows('column_2')){
                    the_row();
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/column-data.php');
                }
            }
        }

        if ( get_sub_field('columns') == 3 || get_sub_field('columns') == 4 ){
            if ( have_rows('column_3')){
                while ( have_rows('column_3')){
                    the_row();
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/column-data.php');
                }
            }
        }

        if ( get_sub_field('columns') == 4 ){
            if ( have_rows('column_4')){
                while ( have_rows('column_4')){
                    the_row();
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/column-data.php');
                }
            }
        }
        ?>
    </div>
</div>
</section>

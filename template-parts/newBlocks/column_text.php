<?php

// TODO: NEEDS UPDATING SOON.

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

$current = "block_columns";

$block['custom_css'] = get_sub_field('block_columns_settings_block_customClass');
$block['custom_id'] = get_sub_field('block_columns_settings_block_customID');

// GET THE SPACING (MARGIN) BEFORE AND AFTER THIS BLOCK.
$block['spacing']           = "";
$block['temp']['top']       = get_sub_field($current . '_settings_enable_block_bspacing');
$block['temp']['bottom']    = get_sub_field($current . '_settings_enable_block_aspacing');

foreach ($block['temp'] as $a):

    $block['spacing'] .= $a . " ";

endforeach;


// GET THE BLOCK INTERNAL (PADDING) SPACING.
$block['padding']           = "";
$block['temp']['top']       = get_sub_field($current . '_settings_block_tpadding');
$block['temp']['bottom']    = get_sub_field($current . '_settings_block_bpadding');
$block['temp']['left']      = get_sub_field($current . '_settings_block_lpadding');
$block['temp']['right']     = get_sub_field($current . '_settings_block_rpadding');

foreach ($block['temp'] as $a):

    $block['padding'] .=  $a . " ";

endforeach;

unset($block['temp']);
?>

<!-- column text NEW -->

<section id="<?=$block['custom_id']?>" class="clearfix relative <?=$block['custom_css']?> <?=$block['padding']?> <?=$block['spacing']?> relative <?php echo $bgColor ?> <?php echo $txtColor ?> relative">
    <div class="container mx-auto <?=$blockCustomClass?> <?=$measureWide?>">
        <div class="md-flex clearfix <?php echo $MarginNegative ?>">

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

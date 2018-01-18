<?php
if ( get_sub_field('background_color_color') ){
    $bgFormColor = 'bg-' . get_sub_field('background_color_color');
    $addPad = "p5";
} else{
   $bgColor = 'bg-' . get_field('default_background_color', 'option');
    $addPad = "p0";
}
?>

<!-- form -->
<section class="<?php echo $bgFormColor ?> <?php echo $addPad ?> <?php echo $txtColor ?> mb5">
    <div class="<?php echo $masterPad; ?> <?php echo $paddingTop == 'collapse-top' ? 'pt0' : 'pt4 md-pt5' ?> <?php echo get_sub_field('text_align_align') ?> <?php echo get_sub_field('full_width_full_width') ?> <?php echo $measureWide ?>">

        <?php if ( have_rows('block_title_title')) {
        	while ( have_rows('block_title_title')){
        		 the_row() ?>
                <?php if(!empty(get_sub_field('title'))) { ?>
                    <div class="container text-center mx-auto px4 ml-px0 pb4 lg-pb5 wysiwyg">
                        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title.php') ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php
        $form_object = get_sub_field('form');
        gravity_form_enqueue_scripts($form_object['id'], true);
        gravity_form($form_object['id'], true, true, false, '', true, 1);
        ?>

    </div>
</section>

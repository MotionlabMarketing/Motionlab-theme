<?php
$images = get_sub_field('block_logos_slider');
$images = $images['logos'];
?>

<!-- slider - logos -->
<section class="<?php echo 'bg-' . get_sub_field('background_color_color') ?> <?php echo $txtColor ?>">
    <div class="px4 pb4 md-pb5 mx-auto || <?php echo $paddingTop == 'collapse-top' ? 'pt0' : 'pt4 md-pt5' ?> <?php echo get_sub_field('full_width_full_width') ?>">

        <?php if ( have_rows('block_title_title')) {
            while ( have_rows('block_title_title')) {
                the_row();
                if(!empty(get_sub_field('title'))) { ?>
                    <div class="container text-center mx-auto px4 ml-px0 pb4 lg-pb5 wysiwyg">
                        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title.php') ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <div class="mxn2 clearfix">
            <!-- change the ['logo'] variable to alter the image sizes -->
            <div class="flex justify-center" <?php echo get_sub_field('scroll_logos') == TRUE ? 'data-slick="logo-slider"' : '' ?>>
                <?php foreach($images as $image) { ?>

                    <div class="px4">
                        <div class="js-match-height flex flex-row items-center justify-center">
                            <img src="<?php echo $image['sizes']['large']?>" alt="<?php echo $image['alt'] ?>" />
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>


<?php unset ($narrowColumns); ?>

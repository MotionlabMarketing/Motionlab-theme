<?php
if( get_sub_field('full_width_full_width') == 'container' ) {
    $fullHeight = 'container ' . $masterPad . ' ||';
} else {
    $fullHeight = 'col-12 ||';
    $nopaddingtop = true;
}

$count = get_sub_field( 'banner_height' ) ;
if ( $count == 25 ) {
    $height = 'lg-min-height-v25';
} elseif ( $count == 50 ) {
    $height = 'lg-min-height-v50';
} elseif ( $count == 75 ) {
    $height = 'lg-min-height-v75';
} elseif ( $count == 100 ) {
    $height = 'lg-min-height-v100';
}

if ( get_sub_field('text_color_color') ){
    $txtColor = get_sub_field('text_color_color');
} else{
    $txtColor = get_field('default_text_color', 'option');
}
?>


<!-- simple slider -->
<?php if( $count == 100 && $index == 0 ){ ?>
    <div headroom-negative-space class="display-none lg-block">
        <!-- A nasty fix to a nasty 100vh issue with a static header -->
    </div>
<?php } ?>


<section class="<?php echo $txtColor ?>" slider>
    <div class="<?php echo $fullHeight ?> <?php echo $height ?>  <?php echo get_sub_field('text_align_align') ?>">

        <?php if ( have_rows('block_title_title')){
            while ( have_rows('block_title_title')) {
                the_row();
                if(!empty(get_sub_field('title'))){ ?>
                    <div class="container text-center mx-auto px4 ml-px0 pb5 wysiwyg">
                        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title.php') ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if (have_rows('slide')){ ?>
            <div data-slick="slider-auto-arrows" style="z-index: -1;">
                <?php while (have_rows('slide')){
                    the_row(); ?>
                    <div class="z1 bg-cover bg-center items-center js-match-height <?php echo $height ?>" style="background-image:url(<?php echo get_sub_field('slider_image')['sizes']['large'] ?>)">

                        <?php if ( get_sub_field('overlay_add_overlay')){ ?>
                            <div class="zn1 absolute top-0 left-0 right-0 bottom-0 <?php echo 'bg-' . get_sub_field('overlay_type') . '-' . get_sub_field('overlay_strength') ?>"></div>
                        <?php } ?>
                        <div class="py5 lg-py0 px4 table height-100 width-100" data-animation-in="fadeIn" data-delay-in=".5" data-duration-in="1" style="min-height:350px;">
                            <div class="table-cell align-middle height-100 width-100">
                                <div class="container <?php echo $measureWide ?> <?php echo get_sub_field('text_align_align') ?>">

                                    <div class="spacer || display-none lg-block" <?php if( $count == 100 && $index == 0 ){ ?> headroom-space <?php } ?>></div>

                                    <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title-loop.php') ?>

                                    <?php if( (get_sub_field('subtitle'))){ ?>
                                        <h5 class="sans uppercase ls2 md-ls4 lh1 md-mb3 pt1"><?php echo get_sub_field('subtitle') ?></h5>
                                    <?php } ?>
                                    <?php if( (get_sub_field('copy'))){ ?>
                                        <div class="wysiwyg mb3"><?php echo get_sub_field('copy') ?></div>
                                    <?php } ?>

                                    <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/button.php') ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>
</section>

<?php unset ($narrowColumns) ; ?>
<?php unset ($fullHeight) ; ?>

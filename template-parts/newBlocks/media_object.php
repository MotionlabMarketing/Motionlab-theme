<?php
if( get_sub_field('full_width_full_width') == 'container' ) {
    $fullHeight = 'container pb4 ||';
} else {
    $fullHeight = 'col-12 min-height-v100 pt0 ||';
    $nopaddingtop = true;
}
$singleImage = get_sub_field('single_image')['sizes']['large'];

?>

<!-- media object -->
<section class="<?php echo $bgColor ?> <?php echo $txtColor ?>">
    <div class="<?php echo $fullHeight ?> <?php echo $paddingTop == 'collapse-top' ? 'pt0' : 'pt4' ?> <?php echo get_sub_field('narrow_columns') == TRUE ? 'measure-wide' : '' ?> <?php echo get_sub_field('text_align_align') ?>">

        <!-- single image -->
        <?php if( get_sub_field('media_type') == 'single' ){
             if( get_sub_field('full_width_full_width') == 'container' ){ ?>
                <img class="block" src="<?php echo $singleImage ?>">
            <?php } else { ?>

                <div class="min-height-v100 width-100 || bg-center bg-cover" style="background-image:url(<?php echo get_sub_field('single_image')['sizes']['banner'] ?>)"></div>
            <?php } ?>
        <?php } ?>

        <!-- image gallery -->

        <?php if( get_sub_field('media_type') == 'gallery' ){
            $images = get_sub_field('image_gallery');
            if ($images){ ?>
                <div class="" data-slick="slider-auto">
                    <?php foreach ($images as $image){ ?>
                        <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>

        <!-- video -->
        <?php if( get_sub_field('media_type') == 'video' ){ ?>
            <div class="videoWrapper">
                <?php echo get_sub_field('video') ?>
            </div>
        <?php } ?>

    </div>
</section>

<?php unset ($narrowColumns) ; ?>
<?php unset ($fullHeight) ; ?>

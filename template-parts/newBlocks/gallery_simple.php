<?php
if (get_sub_field('image_2_left')){
    $marginLeft = "mb5";
} else{
    $marginLeft = "";
}
if (get_sub_field('image_2_right')){
    $marginRight = "mb5";
} else{
    $marginRight = "";
}

$count = get_sub_field( 'column_widths') ;
if ( $count == "70/30" )  {
    $leftWidth = "md-col-9";
    $rightWidth = "md-col-4";

} elseif ( $count == "50/50" )  {
    $leftWidth = "md-col-6";
    $rightWidth = "md-col-6";
} elseif ( $count == "30/70" )  {
    $leftWidth = "md-col-4";
    $rightWidth = "md-col-9";
}
?>

<!-- gallery - simple -->
<section class="<?php echo $bgColor ?>">
    <div class="md-flex flex-column md-flex-row <?php echo get_sub_field('gallery_height') ?> <?php echo get_sub_field('full_width_full_width') ?> <?php echo $measureWide ?> <?php echo $extraPadding ;?> ">

        <div class="col-12 <?php echo $leftWidth ?> <?php echo get_sub_field('full_width_full_width') == 'col-12' ? 'p4 pl4' : '' ?> my5 md-pr3 flex flex-column">
            <?php if (get_sub_field('image_1_left')) { ?>
                <div class="square lg-ratio-reset flex-auto relative bg-center bg-cover <?php echo $marginLeft ?>" style="background-image: url('<?php echo get_sub_field('image_1_left') ?>')"></div>
            <?php } ?>
            <?php if (get_sub_field('image_2_left')){ ?>
                <div class="square lg-ratio-reset flex-auto relative bg-center bg-cover" style="background-image: url('<?php echo get_sub_field('image_2_left') ?>')"></div>
            <?php } ?>
        </div>

        <div class="col-12 <?php echo $rightWidth ?> <?php echo get_sub_field('full_width_full_width') == 'col-12' ? 'p4 pr4' : '' ?> my5 md-pl3 flex flex-column">
            <?php if (get_sub_field('image_1_right')){ ?>
                <div class="square lg-ratio-reset flex-auto relative bg-center bg-cover <?php echo $marginRight ?>" style="background-image: url('<?php echo get_sub_field('image_1_right') ?>')"></div>
            <?php } ?>
            <?php if (get_sub_field('image_2_right')){ ?>
                <div class="square lg-ratio-reset flex-auto relative bg-center bg-cover" style="background-image: url('<?php echo get_sub_field('image_2_right') ?>')"></div>
            <?php } ?>
        </div>
    </div>
</section>

<?php unset ($narrowColumns); ?>

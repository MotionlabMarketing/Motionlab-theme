<?php
$masterPad = '';
$count = get_sub_field( 'pods_per_column') ;
if ( $count == 1 )  {
    $class= "col-12";
} elseif ( $count == 2 ) {
    $class= "col-12 md-col-6";
} elseif ( $count == 3 ) {
    $class= "col-12 md-col-4";
} elseif ( $count == 4 ) {
    $class= "col-12 md-col-3";
}

if( get_sub_field('pod_background_color')){
    $podBgColor = 'bg-' . get_sub_field('pod_background_color');
} else{
    $podBgColor = '';
}
if( get_sub_field('remove_horizontal_padding') == TRUE ){
    $removePadding = '';
}else{
    $removePadding = 'px3';
}

if( get_sub_field('full_width_full_width') == 'container'){
    $extraPadding = $masterPad;
    $extraContentPadding = '';
    $negativePod = 'mxn3';
} else {
    $extraPadding = '';
    $extraContentPadding = $masterPad;
    $negativePod = 'px3';
}

$blockTitle  = get_sub_field($current . '_title_title');
?>

<!-- pods -->
<section id="<?= $block['custom_id'] ?>" class="relative || <?= $block['custom_css'] ?> <?php echo $bgColor ?> <?php echo $txtColor ?> <?php echo get_sub_field('animate_block') == TRUE ? 'overflow-hidden' : '' ?> p4">
    <div class="<?php echo get_sub_field('full_width_full_width') ?> <?php echo $extraPadding ;?> <?php echo get_sub_field('narrow_columns') == TRUE ? 'measure-wide' : '' ?>">

        <div class="m4 mb5 || text-center">

            <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
            </div>

            <div class="text-center limit-p limit-p-80">
                <?=get_sub_field('block_pods_content')?>
            </div>

        </div>

        <div class="clearfix <?php echo $negativePod ;?> || <?php echo get_sub_field('text_align_align') ?> <?php echo get_sub_field('pod_text_color') ?>">
            <?php if ( have_rows('pods')) { ?>
                <?php while ( have_rows('pods')) { ?>
                    <?php the_row() ?>
                    <?php
                    // look inside the pod repeater and see if there is a URL per pod
                    if( get_sub_field('button_type') == 'page' ){
                        $buttonURL = get_sub_field('button_url');
                    } else{
                        $buttonURL = get_sub_field('button_url_custom');
                    }
                    $blockTitle  = get_sub_field('block_title_title');
                    ?>

                    <?php
                    $overlayCopy = get_sub_field('enable_overlay_copy');
                    $copy        = get_sub_field('copy');
                    ?>
                    <div class="col <?php echo $class ?> px3 mb3 || js-match-height" <?php echo $animationType ?> <?php echo $animationSpeed ?> <?php echo $animationDelay ?> <?php echo $animationRepeat ?>>
                        <div class="height-100 bg-white hover-box-shadow-3">

                            <div class="item bg-white">
                                <?php if( get_sub_field('image')) { ?>
                                    <a <?php if(get_sub_field('button_add')) { ?>href="<?php echo $buttonURL ?>"<?php } ?> class="block col-12 bg-cover bg-center relative hover-reveal overflow-hidden" style="min-height:10rem; background-image:url('<?php echo get_sub_field('image')['sizes']['large'] ?>');">

                                        <?php if ($overlayCopy == true): ?>
                                            <div class="flex items-center justify-center absolute left-0 top-0 width-100 height-100 bg-darken-5 z1 reveal || white">
                                                <div class="p4 text-center"><?=$copy?></div>
                                            </div>
                                        <?php endif; ?>

                                        <figure class="m0 overflow-hidden" style="will-change:transform;">
                                            <img src="<?php echo get_sub_field('image')['sizes']['large'] ?>" class="display-none md-block mx-auto">
                                        </figure>
                                    </a>
                                <?php } ?>
                                <div class="<?php echo $removePadding ?> py3 md-mb3">
                                    <?php
                                    if (!empty($blockTitle[0]['title'])) {
                                        include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                                    <?php if ($overlayCopy == false): ?>
                                        <div class="pt3"><?php echo get_sub_field('copy') ?></div>
                                    <?php endif; ?>

                                    <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/button.php') ?>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>
            <?php } ?>



        </div>
    </div>

    <?php if($block['bgImage']['enable'] == true): ?>

        <div class="bg-image || absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: <?=$block['bgImage']['position']?>; background-size: cover"></div>

    <?php endif; ?>

</section>

<?php unset ($narrowColumns); ?>

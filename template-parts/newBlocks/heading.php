<!-- heading -->
<section class="overflow-hidden <?php echo 'bg-' . get_sub_field('background_color')?> <?php echo $txtColor ?> <?php echo get_sub_field('animate_block') == TRUE ? 'overflow-hidden' : '' ?>">
    <div class="px4 lg-px0 <?php echo $paddingTop == 'collapse-top' ? 'pt0' : 'pt4 md-pt5' ?> pb4 md-pb5 || <?php echo get_sub_field('text_align_align') ?> <?php echo get_sub_field('full_width_full_width') ?> <?php echo $measureWide ?>" <?php echo $animationType ?> <?php echo $animationSpeed ?>  <?php echo $animationRepeat ?>  <?php echo $animationDelay ?> >

        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title-loop.php') ?>

        <?php if (get_sub_field('subtitle')){ ?>
            <h4 class="regular mb0 lh1 mt2"><?php echo get_sub_field('subtitle') ?></h4>
        <?php } ?>
    </div>
</section>

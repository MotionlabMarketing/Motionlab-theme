<?php
/**
 * HEADING BLOCK -----------------------------------
 * Adds a customisable heading to the page and added
 * support for adding a brand logo.
 *
 * @author Jason
 * @created Unknown
 * @updated 26 Jan 2018 (Joe Curran) – Added Heading Logo Field.
 *
 * @version 1.01
 */

 $logo = get_sub_field('heading_logo_basic_image');

?>

<section class="overflow-hidden <?php echo 'bg-' . get_sub_field('background_color')?> <?php echo $txtColor ?> <?php echo get_sub_field('animate_block') == TRUE ? 'overflow-hidden' : '' ?>">
    <div class="px4 lg-px0 <?php echo $paddingTop == 'collapse-top' ? 'pt0' : 'pt4 md-pt5' ?> pb4 md-pb5 || <?php echo get_sub_field('text_align_align') ?> <?php echo get_sub_field('full_width_full_width') ?> <?php echo $measureWide ?>" <?php echo $animationType ?> <?php echo $animationSpeed ?>  <?php echo $animationRepeat ?>  <?php echo $animationDelay ?> >

        <?php if (!empty($logo)):?>
            <div class="center pb3">
                <img src="<?=$logo['url']?>" alt="<?=$logo['alt'];?>">
            </div>
        <?php endif; ?>

        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title-loop.php') ?>

        <?php if (get_sub_field('subtitle')){ ?>
            <h4 class="regular mb0 lh1 mt2"><?php echo get_sub_field('subtitle') ?></h4>
        <?php } ?>
    </div>
</section>

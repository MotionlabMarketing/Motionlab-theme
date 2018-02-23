<div class="bg-footer pt5 md-pt0">
<?php if (get_field('footer_enable_overlay', 'option') == true): ?>
    <div class="overlay" style="background-image: url('<?= get_field('footer_overlay_image', 'option') ?>');">

    </div>

    <div class="relative front">
<?php endif; ?>

    <div class="container px5 pt3 md-pt6 pb0">
        <div class="col col-12 lg-col-12 text-center md-text-left">
            <div class="mxn5">
                <?php include(get_template_directory() . '/template-parts/global/menus/footer_menu_1.php'); ?>
                <?php include(get_template_directory() . '/template-parts/global/menus/footer_menu_2.php'); ?>
                <?php include(get_template_directory() . '/template-parts/global/menus/footer_menu_3.php'); ?>

                <div class="col col-12 md-col-2 mb3 md-mb0 text-center md-text-left white">

                    <?php dynamic_sidebar( 'footer_column_1' ); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="container clearfix py3 || white || text-center md-text-left md-flex items-center">

        <div class="col col-12 md-col-8 pr3 pl0 mb3 md-mb0">
            <p class="h6 mb0"><?= strip_tags(get_field('brand_legalNotice', 'options')) ?></p>
        </div>

        <div class="col col-12 md-col-4 pl3 pr0">

            <?php if (get_field('brand_footerLogo1', 'options')): ?>
                <img src="<?= get_field('brand_footerLogo1', 'options') ?>">
            <?php endif; ?>

            <?php if (get_field('brand_footerLogo2', 'options')): ?>
                <img src="<?= get_field('brand_footerLogo2', 'options') ?>">
            <?php endif; ?>

        </div>

    </div>

    <div class="container clearfix px5 py3 h6 pb4 border-top border-lighten-3 pr0">
        <div class="mxn5 clearfix">
            <?php include(get_template_directory() . '/template-parts/global/menus/tnc_menu.php'); ?>
        </div>
    </div>

<?php if (get_field('footer_enable_overlay', 'option') == true): ?>
    </div>
<?php endif; ?>
</div>
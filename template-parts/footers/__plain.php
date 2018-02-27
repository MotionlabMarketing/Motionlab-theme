<div class="bg-body px4">

    <div class="container">

        <div class="md-pb3 lg-py6 clearfix md-flex">

            <div class="col col-12 sm-col-4 md-col-3 mb3 md-mb0">

                <?php dynamic_sidebar( 'footer_column_1' ); ?>

            </div>

            <div class="col col-12 sm-col-4 md-col-3 mb3 md-mb0">

                <?php dynamic_sidebar( 'footer_column_2' ); ?>

            </div>

            <div class="col col-12 sm-col-4 md-col-3 mb3 md-mb0">

                <?php dynamic_sidebar( 'footer_column_3' ); ?>

            </div>

            <div class="col col-12 md-col-3 relative">

                <nav class="social social-inline">

                    <ul class="list-reset md-absolute bottom-0 right-0 md-text-right">
                        <?php if (have_rows('social_links', 'option')): while (have_rows('social_links', 'option')): the_row() ?>
                            <li>
                                <a target="_blank" href="<?=get_sub_field('link', 'option') ?>" class="brand-primary hover-black">
                                    <i class="fa <?=get_sub_field('icon', 'option'); ?> mr3"></i>
                                </a>
                            </li>
                        <?php endwhile; endif; ?>
                    </ul>

                </nav>

            </div>

        </div>

    </div>

    <?php if ($hidden == true):?>
    <div class="container clearfix py3 h6 pb4">

        <?php include(get_template_directory() . '/template-parts/global/menus/tnc_menu.php'); ?>

    </div>
    <?php endif; ?>

</div>

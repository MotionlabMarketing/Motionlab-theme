<div class="col col-12 md-col-3 px5">
    <nav>
        <h3 class="white mb4">Social</h3>
        <ul class="list-reset mb0">
            <?php if ( have_rows('social_links','option')) : ?>
                <?php while ( have_rows('social_links','option')) : ?>
                    <?php the_row() ?>
                        <li>
                            <a target="_blank" href="<?php echo get_sub_field('link','option') ?>" class="white hover-primary">
                                <span class="fa fa-fw <?php echo get_sub_field('icon','option') ?> m0 mr2"></span>
                                <span class="sm-show"><?php echo get_sub_field('title','option') ?></span>
                            </a>
                        </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </nav>
</div>

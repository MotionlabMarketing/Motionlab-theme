<?php
/**
 * JOBS – TALENT LAYOUT BLOCK ------------------------
 * This block add support for a CTA block allowing the
 * user to link to other website areas.
 *
 * @author Joe Curran
 * @created 5 Feb 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "jobs-talent mt6 mb6")?> <?=get_blockData($block)?>>

    <div class="container">

        <div class="col-12 || mb5 || text-center">

            <div class="mb4">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg || mx6 px6">
                <?= get_sub_field($current . '_content'); ?>
            </div>

        </div>

            <div class="col-12 md-col-6 || p4 left">
                <?php
                $content = get_sub_field('block_jobs_aside_content');
                $blockTitle = $content['title'];

                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>

                <div class="wysiwyg">
                    <?= $content['content'] ?>
                </div>
            </div>

            <div class="col-12 md-col-6 || p4 left">

                <?php
                $content = get_sub_field('block_jobs_listing_content');
                $blockTitle = $content['title'];

                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>

                <div class="wysiwyg || pb3 mb4 border border-light border-bottom">
                    <?= $content['content'] ?>
                </div>

                <?php foreach($block['posts']->posts as $post) :?>
                    <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                        <div class="col col-12">

                            <a href=""><h3 class="brand-primary mb2 h4"><?=$post->post_title?></h3></a>

                            <p class="h5 mb3"><?=$post->locations[0]->name?> <span class="muted">•</span> SALARY <span class="muted">•</span> <?=$post->types[0]->name?></p>

                            <a href="<?=$post->guid?>" class="btn btn-primary btn-small white px5">Read More</a>

                        </div>

                    </div>
                <?php endforeach; ?>

                <a href="/" class="btn btn-outline mt3">View all jobs</a>

            </div>

    </div>

</section>

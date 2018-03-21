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

<section <?=get_blockID($block)?> class="jobs-talent || mt2 mb2 p2 md-p0 clearfix || <?=$bgColor?> <?=$txtColor?>" <?=get_blockData($block)?>>

    <div class="container">

        <div class="col-12 || md-mb5 || px4 md-px0 text-center">

            <div class="mb4">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg || md-mx6 md-px6 text-left md-text-center">
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

            <div class="col-12 md-col-6 || p4 md-px6 left">

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
                    <div class="mb4">

                        <h4 class="h4 mb1"><?=get_field('talent_name', $post->ID);?></h4>
                        <p class="bold mb2">
                            <?php $location = get_field('talent_location', $post->ID); ?>
                            <?php if($location != "") :?>
                                <small class="inline-block"><?=$location;?></small>
                            <?php endif; ?>
                            <?php foreach($post->types as $type) : ?>
                                <span class="black">•</span>
                                <small><?=$type->name;?></small>
                            <?php endforeach; ?>
                        </p>

                        <div class="block mb2 md-mb4 h6"><span class="mr3 mb2 md-mb0 block md-inline brand-primary">Roles available for</span>

                            <ul class="inline-block tags tags-right md-right border-radius">
                                <?php foreach($post->roles as $role) : ?>
                                    <li><?=$role->name?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <p class="h6 pb4 || clearfix || border border-light border-bottom">
                            <?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr(get_field('talent_details', $post->ID),0, 100) . "...";?>
                        </p>

                    </div>
                <?php endforeach; ?>

                <a href="#" class="btn btn-small btn-outline">View all Talent</a>

            </div>

    </div>

</section>

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

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "jobs-talent mt2 mb2 p2 md-p0")?> <?=get_blockData($block)?>>

    <div class="container">

       <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

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
                $heading = convert_heading($content['title']);

                render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}");
                render_wysiwyg("{$content['content']}", false, ["class" => "pb3 mb4 border border-light border-bottom"]); ?>

                <?php foreach($block['posts']->posts as $post) :?>
                    <div class="mb4 box-shadow-2 p4">

                        <h4 class="h4 mb1"><a href="<?=get_permalink($post->ID)?>" class="brand-primary"><?=get_field('talent_name', $post->ID);?></a></h4>
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

                        <div class="h6 || clearfix || border border-light border-bottom">
                            <?= strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr(get_field('talent_details', $post->ID),0, 100) . "...";?>
                        </div>

                        <a href="<?=get_permalink($post->ID)?>" class="btn mt3 btn-small btn-outline btn-primary">Learn More</a>

                    </div>
                <?php endforeach; ?>

                <a href="/find-talent/" class="btn mt4 btn-small btn-outline">View all Talent</a>

            </div>

    </div>

</section>

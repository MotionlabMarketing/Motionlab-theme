<?php
/**
 * NEWS ROW VIEW BLOCK ---------------------------------------
 * This block outputs a number of blog post on to the page
 * which can be selected or latest.
 *
 * @author Joe Curran
 * @created 2 Mar 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> mxn4 p2 js-height-match">

            <?php if( sizeof($block['posts']->posts) > 0 ) : ?>

                <?php foreach ($block['posts']->posts as $post) :?>
                    
                    <div class="col col-12 md-col-4 mb4 p3">

                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <a href="<?=get_permalink($post->ID)?>">
                                <?= wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), "galleryMedium", "", ["class" => "box-shadow-1", "data-mh" => "{$block['id']}-image"] ) ?>
                            </a>
                        <?php else: ?>
                            <a href="<?=get_permalink($post->ID)?>">
                                <?= wp_get_attachment_image(7303, "galleryMedium", "", ["class" => "box-shadow-1", "data-mh" => "{$block['id']}-heading"]) // TODO: Default Image ?>
                            </a>
                        <?php endif; ?>

                        <div class="<?=$block['content']['txtColor']?>">

                            <?php if ($block['content']['date'] == true): ?>
                                <p class="h6 mt2 bold"><?=date('d M Y', strtotime($post->post_date));?></p>
                            <?php endif; ?>

                            <h3 class="h3-responsive <?=($block['content']['date'])? "mt0":"mt2" ?> mb2" data-mh="<?=$block['id']?>-heading"><a href="<?=get_permalink($post->ID)?>"><?=$post->post_title?></a></h3>

                            <p class="h4 lh4" data-mh="<?=$block['id']?>-content"><?=strlen($post->post_excerpt) > 1 ? $post->post_excerpt : shorten_string(strip_tags($post->post_content), 45);?></p>

                            <?php if($block['content']['buttons'] = true): ?>
                                <?php render_button($block['content']['button'], "medium", ["class" => "mt3"]); ?>
                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <div class="flex items-center justify-center flex-column <?=$block['content']['txtColor']?> mb4">

                    <p class="h3 mb1">Sorry, no articles could be loaded.</p>
                    <p class="mb0">Please check your selected options and that posts have been added to your site.</p>

                </div>

            <?php endif; ?>

        </div>

        <?php if ($block['content']['enableLink'] == true): ?>

            <div class="clearfix relative flex items-center justify-center">

                <?php render_button($block['pageLink'], "medium", ["class" => "mt3"]); ?>

            </div>    

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

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

    <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> mxn2 p2 js-height-match">

        <?php if( sizeof($block['posts']->posts) > 0 ) : ?>

            <?php foreach ($block['posts']->posts as $post) :?>
                <div class="col col-12 md-col-4 mb4 p2">

                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <a href="<?=get_permalink($post->ID)?>">
                            <?= wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), "medium", "", ["class" => "js-match-height"] ) ?>
                        </a>
                    <?php else: ?>
                        <a href="<?=get_permalink($post->ID)?>">
                            <?= wp_get_attachment_image(7303, "large", "", ["class" => "js-match-height"]) // TODO: Default Image ?>
                        </a>
                    <?php endif; ?>

                    <div class="<?=$block['content']['txtColor']?> py2 px3">

                        <?php if ($block['content']['date'] == true): ?>
                            <p class="h6 mt2 bold <?=$block['content']['txtColor']?>"><?=date('d M Y', strtotime($post->post_date));?></p>
                        <?php endif; ?>

                        <h3 class="mb2 h4 brand-primary" style="font-size: 1.3rem"><a href="<?=get_permalink($post->ID)?>"><?=$post->post_title?></a></h3>

                        <p class="h5"><?=strlen($post->post_excerpt) > 1 ? $post->post_excerpt : substr($post->post_content,0, 100);?></p>

                        <?php if($block['content']['buttons'] = true): ?>
                            <a href="<?=get_permalink($post->ID)?>" class="btn <?=$block['content']['button']['button_text_colour']['system_text_colours']?> <?=$block['content']['button']['button_background_colour']['system_background_colours']?> bold "><?=$block['content']['button']['button_link']['title']?></a>
                        <?php endif; ?>

                    </div>

                </div>
            <?php endforeach; ?>

        <?php else : ?>
            <div class="flex items-center justify-center flex-wrap <?=$block['content']['txtColor']?>">

                <p class="h3 mb1">Sorry, no articles could be loaded.</p>
                <p class="">Please check your selected options and that posts have been added to your site.</p>

            </div>
        <?php endif; ?>

    </div>

    <?php if ($block['content']['link'] == true): ?>

        <div class="clearfix col-12 mt4 text-center">

            <a href="<?=$block['content']['link']['url']?>" class="btn btn-medium brand-primary hover-black bg-smoke"><?=$block['content']['link']['title']?></a>

        </div>

    <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

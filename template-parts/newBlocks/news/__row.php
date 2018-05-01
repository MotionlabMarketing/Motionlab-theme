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

        <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> p2 js-height-match">

            <?php if( !empty($block['posts']->posts) ) : ?>

            <?php foreach ($block['posts']->posts as $post) :?>
                <div class="col-12 clearfix mb4 md-flex items-center">

                    <div class="col col-12 <?=($block['content']['feeds'])? "md-col-5" : "md-col-3"?>">

                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <a href="<?=get_permalink($post->ID)?>">
                                <?= wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), "medium", "", ["class" => "box-shadow-1 js-match-height"] ) ?>
                            </a>
                        <?php else: ?>
                            <a href="<?=get_permalink($post->ID)?>">
                                <img src="<?=get_field('fallback_placeholder_image', 'option')?>" alt="<?=$post->post_title?>" class="box-shadow-1 js-match-height">
                            </a>
                        <?php endif; ?>

                    </div>

                    <div class="col col-12 <?=($block['content']['feeds'])? "md-col-7" : "md-col-9"?> py2 md-p4">

                        <?php if ($block['content']['date'] == true): ?>
                            <p class="h6 mt2 sm-mb0 md-left bold sm-inline <?=$block['content']['txtColor']?>"><?=date('d M Y', strtotime($post->post_date));?></p>
                        <?php endif; ?>

                        <div class="clearfix <?=$block['content']['txtColor']?>">

                            <h3 class="mb1 brand-primary" style="font-size: 1.3rem"><a href="<?=get_permalink($post->ID)?>"><?=$post->post_title?></a></h3>

                            <p class="h6"><?=shorten_string(strip_tags($post->post_content), 60)?></p>

                            <ul class="block tags tags-left border-radius cursor-pointer">
                                <?php foreach($post->categories as $category): ?>
                                    <li><a href="<?=get_term_link($category->term_id)?>"><?=$category->name?></a></li>
                                <?php endforeach; ?>
                            </ul>

                            <?php if($block['content']['buttons'] = true): ?>
                                <a href="<?=get_permalink($post->ID)?>" class="btn btn-medium <?=$block['content']['button']['button_text_colour']['system_text_colours']?> <?=$block['content']['button']['button_background_colour']['system_background_colours']?> bold" role="button">Read More</a>
                            <?php endif; ?>

                        </div>

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

        <?php if ($block['content']['feeds'] == true): ?>
        
            <div class="col col-12 md-col-<?=$block['content']['cols'][1]?> p2 js-height-match">

                <div class="twitter mb4 border-bottom border-light pb4 <?=$block['content']['txtColor']?>">
                    
                    <h4 class="h3">Twitter <span class="brand-primary h5 ml1"><a href="https://twitter.com/<?=$block['content']['profiles']['twitter']?>">@<?=$block['content']['profiles']['twitter']?></a></span></h4>

                    <?= do_shortcode('[custom-twitter-feeds]'); ?>

                </div>

                <div class="facebook <?=$block['content']['txtColor']?>">

                    <h4 class="h3">Facebook <span class="brand-primary h5 ml1"><a href="https://facebook.com/<?=$block['content']['profiles']['facebook']?>">/<?=$block['content']['profiles']['facebook']?></a></span></h4>

                    <?= do_shortcode('[custom-facebook-feed]'); ?>

                </div>

            </div>

        <?php endif; ?>

        <?php if ($block['content']['link'] == true): ?>

            <div class="clearfix col-12 mt4 text-center">

                <a href="<?=$block['content']['link']['url']?>" class="btn btn-medium brand-primary hover-black bg-smoke"><?=$block['content']['link']['title']?></a>

            </div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

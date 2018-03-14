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

<section id="<?=$block['custom_id']?>" class="clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> mxn2 p2 js-height-match">

        <?php if( sizeof($block['posts']->posts) > 0 ) : ?>

            <?php foreach ($block['posts']->posts as $post) :?>
                <div class="col col-12 md-col-4 mb4 p2">

                    <a href="/">
                        <?= wp_get_attachment_image(7303, "large", "", ["class" => "box-shadow-1 js-match-height"]) // NEEDS IMAGE ID ADDING. ?>
                    </a>

                    <div class="<?=$block['content']['txtColor']?> py2 px3">

                        <?php if ($block['content']['date'] == true): ?>
                            <p class="h6 mt2 bold <?=$block['content']['txtColor']?>">2 March 2018</p>
                        <?php endif; ?>

                        <h3 class="mb2 brand-primary" style="font-size: 1.3rem"><a href="/">The Blog Title should be added to this post listing here</a></h3>

                        <p class="h5">Vivamus ipsum lorem, elementum sed volutpat non, dapibus sit amet ante. Sed congue mollis neque non posuere. Nulla nec velit condimentum quam fermentum bibendum. Curabitur condimentum ante vitae tincidunt volutpat.</p>

                        <?php if($block['content']['buttons'] = true): ?>
                            <a href="/" class="btn <?=$block['content']['button']['button_text_colour']['system_text_colours']?> <?=$block['content']['button']['button_background_colour']['system_background_colours']?> bold "><?=$block['content']['button']['button_link']['title']?></a>
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

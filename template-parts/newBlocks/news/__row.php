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

<section id="<?=$block['custom_id']?>" class="clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col col-12 md-col-<?=$block['content']['cols'][0]?> p2 js-height-match">

            <?php if ($block['content']['type'] == "lastest"): ?>

                <?php // THIS IS NEED TO OUTPUT THE SAME LAYOUT ?>

            <?php elseif ($block['content']['type'] == "selected"): ?>

                <?php // IDs OF SELECTED ARTICLES - pa($block['content']['articles']);?>

                <?php $i = 0; while($i < 2): ?>

                <div class="col-12 clearfix mb4 md-flex items-center">

                    <div class="col col-12 md-col-5">

                        <?= wp_get_attachment_image(7303, "large", "", ["class" => "box-shadow-1"]  )?>

                    </div>

                    <div class="col col-12 md-col-7 py2 md-p4">

                        <p class="h6 mt2 sm-mb0 md-left bold sm-inline <?=$block['content']['txtColor']?>">2 March 2018</p>

                        <ul class="inline-block tags tags-right sm-right border-radius cursor-pointer">
                            <li>Administration</li>
                            <li>Accounts Clerk</li>
                            <li>Payroll</li>
                        </ul>

                        <div class="clearfix <?=$block['content']['txtColor']?>">

                            <h3 class="mb1 brand-primary" style="font-size: 1.3rem">The Blog Title should be added to this post listing here</h3>

                            <p class="h6">Vivamus ipsum lorem, elementum sed volutpat non, dapibus sit amet ante. Sed congue mollis neque non posuere. Nulla nec velit condimentum quam fermentum bibendum. Curabitur condimentum ante vitae tincidunt volutpat.</p>

                            <a href="/" class="block brand-primary bold">Read More</a>

                        </div>

                    </div>

                </div>

                <?php $i++; endwhile; ?>

            <?php else: ?>

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

                    {{ INCLUDE FEED HERE }}

                </div>

                <div class="facebook <?=$block['content']['txtColor']?>">

                    <h4 class="h3">Facebook <span class="brand-primary h5 ml1"><a href="https://facebook.com/<?=$block['content']['profiles']['facebook']?>">/<?=$block['content']['profiles']['facebook']?></a></span></h4>

                    {{ INCLUDE FEED HERE }}

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
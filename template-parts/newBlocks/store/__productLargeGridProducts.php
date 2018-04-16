<?php
/**
 * STORE BLOCK – FEATURED PRODUCTS GRID LARGE ---------------------------------------
 * This block outputs a grid of products onto the page.
 *
 * @author Joe Curran
 * @created 26 Mar 2018
 *
 * @version 1.00
 */

// TODO: NEEDS TO WORK KARL! GET IT DONE! DO IT :D

// TODO: BUG: Match Height has a problem with the second tab matching.

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col-12 mtn4 mxn2">

            <div data-tabs="wrapper">

                <?php if ($block['enable_tabs']): ?>

                    <div data-element="tabs" class="col col-12 sm-flex items-center justify-center mt4 mb5">

                        <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                            <span data-section="tab<?=$i?>" class="block text-center bg-white border-top border-left border-bottom <?=(count($block['tabs']) == $i)? ' border-right':''?> border-light cursor-pointer py2 px5 relative <?=($i <= 1)? 'tab-active' : '' ?>">
                                <?=$tab['category_title']?>
                            </span>

                        <?php $i++; endforeach; ?>

                    </div>

                    <div class="pb4" data-tabs="content">

                        <?php $i = 1; foreach ($block['tabs'] as $tab): ?>

                            <section id="tab<?=$i?>" class="clearfix <?=($i > 1)? 'hide' : '' ?>" style="max-height: 70vh">

                                <div class="col col-12 md-col-5 relative" data-mh="product-size-tab<?=$i?>">

                                        <div class="product-item p4 mr3 text-center mb4 ml2 box-shadow-2">

                                            <?=render_attachment_image("8200", ['180', '300'], false,  ["class" => "mt5 mx-auto"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>

                                            <div class="flex items-center justify-center">
                                                <?=render_attachment_image("8199", "large", false,  ["class" => "mb4"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                            </div>

                                            <h3>Challenger</h3>

                                            <ul class="list-reset border-last-right-none">
                                                <li class="inline border-right px2">Item 1</li>
                                                <li class="inline border-right px2">Item 2</li>
                                                <li class="inline border-right px2">Item 3</li>
                                                <li class="inline border-right px2">Item 4</li>
                                            </ul>

                                            <p><strong><span class="brand-primary h2">£18,685</span></strong></p>

                                            <?php

                                            $button['button_link']['url']        = "#";
                                            $button['button_link']['title']      = "View Range";
                                            $button['system_text_colours']       = "brand-primary";
                                            $button['system_background_colours'] = "transparent";

                                            ?>
                                            <?php render_button($button, "medium", ["class" => "bold hover-brand-primary", "style" => "margin-bottom: 1.3rem"]) ?>

                                        </div>

                                </div>

                                <div class="col col-12 md-col-7 mrn2" data-mh="product-size-tab<?=$i?>" style="max-height: 70vh">

                                    <?php $a = 0; while($a < 6): ?>

                                        <div class="col col-12 sm-col-6 md-col-4 pl3 pr3 mb5">

                                            <div class="product-item col p4 text-center box-shadow-2" data-mh="product-item">

                                                <h3 class="h4 bold">Challenger</h3>

                                                <div class="flex items-center justify-center" data-mh="product-item-image">
                                                    <?=render_attachment_image("8199", "medium", false,  ["class" => "mb4"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                                </div>

                                                <p class="mb2 bold">2 Berth</p>

                                                <p><strong><span class="brand-primary" data-element="price" style="font-size: 1.2rem">£18,685</span></strong></p>

                                                <?php

                                                    $button['button_link']['url']        = "#";
                                                    $button['button_link']['title']      = "View Range";
                                                    $button['system_text_colours']       = "brand-primary";
                                                    $button['system_background_colours'] = "transparent";

                                                    ?>
                                                <?php render_button($button, "medium", ["class" => "bold hover-brand-primary"]) ?>

                                            </div>

                                        </div>

                                    <?php $a++; endwhile; ?>

                                </div>

                            </section>

                        <?php $i++; endforeach; ?>

                    </div>

                <?php else: ?>

                    <div class="col col-12 md-col-5 relative" data-mh="product-size">

                        <div class="product-item p4 mr3 text-center mb4 ml3 box-shadow-2 height-100">

                            <?= render_attachment_image("8200", ['180', '300'], false, ["class" => "mt5"]) ?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>

                            <div class="flex items-center justify-center">
                                <?= render_attachment_image("8015", "large", false, ["class" => "mb4"]) ?><?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                            </div>

                            <h3>Challenger</h3>

                            <ul class="list-reset border-last-right-none">
                                <li class="inline border-right px2">Item 1</li>
                                <li class="inline border-right px2">Item 2</li>
                                <li class="inline border-right px2">Item 3</li>
                                <li class="inline border-right px2">Item 4</li>
                            </ul>

                            <p><strong><span class="brand-primary h2">£18,685</span></strong></p>

                            <?php

                                $button['button_link']['url']        = "#";
                                $button['button_link']['title']      = "View Range";
                                $button['system_text_colours']       = "brand-primary";
                                $button['system_background_colours'] = "transparent";

                            ?>
                            <?php render_button($button, "medium", ["class" => "bold hover-brand-primary", "style" => "margin-bottom: 1.3rem"]) ?>

                        </div>

                    </div>

                    <div class="col col-12 md-col-7 mrn2" data-mh="product-size">

                        <?php $a = 0;  while ($a < 6): ?>

                            <div class="col col-12 md-col-4 pl3 pr3 <?= ($a < 3) ? "mb4" : "" ?>">

                                <div class="product-item col p4 text-center box-shadow-2" data-mh="product-item">

                                    <h3 class="h4 bold">Challenger</h3>

                                    <div class="flex items-center justify-center" data-mh="product-item-image">
                                        <?= render_attachment_image("8015", "medium", false, ["class" => "mb4"]) ?><?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                    </div>

                                    <p class="mb2 bold">2 Berth</p>

                                    <p><strong><span class="brand-primary" data-element="price"
                                                     style="font-size: 1.2rem">£18,685</span></strong></p>

                                    <?php

                                        $button['button_link']['url']        = "#";
                                        $button['button_link']['title']      = "View Range";
                                        $button['system_text_colours']       = "brand-primary";
                                        $button['system_background_colours'] = "transparent";

                                    ?>
                                    <?php render_button($button, "medium", ["class" => "bold hover-brand-primary"]) ?>

                                </div>

                            </div>

                            <?php $a++; endwhile; ?>

                    </div>

                <?php endif; ?>


            </div>

        </div>

        <?php if ($block['enablePageLink']): ?>

            <div data-element="pageButton" class="clearfix col col-12 text-center mt4">
                
                <?=render_button($block['pageLink'], "large", ["class" => "mb0"])?>

            </div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
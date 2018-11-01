<?php
/**
 * CTA – BASIC LAYOUT BLOCK ------------------------
 * A basic message which can be linked to a page.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "cta-basic")?> <?=get_blockData($block)?>>

    <?=($block['link']['enabled'] == true)? '<a href="'.$block['content']['link']['url'].'">':''?>

        <div class="container">

            <div class="content">

                <div class="col col-12 || text-center p4">

                    <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

                    <?php render_wysiwyg("{$block['content']['content']}", true, ["class" => "md-mx6 md-px6 {$block['content']['txtColor']} regular", "style" => "margin-bottom: 0;"])?>

                    <?php render_buttons(convert_buttons_key($block['content']['buttons']), "small", ["class" => "bold mt4 bg-brand-primary hover-white hover-bg-brand-primary"]); ?>

                </div>

            </div>

        <?=($block['grid'] == 'container')? '</div>' : ''?>

    <?=($block['link']['enabled'] == true)? '</a>' : ''?>

</section>
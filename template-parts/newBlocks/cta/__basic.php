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

                    <?php render_wysiwyg("{$block['content']['content']}", true, "|| md-mx6 md-px6  {$block['content']['txtColor']} || regular")?>

                    <?php if ($block['buttons']['enabled'] == true): ?>

                        <div class="mt4">

                            <?php foreach ($block['content']['buttons'] as $button): ?>

                                <a href="<?=$button['button_button_link']['url']?>" class="btn <?=$button['button_system_text_colours']?> <?=$button['button_system_background_colours']?> mx2"><?=$button['button_button_link']['title']?></a>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        <?=($block['grid'] == 'container')? '</div>' : ''?>

    <?=($block['link']['enabled'] == true)? '</a>' : ''?>

     <?php if($block['bgImage']['enable'] == true): ?>

        <div class="bg-image || absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?> <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: center; background-size: cover"></div>

     <?php endif; ?>

</section>
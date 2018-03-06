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

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');
$blockWidth  = get_sub_field($current . '_width_block_width');

$sections    = get_sub_field($current . '_keyarea');

?>

<section class="jobs-keyareas || relative clearfix || <?=$bgColor?> <?=$txtColor?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <div class="container">

        <div class="sections || col-12 || mb5 || text-center">

            <?php foreach ($sections as $section):?>
                <div class="selection || col col-12 md-col-6 || p4">

                    <div class="content || box-shadow-3 || bg-charcoal js-match-height">

                        <div class="head p4 bg-primary">

                            <h2 class="mb2"><?=$section['title']?></h2>

                            <p class="mb0 h5"><?=$section['description']?></p>

                        </div>

                        <div class="footer || relative text-left white p4 h5 pb6 js-match-height-alt">

                            <?=$section['service_list']?>


                            <div class="absolute bottom-2 md-width-100">
                                <?php if (!empty($section['button_link']['url'])): ?>

                                    <a href="<?=$section['button_link']['url']?>" class="btn h5 border-white border-top border-bottom border-left border-right regular btn-medium" <?=($section['button_link']['title'] ? 'title="'.$section['button_link']['title'].'"' : '')?> <?=($section['button_link']['target'] ? 'target="'.$section['button_link']['target'].'"' : '')?> ><?=$section['button_link']['title']?></a>

                                <?php endif; ?>

                                <?php if ($section['add_filter'] == true):?>
                                    <select style="min-width:50%;" class="select" onchange="this.form.submit()" name="orderby" id="orderby">
                                        <option value="title">By Sector</option>
                                    </select>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>

    </div>

</section>
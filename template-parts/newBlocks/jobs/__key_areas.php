<?php
/**
 * JOBS – KEY AREAS LAYOUT BLOCK ------------------------
 * This block add support for a CTA block allowing the
 * user to link to other website areas.
 *
 * @author Joe Curran
 * @created 5 Feb 2018
 *
 * @version 1.00
 */

?>

<section <?=get_blockID($block)?> class="jobs-keyareas || relative clearfix" <?=get_blockData($block)?>>

    <div class="container">

        <div class="sections || col-12 || mb5 || text-center">

            <?php foreach ($block['sections'] as $section):?>
                <div class="selection || col col-12 md-col-6 || p4">

                    <div class="content || box-shadow-3 || bg-charcoal js-match-height">

                        <div class="head p4 bg-primary">
                            
                            <?=wp_get_attachment_image($section['button_icon'], array(42, 42), "", ['class' => 'size-42x42 mr2 mb2'])?>

                            <h3 class="mb2"><?=$section['title']?></h3>

                            <p class="mb0 h5"><?=$section['description']?></p>

                        </div>

                        <div class="footer || relative text-left white p4 h5 pb6 js-match-height-alt overflow-hidden">

                            <?=$section['service_list']?>

                            <div class="absolute bottom-2 md-width-100">
                                <?php if (!empty($section['button_link']['url'])): ?>

                                    <a href="<?=$section['button_link']['url']?>" class="btn h5 border-white border-top border-bottom border-left border-right regular btn-medium" <?=($section['button_link']['title'] ? 'title="'.$section['button_link']['title'].'"' : '')?> <?=($section['button_link']['target'] ? 'target="'.$section['button_link']['target'].'"' : '')?> ><?=$section['button_link']['title']?></a>

                                <?php endif; ?>

                                <?php if ($section['add_filter'] == true):?>
                                    <select id="orderby" style="min-width:13rem;" class="select md-mr3 width-100 md-width-auto" >
                                        <option value="">By Sector</option>
                                         <?php
                                            foreach($block['sector_select_options'] as $term): ?>

                                                <option value="<?= $term->name; ?>" data-redirect="<?= $term->taxonomy;?>/<?= $term->slug; ?>"> <?= $term->name; ?> </option>

                                         <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>

                            <?=wp_get_attachment_image($section['icon'], array(220, 220), "", ['class' => 'absolute bottom-1 right-0 size-220x220 opacity-2', 'style' => 'margin-right: -4rem'])?>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>

    </div>

</section>

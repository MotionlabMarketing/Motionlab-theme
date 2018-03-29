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

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "jobs-keyareas")?> <?=get_blockData($block)?>>

    <div class="container">

        <div class="sections mb5 text-center clearfix">

            <?php foreach ($block['sections'] as $section):?>
                <div class="selection || col col-12 md-col-6 || p4">

                    <div class="content box-shadow-3 bg-charcoal">

                        <div class="head p4 bg-primary" data-mh="match-1">

                            <?=wp_get_attachment_image($section['button_icon'], array(42, 42), "", ['class' => 'size-42x42 mr2 mb2'])?>

                            <h3 class="mb2"><?=$section['title']?></h3>

                            <p class="mb0 h5"><?=$section['description']?></p>

                        </div>

                        <div class="relative text-left white p4 overflow-hidden || footer">

                            <div class="relative z2">

                                <div class="mb4 h5 service-list" data-mh="match-2">
                                    <?=$section['service_list']?>
                                </div>


                                <ul data-mh="match-3" class="clearfix list-reset">
                                    <?php if (!empty($section['button_link']['url'])): ?>

                                        <li class="col mr3">
                                            <a href="<?=$section['button_link']['url']?>" class="btn btn-medium h5 regular border-white border lh1 mb2" <?=($section['button_link']['title'] ? 'title="'.$section['button_link']['title'].'"' : '')?> <?=($section['button_link']['target'] ? 'target="'.$section['button_link']['target'].'"' : '')?> ><?=$section['button_link']['title']?></a>
                                        </li>

                                    <?php endif; ?>

                                    <?php if ($section['add_filter'] == true):?>

                                        <li class="col col-12 lg-col-7">

                                            <select id="orderby" class="select btn-medium border-white border lh1 mb2 width-100">
                                                <option value="">By Sector</option>
                                                 <?php
                                                    foreach($block['sector_select_options'] as $term): ?>

                                                        <option value="<?= $term->name; ?>" data-redirect="<?= $term->taxonomy;?>/<?= $term->slug; ?>"> <?= $term->name; ?> </option>

                                                 <?php endforeach; ?>
                                            </select>

                                        </li>
<!--                                                    <option value="--><?//= $term->name; ?><!--" data-redirect="/find-a-job/--><?//= $term->slug; ?><!--"> --><?//= $term->name; ?><!-- </option>-->

                                    <?php endif; ?>
                                </ul>

                            </div>

                            <?=wp_get_attachment_image($section['icon'], array(220, 220), "", ['class' => 'absolute bottom-1 right-0 size-220x220 opacity-1', 'style' => 'margin-right: -4rem'])?>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>

    </div>

</section>

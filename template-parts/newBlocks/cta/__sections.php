<?php
/**
 * CTA – STRIP SECTIONS ---------------------------
 * A CTA with a message and three linked sections.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$sections = get_sub_field($current . '_sections');

$limit = ($block['grid'] == 'container')? 'container' : "";
$image = ($block['bgImage']['enable'] !== true)? $block['background']['colour'] : '';
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "cta-sections {$limit} {$image} p0")?> <?=get_blockData($block)?>>

        <div class="content">

            <a class="section || flex items-center || col col-12 lg-col-3 || py4 px4 || js-match-height text-center lg-text-left">

                <div class="introduction-">

                    <?php render_heading( "{$block['heading']->title}", "h4", "", "", "", ["style" => "font-size: 1.4rem; color: white", "class" => "mb0"]); ?>

                </div>

            </a>

            <?php foreach ($sections as $section): ?>

                <a href="<?=$section['link']['url']?>" class="section-item relative || col col-12 lg-col-3 p4 || text-center <?=$block['content']['txtColor']?> || js-match-height">
                    <p class="h3 mb2"><?=$section['title']?></p>

                    <?php if(!empty($section['link'])): ?>
                        <p class="mb0 || btn btn-small bg-<?=$block['content']['txtColor']?> brand-primary"><?=$section['link']['title']?></p>
                    <?php endif; ?>
                </a>

            <?php endforeach; ?>

        </div>

        <?php if($block['bgImage']['enable'] == true): ?>

            <div class="bg-image || absolute width-100 height-100 top-0 left-0 zn1 <?=$block['bgImage']['occupancy']?> <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>'); background-position: center; background-size: cover"></div>

        <?php endif; ?>

</section>
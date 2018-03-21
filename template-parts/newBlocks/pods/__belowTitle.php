<?php
/**
 * BASIC POD LAYOUT – LAYOUT BLOCK ------------------------
 * A block which output a gird of icons with content.
 *
 * @author Joe Curran
 * @created 7 Mar 2018
 *
 * @version 1.00
 */
?>

<section <?=get_blockID($block)?> class="pod-titleBelow clearfix relative <?=get_blockVisibility($block)?> <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="clearfix py5">

        <?php foreach ($block['content'] as $item): ?>

                <div class="item || col <?=$block['columns']?> p2 || block relative">

                    <div class="box-shadow-1">

                        <?php if(!empty($item['button']['button_link']['url'])): ?>
                            <a href="<?=$item['button']['button_link']['url']?>">
                        <?php endif; ?>

                            <div class="image-holder || js-match-height || relative bg-gray flex items-center justify-center hover-reveal" style="background-image: url('<?= wp_get_attachment_image_url($item['image']); ?>'); min-height: 18rem">

                                <div class="absolute p4 darken-background-3 height-100 flex items-center justify-center reveal"><div class="<?=$item['align']?> <?=$block['pod']['textColor']?>"><?=$item['pod_content']?></div></div>

                            </div>

                            <div class="h3 p2 bold <?=$block['pod']['bgColour']?> brand-primary <?=$item['align']?>">
                                <?=$item['title']?>
                            </div>

                        <?php if(!empty($item['button']['button_link']['url'])): ?>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

        <?php endforeach; ?>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
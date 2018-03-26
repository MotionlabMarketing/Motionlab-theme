<?php
/**
 * ACCORDION BLOCK ---------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 1.00
 */

$rows = get_sub_field($current . '_rows');

?>
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="accordion">

            <?php foreach ($rows as $row): ?>

                <div data-accordion-collection="<?=$block['id']?>" data-accordion-active="false" class="width-100 mb2 px4 bg-white py3 border-top border-left border-right border-bottom border-solid border-1 border-light cursor-pointer">

                    <label for="" class="h4 brand-primary bold width-100 cursor-pointer" style="font-size: 1.2rem"><i class="fa fa-angle-down"></i> <?=$row['title']?><span class="right grey opacity-2 h5 mt1"><i class="fa fa-mouse-pointer"></i> Toggle</span></label>
                    <div class="content border-top border-solid border-1 border-light pt3 display-none">

                        <?=$row['content'];?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
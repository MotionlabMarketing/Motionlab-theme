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
<section id="<?=$block['custom_id']?>" class="accordion-basic || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="accordion">

            <?php
            $i = 1;
            foreach ($rows as $row): ?>

                <div class="row bg-white bg-base p3 box-shadow-1 border-light-1 border-radius-2 border-top border-left border-right border-bottom border-solid mb4">

                    <input type="radio" name="row" id="row-<?=$i?>" class="width-100 display-none" />
                    <label for="row-<?=$i?>" class="width-100 block"><span class="px2 brand-primary width-100 cursor-pointer bold h3 mb3"><?=$row['title']?></span></label>

                    <div class="wysiwyg bg-white bg-base width-100 px2 block overflow-hidden">
                            <?=$row['content'];?>
                    </div>

                </div>

            <?php $i++; endforeach; ?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

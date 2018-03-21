<?php
/**
 * FORM BLOCK ---------------------------------------
 * This is a stadard form block.
 *
 * @author Joe Curran
 * @created 14 Feb 2018
 *
 * @version 1.00
 */

?>
<section <?=get_blockID($block)?> class="clearfix relative <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="text-center mb6">
            <div class="mb4">
                <?php
                $blockTitle = get_sub_field($current . '_title_title');
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg || md-mx6 md-px6">
                <?= get_sub_field($current . '_content'); ?>
            </div>
        </div>

        <?php
            // LOAD FORM INTO THE PAGE.
            $form_object = get_sub_field($current . '_selection');
            gravity_form_enqueue_scripts($form_object['id'], true);
            gravity_form($form_object['id'], true, true, false, '', true, 1);
        ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

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
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

            <div class="text-center mb6">

                <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

                <?php render_wysiwyg("{$block['intro']}", true); ?>

            </div>

            <div class="clearfix">

                <?php
                    // LOAD FORM INTO THE PAGE.
                    $form_object = get_sub_field($current . '_selection');
                    gravity_form_enqueue_scripts($form_object['id'], true);
                    gravity_form($form_object['id'], true, true, false, '', true, 1);
                ?>

            </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

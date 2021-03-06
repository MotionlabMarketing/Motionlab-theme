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
<section <?=get_blockID($block)?> <?=get_blockClasses($block, "overflow-hidden")?> <?=get_blockData($block)?>>

    <div class="container">

            <div class="text-center mb4">

                <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

                <?php render_wysiwyg("{$block['intro']}", true); ?>

            </div>

            <div class="clearfix">

                <?php
                    // LOAD FORM INTO THE PAGE.
                    $form_object = get_sub_field($current . '_selection');
                    gravity_form_enqueue_scripts($form_object['id'], true);
                    gravity_form($form_object['id'], true, true, false, isset($form_autocomplete) ? $form_autocomplete : '', true, 1);
                ?>

            </div>

    </div>

</section>

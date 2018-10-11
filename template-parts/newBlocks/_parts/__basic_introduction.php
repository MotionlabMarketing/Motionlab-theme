<?php if (!empty($block['heading']->title) || !empty($block['intro'])): ?>

    <div class="clearfix mb4 text-center" data-element="introduction">

        <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

        <?php render_wysiwyg("{$block['intro']}", true, ["class" => "regular"])?>

    </div>

<?php endif; ?>
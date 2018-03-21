<?php if (!empty($block['heading']->title) || !empty($block['intro'])): ?>

    <div class="mb4 <?=$block['content']['txtColor']?> text-center">

        <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

        <?php render_wysiwyg("{$block['intro']}", "", " || regular")?>

    </div>

<?php endif; ?>
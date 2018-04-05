<?php

    $heading = convert_heading($column['title']);

    $column['size'] = 12 / $block['content']['cols'];

    $content = ml_personalize_thankyou($column['column_content']);

?>

<div class="col col-12 md-col-<?=$column['size']?> <?=$column['align']?> <?=$column['system_text_colours']?> px4">

    <?php render_heading( "{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}"); ?>

    <?php render_wysiwyg("{$content}", $block['content']['limitWidth']); ?>

    <?php render_buttons($column['column_buttons'], "medium", ["class" => "mb2 mr2"])?>

</div>

<?php
    // TODO: REVIEW THE USE OF THIS FILE...

    // $template_title   = get_field('page_title')['title'];
    // $blockTitle = $template_title['title'];
    
    $heading = convert_heading(get_field('page_title')['title']);
    $intro   = get_field('page_introduction');
?>

<?php if (!empty($heading) || !empty($intro)): ?>

    <div class="container clearfix">

        <div class="col-12 mb5 text-center">

            <div class="col col-12 md-col-12 lg-col-12 mb5 text-center">

                <?php if (!empty($heading)): ?>
                    <div class="mb3">
                        <?php render_heading("{$heading->title}", "{$heading->type}", "{$heading->size}", "{$heading->color}", "{$heading->case}"); ?>
                        <?php // include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php');?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($intro)): ?>
                    <div class="wysiwyg h4 limit-p limit-p-70">
                        <?=$intro?>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

<?php endif; ?>
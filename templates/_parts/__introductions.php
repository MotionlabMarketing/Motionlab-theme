<?php
    // GET THE VALUES READY.

    $template_title   = get_field('page_title');
    $template_content = get_field('page_introduction');

    $blockTitle = $template_title['title'];

?>

<?php if (!empty($blockTitle[0]['title']) || !empty($template_content)): ?>

    <div class="container clearfix">

        <div class="col-12 || mb5 || text-center">

            <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

                <?php if (!empty($blockTitle[0]['title'])): ?>
                    <div class="mb4">
                        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php');?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($template_content)): ?>
                    <div class="wysiwyg h4 limit-p limit-p-70">
                        <?=$template_content?>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

<?php endif; ?>
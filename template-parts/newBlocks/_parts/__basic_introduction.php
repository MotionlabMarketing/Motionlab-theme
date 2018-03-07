<?php if (!empty($block['content']['title']) || !empty($block['content']['content'])): ?>

    <div class="mb4 <?=$block['content']['txtColor']?> text-center">

        <?php $blockTitle = $block['content']['title'];
        if (!empty($blockTitle[0]['title'])): ?>
            <div class="mb2">
                <?php include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php'); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($block['content']['content'])): ?>
            <div class="wysiwyg || limit-p limit-p-70">
                <?=$block['content']['content']?>
            </div>
        <?php endif; ?>

    </div>

<?php endif; ?>
<?php
$columns = 12 / count($block['content']['buttons']);

if ($columns == 12)
    $columns = "col col-12";

if ($columns == 6)
    $columns = "col col-12 md-col-6";

if ($columns == 4)
    $columns = "col col-12 md-col-4";

if ($columns == 3)
    $columns = "col col-12 md-col-6 lg-col-3";
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "mxn2")?> <?=get_blockData($block)?>>

    <div class="flex flex-column md-flex-row">
        
        <?php foreach ($block['content']['buttons'] as $button): ?>

            <a href="<?=$button['button_link']['url']?>" class="block bold text-center <?=$columns?> <?=$button['system_text_colours']?> <?=$button['system_background_colours']?> hover-<?=$button['system_text_colours']?>  hover-<?=$button['system_background_colours']?> relative py3">
                
                <?=$button['button_link']['title']?>
            
            </a> 
            
        <?php endforeach; ?>
    </div>

</section>
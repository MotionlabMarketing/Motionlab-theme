<?php
$columns = 12 / $block['content']['items_count'];

if ($columns == 12)
    $columns = "col col-12";

if ($columns == 6)
    $columns = "col col-12 md-col-6";

if ($columns == 4)
    $columns = "col col-12 md-col-4";

if ($columns == 3)
    $columns = "col col-12 md-col-6 lg-col-3";
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "container mx-auto mxn2")?> <?=get_blockData($block)?>>

    <div class="flex flex-column md-flex-row">
        
        <?php
        $i = 0;
        $c = 1;
        $box = $block['content']['items_content'];
        while ($result = $block['content']['items_count'] >= $c): ?>

            <a href="<?=$box[$i]['cta_buttons']['button_link']['url']?>" class="block <?=$columns?> bg-cover bg-center py6 relative hover-reveal" style="background-image:url('<?=$box[$i]['cta_image']['sizes']['medium_large']?>');">
                <div class="absolute bg-darken-3 top-0 left-0 right-0 bottom-0 z1 reveal"></div>
                <div class="absolute bg-darken-3 top-0 left-0 right-0 bottom-0 z1"></div>
                <div class="p4 text-center relative z2">
                    <h2 class="h1 mb2 white"><?=$box[$i]['cta_heading']?></h2>
                    <h5 class="ls2 h4 white mb3 lh1"><?=$box[$i]['cta_sub_heading']?></h5>
                    <p class="white"><?=$box[$i]['cta_message']?></p>
                    <span class="btn btn-large bold inline-block <?=$box[$i]['cta_buttons']['system_text_colours']?> <?=$box[$i]['cta_buttons']['system_background_colours']?>"><?=$box[$i]['cta_buttons']['button_link']['title']?></span>
                </div>
            </a> 
            
        <?php $i++; $c++;
        endwhile; ?>
    </div>

</section>
<?php
//TODO : Basic template for global CTA to go here.

switch ($block['columns']):
    case "1":
        $block['columns'] = "col-12";
        break;
    case "2":
        $block['columns'] = "col-12 md-col-6";
        break;
    case "3":
        $block['columns'] = "col-12 md-col-4";
        break;
endswitch;

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <div class="flex">

        <?php foreach ($block['content']['ctas'] as $cta): ?>

            <a href="<?=$cta['cta_buttons']['button_link']['url'];?>" class="block col col <?=$block['columns']?> bg-cover bg-center py6 width-100 relative hover-reveal" style="background-image:url('<?=$cta['cta_image']['sizes']['galleryMedium'];?>');">
                <div class="absolute bg-darken-3 top-0 left-0 right-0 bottom-0 z1 reveal"></div>
                <div class="absolute bg-darken-3 top-0 left-0 right-0 bottom-0 z1"></div>
                <div class="p4 text-center relative z2">
                    <h2 class="h1 mb3 white"><?=$cta['cta_icon'];?></h2>
                    <h4 class="white"><?=$cta['cta_sub_heading'];?></h4>
                    <h3 class="white"><?=$cta['cta_heading'];?></h3>
                    <p class="white"><?=$cta['cta_message'];?></p>
                    <span class="p3 inline-block rounded <?=$cta['cta_buttons']['system_text_colours'];?> <?=$cta['cta_buttons']['system_background_colours'];?>">
                        <?=$cta['cta_buttons']['button_icon'];?><?=$cta['cta_buttons']['button_link']['title'];?>
                    </span>
                </div>
            </a>

        <?php endforeach; ?>

    </div>

</section>

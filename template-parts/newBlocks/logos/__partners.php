<?php
/**
* LINKED BOXES – BASIC LAYOUT BLOCK ------------------------
* A basic block which allows images to be linked to other
* pages or URLs.
*
* @author Joe Curran
* @created 29 Jan 2018
*
* @version 1.00
*/

$bgColor    = get_sub_field($current . '_background_system_background_colours');
$txtColor   = get_sub_field($current . '_text_system_text_colours');

$borders          = "";
$bordersColor     = get_sub_field($current . '_borders_border_colour');
$bordersSides     = get_sub_field($current . '_borders_border_sides');

if (!empty($bordersSides)) {
    foreach ($bordersSides as $item) {
        $borders = $borders . " " . $item;
    }
}
$borders    = $borders . " " . $bordersColor;

$blockTitle = get_sub_field($current . '_title_title');

$blockItems = get_sub_field($current . '_slider');
$blockItems = $blockItems['logos'];
?>

<?php
/**
* LOGO BASICS BLOCKS ---------------------------------------
* This block add logos to the page in a single line that
* will auto scroll if needed.
*
* @author Joe Curran
* @created 28 Feb 2018
*
* @version 2.00
*/
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>
    
    <?= ($block['grid'] == 'container') ? '<div class="container">' : "" ?>
        
        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="col-12">
            
            <?php if (!empty($block['logos'])): ?>

                <div class="item-slider px5" data-slick="logo-slider-partners">&nbsp;
                    
                    <?php foreach ((array)$block['logos'] as $logo): $imageURL = get_field("attachment_image_link", $logo['ID']) ?>
                        
                        <div class="col col-grid-5 flex items-center justify-center px5" data-mh="partners-slider">
                            
                            <?php if(!empty($imageURL)): ?><a href="<?=$imageURL?>"><?php endif; ?>
                                <img src="<?=$logo['url']?>" alt="<?=$logo['title']?>" style="max-height: 6rem; margin: 0 auto;">
                            <?php if(!empty($imageURL)): ?></a><?php endif; ?>
                                
                        </div>
                            
                    <?php endforeach; ?>
                        
                </div>

            <?php else: ?>

                <p class="lead text-center"><strong>LOGO BLOCK</strong><br/>Please select or upload some logos into this block!</p>
            
            <?php endif; ?>
                    
        </div>
            
    <?= ($block['grid'] == 'container') ? '</div>' : "" ?>
            
</section>
        
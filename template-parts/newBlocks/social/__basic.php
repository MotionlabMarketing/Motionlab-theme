<?php
/**
 * SOCIAL SHARE – BASIC LAYOUT BLOCK ------------------------
 * A basic block which allows images to be linked to other
 * pages or URLs.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$bgColor     = get_sub_field('block_social_background_system_background_colours');
$txtColor    = get_sub_field('block_social_text_system_text_colours');

$hideBtns    = get_sub_field('block_social_hide_share_buttons');
$hideClasses = "";

foreach ($hideBtns as $item) {
    $hideClasses .= " " . $item;
}

?>

<section class="social-share social-basic || <?=$bgColor?>">

    <div class="container">

        <div class="clearfix py5">

            <div class="text-center bold h4">
                <p><?=strip_tags(get_sub_field('block_social_content'))?></p>
            </div>

            <div class="social-share text-center <?=$hideClasses?>">
                <?php naked_social_share_buttons(); ?>
            </div>

        </div>

    </div>

</section>
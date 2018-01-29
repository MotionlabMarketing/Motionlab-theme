<?php
/**
 * SPACER BLOCK -------------------------------------
 * Adds a space between blocks.
 *
 * @author Jason
 * @created Unknown
 * @updated 29 Jan 2018 – Added blank option.
 *
 * @version 1.01
 */
?>

<section class="relative z1 overflow-hidden || <?php echo $bgColor ?>">
    <div class="container">
        <hr class="border-<?php echo get_sub_field('border_style'); ?> my<?php echo get_sub_field('line_space')?>">
    </div>
</section>
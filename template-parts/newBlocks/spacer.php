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

$borderLine = get_sub_field('border_style');
?>

<section class="relative z1 overflow-hidden || <?php echo $bgColor ?> || py<?php echo get_sub_field('line_space')?>">
<?php if ($borderLine !== "0"):?>
    <div class="container">
        <hr class="border-<?=$borderLine?>">
    </div>
<?php endif; ?>
</section>
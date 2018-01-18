<?php
$table = get_sub_field( 'table' );
?>

<!-- table -->
<section class="<?php echo $bgColor ?> <?php echo $txtColor ?>">
	<div class="px4 lg-px0 pb4 md-pb5 || <?php echo $paddingTop == 'collapse-top' ? 'pt0' : 'pt4 md-pt5' ?> <?php echo get_sub_field('full_width_full_width') ?> <?php echo get_sub_field('narrow_columns') == TRUE ? 'measure-wide' : '' ?>">

		<?php if ( have_rows('block_title_title')) {
        	while ( have_rows('block_title_title')) {
        	 	the_row() ?>
                <?php if(!empty(get_sub_field('title'))) { ?>
                    <div class="container text-center mx-auto px4 ml-px0 pb4 lg-pb5 wysiwyg">
                        <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/title.php') ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>

		<table class="col-12 border border-bottom-none border-left-none border-<?php echo get_sub_field('border_color') . '-' . get_sub_field('border_strength') ?>" style="table-layout:fixed">
			<?php if ( $table['header'] ) { ?>
				<thead class="<?php echo 'bg-' . get_sub_field('header_background_color_color') ?> <?php echo get_sub_field('header_text_color_color') ?>">
					<tr>
						<?php foreach ( $table['header'] as $th ) { ?>
							<th class="border-bottom border-left border-<?php echo get_sub_field('border_color') . '-' . get_sub_field('border_strength') ?> py3">
								<?php echo $th['c']; ?>
							</th>
						<?php } ?>
					</tr>
				</thead>
			<?php } ?>

			<tbody class="<?php echo $txtColor ?>">
				<?php foreach ( $table['body'] as $tr ) { ?>
					<tr>
						<?php foreach ( $tr as $td ) { ?>
							<td class="border-bottom border-left border-<?php echo get_sub_field('border_color') . '-' . get_sub_field('border_strength') ?>">
								<?php echo $td['c']; ?>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
</section>

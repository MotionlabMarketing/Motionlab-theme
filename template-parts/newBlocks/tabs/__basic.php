<?php
if ( get_sub_field('vertical_tabs') ){
    $tabNav= 'md-flex md-flex-row';
    $tabName= 'mb4 md-col-4 lg-col-3 md-mb0 md-border-right border-smoke';
    $tab= 'hover-bg-smoke inline-block md-block md-border-bottom-none md-border-left-none md-border-right-none px2';
    $content = '';
    $pad = '';
    $contentPad = 'md-px4 py3';
} else {
    $tabNav= 'flex flex-column';
    $tabName = 'flex';
    $tab= 'btn md-text-left border-bottom-none || mr1 px3';
    $content = 'pt4';
    $pad = '';
    $contentPad = '';
}

if (get_sub_field('centre_tabs') == true) {

    $tab .= "|| tab-center bg-smoke btn-medium tab-arrowBottom";
    $tabName .= "|| flex items-center justify-center";

}

$blockTitle  = get_sub_field($current . '_title_title');
?>

<!-- tabs - simple -->
<section class="tabs-basic || p4 <?php echo $bgColor ?> <?php echo $txtColor ?>">
    <div data-tabs="wrapper" class="container <?php echo $extraPadding ;?> <?php echo $tabNav ?> <?php echo $measureWide ?> || traditional-tabs">
        <div class="col col-12 <?php echo $pad ?> <?php echo $tabName ?>">
            <?php if( have_rows('tabs')){
                $i = 1 ;
                while ( have_rows('tabs')){
                    the_row() ?>

                    <span data-section="tab<?php echo $i ?>" class="border border-smoke cursor-pointer narrow uppercase py3 bold relative || tab <?php echo $tab ?> || <?php echo $i <= 1 ? 'tab-active' : '' ?>">
						<?php echo get_sub_field('tab_name') ?>
					</span>

                    <?php $i++ ; ?>
                <?php } ?>
            <?php } ?>
        </div>

        <div data-tabs="content" class="col-12 <?php echo $contentPad ?> <?php echo $txtColor ?>">
            <?php if( have_rows('tabs')){
            $i = 1;
            while ( have_rows('tabs')){
            the_row() ?>

                <?php $cols = get_sub_field('number_of_columns');

                if ($cols == 1): ?>

                    <section id="tab<?php echo $i ?>" class="tab-content || <?php echo $content ?> <?php echo ($i > 1) ? 'hide' : '' ?> bg-white p4">

                        <div class="wysiwyg p4">
                            <?php
                            $blockTitleCol1 = get_sub_field('col_one_title_title');?>
                            <<?=$blockTitleCol1[0]['type']['heading']?> class="pb2 <?=$blockTitleCol1[0]['size']['heading_size']?> || <?=$blockTitleCol1[0]['color']['system_text_colours']?> <?=$blockTitleCol1[0]['title_case']['system_text_transform']?>">
                                <?=$blockTitleCol1[0]['title']?>
                            </<?=$blockTitleCol1[0]['type']['heading']?>>
                            <?=get_sub_field('col_one_title_content') ?>
                        </div>

                    </section>

                <?php else: ?>

                <section id="tab<?php echo $i ?>" class="tab-content || <?php echo $content ?> <?php echo ($i > 1) ? 'hide' : '' ?> bg-white p4  || clearfix">

                    <div class="col col-6 p4">
                        <div class="wysiwyg">
                            <?php
                            $blockTitleCol1 = get_sub_field('col_one_title_title');?>
                            <<?=$blockTitleCol1[0]['type']['heading']?> class="pb2 <?=$blockTitleCol1[0]['size']['heading_size']?> || <?=$blockTitleCol1[0]['color']['system_text_colours']?> <?=$blockTitleCol1[0]['title_case']['system_text_transform']?>">
                                <?=$blockTitleCol1[0]['title']?>
                            </<?=$blockTitleCol1[0]['type']['heading']?>>

                            <?=get_sub_field('col_one_title_content') ?>
                         </div>
                    </div>

                    <div class="col col-6 p4">
                        <div class="wysiwyg">
                            <?php
                            $blockTitleCol2 = get_sub_field('col_two_title_title');?>
                            <<?=$blockTitleCol2[0]['type']['heading']?> class="pb2 <?=$blockTitleCol2[0]['size']['heading_size']?> || <?=$blockTitleCol2[0]['color']['system_text_colours']?> <?=$blockTitleCol2[0]['title_case']['system_text_transform']?>">
                            <?=$blockTitleCol2[0]['title']?>
                        </<?=$blockTitleCol2[0]['type']['heading']?>>

                        <?=get_sub_field('col_two_title_content') ?>
                        </div>
                    </div>

                </section>

                <?php endif; ?>

                <?php $i++ ; ?>
                <?php } ?>
                <?php } ?>

        </div>

    </div>

</section>

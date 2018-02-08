<?php
/**
 * Template Name: Packages
 */

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

$packageOne  = get_field('package_one');
$packageTwo  = get_field('package_two');

get_header(); ?>

<div class="clearfix || mt6" id="package">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center || limit-p limit-p-80">

            <?php
            if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

            <div class="wysiwyg h4">
                <?=get_field('page_introduction')?>
            </div>

        </div>

            <div class="col col-12 clearfix text-center mb4 md-p3">


                <div class="header || col col-12 md-hidden-down">

                    <div class="col col-12 md-col-6">
                        <div class="block width-100 min-width-100" style="opacity: 0">1</div>
                    </div>

                    <div class="col col-12 md-col-3 pl3">
                        <div class=" h3 pt4 pb4 bg-brand-primary text-center white bold"><?=$packageOne['title']?></div>
                    </div>

                    <div class="col col-12 md-col-3 pl3">
                        <div class="h3 pt4 pb4 bg-brand-primary text-center white bold"><?=$packageTwo['title']?></div>
                    </div>

                </div>

                <?php foreach (get_field('package_features') as $item):?>

                <div class="row || col col-12 p4 mb4 md-p0 md-mb0 md-pr0 || border border-bottom border-light">

                    <div class="col col-12 md-col-6 text-left md-px3 md-py3 || js-match-height ">
                        <div class="p3">
                            <p class="mr3 h1 mb4 inline-block left"><?=$item['icon']?></p>
                            <h3 class="pb2 h3 || mb0 || brand-primary text-none"><?=$item['name']?></h3>
                            <p class="h6"><?=$item['description']?></p>
                        </div>
                    </div>

                    <div class="col col-12 md-col-3 md-pl3">
                        <div class="pt2 pb2 bg-smoke text-center brand-base || js-match-height flex items-center justify-center"><p class="mb0 md-h2"><span class="md-hidden-up"><?=$packageOne['title']?></span> <?=(in_array("package_one", $item['available'])? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>');?></p></div>
                    </div>

                    <div class="col col-12 md-col-3 md-pl3">
                        <div class="pt2 pb2 bg-smoke text-center brand-base || js-match-height flex items-center justify-center"><p class="mb0 md-h2"><span class="md-hidden-up"><?=$packageTwo['title']?></span> <?=(in_array("package_two", $item['available'])? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>');?></p></div>
                    </div>

                </div>

                <?php endforeach; ?>

                <div class="footer || col col-12">

                    <div class="col col-12 md-col-6">
                        <div class="block width-100 min-width-100" style="opacity: 0">1</div>
                    </div>

                    <div class="col col-12 md-col-3 md-pl3 mb2 md-mb0">
                        <div class="p4 clearfix bg-brand-primary text-center white h4">

                            <span class="md-hidden-up bold mb2"><?=$packageOne['title']?></span>

                            <div class="col col-12 md-col-6">
                                <p class="mb0"><?=$packageOne['weekly_cost']?></p>
                            </div>

                            <div class="col col-12 md-col-6">
                                <p class="mb0"><?=$packageOne['monthly_cost']?></p>
                            </div>

                        </div>
                    </div>

                    <div class="col col-12 md-col-3 md-pl3">
                        <div class="p4 clearfix bg-brand-primary text-center white h4">

                            <span class="md-hidden-up bold mb2"><?=$packageTwo['title']?></span>

                            <div class="col col-12 md-col-6">
                                <p class="mb0"><?=$packageTwo['weekly_cost']?></p>
                            </div>

                            <div class="col col-12 md-col-6">
                                <p class="mb0"><?=$packageTwo['monthly_cost']?></p>
                            </div>

                        </div>
                    </div>

                    <div class="col col-12 md-col-6 md-hidden-down">
                        <div class="block width-100 min-width-100" style="opacity: 0">1</div>
                    </div>

                    <div class="col col-12 md-col-3 pt3 md-hidden-down">
                        <p class="h6 brand-primary bold"><a href="<?=$packageOne['package_page']['url']?>"><?=$packageOne['package_page']['title']?></a></p>
                    </div>

                    <div class="col col-12 md-col-3 pt3 md-hidden-down">
                        <p class="h6 brand-primary bold"><a href="<?=$packageTwo['package_page']['url']?>"><?=$packageTwo['package_page']['title']?></a></p>
                    </div>

                    <div class="col col-12 md-col-12 h6 text-right mt2 muted"><?=get_field('asterisk_details')?></div>

                </div>



            </div>

    </div>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

</div>

<?php get_footer(); ?>
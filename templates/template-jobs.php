<?php
/**
 * Template Name: Jobs – Listing
 *
 * TODO: Needs converting to single when CPT has been added.
 */

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];
get_header(); ?>

<div class="clearfix || mt6" id="listing-job">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center || limit-p limit-p-80">

            <?php
            if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

            <div class="wysiwyg h4">
                <?=get_field('page_introduction')?>
            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 clearfix">

            <div class="col col-12 mb5">

                <form action="#" class="width-100 || flex justify-center">

                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <option value="title">By Sector</option>
                    </select>

                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <option value="title">By Type</option>
                    </select>

                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <option value="title">By Salary</option>
                    </select>

                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <option value="title">By Location</option>
                    </select>

                </form>

            </div>

            <div class="col col-12 md-col-8 my6 clearfix">

                <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                    <div class="col col-9">

                        <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                        <p class="h5 mb0">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                    </div>

                    <div class="col col-3 mt1">

                        <a href="" class="btn btn-primary btn-medium white right">Apply Now</a>

                    </div>

                </div>

                <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                    <div class="col col-9">

                        <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                        <p class="h5 mb0">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                    </div>

                    <div class="col col-3 mt1">

                        <a href="" class="btn btn-primary btn-medium white right">Apply Now</a>

                    </div>

                </div>

                <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                    <div class="col col-9">

                        <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                        <p class="h5 mb0">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                    </div>

                    <div class="col col-3 mt1">

                        <a href="" class="btn btn-primary btn-medium white right">Apply Now</a>

                    </div>

                </div>

                <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                    <div class="col col-9">

                        <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                        <p class="h5 mb0">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                    </div>

                    <div class="col col-3 mt1">

                        <a href="" class="btn btn-primary btn-medium white right">Apply Now</a>

                    </div>

                </div>

                <div class="listItem || relative clearfix border-bottom border-light px3 py3">

                    <div class="col col-9">

                        <a href=""><h3 class="brand-primary mb2 h4">Part Time Marketing Coordinator – East Lancashire, £28,000 (pro rata)</h3></a>

                        <p class="h5 mb0">Accrington <span class="muted">•</span> Up to £28,000 per annum <span class="muted">•</span> Permanent</p>

                    </div>

                    <div class="col col-3 mt1">

                        <a href="" class="btn btn-primary btn-medium white right">Apply Now</a>

                    </div>

                </div>

            </div>

            <div class="col col-12 md-col-4 my5 p4">

                <div class="block relative mb4 || min-height-v25 bg-cover bg-center bg-darken-3" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/ludovic-fremondiere-386793.jpg')">

                    <a href="#1" class="flex items-center justify-center || min-height-v25 || darken-background darken-background-4">

                        <h5 class="h3 white mb0">Box Title to Go Here</h5>

                    </a>

                </div>

                <div class="block relative mb4 || min-height-v25 bg-cover bg-center bg-darken-3" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/ludovic-fremondiere-386793.jpg')">

                    <a href="#2" class="flex items-center justify-center || min-height-v25 || darken-background darken-background-4">

                        <h5 class="h3 white mb0">Box Title to Go Here</h5>

                    </a>

                </div>

                <div class="block relative mb4 || min-height-v25 bg-cover bg-center bg-darken-3" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/ludovic-fremondiere-386793.jpg')">

                    <a href="#3" class="flex items-center justify-center || min-height-v25 || darken-background darken-background-4">

                        <h5 class="h3 white mb0">Box Title to Go Here</h5>

                    </a>

                </div>



            </div>


        </div>

    </div>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

</div>

<?php get_footer(); ?>
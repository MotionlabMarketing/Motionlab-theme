<?php
/**
 * Template Name: News – Listing
 *
 * TODO: Needs converting to news index when CPT has been added.
 */

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

get_header(); ?>

<div class="clearfix ||  mt6" id="news-featuredListing">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

            <?php
            if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

            <div class="wysiwyg h4">
                <?=get_field('page_introduction')?>
            </div>

        </div>


        <div class="col col-12 md-col-12 lg-col-12 || mb5 bg-smoke">

            <div class="col col-12 md-col-6 || px5 md-p5 left md-right || flex items-center justify-center || js-match-height">

                <img src="http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892-480x320.jpg" alt="{{ TITLE }}">

            </div>

            <div class="col col-12 md-col-6 || relative p5 right md-left || js-match-height">

                <p class="left || pt2 h5">3 days ago</p>

                    <ul class="mt2 tags tags-right border-radius">
                        <li><a href="">Item 1</a></li>
                        <li><a href="">Item 2</a></li>
                        <li><a href="">Item 3</a></li>
                    </ul>

                <h2 class="clear-both || mt5 || brand-primary">Cunning Mellor Ranked for Prestigious Investors in People Awards 2017</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="md-absolute bottom-2 h5">Read full story</a>

            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 || mb5 px4 mxn2">

            <div class="col col-12 md-col-4">

                <p class="bold brand-primary h3 text-center md-text-left">All Categories</p>

            </div>

            <div class="col col-12 md-col-8 md-text-right flex justify-center md-justify-end">

                <form method="get">

                    <span class="mt3 h5 inline-block mr4 hidden-md hidden-xs sm-mb2">Filter by: </span>

                    <select style="min-width:13rem;" class="select md-ml3 width-100 sm-width-auto md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>Title</option>
                        <option value="date" <?php echo ($orderby == 'date') ? 'selected' : '' ; ?>>Date</option>
                    </select>

                    <select style="min-width:13rem;" class="select width-100 sm-width-auto md-width-auto md-ml3 box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category) : ?>
                            <option value="title" data-url="/category/<?php echo $category->slug ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>

                </form>

            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 mb4 mxn2">

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h6 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892-480x320.jpg');"></div></a>

                <p class="h5 mb3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb4 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h6 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892-480x320.jpg');"></div></a>

                <p class="h5 mb3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb4 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h6 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892-480x320.jpg');"></div></a>

                <p class="h5 mb3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb4 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h6 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <a href="#"><div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/pietro-de-grandi-329892-480x320.jpg');"></div></a>

                <p class="h5 mb3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb4 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
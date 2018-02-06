<?php
/**
 * Template Name: News – Listing
 *
 * TODO: Needs converting to news index when CPT has been added.
 */
get_header(); ?>

<div class="clearfix ||  mt6" id="news-featuredListing">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center">

            <h1 class="h2 mb2 || brand-primary">Latest News</h1>

            <p class="h4">Let us help futureproof your business by sourcing the best talent, first time around.</p>

        </div>


        <div class="col col-12 md-col-12 lg-col-12 || pt3 mb5 bg-smoke">

            <div class="col col-12 md-col-6 || px5 md-p5 left md-right || flex items-center justify-center || js-match-height">

                <img src="http://devlocal.motionlabtheme.d3z.uk/app/uploads/2017/03/jelly-2.jpg" alt="{{ TITLE }}">

            </div>

            <div class="col col-12 md-col-6 || relative p5 right md-left || js-match-height">

                <p class="left muted || pt2 h5">3 days ago</p>

                    <ul class="tags tags-right border-radius">
                        <li><a href="">Item 1</a></li>
                        <li><a href="">Item 2</a></li>
                        <li><a href="">Item 3</a></li>
                    </ul>

                <h2 class="clear-both || mt5 || brand-primary">Cunning Mellor Ranked for Prestigious Investors in People Awards 2017</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="md-absolute bottom-2 h5">Read full story</a>

            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 || mb5 px4">

            <div class="col col-12 md-col-4">

                <p class="mt3 bold brand-primary h3">All Categories</p>

            </div>

            <div class="col col-12 md-col-8 md-text-right">

                <form method="get">

                    <span class="mt3 h5 inline-block mr4 hidden-md hidden-xs sm-mb2">Filter by: </span>

                    <select style="min-width:13rem;" class="select md-ml3 width-100 md-width-auto box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ; ?>>Title</option>
                        <option value="date" <?php echo ($orderby == 'date') ? 'selected' : '' ; ?>>Date</option>
                    </select>

                    <select style="min-width:13rem;" class="select width-100 md-width-auto md-ml3 box-shadow-3" onchange="this.form.submit()" name="orderby" id="orderby">
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category) : ?>
                            <option value="title" data-url="/category/<?php echo $category->slug ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>

                </form>

            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 mb4">

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h5 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2017/03/jelly-2.jpg');"></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb3 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h5 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2017/03/jelly-2.jpg');"></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb3 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h5 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2017/03/jelly-2.jpg');"></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb3 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

            <div class="col col-12 sm-col-6 md-col-3 lg-col-3 || p4 || js-match-height">

                <p class="h5 mb2">1st Jan, 18</p>

                <h3 class="h4 brand-primary">News Story Title</h3>

                <div class="image-holder square img-cover img-center || mb4" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2017/03/jelly-2.jpg');"></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac magna leo. Morbi eros mi, aliquam sed ipsum et, accumsan feugiat eros. In porta tellus.</p>

                <a href="#" class="block mb3 || h5 bold">Read full story</a>

                <ul class="tags border-radius">
                    <li><a href="">Item 1</a></li>
                    <li><a href="">Item 2</a></li>
                </ul>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
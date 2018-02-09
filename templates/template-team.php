<?php
/**
 * Template Name: Team – Listing
 *
 * TODO: Needs converting to template when CPT has been added.
 */


if (!empty($bgColor)):
    $bgColor = "bg-white";
endif;

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];

get_header(); ?>

    <section class="clearfix my4 mb4" id="listing-team">

        <div class="container">

            <div class="col-12 || mb5 || text-center">

                <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center p3 limit-p limit-p-70">

                    <?php
                    if (!empty($blockTitle[0]['title'])) {
                        include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

                    <div class="wysiwyg h4">
                        <?=get_field('page_introduction')?>
                    </div>

                </div>

            </div>

        </div>

        <div class="container clearfix || mb6">

            <div class="grid">

                <div class="grid-sizer"></div>

                <div class="p4 || grid-item grid-item--double">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="col p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;; background-position: center background-position: center background-position: center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item  grid-item--double">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="p4 || grid-item">

                    <a href="{{ProfileLink}}" class="<?= $txtColor ?>">

                        <div class="member || relative pb3 || bg-white box-shadow-3">

                            <div class="profile || lg-mb4 || bg-center bg-cover"
                                 style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover; background-position: top center;"></div>

                            <div class="content || p2 text-center">
                                <h4>{{Staff Name}}</h4>
                                <p class="postion brand-base">{{Position}}</p>
                            </div>

                            <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                <p class="h4 text-center">Read More about {{STAFF NAME}}</p>

                            </div>

                        </div>

                    </a>

                </div>


            </div>

        </div>

    </section>

<?php get_footer(); ?>
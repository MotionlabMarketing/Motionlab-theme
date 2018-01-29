<?php
/**
 * TEAM – BASIC LAYOUT BLOCK ------------------------
 * A basic listing layout for some of the team members.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$membersShow = get_sub_field('number_of_profiles');
$bgColor     = get_sub_field('profile_background_system_background_colours');
$txtColor    = get_sub_field('block_team_text_system_text_colours');

$blockTitle  = get_sub_field('block_team_title_title');

// BACKEND NOTES – REMOVE ONCE ADDED
// Get posts from Custom Post Type.
// $membersShow – Number of Items to show.

?>


<section class="team-basic || clearfix my4 mb6">

    <div class="container">

        <div class="col-12 || mb5 || text-center">

            <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php') ?>

            <div class="wysiwyg || mx6 px6">
                <?=get_sub_field('block_team_content');?>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="col col-2 p2">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || <?= $bgColor ?> || p3">

                    <div class="profile || mb4 || bg-center bg-cover" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover"></div>

                    <h4>{{Staff Name}}</h4>
                    <p class="postion">{{Position}}</p>

                </div>

            </a>

        </div>

        <div class="col col-2 p2">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || <?= $bgColor ?> || p3">

                    <div class="profile || mb4 || bg-center bg-cover" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover"></div>

                    <h4>{{Staff Name}}</h4>
                    <p class="postion">{{Position}}</p>

                </div>

            </a>

        </div>

        <div class="col col-2 p2">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || <?= $bgColor ?> || p3">

                    <div class="profile || mb4 || bg-center bg-cover" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover"></div>

                    <h4>{{Staff Name}}</h4>
                    <p class="postion">{{Position}}</p>

                </div>

            </a>

        </div>

        <div class="col col-2 p2">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || <?= $bgColor ?> || p3">

                    <div class="profile || mb4 || bg-center bg-cover" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover"></div>

                    <h4>{{Staff Name}}</h4>
                    <p class="postion">{{Position}}</p>

                </div>

            </a>

        </div>

        <div class="col col-2 p2">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || <?= $bgColor ?> || p3">

                    <div class="profile || mb4 || bg-center bg-cover" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover"></div>

                    <h4>{{Staff Name}}</h4>
                    <p class="postion">{{Position}}</p>

                </div>

            </a>

        </div>

        <div class="col col-2 p2">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || <?= $bgColor ?> || p3">

                    <div class="profile || mb4 || bg-center bg-cover" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg<?php // Photo ?>'); background-size: cover"></div>

                    <h4>{{Staff Name}}</h4>
                    <p class="postion">{{Position}}</p>

                </div>

            </a>

        </div>

    </div>

</section>
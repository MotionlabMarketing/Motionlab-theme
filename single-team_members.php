<?php
/**
 Template Name: Team – Member
 Template Post Type: team_members
 * TODO: Needs converting to single when CPT has been added.
 */

$image_url = isset(get_field("staff_profileImage", $team_member->ID)['url']) ? get_field("staff_profileImage", $team_member->ID)['url'] : 'http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg';

get_header(); ?>

<div class="clearfix ||  mt6" id="single-team">

    <div class="container">

        <div class="profile || col col-12 md-col-6 lg-col-4 pt4 pr6">
            <div class="image-holder img-square img-top img-s20" style="background-image: url('<?=$image_url?>');"></div>
        </div>

        <div class="col col-12 md-col-6 lg-col-8 || pt3">

            <h1 class="h1 mb2 bold"><?=get_field('staff_name', get_the_ID());?></h1>
            <h2 class="h3"><?=get_field('staff_role', get_the_ID());?></h2>

            <blockquote class="ml0 my5 italic">
                <?=get_field('staff_quote', get_the_ID());?>
            </blockquote>

            <p class="mb2">If you'd like to know more then your best giving me a call</p>
            <p class="h3 mb2"><a href=""><strong><?=get_field('staff_phoneNumber', get_the_ID());?></strong></a></p>
            <p>or email at <a href=""><strong><?=get_field('staff_emailAddress', get_the_ID());?></strong></a></p>
        </div>

        <div class="my3 mt6 pb6 || col col-12 || first-bold">
            <?=get_field('staff_bio', get_the_ID());?>
        </div>

    </div>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

</div>

<?php get_footer(); ?>

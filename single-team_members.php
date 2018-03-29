<?php
/**
 Template Name: Team – Member
 Template Post Type: team_members
 * TODO: Needs converting to single when CPT has been added.
 */

//TODO: Replace default image (options maybe)
$image_url = isset(get_field("staff_profileImage", $team_member->ID)['url']) ? get_field("staff_profileImage", $team_member->ID)['url'] : 'http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg';

get_header(); ?>

<div class="clearfix p4 md-mt4" id="single-team">

    <div class="container">

        <div class="profile col col-12 md-col-6 lg-col-4 md-pt4 flex items-center justify-center">
            <div class="image-holder img-square img-top img-s20" style="background-image: url('<?=$image_url?>');"></div>
        </div>

        <div class="col col-12 md-col-6 lg-col-8 pt3 text-center md-text-left">

            <h1 class="h1 mb2 bold"><?=get_field('staff_name');?></h1>
            <h2 class="h3"><?=get_field('staff_role');?></h2>

            <blockquote class="md-ml0 md-my2 m0 italic">
                <?=get_field('staff_quote');?>
            </blockquote>

            <p class="mb2">If you'd like to know more then your best giving me a call</p>
            <p class="h3 mb2"><a href="tel:<?=get_field('staff_phoneNumber');?>"><strong><?=get_field('staff_phoneNumber');?></strong></a></p>
            <p>or email at <a href="mailTo:<?=get_field('staff_emailAddress');?>"><strong><?=get_field('staff_emailAddress');?></strong></a></p>
        </div>

        <div class="my3 mt6 pb6 || col col-12 || first-bold">
            <?=get_field('staff_bio');?>
        </div>

    </div>

</div>

<?php get_footer(); ?>

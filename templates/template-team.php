<?php
/**
 * Template Name: Team – Listing
 */

include_once(MODELS_DIR . '_block_team.php');
$team_controller = new _block_team(null, null);
$team_members = $team_controller->fetchPosts(-1);

get_header(); ?>

    <section class="clearfix my4 mb4" id="listing-team">

        <div class="container clearfix mt7 mb4">

            <?php include_once(get_template_directory() . '/templates/_parts/__introductions.php')?>

        </div>

        <div class="container clearfix">

            <div class="grid">

                <div class="grid-sizer"></div>

                <?php foreach ($team_members->posts as $key => $team_member) :?>

                    <?php $member_name = get_field('staff_name', $team_member->ID) ?>
                    <?php $member_role = get_field('staff_role', $team_member->ID) ?>
                    <?php $image_url = isset(get_field("staff_profileImage", $team_member->ID)['url']) ? get_field("staff_profileImage", $team_member->ID)['url'] : 'http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg'; ?>


                    <?php if ($key % 10 == 0 || $key % 14 == 0) : ?>

                        <div class="p4 grid-item grid-item--double lg-hover-zoom">
                            <a href="#modal-<?=$key?>" class="<?= $txtColor ?> block relative model">
                                <div class="member relative relative bg-white box-shadow-3 zoom">
                                    <div class="profile bg-center bg-cover" style="background: url('<?=$image_url?>'); background-size: cover; background-position: top center;"></div>
                                    <div class="content p4 flex items-center justify-center flex-column">
                                        <h4 class="mt0 mb0"><?=$member_name?></h4>
                                        <p class="postion brand-base mb0"><?=$member_role?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php else: ?>

                        <div class="p4 grid-item lg-hover-zoom">
                            <a href="#modal-<?=$key?>" class="<?= $txtColor ?> block relative model">
                                <div class="member relative bg-white box-shadow-3 zoom">
                                    <div class="profile bg-center bg-cover" style="background: url('<?=$image_url?>'); background-size: cover; background-position: top center;"></div>
                                    <div class="content p2 flex items-center justify-center flex-column">
                                        <h4 class="mt0 mb0"><?=$member_name?></h4>
                                        <p class="postion brand-base mb0"><?=$member_role?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

                <?php foreach ($team_members->posts as $key => $team_member): ?>

                    <?php $member_name = get_field('staff_name', $team_member->ID) ?>
                    <?php $member_role = get_field('staff_role', $team_member->ID) ?>
                    <?php $image_url = isset(get_field("staff_profileImage", $team_member->ID)['url']) ? get_field("staff_profileImage", $team_member->ID)['url'] : 'http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg'; ?>

                    <div id="modal-<?=$key?>" class="clearfix model-content mfp-hide">
                        <div class="col col-12 md-col-6">

                            <div class="block md-display-none">
                                <h1 class="h2 mb2 bold brand-primary"><?=$member_name?></h1>
                                <h2 class="h3"><?=$member_role?></h2>
                            </div>

                            <img src="<?=$image_url?>" alt="<?=$member_name?>">

                            <div class="block md-display-none">
                                <?=get_field('staff_bio', $team_member->ID);?>
                            </div>
                            
                            
                            <?php if (!empty($member_quote = get_field('staff_quote', $team_member->ID))):?>
                            <blockquote class="md-ml0 md-my2 bg-smoke py2 px4 m0 italic border-left border-3 border-grey relative">
                                <div class="z5 relative"><?=$member_quote?></div>
                            </blockquote>
                            <?php endif; ?>

                            <?php 
                            $member_phone = get_field('staff_phoneNumber', $team_member->ID);
                            $member_email = get_field('staff_emailAddress', $team_member->ID);
                            if (!empty($member_phone) || !empty($member_email)): ?>
                                <div class="border-bottom border-smoke py4">
                                    <h3 class="h3 bold mb2 charcoal">Contact Details:</h3>

                                    <?php if (!empty($member_phone)): ?>
                                        <p class="mb0">Phone: <a href="tel:<?=$member_phone?>"><strong><?=$member_phone?></strong></a></p>
                                    <?php endif; ?>

                                    <?php if (!empty($member_email)): ?>
                                        <p class="mb0">Email: <a href="mailto:<?=$member_email?>"><strong><?=$member_email?></strong></a></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col col-12 md-col-6 px4">
                            <div class="display-none md-block">
                                <h1 class="h2 mb2 bold brand-primary"><?=$member_name?></h1>
                                <h2 class="h3"><?=$member_role?></h2>
                            </div>

                            <div class="display-none md-block">
                                <?=get_field('staff_bio', $team_member->ID);?>
                            </div>
                            
                        </div>
                    </div>

                 <?php endforeach; ?>

            </div>

        </div>

    </section>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php'); ?>

<?php get_footer(); ?>

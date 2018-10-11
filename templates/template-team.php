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

        <div class="container clearfix mb6">

            <div class="grid">

                <div class="grid-sizer"></div>

                <?php foreach ($team_members->posts as $key => $team_member) :?>

                    <?php $member_name = get_field('staff_name', $team_member->ID) ?>
                    <?php $member_role = get_field('staff_role', $team_member->ID) ?>
                    <?php $image_url = isset(get_field("staff_profileImage", $team_member->ID)['url']) ? get_field("staff_profileImage", $team_member->ID)['url'] : 'http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg'; ?>


                    <?php if ($key % 10 == 0 || $key % 14 == 0) : ?>

                        <div class="p4 grid-item grid-item--double">

                            <a href="<?= get_permalink($team_member->ID) ?>" class="<?= $txtColor ?>">

                                <div class="member || relative relative pb3 || bg-white box-shadow-3">

                                    <div class="profile || lg-mb4 || bg-center bg-cover"
                                         style="background: url('<?=$image_url?>'); background-size: cover; background-position: top center;"></div>

                                    <div class="content || p2 text-center">
                                        <h4><?=$member_name?></h4>
                                        <p class="postion brand-base"><?=$member_role?></p>
                                    </div>

                                    <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                        <p class="h4 text-center">Read more <br/>about <?=$member_name?></p>

                                    </div>

                                </div>

                            </a>

                        </div>

                    <?php else: ?>

                        <div class="p4 grid-item">

                            <a href="<?= get_permalink($team_member->ID) ?>" class="<?= $txtColor ?>">

                                <div class="member || relative pb3 || bg-white box-shadow-3">

                                    <div class="profile || lg-mb4 || bg-center bg-cover"
                                         style="background: url('<?=$image_url?>'); background-size: cover; background-position: top center;"></div>

                                    <div class="content || p2 text-center">
                                        <h4><?=$member_name?></h4>
                                        <p class="postion brand-base"><?=$member_role?></p>
                                    </div>

                                    <div class="overlay || absolute top-0 left-0 width-100 height-100 p2 bg-brand-primary-overlay white flex items-center justify-center">

                                        <p class="h4 text-center">Read more<br/> about <?=$member_name?></p>

                                    </div>

                                </div>

                            </a>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php'); ?>

<?php get_footer(); ?>

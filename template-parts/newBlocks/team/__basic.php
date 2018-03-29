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

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "team-basic")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : '' ?>

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

        <div class="flex flex-wrap justify-center mxn2">

            <?php foreach($block['posts']->posts as $post): ?>

                <div class="member-box || col col-grid-5 p3 || hover-zoom" data-mh="team-member">

                    <a href="<?=get_permalink($post->ID)?>">

                        <div class="member || pb2 || <?= $bgColor ?> box-shadow-3 || zoom">

                            <?php $image_url = isset(get_field("staff_profileImage", $post->ID)['url']) ? get_field("staff_profileImage", $post->ID)['url'] : get_template_directory_uri() . '/assets/img/profile-placeholder.jpg'; ?>
                            <div class="profile || mb2" style="background: url('<?=$image_url;?>'); background-position: center; background-size: cover;" data-mh="team-member-img"></div>

                            <div class="flex items-center justify-center" data-mh="team-member-content">

                                <div class="px3 py2">

                                    <?php render_heading( get_field('staff_name', $post->ID), "h4", "h4", "", "", ["class" => "mb0"]) ?>

                                    <p class="postion mb0"><?=get_field('staff_role', $post->ID);?></p>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="text-center mt4">

            <?=render_button($block['page_button'], "large", ["class" => "text-center mt4"])?>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

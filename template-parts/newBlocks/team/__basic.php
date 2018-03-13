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

$button = get_sub_field('block_team_page');

// BACKEND NOTES – REMOVE ONCE ADDED
// Get posts from Custom Post Type.
// $membersShow – Number of Items to show.

?>

<section id="<?=$block['custom_id']?>" class="team-basic || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col-12 || mb5 || text-center">

            <?php include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php') ?>

            <div class="wysiwyg || md-mx6 md-px6 || <?=$txtColor?> regular">
                <?=get_sub_field('block_team_content');?>
            </div>

        </div>

        <?php $i = 0; while ($i < 5): ?>

        <div class="member-box || col col-grid-5 p3 || hover-zoom">

            <a href="{{ProfileLink}}" class="<?=$txtColor?>">

                <div class="member || pb2 || <?= $bgColor ?> box-shadow-3 || zoom">

                    <div class="profile || mb2" style="background: url('http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg'); background-position: center; background-size: cover;"></div>

                    <h4 class="mt3 mb1 <?=$txtColor?>">Oscar</h4>
                    <p class="postion mb2">Dog</p>

                </div>

            </a>

        </div>

        <?php $i++; endwhile; ?>

        <?php if (!empty($button['button_link']['url'])): ?>
            <div class="mb5 clearfix || text-center">

                <a href="<?=$button['button_link']['url']?>" class="btn btn-outline btn-medium black <?=$button['system_background_colours']?>"><?=$button['button_link']['title'];?></a>

            </div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
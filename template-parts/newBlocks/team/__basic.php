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

<section id="<?=$block['custom_id']?>" class="team-basic || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="col-12 || mb5 || text-center">

            <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

            <div class="wysiwyg || md-mx6 md-px6 || <?=$txtColor?> regular">
                <?=get_sub_field('block_team_content');?>
            </div>

        </div>
        <div class="flex justify-center">

            <?php foreach($block['posts']->posts as $post): ?>

                <div class="member-box || col col-grid-5 p3 || hover-zoom">

                    <a href="<?=get_permalink($post->ID)?>" class="<?=$txtColor?>">

                        <div class="member || pb2 || <?= $bgColor ?> box-shadow-3 || zoom">

                            <?php //TODO: Update default image URL - currently using outside source. ?>

                            <?php $image_url = isset(get_field("staff_profileImage", $post->ID)['url']) ? get_field("staff_profileImage", $post->ID)['url'] : 'http://www.castlehearing.co.uk/wp-content/uploads/2016/03/profile-placeholder.jpg'; ?>
                            <div class="profile || mb2" style="background: url('<?=$image_url;?>'); background-position: center; background-size: cover;"></div>

                            <?=get_render_heading( get_field('staff_name', $post->ID), "h4", "h3", "{$txtColor}", "", "mt3 mb1")?>

                            <p class="postion mb2"><?=get_field('staff_role', $post->ID);?></p>

                        </div>

                    </a>

                </div>

            <?php endforeach; ?>

        </div>
        <?php if (!empty($button['button_link']['url'])): ?>

            <div class="mb5 clearfix || text-center">

                <a href="<?=$button['button_link']['url']?>" class="btn btn-outline btn-medium black <?=$button['system_background_colours']?>"><?=$button['button_link']['title'];?></a>

            </div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

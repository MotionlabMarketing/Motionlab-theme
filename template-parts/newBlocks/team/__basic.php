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

<section id="<?=$block['custom_id']?>" class="team-basic || clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>" data-block-layout="<?=$block['layout']?>">

    <?=($block['grid'] == 'container')? '<div class="container">' : '' ?>

        <div class="col-12 || mb5 || text-center">

            <?php render_heading( "{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}"); ?>

            <?php render_wysiwyg("{$block['intro']}", "", " || regular")?>

        </div>

        <div class="flex justify-center">

            <?php foreach($block['posts']->posts as $post): ?>

                <div class="member-box || col col-grid-5 p3 || hover-zoom">

                    <a href="<?=get_permalink($post->ID)?>">

                        <div class="member || pb2 || <?= $bgColor ?> box-shadow-3 || zoom">

                            <?php $image_url = isset(get_field("staff_profileImage", $post->ID)['url']) ? get_field("staff_profileImage", $post->ID)['url'] : get_template_directory_uri() . '/assets/img/profile-placeholder.jpg'; ?>
                            <div class="profile || mb2" style="background: url('<?=$image_url;?>'); background-position: center; background-size: cover;"></div>

                            <?=get_render_heading( get_field('staff_name', $post->ID), "h4", "h3", "", "", "mt3 mb1")?>

                            <p class="postion mb2"><?=get_field('staff_role', $post->ID);?></p>

                        </div>

                    </a>

                </div>

            <?php endforeach; ?>

        </div>

        <?php if (!empty($block['page_button']['button_link']['url'])): ?>

            <div class="page-button || mt4 mb4 clearfix || text-center">

                <a href="<?=$block['page_button']['button_link']['url']?>" class="btn btn-outline btn-large <?=$block['page_button']['system_text_colours']?> <?=$block['page_button']['system_background_colours']?>"><?=$block['page_button']['button_link']['title'];?></a>

            </div>

        <?php endif; ?>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

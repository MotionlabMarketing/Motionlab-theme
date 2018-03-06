<?php
/**
 * TEAM – BASIC LAYOUT BLOCK ------------------------
 * A basic layout for select videos from the custom
 * post type videos.
 *
 * @author Joe Curran
 * @created 8 Fab 2018
 *
 * @version 1.00
 */

$bgColor          = get_sub_field($current . '_background_system_background_colours');
$txtColor         = get_sub_field($current . '_text_system_text_colours');

$videosShow = get_sub_field('number_of_videos');

$blockTitle = get_sub_field($current . '_title_title');
$videosAll  = get_sub_field($current . '_selected');

// TODO: CONVERT TO FUNCTION //
$i = 1;
$videos = [];
foreach ($videosAll as $video):

    $videos[$i]['id']           = get_field('video_id',        $video->ID);
    $videos[$i]['source']       = get_field('video_source',    $video->ID);
    $videos[$i]['title']        = get_field('video_title',     $video->ID);
    $videos[$i]['link']         = get_field('video_link',      $video->ID);
    $videos[$i]['length']       = get_field('video_length',    $video->ID);
    $videos[$i]['author']       = get_field('video_author',    $video->ID);
    $videos[$i]['role']         = get_field('video_role',      $video->ID);
    $videos[$i]['thumbnail']    = get_field('video_thumbnail', $video->ID);

    // REMOVE OTHER IMAGES //
    $videos[$i]['thumbnail_id'] = $videos[$i]['thumbnail']['ID'];
    $videos[$i]['thumbnail']    = $videos[$i]['thumbnail']['sizes']['medium_large'];

    $i++;
endforeach; ?>

<section id="<?=$block['custom_id']?>" class="video-stories  || relative clearfix <?=$block['spacing']?> <?=$block['padding']?> <?=($block['grid'] == 'full_width')? $block['background']['colour'] : ""?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" data-block-id="<?=$block['id']?>" data-block-name="<?=$block['name']?>">

    <?=($block['grid'] == 'container' || $block['grid'] == 'full_width')? '<div class="container '.$block['background']['colour'].'">' : ""?>

    <div class="clearfix || relative">

        <div class="lg-flex items-center p5">

        <div class="col col-12 md-col-6 || md-pr3 md-pl3">

            <div class="mb2">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg mb3 <?=$txtColor?>">
                <?= get_sub_field('block_video_content'); ?>
            </div>

            <div class="">

                <?php $i = 1; foreach ($videos as $video): while ($i < $videosShow): ?>

                    <div class="video || inline-block">

                        <a href="<?=$videos[$i]['link']?>" class="inline-block mr2">
                            <?= wp_get_attachment_image($videos[$i]['thumbnail_id'], array(120, 140), "", ["class" => "box-shadow-1"]  )?>
                        </a>
                        <p class="h7 <?=$txtColor?> white" style="max-width: 120px; font-size: 0.8rem"><?=$videos[$i]['title']?></p>

                    </div>

                    <?php $i++; endwhile; endforeach; ?>
            </div>

        </div>

        <div class="col col-12 md-col-6 ||  md-pl5 md-pr0">

            <?php if (get_sub_field('block_videos_embed') == true): ?>

                <?php if ($videos[$videosShow]['source'] == "youtube"): ?>

                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?=$videos[$videosShow]['id']?>" frameborder="0" allow="encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <?php else: // Vimeo ?>

                    <iframe src="https://player.vimeo.com/video/<?=$videos[$videosShow]['id']?>?portrait=0&badge=0" width="100%" height="272" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <?php endif; ?>

            <?php else: ?>

                <a href="<?=$videos[$videosShow]['link']?>" class="block relative">
                    <img src="<?=$videos[$videosShow]['thumbnail']?>" alt="<?=$videos[$videosShow]['title']?>" class="box-shadow-1">
                    <div class="absolute px4 py2 bottom-0 right-0 bg-brand-primary white" style="margin-bottom: 0.4rem"><?=$videos[$videosShow]['length']?></div>
                </a>

            <?php endif; ?>

            <h3 class="h3 <?=$txtColor?> px2 mt3 md-mt3 mb0"><?=$videos[$videosShow]['author']?></h3>
            <p class="px2 h4 <?=$txtColor?> muted mb0"><?=$videos[$videosShow]['role']?></p>

        </div>

        </div>

        <?php if ($block['bgImage']['enable']  && $block['grid'] == 'container'): ?>

            <div class="absolute top-0 left-0 width-100 height-100 bg-center bg-cover zn1 <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?> <?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>')"></div>

        <?php endif; ?>

    </div>

    <?=($block['grid'] == 'container'  || $block['grid'] == 'full_width')? '</div>' : ""?>

    <?php if ($block['grid'] == 'full_width' && $block['bgImage']['enable']): ?>

        <div class="absolute top-0 left-0 width-100 height-100 bg-center bg-cover zn1 <?=$block['bgImage']['tint']?> <?=$block['bgImage']['tintStrength']?> <?=$block['bgImage']['occupancy']?>" style="background-image: url('<?=$block['bgImage']['image']['url']?>')"></div>

    <?php endif; ?>

</section>
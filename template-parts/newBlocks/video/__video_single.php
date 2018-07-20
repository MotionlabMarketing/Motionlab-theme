<?php
/**
 * VIDEO – BASIC LAYOUT BLOCK ------------------------
 * A basic listing layout for some of the videos.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$bgColor          = get_sub_field($current . '_background_system_background_colours');
$txtColor         = get_sub_field($current . '_text_system_text_colours');

$videosShow = get_sub_field('number_of_videos');
$blockTitle = get_sub_field('block_videos_title_title');

$videosAll  = get_sub_field($current . '_selected');

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
endforeach;
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "video-basic my4 mb4 pt3 {$bgColor} {$txtColor}")?> <?=get_blockData($block)?>>

    <div class="container">

        <div class="col-12 text-center">

            <div class="mb4">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="col col-12">

            <div class="m2 p0 md-px3 lg-px7">

                <div class="video p0w md-px3 lg-px7 block relative">

                     <?php $i = 1; foreach ($videos as $video): ?>

                        <?php if ($videos[$i]['source'] == "youtube"): ?>

                            <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?=$videos[$i]['id']?>" class="mb4" frameborder="0" allow="encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                        <?php else: // Vimeo ?>

                            <iframe src="https://player.vimeo.com/video/<?=$videos[$i]['id']?>?portrait=0&badge=0" width="100%" height="280" class="mb4" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

    <div class="container clearfix">

        <div class="col-12 p3 text-center">

            <div class="wysiwyg limit-p limit-p-70">
                <?= get_sub_field('block_video_content'); ?>
            </div>

        </div>

    </div>

</section>
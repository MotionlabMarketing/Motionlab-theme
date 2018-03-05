<?php
/**
 * NEWS BLOCKS --------------------------------------
 * This block allows you to output the latest or selected
 * news/blog articles to the page.
 *
 * @author Joe Curran
 * @created 2 Mar 2018
 *
 * @version 1.00
 */

$block['content']['type']      = get_sub_field($current . '_selection');
$block['content']['feeds']     = get_sub_field($current . '_enabledSocial');
$block['content']['link']      = get_sub_field($current . '_enabledmore');
$block['content']['articles']  = get_sub_field($current . '_articles');
$block['content']['link']      = get_sub_field($current . '_news_link');
$block['content']['txtColor']  = get_sub_field($current . '_txtColor_system_text_colours');

// GET THE COLUMN SIZES NEEDED IF SOCIAL IS INCLUDED.
if ($block['content']['feeds'] == true):

    $block['content']['cols'] = [0 => '8', 1 => '4'];
    $block['temp'] = get_field('social_links', 'option');

    // NEED TO BE SWITCHED ROUND REALLY.
    foreach ($block['temp'] as $a):

        // GET FACEBOOK USERNAME
        if (strpos($a['link'] , "facebook") == true):
            $b = explode("/", $a['link']);
            $block['content']['profiles']['facebook'] = $b[3];
        endif;

        // GET TWITTER USERNAME
        if (strpos($a['link'] , "twitter") == true):
            $b = explode("/", $a['link']);
            $block['content']['profiles']['twitter'] = $b[3];
        endif;
    endforeach;

    unset($block['temp']);

else:

    $block['content']['cols'] = [0 => '12'];

endif;

switch ($block['layout']):
    case "list":
        include('news/__list.php');
        break;
    case "row":
        include('news/__row.php');
        break;
    default:
        include('news/__column.php');
        break;
endswitch;
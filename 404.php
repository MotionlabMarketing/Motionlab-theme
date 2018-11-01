<?php 
// TODO: Convert to a 404 handling class.

$block['content']['icon']    = get_field('global_404_icon', 'option');
$block['content']['title']   = get_field('global_404_title', 'option');
$block['content']['content'] = get_field('global_404_content', 'option');
$block['content']['link']    = get_field('global_404_link', 'option');

if (empty($block['content']['title']))
    $block['content']['title'] = "Whoops, we couldn't find that!";

if (empty($block['content']['content']))
    $block['content']['content'] = "We're sorry to report that we couldn't find what your looking for.";

if (empty($block['content']['link'])):
    $block['content']['link']['title'] = "Return to Homepage";
    $block['content']['link']['url']   = "/";
endif;

get_header(); ?>

<section class="404 flex items-center justify-center" data-element="error404">

    <div class="container px4 py7 text-center mb5">

        <p class="error-code mb0 absolute grey z1" style="opacity: 0.03;">404</p>

        <h1 class="relative brand-primary mb0 z2"><?=$block['content']['title']?></h1>

        <div class="relative lead h4 mb4 limit-p limit-p-70 z2"><?=$block['content']['content']?></div>

        <a href="<?=$block['content']['link']['url']?>" class="relative btn btn-large btn-brand-primary hover-bg-brand-primary brand-primary hover-white mb4 z2" role="button"><?=$block['content']['link']['title']?></a>

        <p class="relative opacity-4 grey z2">Your request has been logged in our system for review!</p>

    </div>

</section>

<?php get_footer();

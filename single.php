<?php
get_header();

$taxonomies = get_the_terms(get_the_ID(), 'category');

?>

<section class="post-standard">
    
    <div class="container">
        <div class="post clearfix py5">
            
            <?php while (have_posts()) : the_post();
            
            // TODO:  THIS NEEDS TO BE UPDATED WITH SOME NEW SETTING
            $block = get_field_objects();
            $narrow = $block['building_blocks']['value'][0]['narrow_columns'];
            
            if ($narrow == true):
                $narrow = "measure-wide";
            endif;
            ?>

            <h1 class="mt4 mb3 m0 h2 text-center brand-primary">
                <?php the_title(); ?>
            </h1>
            
            <div class="mx-auto container measure-wide">
                
                <div class="measure-wide">

                    <a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="left mt1 h5"><i class="fa fa-arrow-left mr2"></i>Back to news</a>

                    <ul class="mt2 tags tags-right border-radius">
                        <?php if (is_array($taxonomies)): foreach($taxonomies as $category) :?>
                            <li><a href="/news/<?=$category->slug?>"><?=$category->name?></a></li>
                        <?php endforeach; endif; ?>
                    </ul>
                    
                </div>
                
            </div>
            
            <div class="clearfix <?=$narrow?> image-holder img-center img-cover img-banner" style="background-image: url(<?php if (!empty(get_the_post_thumbnail_url())) : the_post_thumbnail_url('large'); else: echo get_field('fallback_image_news_feature', 'option'); endif; ?>)"></div>
                
                <?php include(get_template_directory() . '/template-parts/building-blocks.php'); ?>
                
                <div class="mt4 container wysiwyg measure-wide">
                    <?=the_content();?>
                </div>
                
            <?php endwhile; ?>
            
        </div>
        
        
        <?php
        $related = get_posts( array(
            'category__in' => wp_get_post_categories($post->ID),
            'numberposts' => 4,
            'post__not_in' => array($post->ID),
            'orderby'       => 'date',
            'order'         => 'desc'
        ));
        if ($related): ?>
        <hr>
        <div class="clearfix py5">
            
            <h2 class="text-center brand-primary h3">Related Articles</h2>
            
            <div class="mxn3 clearfix">
                
                <?php foreach ($related as $post): ?>
                    
                    <div class="relative col col-12 sm-col-6 md-col-3 lg-col-3 pt4 pl4 pr4 mb5" data-mh="post">
                        
                        <p class="h6 mb2"><?=get_the_date()?></p>
                        
                        <a href="<?= get_permalink($post->ID) ?>"><h3 class="h4 brand-primary" data-mh="post-title"><?=get_the_title()?></h3></a>

                        <a href="<?=get_permalink($post->ID)?>"><div class="image-holder square img-cover img-center mb4" style="background-image: url('<?=the_post_thumbnail_url("thumbnail")?>');"></div></a>
                        
                        <p class="h5 mb3" data-mh="post-content"><?= strlen($post->post_excerpt) > 1 ? strip_tags($post->post_excerpt) : shorten_string(strip_tags($post->post_content),30);?></p>
                        
                        <a href="<?=get_permalink($post->ID)?>" class="block mb4 h5 bold">Read full story</a>
                        
                        <?php $taxonomies = get_the_terms($post->ID, 'category');?>
                        <ul class="tags border-radius">
                            <?php foreach($taxonomies as $category) :?>
                                <li><a href="/news/<?=$category->slug?>"><?=$category->name?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        
                    </div>
                    
                <?php endforeach; ?>
                
            </div>
            
            <div class="text-center my4">
                
                <a href="<?=get_permalink(get_option('page_for_posts'))?>" class="btn btn-primary border-brand-primary btn-medium h5 bold">View all Articles</a>
                
            </div>
            
        </div>
    <?php endif; wp_reset_postdata(); ?>
    
</div>

</section>

<?php
get_footer();

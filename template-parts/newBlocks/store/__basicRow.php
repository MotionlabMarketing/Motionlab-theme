<?php
    $selected_products = get_sub_field('block_store_products');
    $prefix = (isset($selected_products[0]['items'][0]) && $selected_products[0]['items'][0] == 'motorhomes') ? 'motorhome' : 'caravan';
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "team-basic")?> <?=get_blockData($block)?>>
    <div class="clearfix col-12">

        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    	<?php foreach($selected_products[0]['items'] as $post) : ?>
            <div class="clearfix col-12 relative border-top border-left border-bottom border-right border-light-1 box-shadow-1 border-solid px2 py4 md-p5 mb4 bg-white">

    	        <div class="absolute top-0 left-0 bg-brand-secondary white py2 px3"><a href="<?=the_permalink($post->ID)?>" class="white hover-white"><i class="fa fa-camera"></i>&nbsp;<?=count(get_field('image', get_field($prefix.'_details_showcase', $post->ID)->ID));?></a></div>

    	        <div class="lg-flex items-center">

    	            <div class="col col-12 md-col-12 lg-col-3 mb4 lg-mb0">

    	                <a href="<?=the_permalink($post->ID)?>">

    						<?php
    	                    $feature = get_field($prefix.'_details_feature_image', $post->ID);

    	                    $feature_image = get_field('image', $feature->ID);

    	                    if(!empty($feature_image)) :
    	                        foreach($feature_image as $image):
    	                            render_attachment_image($image, "medium", false, ["class" => "", "data-mh" => "product-images"]);
    	                        endforeach;
    	                    endif;
    	                    ?>

    	                </a>

    	            </div>

    	            <div class="col col-12 md-col-6 lg-col-7 px4 mb4 md-mb0">

    	              <h3 class="brand-secondary bold mb2"><a href="<?=the_permalink($post->ID)?>" class="brand-secondary"><?=get_the_title($post->ID);?></a></h3>
    	              <p class="uppercase bold opacity-6"></p>

    	              <div class="md-flex items-center border-solid border-light-1 border-bottom">

    	                <div class="col col-8">

                            <?php
                                $specs = get_field($prefix.'_details_specifications', $post->ID);
                                if (!empty($specs)): ?>
                                  <ul class="tick-list">
                                      <?php foreach(array_slice($specs, 0, 10) as $spec): ?>
                                          <li><?=get_term($spec)->name?></li>
                                      <?php endforeach; ?>
                                  </ul>
                            <?php endif; ?>

    	                </div>

    	                <div class="col col-4">
                            <a href="<?=the_permalink($post->ID)?>">
                                <?php
        	                    $floorplan = get_field($prefix.'_details_floor_plan', $post->ID);

        	                    $floorplan_image = get_field('image', $floorplan->ID);

        	                    if(!empty($floorplan_image)) :
        	                        foreach($floorplan_image as $image):
                                        render_attachment_image($image, "small", false, ["class" => "mx-auto my3"]);
                                    endforeach;
                                endif;
                                ?>
    	                    </a>
    	                </div>

    	              </div>

    	              <div class="flex items-center justify-center">

    	                  <?php render_attachment_image("8632", "small", false, ["class" => "my2 mr2"]); // TODO: THESE ICONS WILL NEED TO BE SINGLES AND INCLUDED USING A LOOP. THESE COME FROM motorhome FINDER APPRENTLY - CINDERS. ?>

    	                  <p class="bold brand-primary mb0">Special Offer – Free PowerTouch Motor Mover</p> <?php // TODO: This needs to load a dynamic line ?>

    	              </div>

    	            </div>

    	            <div class="col col-12 md-col-6 lg-col-3 text-center px5">

    	                <p class="h3 brand-primary bold mb1">£<?=number_format(get_field($prefix.'_details_price', $post->ID))?></p>
                        <?php if(!empty(get_field($prefix.'_details_old_price'))) : ?>
                            <p class="h5 brand-secondary mb2 small">
                                Old price: <strike>£<?=number_format(get_field($prefix.'_details_old_price', $post->ID))?></strike>
                                <span class="bold">Save £<?=number_format(get_field($prefix.'_details_old_price', $post->ID)-get_field($prefix.'_details_price', $post->ID))?></span>
                            </p>
                        <?php endif; ?>

    	                <p class="h4 bold grey mb6"><?=get_term(get_field($prefix.'_details_branch', $post->ID))->name?> Branch</p>

    	                <a href="<?=get_permalink($post->ID)?>" class="btn bg-brand-secondary white btn-medium border-radius-2" style="min-width: 80%">View <?=rtrim(ucfirst(get_post_type()), "s")?></a>

    	            </div>

    	        </div>

    	    </div>

    	<?php endforeach; ?>

    </div>
</section>

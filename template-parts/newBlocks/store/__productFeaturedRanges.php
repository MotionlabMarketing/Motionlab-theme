<?php
/**
* STORE BLOCK – FEATURED PRODUCTS ---------------------------------------
* This block outputs a list of selected products.
*
* @author Joe Curran
* @created 26 Mar 2018
*
* @version 1.00
*/

// TODO: NEEDS TO WORK KARL! GET IT DONE! DO IT :D

?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>
    
    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>
        
        <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>
        
        <div class="col-12 mxn2">
            
            <div data-tabs="wrapper">
                
                <?php if ($block['enable_tabs']): ?>
                    
                    <div data-element="tabs" class="col col-12 sm-flex items-center justify-center mb4">
                        
                        <?php $i = 1; foreach ($block['tabs'] as $tab): ?>
                            
                            <span data-section="tab<?=$i?>" class="block text-center bold bg-smoke border-top border-left border-bottom <?=(count($block['tabs']) == $i)? ' border-right':''?> border-light cursor-pointer py2 px5 relative <?=($i <= 1)? 'tab-active' : '' ?>">
                                <?=$tab['category_title']?>
                            </span>
                            
                            <?php $i++; endforeach; ?>
                            
                        </div>
                        
                        <div data-tabs="content">
                            
                            <?php $i = 1; foreach ($block['tabs'] as $tab): ?>
                                
                                <section id="tab<?=$i?>" class="<?=($i > 1)? 'hide' : '' ?>">
                                    
                                    <?php $a = 0; while($a < 3): ?>
                                        
                                        <div class="product-item col col-12 sm-col-6 md-col-4 p3 text-center mb4" data-mh="product-item">
                                            
                                            <?=render_attachment_image("8571", ['120', '120'], false,  ["class" => "mx-auto mb3"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                            
                                            <h3 class="grey">Challenger</h3>
                                            
                                            <div class="flex items-center justify-center" data-mh="product-item-image">
                                                <?=render_attachment_image("8199", "large", false,  ["class" => "mb4"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                            </div>
                                            
                                            <p class="px2" data-mh="product-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            
                                            <p><strong>10 models from <span class="brand-primary" data-element="price">£18,685</span></strong></p>
                                            
                                            <a href="#{{ URL }}" class="btn bg-brand-secondary white hover-white" role="button">View Range</a>
                                            
                                        </div>
                                        
                                        <?php $a++; endwhile; ?>
                                        
                                    </section>
                                    
                                    <?php $i++; endforeach; ?>
                                    
                                </div>
                                
                            <?php else: ?>
                                
                                <?php $a = 0; while($a < 3): ?>
                                    
                                    <div class="product-item col col-12 sm-col-6 md-col-4 p3 text-center mb4" data-mh="product-item">
                                        
                                        <?=render_attachment_image("8014", ['80', '80'], false,  ["class" => "mb2"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                        
                                        <h3>Challenger</h3>
                                        
                                        <div class="flex items-center justify-center" data-mh="product-item-image">
                                            <?=render_attachment_image("8015", "large", false,  ["class" => "mb4"])?> <?php // NEED ID REPLACING WITH ID FOR IMAGE.  ?>
                                        </div>
                                        
                                        <p class="px2" data-mh="product-item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        
                                        <p><strong>10 models from <span class="brand-primary" data-element="price">£18, 685</span></strong></p>
                                        
                                        <a href="<?php // URL HERE // ?>" class="btn brand-primary">View Range</a>
                                        
                                    </div>
                                    
                                    <?php $a++; endwhile; ?>
                                    
                                <?php endif; ?>
                                
                                
                            </div>
                            
                        </div>
                        
                        <?php if (!empty($block['pageLink'])): ?>
                            <div class="text-center mt4" data-element="pageButton">
                                <?php render_button($block['pageLink'], "large", ["class" => "bold"]) ?>
                            </div>
                        <?php endif; ?>
                        
                        <?=($block['grid'] == 'container')? '</div>' : ""?>
                        
                    </section>
                    
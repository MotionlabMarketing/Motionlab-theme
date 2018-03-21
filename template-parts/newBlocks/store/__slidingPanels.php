<?php
/**
 * PRODUCT BLOCK: SLIDING PANELS ---------------------------------------
 * This block outputs a number of products onto the page which can be
 * clicked thought.
 *
 * @author Joe Curran
 * @created 12 Mar 2018
 *
 * @version 2.00
 */

?>

<?php if(isset($_POST['action'])) :?>

    <?php
        foreach($block['posts']->posts as $post) :
    ?>

        <div class="panels || col col-grid-5 p3">

            <div class="panel || bg-grey mb3">
                <?php //TODO: Add in product image when field is available. ?>
                NEED IMAGE ACF FIELD
            </div>

            <div class="data text-center">
                <p class="name || h3-responsive brand-primary mb1"><?=$post->post_title?></p>
                <?php //TODO: Add in product price when field is available. ?>
                <p class="price || h4 brand-base">NEED PRICE ACF FIELD</p>
            </div>

        </div>

    <?php
        endforeach;
        exit();
    ?>

<?php endif; ?>

<section id="<?=$block['custom_id']?>" class="product-slidingPanels clearfix relative <?=$block['spacing']?> <?=$block['padding']?> <?=$block['background']['colour']?> <?=$block['border']['sides']?> <?=$block['border']['size']?> <?=$block['border']['colour']?> <?=$block['custom_css']?>" <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

        <div class="filters || col-12 py3">

            <form action="#" class="width-100 || flex justify-center">

                <?php $disabled = sizeof($block['category_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" id="sortby_category" <?=$disabled?>>
                    <option value="">Filter by Category</option>
                    <?php foreach($block['category_select_options'] as $option) : ?>
                        <option class="option" value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php foreach($option->children as $option_children): ?>
                                <option class="optgroup" value="<?=$option_children->slug?>" data-taxonomy="<?=$option_children->taxonomy?>"><?=$option_children->name?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>

                <?php $disabled = sizeof($block['colour_select_options']) == 0 ? "disabled" : ""; ?>
                <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3" id="sortby_colour" <?=$disabled?>>
                    <option value="">Filter by Colour</option>
                    <?php foreach($block['colour_select_options'] as $option) : ?>
                        <option class="option" value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php foreach($option->children as $option_children): ?>
                                <option class="optgroup" value="<?=$option_children->slug?>" data-taxonomy="<?=$option_children->taxonomy?>"><?=$option_children->name?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>

            </form>

        </div>

        <div class="col-12 mt4 px6">


            <div id="productSlider" data-slick="storeSlidingPanels-slider">

                <?php foreach($block['posts']->posts as $post) :?>
                    <div class="panels || col col-grid-5 p3">

                        <div class="panel || bg-grey mb3">
                            <?php //TODO: Add in product image when field is available. ?>
                            NEED IMAGE ACF FIELD
                        </div>

                        <div class="data text-center">
                            <p class="name || h3-responsive brand-primary mb1"><?=$post->post_title?></p>
                            <?php //TODO: Add in product price when field is available. ?>
                            <p class="price || h4 brand-base">NEED PRICE ACF FIELD</p>
                        </div>

                    </div>
                <?php endforeach; ?>

            </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
<script>
    $('#sortby_category').on('change', function(){
        //TODO: Update the two lines below to pull the page id and block name from the block itself.
//        var pageID          = $('section.jobs-latest').data('page-id');
//        var blockName       = $('section.jobs-latest').data('block-name');
        var category_filter   = $('#sortby_category option:selected').val();
        var colour_filter     = $('#sortby_colour option:selected').val();

        $.ajax({
            url: '<?php echo admin_url( "admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'update_block',
                page_id: '7606',
                block_name: 'block_store',
                colour_filter: colour_filter,
                category_filter: category_filter
            },
            success: function(response){
                $('#productSlider').html(response);
            }
        });
    });

    $('#sortby_colour').on('change', function(){
        //TODO: Update the two lines below to pull the page id and block name from the block itself.
//        var pageID          = $('section.jobs-latest').data('page-id');
//        var blockName       = $('section.jobs-latest').data('block-name');
        var category_filter   = $('#sortby_category option:selected').val();
        var colour_filter     = $('#sortby_colour option:selected').val();

        $.ajax({
            url: '<?php echo admin_url( "admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'update_block',
                page_id: '7606',
                block_name: 'block_store',
                colour_filter: colour_filter,
                category_filter: category_filter
            },
            success: function(response){
                $('#productSlider').html(response);
            }
        });
    });
</script>

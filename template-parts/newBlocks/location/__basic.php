<?php
/**
 * LOCATION BLOCKS BASIC -------------------------------
 * This is a simple layout block that allows the user to
 * select a Google Map aside of the address locations.
 *
 * @author Joe Curran
 * @created 7 Jun 2018
 *
 * @version 1.00
 *
 * TODO: Needs to have micro data added to these addresses.
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?> class="bg-red">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>


        <div class="clearfix col col-12 <?=$block['content']['color']?>">

                <div class="col col-12 md-col-6 p4 <?=$block['content']['position']?> bg-smoke" data-element="map" data-mh="panel">

                    <?php if (!empty($block['content']['location']['location_map'])): ?>
                        <div class="acf-map" data-map-address="<?=$block['content']['location']['location_map']['address']?>" style="height: 100%;">

                            <div class="marker" data-lat="<?php echo $block['content']['location']['location_map']['lat']; ?>" data-lng="<?php echo $block['content']['location']['location_map']['lng']; ?>"></div>

                        </div>
                    <?php endif; ?>

                </div>

                <div class="col col-12 md-col-6 p4 bg-smoke <?=($i % 2 !== 0)? 'right' : ''?>" data-mh="panel">

                    <h2 class="brand-primary"><?=$block['content']['location']['location_name']?></h2>

                    <div class="clearfix mb2">
                        <div class="col col-12 md-col-6">

                            <h3 class="grey mb1 h4">Location Address</h3>
                            <p class="mb0"><?=$block['content']['location']['location_address_line_1']?></p>
                            <p class="mb0"><?=$block['content']['location']['location_address_line_2']?></p>
                            <p class="mb0"><?=$block['content']['location']['location_address_postcode']?></p>

                        </div>

                        <div class="col col-12 md-col-6">

                            <h3 class="grey mb1 h4">Contact Details</h3>
                            <?php if (!empty($block['content']['location']['location_phone_number'])): ?>
                                <p class="mb0 brand-primary" style="font-size: 1.2rem"><i class="fa fa-phone" style="margin-right: 0.7rem"></i> <a href="tel:<?=str_replace(" ", "", $block['content']['location']['location_phone_number'])?>" class="bold"><?=$block['content']['location']['location_phone_number']?></a></p>
                            <?php endif; ?>

                            <?php if (!empty($block['content']['location']['location_phone_number'])): ?>
                                <p class="mb0 brand-primary" style="font-size: 1.2rem"><i class="fa fa-fax mr2"></i> <strong><?=$block['content']['location']['location_phone_number']?></strong></p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="col col-12 py2 pr1">

                        <h4 class="clearfix grey mb2 normal" data-mh="tabletitle"><?=$block['content']['location']['opening_times_primary']['section_openingTimes_title'];?></h4>

                        <table class="table-striped table-bordered table-bold-first bg-white mb3">
                            <?php foreach ($block['content']['location']['opening_times_primary']['section_openingTimes_times'] as $key =>  $items): ?>

                                <tr>

                                    <td class="h6"><?=ucfirst($key)?></td>
                                    <td class="h6"><?=$items?></td>

                                </tr>

                            <?php endforeach; ?>
                        </table>

                    </div>

                    <?php if (!empty($block['content']['location']['location_note'])): ?>
                    <div class="clearfix mb2">

                        <h4 class="clearfix mt4 mb2 gray mb0"><?=$block['content']['location']['location_note']['title']?></h4>

                        <?=$block['content']['location']['location_note']['content']?>

                    </div=>
                    <?php endif; ?>
                                        
                    <?php if (!empty($block['content']['location']['locations_logos'])): ?>
                        <div class="clearfix">

                            <h4 class="grey mb2 normal"><?=$block['content']['location']['locations_logos_titles']?></h4>
                        
                            <?php foreach ($block['content']['location']['locations_logos'] as $icon): $icon['link'] = get_field('attachment_image_link', $icon['id']); ?>

                                <?php if (!empty($icon['link'])): ?><a href="<?=$icon['link']?>"><?php endif; ?>
                            
                                    <img src="<?=$icon['sizes']['thumbnail']?>" alt="<?=$icon['title']?>" class="size-90x90 mr3">

                                <?php if (!empty($icon['link'])): ?></a><?php endif; ?>

                            <?php endforeach; ?>
                        
                        </div>
                    <?php endif; ?>

                </div>

        </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

<?php
/**
 * HEADER BLOCKS ---------------------------------------
 * This is a simple block that allow you to add a
 * new header to the page.
 *
 * @author Joe Curran
 * @created 9 Feb 2018
 *
 * @version 2.00
 */
?>

<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?> class="bg-red">

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>

    <div class="clearfix <?=$block['content']['bg']?>">

        <div class="relative col col-12 lg-col-6 <?=$block['content']['position']?> <?=$block['content']['padding']?> md-min-height-v50 overflow-hidden <?=($block['content']['type'] == "video")? "flex items-center" : "" ?>">

            <?php if ($block['content']['type'] == "image"): ?>

                <?=($block['content']['padding'] !== 'p0')? '<div class="relative height-100 overflow-hidden '.$block['content']['padding'].'">' : '' ?>

                    <div class="image-holder bg-cover bg-center min-height-v50 height-100" data-mh="panelHeight" style="background-image: url('<?=get_attachment_image_url($block['content']['image'], 'small')?>')"></div>

                <?=($block['content']['padding'] !== 'p0')? '</div>' : '' ?>

            <?php endif; ?>

            <?php if ($block['content']['type'] == "gallery"): ?>

                <div class="overflow-hidden <?=$block['content']['padding']?>">

                    <div class="slider relative height-100" data-slick="slider-auto-arrows">

                        <?php foreach ($block['content']['gallery'] as $slide): ?>

                            <div class="image-holder bg-cover bg-center min-height-v50 height-100" data-mh="panelHeight" style="background-image: url('<?=$slide['url']?>')"></div>

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endif; ?>

            <?php if ($block['content']['type'] == "video"): ?>

            <div class="width-100">

                <div class="overflow-hidden">

                    <div class="relative no-resize">

                        <?php $block['content']['video'] = explode("=", $block['content']['video']); ?>
                        <iframe width="100%" height="280" data-imatch="video" src="https://www.youtube.com/embed/<?=$block['content']['video'][1]?>" frameborder="0" allow="encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    </div>

                </div>

            </div>

            <?php endif; ?>

            <?php if ($block['content']['type'] == "map"): ?>

              <div class="height-100 width-100">

                  <div class="overflow-hidden height-100">

                      <div class="relative height-100" data-element="map">

                        <?php $location = get_sub_field($current . '_map'); if (!empty($location)): ?>
                          <div class="acf-map">
                          	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                          </div>
                        <?php endif; ?>

                      </div>

                  </div>

              </div>


            <?php endif; ?>

        </div>

        <div class="col col-12 lg-col-6 p4 md-p6 <?=$block['content']['align']?> <?=$block['content']['color']?> flex items-center <?php if ($block['content']['type'] == "video"): ?>flex items-center<?php endif; ?>" data-mh="panelHeight">

            <?php if ($block['content']['type'] == "video"): ?>
                <div class="height-100 width-100" data-imatchto="video">
            <?php else: ?>
                <div class="width-100">
            <?php endif; ?>

                <?php render_heading("{$block['heading']->title}", "{$block['heading']->type}", "{$block['heading']->size}", "{$block['heading']->color}", "{$block['heading']->case}", ["class" => "mb2"]); ?>

                <?php render_wysiwyg($block['intro']); ?>

                <?php
                    if (!empty($block['content']['cta']['append']) && !empty($block['content']['cta']['link'])) {
                        $alignment = "{$block['content']['align']} lg-flex items-center";
                    } else {
                        $alignment = "{$block['content']['align']}";
                    }
                ?>

                <?php if ($block['content']['buttons'] || $block['content']['cta']['append'] || $block['content']['cta']['link']):?>


                <div class="mt4 <?=$alignment?> border-top border-smoke">

                    <?php foreach ($block['content']['buttons'] as $button): if (!empty($button['button_link']['url'])): ?>

                        <a href="<?=$button['button_link']['url']?>" class="btn btn-<?=$button['system_background_colours']?> btn-medium <?=$button['system_text_colours']?> <?=$button['system_background_colours']?>" <?=($button['button_link']['title'] ? 'title="'.$button['button_link']['title'].'"' : '')?> <?=($button['button_link']['target'] ? 'target="'.$button['button_link']['target'].'"' : '')?> role="button"><div class="flex items-center justify-center"><?= wp_get_attachment_image($button['button_icon'], array(32, 32), '', ["class" => "size-32x32 mr2"]); ?><?php if($button['button_icon_font']->class):?><i class="fa mr2 <?= $button['button_icon_font']->class ?>"></i><?php endif; ?><?= $button['button_link']['title']?></div></a>

                    <?php endif; endforeach;  ?>

                    <?php if (!empty($block['content']['cta']['append'])): ?>

                        <p class="lg-inline bold mb2 mt3 lg-mt0 lg-mb0 lg-mb0 lg-ml4 lg-mr2"><?=$block['content']['cta']['append']?></p>

                    <?php endif; ?>

                    <?php if (!empty($block['content']['cta']['link'])):?>

                        <a href="<?=$block['content']['cta']['link']['url']?>" class="h3 bold brand-primary mx2"><?=$block['content']['cta']['link']['title']?></a>

                    <?php endif; ?>

                </div>

                <?php endif;?>

            </div>

        </div>

    </div>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>

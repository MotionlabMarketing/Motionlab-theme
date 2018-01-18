
<div class="mega-dropdown bg-white shadow">
    <div class="bg-white">
        <div class="flex bg-darken-1">
            <div class="col-3 xl-col-2 py5 pl5">
                <ul class="list-reset m0 p0">

                    <?php $i=1; ?>
                    <?php foreach($menuitem->children as $child) : ?>
                        <li class="relative overflow-hidden hover-bg-white border border-right-none border-transparent <?php if($i==1) : ?>section-active<?php endif; ?>" style="margin-right:-1px;">
                            <a href="<?php echo $child->url ?>" class="block black p3 bold text-decoration-none" data-toggle-section="<?php echo $child->ID; ?>">
                                <?php echo $child->title; ?>
                            </a>
                        </li>
                        <?php $i++; ?>
                    <?php endforeach ?>

                </ul>
            </div>

            <div class="col-9 xl-col-10">
                <?php $i=1; ?>
                <?php foreach($menuitem->children as $child) : ?>
                    <?php $termChild = $child->menu_id; ?>
                    <?php $termFeatureImage = get_field('taxonomy_feature_menu_image','equipment_type_' . $termChild)['sizes']['large']; ?>

                    <div class="flex height-100" data-section="<?php echo $child->ID; ?>" style="<?php if($i!=1) : ?>display:none;<?php endif; ?>">
                        <div class="py5 pr5 col-7">
                            <div class="bg-white border border-smoke width-100 p5">
                                <div class="overflow-hidden" >
                                    <div class="" style="margin:-1rem;">
                                        <ul class="list-reset mb0 flex flex-wrap overflow-hidden">
                                            <?php if(!empty($child->children)) : ?>
                                                <?php foreach($child->children as $grandchild) : ?>

                                                    <?php $termGrand = $grandchild->menu_id; ?>
                                                    <?php $termImage = get_field('taxonomy_image','equipment_type_' . $termGrand)['sizes']['large']; ?>

                                                    <li class="col-4 text-center p4 border border-smoke" style="margin-top:-1px; margin-left:-1px;">
                                                        <a href="<?php echo $grandchild->url ?>" class="block hover-zoom">
                                                            <figure class="overflow-hidden m0 mb2">
                                                                <img src="<?php echo $termImage ?>" alt="" class="block zoom">
                                                            </figure>
                                                            <h4 class="mb0 black"><?php echo $grandchild->title; ?></h4>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="" class="col-5 bg-cover bg-bottom-left" style="background-image:url(<?php echo $termFeatureImage ?>)"></a>

                    </div>
                    <?php $i++; ?>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</div>

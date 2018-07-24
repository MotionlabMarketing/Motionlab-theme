<?php if($cta['link']): ?>
    <a href="<?= $cta["link"]["url"] ?>" class="flex items-center hover-body">
        <div class="<?=$cta['icon__image'] === 'icon' ? 'bg-darken-2' : '';?> mr2" style="width:3em; border-radius:50%;">
            <div class="square relative" style="font-size:1.6em;">
                <?php if($cta['icon__image'] === 'image') : ?>
                    <img src="<?=$cta['image']?>" class="absolute top-50 left-50 translate icon-16x16"/>
                <?php else: ?>
                    <i class="fa <?= $cta['icon'];?> white absolute top-50 left-50 translate"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="">
            <p class="mb0 lh1 brand-primary" style="font-size:1em;"><?= $cta['title'];?></p>
            <span class="mb0 grey" style="font-size:0.75em;"><?= $cta['subtitle'];?></span>
        </div>
    </a>
<?php else: ?>
    <div class="flex items-center">
        <div class="border border-brand-primary mr2" style="width:3em; border-radius:50%;">
            <div class="square relative" style="font-size:1.6em;">
                <?php if($cta['icon__image'] === 'image') : ?>
                    <img src="<?=$cta['image']?>" class="absolute top-50 left-50 translate icon-16x16"/>
                <?php else: ?>
                    <i class="fa <?= $cta['icon'];?> white absolute top-50 left-50 translate"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="">
            <p class="mb0 lh1 brand-primary" style="font-size:1em;"><?= $cta['title'];?></p>
            <span class="mb0 uppercase" style="font-size:0.75em;"><?= $cta['subtitle'];?></span>
        </div>
    </div>
<?php endif; ?>

<?php if($cta['link']): ?>
    <a href="<?= $cta["link"]["url"] ?>" class="flex items-center hover-body">
        <div class="border-1 border-top border-bottom border-left border-right border-brand-primary mr2 col col-4" style="height: 56px; width: 56px; border-radius:50%;">
            <div class="<?=$cta['icon__image'] === 'image'? '' : 'square';?> relative" style="font-size:1.6em; height: 56px; width: 56px;">
                <?php if($cta['icon__image'] === 'image') : ?>
                    <img src="<?=$cta['image']?>" class="absolute top-50 left-50 translate icon-brand-primary" style="max-height: 26px;" />
                <?php else: ?>
                    <i class="fa <?= $cta['icon'];?> white absolute top-50 left-50 translate brand-primary icon-brand-primary"></i>
                <?php endif; ?>
            </div>
        </div>
        <div class="col col-8">
            <p class="mb0 lh1 brand-primary" style="font-size:1em;"><?= $cta['title'];?></p>
            <span class="mb0 grey" style="font-size:0.75em;"><?= $cta['subtitle'];?></span>
        </div>
    </a>
<?php else: ?>
    <div class="border-1 border-top border-bottom border-left border-right border-brand-primary mr2 col col-4" style="width:3rem; border-radius:50%;">
        <div class="<?=$cta['icon__image'] === 'image'? '' : 'square';?> relative" style="font-size:1.6em;">
            <?php if($cta['icon__image'] === 'image') : ?>
                <img src="<?=$cta['image']?>" class="absolute top-50 left-50 translate" style="max-height: 42px;" />
            <?php else: ?>
                <i class="fa <?= $cta['icon'];?> brand-primary absolute top-50 left-50 translate h3"></i>
            <?php endif; ?>
        </div>
    </div>
    <div class="col col-8">
        <p class="mb1 lh1 brand-primary bold" style="font-size:0.85em;"><?= $cta['title'];?></p>
        <p class="mb0" style="font-size:0.7em;"><?= $cta['subtitle'];?></p>
    </div>
<?php endif; ?>

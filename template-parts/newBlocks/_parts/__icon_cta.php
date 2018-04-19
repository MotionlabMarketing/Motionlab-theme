<?php if($cta['link']): ?>
    <a href="<?= $cta["link"]["url"] ?>" class="flex items-center hover-body">
        <div class="bg-darken-2 mr2 border-radius-10" style="width:3rem;">
            <div class="square relative h3">
                <i class="fa <?= $cta['icon'];?> white absolute top-50 left-50 translate"></i>
            </div>
        </div>
        <div class="">
            <p class="mb0 lh1 brand-primary"><?= $cta['title'];?></p>
            <span class="mb0 h5 grey"><?= $cta['subtitle'];?></span>
        </div>
    </a>
<?php else: ?>
    <div class="flex items-center">
        <div class="border border-brand-primary border-radius-10 mr2" style="width:3rem;">
            <div class="square relative h3">
                <i class="fa <?= $cta['icon'];?> brand-primary absolute top-50 left-50 translate"></i>
            </div>
        </div>
        <div class="">
            <p class="mb0 lh1 brand-primary"><?= $cta['title'];?></p>
            <span class="mb0 h6 uppercase"><?= $cta['subtitle'];?></span>
        </div>
    </div>
<?php endif; ?>

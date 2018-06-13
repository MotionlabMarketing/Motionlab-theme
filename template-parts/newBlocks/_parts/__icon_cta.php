<?php if($cta['link']): ?>
    <a href="<?= $cta["link"]["url"] ?>" class="flex items-center hover-body">
        <div class="bg-darken-2 mr2" style="width:3em; border-radius:50%;">
            <div class="square relative" style="font-size:1.6em;">
                <i class="fa <?= $cta['icon'];?> white absolute top-50 left-50 translate"></i>
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
                <i class="fa <?= $cta['icon'];?> brand-primary absolute top-50 left-50 translate"></i>
            </div>
        </div>
        <div class="">
            <p class="mb0 lh1 brand-primary" style="font-size:1em;"><?= $cta['title'];?></p>
            <span class="mb0 uppercase" style="font-size:0.75em;"><?= $cta['subtitle'];?></span>
        </div>
    </div>
<?php endif; ?>

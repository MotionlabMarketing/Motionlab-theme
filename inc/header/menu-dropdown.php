<div class="dropdown">

    <ul class="list-reset m0 bg-white border-radius-2">

        <div class="arrow-up"></div>

        <?php $i=1; ?>
            <?php foreach($menuitem->children as $child) : ?>

            <li class="relative">
                <a href="<?php echo $child->url ?>" class="block black py2 bold text-left">
                    <?php echo $child->title; ?>
                </a>
            </li>

            <?php $i++; ?>
        <?php endforeach ?>

    </ul>

</div>
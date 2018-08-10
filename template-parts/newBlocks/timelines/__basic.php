<?php
/**
 * TIMELINE – BASIC LAYOUT BLOCK ------------------------
 * A basic timeline block.
 *
 * @author Joe Curran
 * @created 8 Feb 2018
 *
 * @version 1.00
 */

//TODO: Add support for more than one per page.
$i = 1;
$events = get_sub_field($current . '_events');
?>



<section <?=get_blockID($block)?> <?=get_blockClasses($block, "")?> <?=get_blockData($block)?>>

    <?=($block['grid'] == 'container')? '<div class="container">' : ""?>
    
    <?php include(BLOCKS_DIR . '_parts/__basic_introduction.php'); ?>

    <section class="cd-horizontal-timeline">

        <div class="timeline">

            <div class="events-wrapper">

                <div class="events">
                    <ol class="list-reset">

                        <?php
                        $a = 1;
                        foreach ($events as $event): ?>

                            <li><a href="#0" data-date="<?=$event['date']?>" class="bold <?=($a == 1)? 'selected' : ''?>"><?=date('M Y', strtotime(str_replace("/", "-", $event['date']))) ?></a></li>

                            <?php $a++; endforeach; ?>

                    </ol>

                    <span class="filling-line" aria-hidden="true"></span>
                </div>

            </div>

            <ul class="list-reset cd-timeline-navigation">

                <li><a href="#0" class="prev inactive">Prev</a></li>
                <li><a href="#0" class="next">Next</a></li>

            </ul>

        </div>

        <div class="events-content">
            <ol class="list-reset">

                <?php
                    $b = 1;
                    foreach ($events as $event): ?>

                    <li <?=($b == 1)? 'class="selected"' : ''?> data-date="<?=$event['date']?>">

                            <div class="col col-12 md-col-6 pt5 pb6 md-pr6">

                                <h3 class="brand-primary"><?=date("F Y", strtotime(str_replace("/", "-", $event['date'])))?> – <?=$event['title']?></h3>

                                <?=$event['content']?>

                            </div>

                            <div class="image || col col-12 md-col-6 p2 md-p4">

                                <img src="<?=$event['image']['sizes']['medium_large']?>" alt="<?=$event['image']['alt']?>" class="block ml-auto mr-auto box-shadow-2">

                            </div>

                    </li>

                <?php $b++; endforeach; ?>

            </ol>
        </div>
    </section>

    <?=($block['grid'] == 'container')? '</div>' : ""?>

</section>
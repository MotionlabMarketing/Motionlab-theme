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

$bgColor     = get_sub_field($current . '_background_system_background_colours');
$txtColor    = get_sub_field($current . '_text_system_text_colours');

$blockTitle  = get_sub_field($current . '_title_title');

// BACKEND NOTES – REMOVE ONCE ADDED
// Get posts from Custom Post Type.
// $membersShow – Number of Items to show.

$i = 1;
$events = get_sub_field($current . '_events');

$lineItems = "";
$selectItems = [];
foreach ($events as $item):

    $lineItems .= '{
            id: '.$i.',
            name: "'.$item['title'].'",
            on: new Date('.date("Y", strtotime($item['date'])).', '.date("m", strtotime($item['date'])).', '.date("d", strtotime($item['date'])).')
        },';
    $i++;

    $selectItems[$i] = '';

endforeach;

?>

<section class="timeline-basic || clearfix my4 mb6">

    <div class="container">

        <div class="col col-12 || p4 text-center">

            <div class="mb3">
                <?php
                if (!empty($blockTitle[0]['title'])) {
                    include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>
            </div>

            <div class="wysiwyg">
                <?=get_sub_field($current . '_content')?>
            </div>

        </div>


        <div class="col-12 || mb5" data-tabs="wrapper">

            <select name="change" id="changeDropdown" style="min-width:13rem;" class="select md-mr3 width-100 md-width-auto my4">
                <?php $i = 1; foreach ($events as $item): ?>

                    <option value="<?=$i?>"><?=date("F - Y", strtotime($item['date']))?></option>

                <?php $i++; endforeach; ?>
            </select>


            <div class="content" data-tabs="content">

                <?php $i = 1; foreach ($events as $item):?>

                <section class="col-12 clearfix date-id <?=($i == 1)? "" : "hide"; ?> || " id="date-id-<?=$i?>">

                    <div class="col col-12 md-col-6 p2 md-p4">

                        <h3 class="brand-primary"><?=date("F Y", strtotime($item['date']))?> – <?=$item['title']?></h3>

                        <?=$item['content']?>

                    </div>

                    <div class="image || col col-12 md-col-6 p2 md-p4">

                        <img src="<?=$item['image']['sizes']['medium_large']?>" alt="<?=$item['image']['alt']?>" class="block ml-auto mr-auto box-shadow-3">

                    </div>

                </section>

                <?php $i++; endforeach; ?>

            </div>

        </div>

        <div id="timeline" class="mt5 clearfix"></div>

    </div>

</section>

<script type="text/javascript">
    jQuery(document).ready(function($) {

        var ev = [<?=$lineItems?>];

        var tl = $('#timeline').jqtimeline({
            events: ev,
            numYears: <?=get_sub_field($current . '_years')?>,
            startYear: <?=get_sub_field($current . '_start')?>,
            click: function (e, event) {
                var $wrapper = $('[data-tabs="wrapper"]');
                $wrapper.find('[data-tabs="content"]').children('section').addClass('hide');
                $wrapper.find('[data-tabs="content"]').find('section[id=date-id-' + event.id + ']').removeClass('hide');
            }
        });
    });
</script>
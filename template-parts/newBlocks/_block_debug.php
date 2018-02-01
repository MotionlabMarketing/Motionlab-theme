<?php
/**
 * DEBUG BLOCK -------------------------------------
 * Add support for debug block, note this is not
 * a production block.
 *
 * @author Joe Curran
 * @created 26 Jan 2018
 *
 * @version 1.00
 */


?>

<section class="overflow-hidden p3 mb4" style="background: lightcyan" id="debug-block">

    <div class="container">

        <h3>Debug Block</h3>

        <a href="#" class="btn toggle">Toggle Debug</a>

        <div class="my4 p4" id="debug">

            <h2 style="font-size: 1.4rem;color: white;">Debug All AFC Fields</h2>

            <p>Page: <?=get_query_var('pagename')?></p>
            <p>User: <?php $user = wp_get_current_user(); echo $user->user_login ?> – <?=$user->ID?></p>

            <p style="font-size: 0.8rem"><?php $block = get_field_objects(); print_r($block['building_blocks']) ?></p>

        </div>

        <a href="#" class="btn toggle">Toggle Debug</a>

    </div>

</section>

<script>

    jQuery(document).ready(function($) {

        $('.toggle').on('click', function () {
            $('#debug').toggle();
        })

    });

</script>

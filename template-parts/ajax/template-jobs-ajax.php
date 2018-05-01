<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 20/03/18
 * Time: 17:02
 */
?>

<?php if(!empty($block['posts']->posts)) :
        foreach($block['posts']->posts as $post) :?>
            <div class="listItem || relative clearfix border-bottom border-light px5 py5 mb4 box-shadow-2 lg-flex items-center">

                <div class="col col-12 lg-col-9 mb4">

                    <a href="<?= get_permalink($post->ID) ?>"><h3 class="mb2 h3 brand-primary"><?= $post->post_title ?></h3>
                    </a>

                    <?php if(get_field('jobs_role_salary', $post->ID) != ''):
                        $salary = get_field('jobs_role_salary', $post->ID);
                    else :
                        $salary = "Salary not Specified";
                    endif; ?>
                    <p class="h4 bold mb0"><?= $post->locations[0]->name ?><span
                                class="muted"> •</span> <?= $salary ?> <span
                                class="muted">•</span> <?= $post->types[0]->name ?></p>

                </div>

                <div class="col col-12 lg-col-3">

                    <a href="<?=get_permalink($post->ID)?>" class="btn btn-primary btn-small white lg-width-100 h6 lg-right">Find out more</a>

                </div>

            </div>
        <?php endforeach;?>
<?php else: ?>

    <?php if ($block['posts']->query['tax_query'][0]['terms'][0] == 'internal-vacancies') : ?>
        <p class="text-center p2 m1">Oh dear, it looks like we don’t currently have any active vacancies here at Cummins Mellor. However, we’re always on the lookout for ‘Cummins Mellor People’ and would love to speak to you if you feel you would be a great addition to our team. Please get in touch with us, we’d love to hear from you.</p><p class="text-center p2 m1"><strong>Contact Helen Jackson on <a href="tel:01254 239363">01254 239363</a> or email <a href="mailTo:helen@cumminsmellor.co.uk">helen@cumminsmellor.co.uk</a></strong></p>
    <?php else: ?>
        <p class="text-center p2 m1">Oh dear, it looks like we don’t currently have any active vacancies in this sector. However we’re always on the lookout for great candidates and would love to speak to you to discuss your requirements and career goals. Please get in touch with us, we’d love to hear from you.</p><p class="text-center p2 m1"><strong>Contact Laura Garratt on <a href="tel:01254 239363">01254 239363</a></strong></p>
	<?php endif; ?>

<?php endif; ?>

<?php include(BLOCKS_DIR . '_parts/__basic_pagination.php'); ?>

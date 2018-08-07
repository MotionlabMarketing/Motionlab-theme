<?php
/**
 * TODO: Add correct documentation here! 
 */
$locations = get_the_terms(get_the_ID(), 'locations');
$job_id     = get_field('jobs_role_id') ?: 'Unspecified';
$job_salary = get_field('jobs_role_salary') ? get_field('jobs_role_salary') : 'Salary Unspecified';
$job_title  = get_field('jobs_role_title') ?: get_the_title();
$job_expiry = get_field('jobs_role_expiryDate') ? date("jS M Y", strtotime(get_field('jobs_role_expiryDate'))) : 'Unspecified';

get_header();
?>

<div class="clearfix || p4 md-mt4" id="single-job">

    <div class="container">

        <div class="col col-12 md-col-8 lg-col-8 || pt3">

            <h1 class="h2 mb2 bold"><?=$job_title?></h1>
            <h2 class="h4">
                <?=$locations ? $locations[0]->name : 'Unspecified';?>
                <span class="muted">|</span> Job ID: <?=$job_id;?>
                <span class="muted">|</span> <?=$job_salary?></h2>

        </div>

        <div class="col col-12 md-col-4 lg-col-4 md-text-right pt5 text-center">

            <a href="#apply" class="btn block btn-primary btn-medium">Apply Now</a>

        </div>

        <hr class="my4 clearfix">

        <div class="col col-12 md-col-8 lg-col-8 md-px2 first-bold">

            <?=get_field('jobs_role_details');?>

        </div>

        <div class="col col-12 md-col-4 lg-col-4 md-px2 first-bold">

            <div class="p3 bg-smoke">

                <h3 class="h3 brand-primary">Share</h3>
                <?php echo sharethis_inline_buttons(); ?>
            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 clearfix || pt3 p2 md-p5 mt5 bg-smoke" id="apply">

            <h3 class="brand-primary mx3"><?=get_field('jobs_role_formTitle')?></h3>

            <div class="col col-12 md-col-8 pr4 mb4 md-mb0 apply-form" data-block-name="block_form" data-block-layout="basic">

                <?php $job_contact_id = get_field('jobs_role_contact'); ?>
                <?php $job_contact_email = get_field('staff_emailAddress', $job_contact_id[0]->ID); ?>
                <?php gravity_form( '7', $display_title = true, $display_description = true, $display_inactive = false, $field_values = ["primary_contact" => $job_contact_email, "job_title" => $job_title, "job_id" => $job_id], $ajax = false, $tabindex, $echo = true ); ?>

            </div>

            <div class="col col-12 md-col-4 p3 lg-p0 mt4">

                <h4 class="h4"><?=get_field('jobs_role_sidebar_contentHeading')?></h4>
                <?=get_field('jobs_role_sidebar_content')?>


                <?php $staff = get_field('jobs_role_sidebar_teamMember'); ?>
                <?php if (!empty($staff[0]->ID)): ?>
                    <div class="mt4">
                        <div class="col col-12 xl-col-4 || xl-pr4">

                            <div class="image-holder img-top square img-100 img-s10 mb3" style="background-image: url('<?=get_field('staff_profileImage', $staff[0]->ID)['sizes']['medium']?>');"></div>

                        </div>

                        <div class="col col-12 xl-col-8">

                            <p class="mb1"><strong>Speak to <?=get_field('staff_name', $staff[0]->ID)?></strong></p>
                            <p><?=get_field('staff_role', $staff[0]->ID)?></p>

                            <?php if (!empty(get_field('staff_phoneNumber', $staff[0]->ID))): ?>
                                <p class="mb1">T: <a href="tel:<?=str_replace(" ", "", get_field('staff_phoneNumber', $staff[0]->ID)); ?>" class="bold brand-primary"><?=get_field('staff_phoneNumber', $staff[0]->ID); ?></a></p>
                            <?php endif; ?>

                            <?php if (!empty(get_field('staff_phoneMobile', $staff[0]->ID))): ?>
                                <p class="mb1">M: <a href="tel:<?=str_replace(" ", "", get_field('staff_phoneMobile', $staff[0]->ID)); ?>" class="bold brand-primary"><?=get_field('staff_phoneMobile', $staff[0]->ID); ?></a></p>
                            <?php endif; ?>

                            <?php if (!empty(get_field('staff_emailAddress', $staff[0]->ID))): ?>
                                <p class="mb1">E: <a href="mailto:<?=str_replace(" ", "", get_field('staff_emailAddress', $staff[0]->ID)); ?>" class="bold brand-primary"><?=get_field('staff_emailAddress', $staff[0]->ID); ?></a></p>
                            <?php endif; ?>

                        </div>

                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

</div>

<?php get_footer(); ?>

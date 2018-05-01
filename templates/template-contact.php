<?php
/**
 * Template Name: Contact Page
 *
 * TODO: Needs converting to template when CPT has been added.
 */

$blockTitle = get_field('page_title');
$blockTitle = $blockTitle['title'];

get_header(); ?>

    <section class="clearfix my4 mb4" id="templete-contact">

        <div class="container">

            <div class="col-12 || mb3 || text-center">

                <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center p3 limit-p limit-p-70">

                    <?php
                    if (!empty($blockTitle[0]['title'])) {
                        include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                    } ?>

                    <div class="wysiwyg h4 p3">
                        <?= get_field('page_introduction') ?>
                    </div>

                </div>

            </div>

            <div class="col-12 clearfix || mt5 pt5 || border-light border-top">

                <div class="col col-12 md-col-6 || mb5 pt4 p3 md-py6">

                    <div>

                        <h2 class="h3 mb4">General Enquiries & Registation</h2>

                        <p class="mb0"><span class="mr1">T:</span><a
                                    href="tel:<?= trim(str_replace(" ", "", strtolower(get_field('main_contact_phone')))) ?>" class="bold"><?= get_field('main_contact_phone') ?></a>
                        </p>
                        <p><span class="mr1">E:</span><a
                                    href="mailto:<?= trim(strtolower(get_field('main_contact_email'))) ?>" class="bold"><?= get_field('main_contact_email') ?></a>
                        </p>

                        <?= get_field('main_contact_address'); ?>

                        <div class="my4 overflow-hidden">

                            <?php $buttons = get_field('main_contact_buttons'); foreach ($buttons as $btn): ?>

                                <a href="<?= $btn['button_button_link']['url'] ?>"
                                   class="btn btn-medium mb2 block min-width-20 <?= $btn['button_system_background_colours'] ?> <?= $btn['button_system_text_colours'] ?>" <?= ($btn['button_button_link']['title'] ? 'title="' . $btn['button_button_link']['title'] . '"' : '') ?> <?= ($btn['button_button_link']['target'] ? 'target="' . $btn['button_button_link']['target'] . '"' : '') ?>><?= $btn['button_button_link']['title'] ?></a>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

                <div class="col col-12 md-col-6 || px2 md-pl6 md-pr6 pb1 pt0">

                    <?php $location = get_field('location_map');
                    if (!empty($location)):
                        ?>
                        <div class="acf-map">
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                                 data-lng="<?php echo $location['lng']; ?>"></div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

            <div class="col-12 clearfix || pb4 mb5">

                <?php
                /**
                 * SPECIFIC CONTACT BOXES OUTPUT
                 */
                foreach (get_field('specific_contacts') as $item): ?>

                    <div class="col col-12 md-col-6 md-col-3 lg-col-3 || mb1 p2">

                        <div class="bg-smoke p4 relative md-min-height-v25 || js-match-height">

                            <p class="brand-base h4"><strong><?= $item['specific_contacts_name'] ?></strong></p>

                            <div class="md-absolute bottom-2">

                                <p class="underline brand-primary h5 mb0"><?= $item['specific_contacts_persons'] ?></p>

                                <?php foreach ($item['specific_contacts_details'] as $a): ?>

                                    <p class="mb0 h5"><span
                                                class="uppercase md-inline-block mr2"><?= ($a['type'] == "email") ? 'E:' : "T:"; ?></span><a
                                                href="<?= ($a['type'] == "email") ? 'mailto' : "tel"; ?>:<?= str_replace(" ", "", $a['value']) ?>"><?= $a['value']; ?></a>
                                    </p>

                                <?php endforeach; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

            <hr>

            <div class="col-12 || py5">

                <div class="mb3">

                    <div class="col col-12 md-col-12 lg-col-12 || text-left p3 limit-p limit-p-70">

                        <?php
                        $blockTitle = get_field('contact_form_title');
                        $blockTitle = $blockTitle['title'];
                        if (!empty($blockTitle[0]['title'])) {
                            include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                        } ?>

                        <div class="wysiwyg">
                            <?= get_field('contact_form_introduction_content') ?>
                        </div>

                    </div>

                </div>

                <div class="clearfix || flex justify-center">

                    <div class="col col-12">

                        <?= do_shortcode('[gravityform id="' . get_field('contact_form_id') . '" title="false" description="false"]') ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php get_footer(); ?>

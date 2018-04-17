<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?= bloginfo('charset') ?>">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?= bloginfo('pingback_url') ?>">

    <script src="https://use.fontawesome.com/22d4621214.js"></script>

    <?php
    // TYPEKIT - KIT ID CODE.
    if (get_field('custom_typekit_id', 'option')): ?>
        <link rel="stylesheet" href="https://use.typekit.net/<?= get_field('custom_typekit_id', 'option') ?>.css">
    <?php endif; ?>

    <?php
        // INCLUDE THE WORDPRESS HEAD.
        wp_head();

        // INCLUDE ANY EXTRA HEADER CODE.
        echo get_field('header_code', 'option');

        // INCLUDE ANY EXTRA TRACKING CODE.
        echo get_field('tracking_code', 'option');
    ?>

</head>

<body <?= body_class() ?>>

    <?php include(get_template_directory() . '/template-parts/global/header.php'); ?>

    <?php
    $template = ml_get_template();
    if (!is_front_page() && get_field('remove_headerClearance', get_the_ID()) == false):?>
        <div class="js-header-space"></div>
    <?php endif; ?>

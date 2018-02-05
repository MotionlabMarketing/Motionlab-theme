<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php echo get_field('website_name','option'); ?></title>
    <meta name="description" content="<?php echo get_field('website_meta','option'); ?>">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans" rel="stylesheet">
    <script src="https://use.fontawesome.com/22d4621214.js"></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a033b1e69fde30011eef3d0&product=inline-share-buttons"></script>
    <?php wp_head(); ?>

    <?=get_field('header_code',   'option');?>
    <?=get_field('tracking_code', 'option');?>
</head>
<body <?=body_class()?>>

    <?php include(get_template_directory() .'/template-parts/global/header.php'); ?>
    <div class="js-header-space"></div>
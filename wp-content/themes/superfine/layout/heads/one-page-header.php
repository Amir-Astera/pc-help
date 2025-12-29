<?php
/**
 *
 * EXCEPTION theme Header
 * @version 1.0.0
 *
 */ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo theme_option('shape'); ?>" data-class="<?php echo theme_option('shape'); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" media="screen" />
        <?php if ( ! isset( $content_width ) ) $content_width = 960; ?>
        <?php it_title_css(); ?>
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class('one-page'); ?>>
        <?php if ( theme_option('page-loader') ) : ?>
            <!-- site preloader start -->
            <div class="page-loader"></div>
            <!-- site preloader end -->
        <?php endif; ?>
        <div class="pageWrapper <?php echo theme_option('layout'); ?>">
        <?php it_theme_header(); ?>
        <div id="contentWrapper">
            
        
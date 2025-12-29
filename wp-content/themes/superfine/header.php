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
		<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1BX3768MJT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1BX3768MJT');
</script>

        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" media="screen" />
        <?php if ( ! isset( $content_width ) ) $content_width = 960; ?>
        <?php it_title_css(); ?>
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class(); ?>>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5ZLRD948');</script>
<!-- End Google Tag Manager -->

        <?php
        
        // Enable / Disable Smooth scroll.
        $anims = $an_in = $an_out = $anim_cov = '';
        $anim_in = theme_option('data-animsition-in');
        $anim_out = theme_option('data-animsition-out');
        if ( theme_option('page_transitions') == "1" ) {
            $anims = 'animsition';
            $an_in = ' data-animsition-in-class="'.$anim_in.'"';
            $an_out = ' data-animsition-out-class="'.$anim_out.'"'; 
        }
        if ( $anim_in == "overlay-slide-in-top" || $anim_in == "overlay-slide-in-bottom" || $anim_in == "overlay-slide-in-left" || $anim_in == "overlay-slide-in-top" ) {
            $anim_cov = 'data-animsition-overlay="true"';
        }
        
        ?>
        
        <div class="pageWrapper <?php echo $anims; ?> <?php echo theme_option('layout'); ?>" <?php echo $an_in; ?> <?php echo $an_out; ?> <?php echo $anim_cov; ?>>
        <?php it_theme_header(); ?>
        <div id="contentWrapper">
            
        
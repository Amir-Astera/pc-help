<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.com
 * @copyright 2014 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
 
add_action( 'wp_enqueue_scripts', 'it_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'it_enqueue_scripts' );

function it_enqueue_styles(){
    $body_font = theme_option('body_font');
    $menu_font = theme_option('menu_font');
    $headings_font = theme_option('headings_font');
    $logo_font = theme_option('logo_font');
    $slogan_font = theme_option('slogan_font');
    $bfont = $mfont = $hfont = $lfont = $sfont = '';
    wp_enqueue_style( 'assets', THEME_URI . '/assets/css/assets.css' );
        
    if ( $body_font != '' ) {
        $bfont = $body_font.':400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|';
    }else{
        $bfont = 'Lato:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|';
    }            
    if ( $menu_font != '' && $menu_font != $body_font ) {
        $mfont = $menu_font.':400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|';
    }
    if ( $headings_font != '' && $headings_font != $body_font && $menu_font != $headings_font ) {
        $hfont = $headings_font.':400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|';
    }
    if ( $logo_font != '' && $logo_font != $body_font && $logo_font != $headings_font && $menu_font != $logo_font ) {
        $lfont = $logo_font.':400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|';
    }
    if ( $slogan_font != '' && $slogan_font != $body_font && $slogan_font != $menu_font && $slogan_font != $logo_font ) {
        $sfont = $slogan_font.':400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
    }
    
    $query_args = array(
        'family' => $bfont.$mfont.$hfont.$lfont.$sfont,
        'subset' => 'latin,latin-ext',
    );
    wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
    
    
    if(function_exists('is_bbpress') && is_bbpress()){
        wp_enqueue_style( 'bbpress', THEME_URI . '/assets/css/plugins/bbpress.css' );
    }
    if(function_exists('bp_is_blog_page') && !bp_is_blog_page()){
        wp_enqueue_style( 'buddypress-custom', THEME_URI . '/assets/css/plugins/buddypress.css' );
    }
    if(class_exists( 'WooCommerce' )){
        wp_enqueue_style( 'woo-custom', THEME_URI . '/assets/css/plugins/woo.css' );
    }
    wp_enqueue_style( 'style', THEME_URI . '/assets/css/style.css' );
    wp_enqueue_style( 'skin_css', THEME_URI . '/assets/css/'.theme_option("skin_css").'.css', null, null );
    
    if ( theme_option('colors_css') != 'custom' ) {
        wp_enqueue_style( 'colors_css', THEME_URI . '/assets/css/skins/'.theme_option("colors_css").'.css', null, null );
    }else{
        wp_enqueue_style( 'custom-colors', THEME_URI . '/assets/css/colors.php','1' );
    }                   
    
    wp_enqueue_style( 'custom_style', THEME_URI . '/assets/css/style.php','1' );
}
 
function it_enqueue_scripts() {
    
    if  ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) && ( false === strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 9' ) ) ) {
        wp_register_script( 'html5', THEME_URI . '/assets/js/html5.js', 'html5' );
        wp_enqueue_script( 'html5');
    }
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) == "1" ){
        wp_enqueue_script( 'comment-reply' );
    }
    if ( is_singular() && class_exists( 'VCExtendAddonCustomShortCodes' ) ) {
        wp_enqueue_script( 'easyshare', THEME_URI . '/assets/js/easyshare.js', array('jquery'));
    }
    wp_enqueue_script( 'assets', THEME_URI . '/assets/js/assets.js', array('jquery'));
    wp_enqueue_script( 'script', THEME_URI . '/assets/js/script.js', 'script',null,true );
    
    
}

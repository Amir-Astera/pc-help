<?php

$real_estate_hub_tp_theme_css = '';

//theme color
$real_estate_hub_tp_color_option = get_theme_mod('real_estate_hub_tp_color_option');

if($real_estate_hub_tp_color_option != false){
$real_estate_hub_tp_theme_css .='button[type="submit"], .top-header,.main-navigation .menu > ul > li.highlight,.more-btn a,.box:before,.box:after,a.added_to_cart.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,a.added_to_cart.wc-forward,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.book-tkt-btn a.register-btn ,#slider button[type="submit"], #return-to-top:hover,.toggle-nav i,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .error-404 [type="submit"] {';
$real_estate_hub_tp_theme_css .='background-color: '.esc_attr($real_estate_hub_tp_color_option).';';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_color_option != false){
$real_estate_hub_tp_theme_css .='#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,#theme-sidebar h3,#project h3,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .page-box h4 a ,.readmore-btn a, .article h2,.wp-block-heading,h2, h3,.box-content a,h1,.logo a, .logo p,.nav ul li a:hover,#theme-sidebar h2.wp-block-heading,.wp-block-search .wp-block-search__label,#project .btn-box a,.wp-block-search .wp-block-search__label {';
$real_estate_hub_tp_theme_css .='color: '.esc_attr($real_estate_hub_tp_color_option).';';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_color_option != false){
$real_estate_hub_tp_theme_css .='{';
	$real_estate_hub_tp_theme_css .='border-color: '.esc_attr($real_estate_hub_tp_color_option).';';
$real_estate_hub_tp_theme_css .='}';
}

//hover color
$real_estate_hub_tp_color_option_link = get_theme_mod('real_estate_hub_tp_color_option_link');

if($real_estate_hub_tp_color_option_link != false){
$real_estate_hub_tp_theme_css .='.prev.page-numbers:focus, .prev.page-numbers:hover, .next.page-numbers:focus, .next.page-numbers:hover,span.meta-nav:hover, #comments input[type="submit"]:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #footer button[type="submit"]:hover,#theme-sidebar .tagcloud a:hover, #theme-sidebar button[type="submit"]:hover,.book-tkt-btn a.register-btn:hover,.more-btn a:hover{';
	$real_estate_hub_tp_theme_css .='background: '.esc_attr($real_estate_hub_tp_color_option_link).';';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_color_option_link != false){
$real_estate_hub_tp_theme_css .='a:hover,#theme-sidebar a:hover, #footer li a:hover, .main-navigation a:hover,.media-links i:hover, .readmore-btn a:hover {';
	$real_estate_hub_tp_theme_css .='color: '.esc_attr($real_estate_hub_tp_color_option_link).';';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_color_option_link != false){
$real_estate_hub_tp_theme_css .='#footer .tagcloud a:hover,.wp-block-tag-cloud a:hover,.post_tag a:hover{';
	$real_estate_hub_tp_theme_css .='border-color: '.esc_attr($real_estate_hub_tp_color_option_link).';';
$real_estate_hub_tp_theme_css .='}';
}

//preloader

$real_estate_hub_tp_preloader_color1_option = get_theme_mod('real_estate_hub_tp_preloader_color1_option');
$real_estate_hub_tp_preloader_color2_option = get_theme_mod('real_estate_hub_tp_preloader_color2_option');
$real_estate_hub_tp_preloader_bg_color_option = get_theme_mod('real_estate_hub_tp_preloader_bg_color_option');

if($real_estate_hub_tp_preloader_color1_option != false){
$real_estate_hub_tp_theme_css .='.center1{';
	$real_estate_hub_tp_theme_css .='border-color: '.esc_attr($real_estate_hub_tp_preloader_color1_option).' !important;';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_preloader_color1_option != false){
$real_estate_hub_tp_theme_css .='.center1 .ring::before{';
	$real_estate_hub_tp_theme_css .='background: '.esc_attr($real_estate_hub_tp_preloader_color1_option).' !important;';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_preloader_color2_option != false){
$real_estate_hub_tp_theme_css .='.center2{';
	$real_estate_hub_tp_theme_css .='border-color: '.esc_attr($real_estate_hub_tp_preloader_color2_option).' !important;';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_preloader_color2_option != false){
$real_estate_hub_tp_theme_css .='.center2 .ring::before{';
	$real_estate_hub_tp_theme_css .='background: '.esc_attr($real_estate_hub_tp_preloader_color2_option).' !important;';
$real_estate_hub_tp_theme_css .='}';
}
if($real_estate_hub_tp_preloader_bg_color_option != false){
$real_estate_hub_tp_theme_css .='.loader{';
	$real_estate_hub_tp_theme_css .='background: '.esc_attr($real_estate_hub_tp_preloader_bg_color_option).';';
$real_estate_hub_tp_theme_css .='}';
}

// footer-bg-color
$real_estate_hub_tp_footer_bg_color_option = get_theme_mod('real_estate_hub_tp_footer_bg_color_option');

if($real_estate_hub_tp_footer_bg_color_option != false){
$real_estate_hub_tp_theme_css .='#footer{';
	$real_estate_hub_tp_theme_css .='background: '.esc_attr($real_estate_hub_tp_footer_bg_color_option).' !important;';
$real_estate_hub_tp_theme_css .='}';
}
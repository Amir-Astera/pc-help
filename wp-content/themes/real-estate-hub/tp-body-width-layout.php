<?php

	$real_estate_hub_tp_theme_css = "";

//body-layout
$real_estate_hub_theme_lay = get_theme_mod( 'real_estate_hub_tp_body_layout_settings','Full');
if($real_estate_hub_theme_lay == 'Container'){
$real_estate_hub_tp_theme_css .='body{';
	$real_estate_hub_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$real_estate_hub_tp_theme_css .='}';
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px){';
		$real_estate_hub_tp_theme_css .='body{';
			$real_estate_hub_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$real_estate_hub_tp_theme_css .='} }';
$real_estate_hub_tp_theme_css .='.page-template-front-page .menubar{';
	$real_estate_hub_tp_theme_css .='position: static;';
$real_estate_hub_tp_theme_css .='}';
$real_estate_hub_tp_theme_css .='.scrolled{';
	$real_estate_hub_tp_theme_css .='width: auto; left:0; right:0;';
$real_estate_hub_tp_theme_css .='}';
}else if($real_estate_hub_theme_lay == 'Container Fluid'){
$real_estate_hub_tp_theme_css .='body{';
	$real_estate_hub_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$real_estate_hub_tp_theme_css .='}';
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px){';
		$real_estate_hub_tp_theme_css .='body{';
			$real_estate_hub_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$real_estate_hub_tp_theme_css .='} }';
$real_estate_hub_tp_theme_css .='.page-template-front-page .menubar{';
	$real_estate_hub_tp_theme_css .='width: 99%';
$real_estate_hub_tp_theme_css .='}';
$real_estate_hub_tp_theme_css .='.scrolled{';
	$real_estate_hub_tp_theme_css .='width: auto; left:0; right:0;';
$real_estate_hub_tp_theme_css .='}';
}else if($real_estate_hub_theme_lay == 'Full'){
$real_estate_hub_tp_theme_css .='body{';
	$real_estate_hub_tp_theme_css .='max-width: 100%;';
$real_estate_hub_tp_theme_css .='}';
}

//scrol-top
$real_estate_hub_scroll_position = get_theme_mod( 'real_estate_hub_scroll_position','Right');
if($real_estate_hub_scroll_position == 'Right'){
$real_estate_hub_tp_theme_css .='#return-to-top{';
    $real_estate_hub_tp_theme_css .='right: 20px;';
$real_estate_hub_tp_theme_css .='}';
}else if($real_estate_hub_scroll_position == 'Left'){
$real_estate_hub_tp_theme_css .='#return-to-top{';
    $real_estate_hub_tp_theme_css .='left: 20px;';
$real_estate_hub_tp_theme_css .='}';
}else if($real_estate_hub_scroll_position == 'Center'){
$real_estate_hub_tp_theme_css .='#return-to-top{';
    $real_estate_hub_tp_theme_css .='right: 50%;left: 50%;';
$real_estate_hub_tp_theme_css .='}';
}

// slider button mobile width
$real_estate_hub_mob_search_icon = get_theme_mod( 'real_estate_hub_mob_search_icon',true);
if($real_estate_hub_mob_search_icon == true && get_theme_mod( 'real_estate_hub_search_icon',true) != true){
	$real_estate_hub_tp_theme_css .='#slider .search_inner{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} ';
}
if($real_estate_hub_mob_search_icon == true){
	$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px) {';
$real_estate_hub_tp_theme_css .='#slider .search_inner{';
	$real_estate_hub_tp_theme_css .='display:block;';
$real_estate_hub_tp_theme_css .='} }';
}else if($real_estate_hub_mob_search_icon == false){
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px){';
$real_estate_hub_tp_theme_css .='#slider .search_inner{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} }';
}

// slider post mobile width
$real_estate_hub_post_option_mob = get_theme_mod( 'real_estate_hub_post_option_mob',true);
if($real_estate_hub_post_option_mob == true && get_theme_mod( 'real_estate_hub_post_option',true) != true){
	$real_estate_hub_tp_theme_css .='#slider .block-balck, #slider .pull-up-box{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} ';
}
if($real_estate_hub_post_option_mob == true){
	$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px) {';
$real_estate_hub_tp_theme_css .='#slider .block-balck, #slider .pull-up-box{';
	$real_estate_hub_tp_theme_css .='display:block;';
$real_estate_hub_tp_theme_css .='} }';
}else if($real_estate_hub_post_option_mob == false){
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px){';
$real_estate_hub_tp_theme_css .='#slider .block-balck, #slider .pull-up-box{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} }';
}

//Social icon Font size
$real_estate_hub_social_icon_fontsize = get_theme_mod('real_estate_hub_social_icon_fontsize');
	$real_estate_hub_tp_theme_css .='.media-links a i{';
$real_estate_hub_tp_theme_css .='font-size: '.esc_attr($real_estate_hub_social_icon_fontsize).'px;';
$real_estate_hub_tp_theme_css .='}';

// site title font size option
$real_estate_hub_site_title_font_size = get_theme_mod('real_estate_hub_site_title_font_size', 25);{
$real_estate_hub_tp_theme_css .='.logo h1 , .logo p a{';
	$real_estate_hub_tp_theme_css .='font-size: '.esc_attr($real_estate_hub_site_title_font_size).'px;';
$real_estate_hub_tp_theme_css .='}';
}

//site tagline font size option
$real_estate_hub_site_tagline_font_size = get_theme_mod('real_estate_hub_site_tagline_font_size', 15);{
$real_estate_hub_tp_theme_css .='.logo p{';
	$real_estate_hub_tp_theme_css .='font-size: '.esc_attr($real_estate_hub_site_tagline_font_size).'px;';
$real_estate_hub_tp_theme_css .='}';
}

//return to header mobile				
$real_estate_hub_return_to_header_mob = get_theme_mod( 'real_estate_hub_return_to_header_mob',false);
if($real_estate_hub_return_to_header_mob == true && get_theme_mod( 'real_estate_hub_return_to_header',true) != true){
$real_estate_hub_tp_theme_css .='.return-to-header{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} ';
}
if($real_estate_hub_return_to_header_mob == true){
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px) {';
$real_estate_hub_tp_theme_css .='.return-to-header{';
	$real_estate_hub_tp_theme_css .='display:block;';
$real_estate_hub_tp_theme_css .='} }';
}else if($real_estate_hub_return_to_header_mob == false){
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px){';
$real_estate_hub_tp_theme_css .='.return-to-header{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} }';
}

//slider mobile	
$real_estate_hub_slider_buttom_mob = get_theme_mod( 'real_estate_hub_slider_buttom_mob',true);
if($real_estate_hub_slider_buttom_mob == true && get_theme_mod( 'real_estate_hub_slider_button',true) != true){
$real_estate_hub_tp_theme_css .='#slider .more-btn{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} ';
}
if($real_estate_hub_slider_buttom_mob == true){
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px) {';
$real_estate_hub_tp_theme_css .='#slider .more-btn{';
	$real_estate_hub_tp_theme_css .='display:block;';
$real_estate_hub_tp_theme_css .='} }';
}else if($real_estate_hub_slider_buttom_mob == false){
$real_estate_hub_tp_theme_css .='@media screen and (max-width:575px){';
$real_estate_hub_tp_theme_css .='#slider .more-btn{';
	$real_estate_hub_tp_theme_css .='display:none;';
$real_estate_hub_tp_theme_css .='} }';
}

//footer image
$real_estate_hub_footer_widget_image = get_theme_mod('real_estate_hub_footer_widget_image');
if($real_estate_hub_footer_widget_image != false){
$real_estate_hub_tp_theme_css .='#footer{';
	$real_estate_hub_tp_theme_css .='background: url('.esc_attr($real_estate_hub_footer_widget_image).');';
$real_estate_hub_tp_theme_css .='}';
}

// related product
$real_estate_hub_related_product = get_theme_mod('real_estate_hub_related_product',true);
if($real_estate_hub_related_product == false){
$real_estate_hub_tp_theme_css .='.related.products{';
	$real_estate_hub_tp_theme_css .='display: none;';
$real_estate_hub_tp_theme_css .='}';
}

//menu font size
$real_estate_hub_menu_font_size = get_theme_mod('real_estate_hub_menu_font_size', 12);{
$real_estate_hub_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$real_estate_hub_tp_theme_css .='font-size: '.esc_attr($real_estate_hub_menu_font_size).'px;';
$real_estate_hub_tp_theme_css .='}';
}

// menu text tranform
$real_estate_hub_menu_text_tranform = get_theme_mod( 'real_estate_hub_menu_text_tranform','Uppercase');
if($real_estate_hub_menu_text_tranform == 'Uppercase'){
$real_estate_hub_tp_theme_css .='.main-navigation a {';
	$real_estate_hub_tp_theme_css .='text-transform: uppercase;';
$real_estate_hub_tp_theme_css .='}';
}else if($real_estate_hub_menu_text_tranform == 'Lowercase'){
$real_estate_hub_tp_theme_css .='.main-navigation a {';
	$real_estate_hub_tp_theme_css .='text-transform: lowercase;';
$real_estate_hub_tp_theme_css .='}';
}
else if($real_estate_hub_menu_text_tranform == 'Capitalize'){
$real_estate_hub_tp_theme_css .='.main-navigation a {';
	$real_estate_hub_tp_theme_css .='text-transform: capitalize;';
$real_estate_hub_tp_theme_css .='}';
}
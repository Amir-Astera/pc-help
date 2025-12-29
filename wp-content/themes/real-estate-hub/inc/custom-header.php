<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses real_estate_hub_header_style()
 */
function real_estate_hub_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'real_estate_hub_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'			 => true,
		'flex-height'			 => true,
		'wp-head-callback'       => 'real_estate_hub_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'real_estate_hub_custom_header_setup' );

if ( ! function_exists( 'real_estate_hub_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see real_estate_hub_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'real_estate_hub_header_style' );
function real_estate_hub_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$real_estate_hub_custom_css = "
        .headerbox,.header-img{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
			background-size: cover !important;
		}";
	   	wp_add_inline_style( 'real-estate-hub-style', $real_estate_hub_custom_css );
	endif;
}
endif;

<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$it_bg_img = $section_bg_color = $equal_height = $extra_id = $content_placement = $gap = $bg_image_repeat = $parallax_bg = $parallax_check = $bg_image_position = $bg_image_attachment = $bg_overlay = $overlay_opacity = $video_mp4 = $video_poster = $video_webm = $video_ogv = $overlay_color = $bg_cover = $font_color = $row_padd = $css = $el_class = $full_height = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$output = $after_output = $video_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$cl = $bgCov = $bg = $color = $bg_col = $style = $para = $par_data = $id = '';

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

if(! empty( $full_content )){
    $cl = '-fluid'; 
}
if($font_color != ''){
    $color = ';color:'.$font_color;
}
if($parallax_check == '1'){
    $para = ' parallax';
    $par_data = ' data-stellar-background-ratio="0.4"';
}

if($it_bg_img != ''){
    $bg = 'background: url('.$it_bg_img.') '.$bg_image_repeat.' '.$bg_image_attachment.' '. $bg_image_position;
}

if($section_bg_color != ''){
    $bg_col = 'background-color: '.$section_bg_color.';';
} 

if($bg_cover == '1' && $it_bg_img){
    $bgCov = ';background-size:cover';
}

if(!$section_bg_color && !$it_bg_img && !$font_color){
    $style = '';
}else{
    $style = ' style="'.$bg_col.$bg . $bgCov.$color.'"';    
}

if($extra_id != ''){
    $id = 'id="'.$extra_id.'"';    
}
$zind = '';
if($bg_overlay == '1'){
    $zind = ' top-zindex';
} 

if($video_mp4 != '' || $video_webm != '' || $video_ogv != ''){
    $video_class = 'section-video';
}

$css_classes = array(
    $para,
    $row_padd,
    $el_class,
    $video_class,
    vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ( 'stretch_row_content' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
    $css_classes[] = ' vc_row-o-full-height';
    if ( ! empty( $content_placement ) ) {
        $css_classes[] = ' vc_row-o-content-' . $content_placement;
    }
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_image = $video_bg_url;
    $css_classes[] = ' vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
    wp_enqueue_script( 'vc_jquery_skrollr_js' );
    $wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
    if ( strpos( $parallax, 'fade' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif ( strpos( $parallax, 'fixed' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}

if ( ! empty ( $parallax_image ) ) {
    if ( $has_video_bg ) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
        $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
        if ( ! empty( $parallax_image_src[0] ) ) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
$row_class= ' vc_row';
if ( ! empty( $equal_height ) ) {
    $flex_row = true;
    $row_class .= ' vc_row-o-equal-height';
}

if (!empty($gap)) {
    $row_class .= ' vc_column-gap-'.$gap;
}
if ( ! empty( $content_placement ) ) {
    $flex_row = true;
    $row_class .= ' vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
    $row_class .= ' vc_row-flex';
}

if ( ! empty( $content_placement ) ) {
    $flex_row = true;
    $css_classes[] = ' content-' . $content_placement;
}
if ( ! $parallax && $has_video_bg ) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' '.$id.' '.$style.$par_data.'>';
    if($it_bg_img != '' && $bg_overlay == '1'){
        $output .= '<div class="parallax-overlay" style="background-color:'.esc_attr($overlay_color).';opacity:'.esc_attr($overlay_opacity).'"></div>';
    }
    $output .= '<div class="container'.$cl.''.$zind.'">';
        $output .= '<div class="row'.$row_class.'">'; 
            $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div>';
    $output .= '</div>';
    if($video_mp4 != '' || $video_webm != '' || $video_ogv != ''){
        $output .='<div class="video-wrap"><video poster="'.$video_poster.'" preload="auto" loop autoplay muted>
                    <source src="'.$video_mp4.'" type="video/mp4" />
                    <source src="'.$video_webm.'" type="video/webm" />
                    <source src="'.$video_ogv.'" type="video/webm" />
                </video>';
        if($bg_overlay == '1'){
            $output .= '<div class="parallax-overlay" style="background-color:'.esc_attr($overlay_color).';opacity:'.esc_attr($overlay_opacity).'"></div>';
        }  
        $output .= '</div>';
    }
$output .= '</div>';
$output .= $after_output;

echo $output;
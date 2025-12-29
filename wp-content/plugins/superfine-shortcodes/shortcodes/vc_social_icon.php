<?php
function it_social_icon_shortcode($atts, $content=null){
     
    extract(shortcode_atts( array(
       'icon_size'              => '',
       'icon_title'             => '',
       'icon_link'              => '',
       'icon_type'              => 'fontawesome',
       'icon_fontawesome'       => 'fa fa-info-circle',
       'icon_openiconic'        => '',
       'icon_typicons'          => '',
       'icon_entypo'            => '',
       'icon_linecons'          => '',
       'icon_pixelicons'        => '',
       'icon_color'             => '',
       'icon_bg_color'          => '',
       'icon_tooltip'           => '',
       'use_icon'               => '1',
       'icon_shape'             => 'shape',
    ), $atts));
  $ttip = '';
  
  $iconClass = '';
  
  if($use_icon == '1'){
      vc_icon_element_fonts_enqueue( $icon_type );
      $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
  } 
  
  $bg = 'dark-bg ';
  $col = 'white ';
  $styl = '';
  $bg_col = '';
  $col_col = '';
  
  if($icon_bg_color != ''){
      $bg = '';
      $bg_col = 'background-color:'.$icon_bg_color.';';
  }
  if($icon_color != ''){
      $col = '';
      $col_col = 'color:'.$icon_color;
  }
  
  if($icon_bg_color != '' || $icon_color != ''){
      $styl = ' style="'.$bg_col.$col_col.'"';
  }
  
  if($icon_tooltip == '1'){
      $ttip = ' data-toggle="tooltip" data-placement="top" data-original-title="'.$icon_title.'"';
  }
  
  $output = '<li>';
    $output .= '<a '.$ttip.' href="'.$icon_link.'" class="'.$bg.''.$iconClass.' '.$icon_size.' '.$icon_shape.'"'.$styl.'></a>';
  $output .= '</li>';
  
  return $output;
  
}                                               
add_shortcode('it_social_icon', 'it_social_icon_shortcode');
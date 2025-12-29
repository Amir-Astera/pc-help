<?php
function it_fun_staff_shortcode($atts, $content=null){
    global $staff_row_style;
    extract(shortcode_atts( array(
    'item_title'    => '',
    'el_class' => '',
    'item_value'    => '',
    'icon_type'                 => 'fontawesome',
    'icon_fontawesome'          => 'fa fa-info-circle',
    'icon_openiconic'           => '',
    'icon_typicons'             => '',
    'icon_entypo'               => '',
    'icon_linecons'             => '',
    'icon_pixelicons'           => '',
    'icon_size'                 => '35px',
    'icon_style'                => 'circle',
    'dimensions'                => '150',
    'width'                     => '10',
    'bordersize'                => '20',
    'type'                      => 'full',
    'fg_color'                  => '#ddd',
    'bg_color'                  => 'transparent',
    'fill'                      => 'transparent',
    'icon_color'                => '',
    'circle_value'              => '90',
    'has_counter'               => '',
    'icon_shape'                => 'shape',
    'shape_color'               => '',
    'shape_style'               => 'filled',
    'shape_icon_color'          => '',
    'value_color'               => '',
    'title_color'               => '',
    'use_icon'                  => '1'
    ), $atts));
    
    $output = $fun_number = $iconClass = $tcol = $vcol = $isize = $sstyle = $s_bgcol = $icol = '';    
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    if($title_color != ''){
        $tcol = " style='color:".$title_color."'";
    }
    
    if($value_color != ''){
        $vcol = " style='color:".$value_color."'";
    }
    
    if($icon_size != ''){
        $isize = " style='font-size:".$icon_size."'";
    }
    
    if($shape_icon_color != ''){
        $icol = ";color:".$shape_icon_color;
    }
    if($shape_style == 'outlined'){
        if($shape_color != ''){
            $s_bgcol = "border-color:".$shape_color;
        } 
    }else {
        $s_bgcol = "background-color:".$shape_color;
    }
    
    if($shape_color != '' || $shape_icon_color != ''){
        $sstyle = ' style="'.$s_bgcol.$icol.'"';
    }
    
    if($has_counter == '1'){
        $fun_number = '<div class="fun-number t-center odometer" data-initial="0" data-value="'.esc_js($item_value).'" data-timer="500"'.$vcol.'></div>';
    } else{
        $fun_number = '<div class="fun-number t-center"'.$vcol.'>'.esc_js($item_value).'</div>';
    }
      $output .='<div class="fun-cell '.$el_class.'">';
          
          if($icon_style == 'circle'){
              if($type == 'full'){
                  $output .= '<div class="c-chart bottom-txt" data-dimension="'.$dimensions.'" data-text="" data-info="" data-icon="'.$iconClass.'" data-iconsize="'.$icon_size.'" data-iconcolor="'.$icon_color.'" data-info="" data-width="'.$width.'" data-fontsize="30" data-percent="'.$circle_value.'" data-fgcolor="'.$fg_color.'" data-bgcolor="'.$bg_color.'" data-fill="'.$fill.'" data-type="'.$type.'"></div>';
                  $output .= '<span'.$vcol.'>'.$fun_number.'</span>';
                  $output .= '<div class="fun-info t-center"'.$tcol.'>'.esc_html($item_title).'</div>';
              }else if($type == 'half'){
                  $output .= '<div class="c-chart" data-dimension="'.$dimensions.'" data-text="'.esc_js($item_value).'" data-info="'.esc_html($item_title).'" data-icon="'.$iconClass.'" data-iconsize="'.$icon_size.'" data-iconcolor="'.$icon_color.'" data-info="" data-width="'.$width.'" data-fontsize="" data-percent="'.$circle_value.'" data-fgcolor="'.$fg_color.'" data-bgcolor="'.$bg_color.'" data-fill="'.$fill.'" data-type="'.$type.'"></div>';
              }
              
              
              
          } else if($icon_style == 'shape'){
              $output .= '<div class="'.$icon_shape.' '.$shape_style.' fun-icon lg-icon"'.$sstyle.'><i class="'.$iconClass.'"'.$isize.'></i></div>';
              $output .= '<span'.$vcol.'>'.$fun_number.'</span>';
              $output .= '<div class="fun-info t-center"'.$tcol.'>'.esc_html($item_title).'</div>';
          }
          
      $output .= '</div>';
    return $output; 
 
}
add_shortcode('it_fun_staff', 'it_fun_staff_shortcode');
<?php
function it_counter_shortcode($atts, $content=null){

    extract(shortcode_atts( array(
    'item_title'                => '',
    'item_value'                => '1000',  
    'icon_type'                 => 'fontawesome',
    'icon_fontawesome'          => 'fa fa-info-circle',
    'icon_openiconic'           => '',
    'icon_typicons'             => '',
    'icon_entypo'               => '',
    'icon_linecons'             => '',
    'icon_pixelicons'           => '',
    'init_value'                => '0',
    'item_timer'                => '0',
    'el_class'                  => '',
    'numbers_color'             => '',
    'numbers_size'              => '',
    'title_color'               => '',
    'title_size'                => '',
    'icon_color'                => '',
    'icon_size'                 => '',
    'text'                      => '',
    'bx_bg_color'               => '',
    'desc_color'                => '',
    'use_icon'                  => '1',
    'counter_shape'             => 'shape',
    'it_animation'              => '',
    'delay'                     => '',
    'duration'                  => '',
    ), $atts));
    
    $fx = $anim = $data_anim = $data_dur = $data_del = '';
    
    if($it_animation != ''){
        $fx = ' fx';
        $anim = $it_animation;
    }
    if($anim != ''){$data_anim = ' data-animate="'.esc_js($anim).'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    $col = $size = $num_col = $num_size  = $icon_col = $ic_size = '';
    
    if($title_color != ''){
       $col = 'color:'.$title_color; 
    }
    if($title_size != ''){
       $size = ';font-size:'.$title_size; 
    }
    if(!$title_color && !$title_size){
        $style = '';
    }else{
        $style = ' style="'.$col.$size.'"';    
    }
    
    if($numbers_color != ''){
       $num_col = 'color:'.$numbers_color; 
    }
    if($numbers_size != ''){
       $num_size = ';font-size:'.$numbers_size; 
    }
    if(!$numbers_color && !$numbers_size){
        $style2 = '';
    }else{
        $style2 = ' style="'.$num_col.$num_size.'"';    
    }
    
    if($icon_color != ''){
       $icon_col = 'color:'.$icon_color; 
    }
    if($icon_size != ''){
       $ic_size = ';font-size:'.$icon_size; 
    }
    if(!$icon_color && !$icon_size){
        $style3 = '';
    }else{
        $style3 = ' style="'.$icon_col.$ic_size.'"';    
    }
    
    
      $output = '<div class="fun lg '.$el_class.' '.$counter_shape.''.$fx.'" '.$data_anim.$data_del.$data_dur.' style="background-color:'.$bx_bg_color.'">';
        $output .= '<div class="fun-icon main-color">';
            $output .= '<i class="'.$iconClass.'"'.$style3.'></i>';
        $output .= '</div>';
        $output .= '<div class="odometer fun-number bolder t-center" data-value="'.esc_js($item_value).'" data-timer="'.esc_js($item_timer).'"'.$style2.'>';
            $output .= $init_value;
        $output .= '</div>';
        
        if($item_title != ''){
            $output .= '<div class="fun-info t-center"'.$style.'>';
                $output .= esc_html($item_title);
            $output .= '</div>';
        }
        if($text != ''){
            $output .= '<p class="margin-top-20 t-center margin-bottom-0" style="color:'.$desc_color.'">'.esc_html($text).'</p>';
        }  
      $output .= '</div>';
          
    return $output; 
 
}
add_shortcode('it_counter', 'it_counter_shortcode');






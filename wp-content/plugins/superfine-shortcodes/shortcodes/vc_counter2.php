<?php
function it_counter2_shortcode($atts, $content=null){

    extract(shortcode_atts( array(
    'title_before'    => '',
    'item_value'      => '1000',
    'title_after'     => '',
    'text_color'      => '',
    'text_size'       => '',
    'init_value'      => '0',
    'item_timer'      => '0',
    'numbers_color'   => '',
    'numbers_size'    => '',
    'el_class'        => '',
    'it_animation'    => '',
    'delay'           => '',
    'duration'        => '',
    ), $atts));
    $fx = $anim = $data_anim = $data_dur = $data_del = $col = $size = $num_col = $num_size = '';
    
    if($it_animation != ''){
        $fx = ' fx';
        $anim = $it_animation;
    }
    if($anim != ''){$data_anim = ' data-animate="'.esc_js($anim).'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
    
    if($text_color != ''){
       $col = 'color:'.$text_color; 
    }
    if($text_size != ''){
       $size = ';font-size:'.$text_size; 
    }
    if(!$text_color && !$text_size){
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
        $output = '<div class="counter counter2 '.$el_class.''.$fx.'"'.$style.' '.$data_anim.$data_del.$data_dur.'>';
            $output .= '<span class="text_before">'.esc_html($title_before).' </span>';
            $output .= '<span class="odometer counter-num inline-num" data-value="'.esc_js($item_value).'" data-timer="'.esc_js($item_timer).'"'.$style2.'>';
                $output .= $init_value;
            $output .= '</span> ';
            $output .= ' <span class="text_after">'.esc_html($title_after).'</span>';  
        $output .= '</div>';  
    return $output; 
 
}
add_shortcode('it_counter2', 'it_counter2_shortcode');






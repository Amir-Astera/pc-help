<?php
function it_divider_shortcode($atts, $content=null){

    extract(shortcode_atts( array(
    'divider_class'          => '1',
    'el_class'               => '',
    'it_animation'           => '',
    'delay'                  => '',
    'duration'               => '',
    'icon_type'              => 'fontawesome',
    'icon_fontawesome'       => 'fa fa-info-circle',
    'icon_openiconic'        => '',
    'icon_typicons'          => '',
    'icon_entypo'            => '',
    'icon_linecons'          => '',
    'icon_pixelicons'        => '',
    'use_icon'               => '1',
    'div_i_color'            => '',
    'div_bg_color'           => '',
    ), $atts));
    
    $icol = $bcol = $istyle = '';
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    if($div_i_color != ''){
        $icol = ";color:".$div_i_color;
    }
    
    if($div_bg_color != ''){
        $bcol = "background-color:".$div_bg_color;
    }
    
    if($div_i_color != '' || $div_bg_color != ''){
        $istyle = ' style="'.$bcol.$icol.'"';
    }
    
    $fx = null;
    $anim = null;
    $data_anim=null;
    $data_dur=null;
    $data_del=null;
    if($it_animation != ''){
        $fx = ' fx';
        $anim = $it_animation;
    }
    if($anim != ''){$data_anim = ' data-animate="'.$anim.'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.$duration.'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.$delay.'"';}
    
    if($divider_class == '1'){
         $output = '<div class="divider centered short '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'"><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '2'){
         $output = '<div class="divider centered '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '3'){
         $output = '<div class="divider centered bg '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '4'){
         $output = '<div class="divider centered bordered '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '5'){
         $output = '<div class="divider lft short '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '6'){
         $output = '<div class="divider lft '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '7'){
         $output = '<div class="divider lft bg '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '8'){
         $output = '<div class="divider lft bordered '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '9'){
         $output = '<div class="divider rit short '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '10'){
         $output = '<div class="divider rit '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '11'){
         $output = '<div class="divider rit bg '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '12'){
         $output = '<div class="divider rit bordered '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="'.$iconClass.'"'.$istyle.'></i></div>';
    }else if($divider_class == '13'){
         $output = '<div class="divider centered short two '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="fa fa-scissors flipped"></i><i class="fa fa-scissors"></i></div>';
    }else if($divider_class == '14'){
         $output = '<div class="divider centered short '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.'><i class="fa fa-chevron-up to-top"></i></div>';
    }
    
    
    return $output; 
 
}
add_shortcode('it_divider', 'it_divider_shortcode');
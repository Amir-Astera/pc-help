<?php 
function it_heading_shortcode($atts, $content=null){

    global $allowedposttags;
    extract(shortcode_atts( array(
        'text'              => '',
        'sub_text'          => '',
        'it_animation'      => '',
        'el_class'          => '',
        'delay'             => '',
        'duration'          => '',
        'upper'             => '0',
        'sub_head_color'    => '',
        'filter'            => true,
        'icon_type'         => 'fontawesome',
        'icon_fontawesome'  => 'fa fa-info-circle',
        'icon_openiconic'   => '',
        'icon_typicons'     => '',
        'icon_entypo'       => '',
        'icon_linecons'     => '',
        'icon_pixelicons'   => '',
        'heading_style'     => 'style1',
        'head_txt_color'    => '',
        'extrabold'         => '',
        'use_icon'          => '',
        'head_upper'        => '',
        'head_size'         => '',
        'sub_size'          => '',
        'head_extrabold'    => '',
        'icon_color'        => ''
    ), $atts));
    
    $output = $fx = $anim = $data_anim = $data_dur = $data_del = $sty = $ssize = $hsize = $up = $hcol = $txt_up = $txt_hcol = $txt_hbold = $style = $txt_style = $icon = $hbold = $iconClass = $icol = '';
    
    if($it_animation != ''){
        $fx = ' fx';
        $anim = $it_animation;
    }
    
    if($upper == '1'){
        $up = 'text-transform:uppercase';
    }
    
    if($sub_head_color != ''){
        $hcol = ";color:$sub_head_color";
    }
    
    if($sub_size != ''){
        $ssize = ";font-size:$sub_size";
    }
    
    if($extrabold != ''){
        $hbold = ";font-weight:$extrabold";
    }
    
    if($head_upper == '1'){
        $txt_up = 'text-transform:uppercase';
    }
    
    if($head_size != ''){
        $hsize = ";font-size:$head_size";
    }
    
    if($head_txt_color != ''){
        $txt_hcol = ";color:$head_txt_color";
    }
    
    if($head_extrabold != ''){
        $txt_hbold = ";font-weight:$head_extrabold";
    }
    
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
        if($icon_color != ''){
            $icol = " style='color:".$icon_color."'";
        }
    }
    
    if($upper == '1' || $sub_head_color != '' || $extrabold != '' || $ssize != ''){
        $style = ' style="'.$up.$ssize.$hcol.$hbold.'"';
    }
    
    if($head_upper == '1' || $head_txt_color != '' || $head_extrabold != '' || $hsize != ''){
        $txt_style = ' style="'.$txt_up.$hsize.$txt_hcol.$txt_hbold.'"';
    }
    
    if($anim != ''){$data_anim = ' data-animate="'.esc_js($anim).'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
    
    if($heading_style == 'style1'){
        $output .= '<div class="heading full-heading alter-gry '.$el_class.'">';
    }else if($heading_style == 'style2'){
        $output .= '<div class="heading main-heading centered '.$el_class.'">';
    }else if($heading_style == 'style3'){
        $output .= '<div class="heading centered head-1 '.$el_class.'">';
    }else if($heading_style == 'style4'){
        $output .= '<div class="heading centered head-2 '.$el_class.'">';
    }else if($heading_style == 'style5'){
        $output .= '<div class="heading centered head-3 '.$el_class.'">';
    }else if($heading_style == 'style6'){
        $output .= '<div class="heading centered head-4 '.$el_class.'">';
    }else if($heading_style == 'style7'){
        $output .= '<div class="heading side-head head-5 '.$el_class.'">';
    }else if($heading_style == 'style8'){
        $output .= '<div class="heading side-head head-6 '.$el_class.'">';
    }else if($heading_style == 'style9'){
        $output .= '<div class="heading side-head head-7 main-border '.$el_class.'">';
    }else if($heading_style == 'style10'){
        $output .= '<div class="heading side-head head-8 '.$el_class.'">';
    }else if($heading_style == 'side_head'){
        $output .= '<div class="heading sub-head '.$el_class.'">';
    }
    
    if($heading_style == 'style1' || $heading_style == 'style2' || $heading_style == 'style3' || $heading_style == 'style4' || $heading_style == 'style5' || $heading_style == 'style6'){
        if($use_icon != '' && $heading_style != 'style3' ){
            $output .= '<i class="'.$iconClass.' main-color"'.$icol.'></i>';
        }
        if( $text != ''){
            if($heading_style == 'style4'){
                $output .= '<i class="tbl top-bord main-bg"></i>';
            }
            $output .= '<h3 class="'.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.$txt_style.'>';
            $output .= wp_kses($text,$allowedposttags,null);
            if($heading_style == 'style6'){
                $output .= '</span>';
            }
            $output .= '</h3>';
        }
        
        if( $content != ''){
            if($heading_style == 'style4'){
                $output .= '<b class="lft fa fa-circle-o"></b>';
            }
            $output .= '<h4 class="sub-title" '.$style.'>';
            $output .= wp_kses($content,$allowedposttags,null);
            if($heading_style == 'style4'){
                $output .= '<b class="rit fa fa-circle-o"></b>';
            }
            $output .= '</h4>';
        }
        
        if($heading_style == 'style2'){
            $output .= '<div class="heading-separator"><span class="main-bg"></span><span class="dark-bg"></span></div>';
        }else if($heading_style == 'style3'){
            $output .= '<b class="'.$iconClass.' main-color"'.$icol.'></b>';
        }else if($heading_style == 'style5'){
            $output .= '<b class="main-bg hexa"></b>';
        }
        
    }
    
    if( $heading_style == 'style7' || $heading_style == 'style8' || $heading_style == 'style9' || $heading_style == 'style10'){
        
        if($content){            
            $output .= '<h4 class="'.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.$style.'>';
            if($heading_style == 'style9'){
                $output .= '<span class="main-bg">';
            }
            if($use_icon != ''){
                $output .= '<i class="'.$iconClass.'"'.$icol.'></i>';
            }
            $output .= wp_kses($content,$allowedposttags,null);
            if($heading_style == 'style9'){
                $output .= '</span>';
            }
            $output .= '</h4>';
        }
    }
    
    if( $heading_style == 'side_head'){
        
        if($content){
            $output .= '<h3 class="head-4 '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.$style.'>';
            if($heading_style == 'style9'){
                $output .= '<span class="main-bg">';
            }
            if($use_icon != ''){
                $output .= '<i class="'.$iconClass.'"'.$icol.'></i>';
            }
            $output .= wp_kses($content,$allowedposttags,null);
            if($heading_style == 'style9'){
                $output .= '</span>';
            }
            $output .= '</h3>';
        }else{
            $output .= '<h3 class="head-4 '.$el_class.''.$fx.'" '.$data_anim.$data_del.$data_dur.$style.'>';
            if($heading_style == 'style9'){
                $output .= '<span class="main-bg">';
            }
            if($use_icon != ''){
                $output .= '<i class="'.$iconClass.'"'.$icol.'></i>';
            }
            $output .= wp_kses($text,$allowedposttags,null);
            if($heading_style == 'style9'){
                $output .= '</span>';
            }
            $output .= '</h3>';
        }
    }
    
    
    $output .='</div>';
    return $output; 
 
}
add_shortcode('it_heading', 'it_heading_shortcode');
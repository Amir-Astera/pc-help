<?php
function it_iconbox_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'iconbox_style'             => '1',
        'icon_type'                 => 'fontawesome',
        'icon_fontawesome'          => 'fa fa-info-circle',
        'icon_openiconic'           => '',
        'icon_typicons'             => '',
        'icon_entypo'               => '',
        'icon_linecons'             => '',
        'icon_pixelicons'           => '',
        'iconbox_title'             => esc_html__( 'Icon Box Title', 'js_composer' ),
        'it_animation'              => '',
        'filter'                    => true,
        'delay'                     => '',
        'duration'                  => '',
        'iconbox_more'              => '',
        'show_more'                 => '',
        'icon_text'                 => '',
        'iconbox_more_text'         => 'Read More',
        'icon_bg_style'             => 'filled',
        'icon_box_shape'            => 'new-angle',
        'iconbox_title_color'       => '',
        'iconbox_icon_color'        => '',
        'iconbox_icon_bg_color'     => '',
        'iconbox_button_color'      => '',
        'iconbox_button_bg_color'   => '',
        'use_icon'                  => '1'
    ), $atts));
        
    $fx = $anim = $data_anim = $data_dur = $data_del= $iconClass = $icol = $tcol = $istyle = $i_bgcol = $mstyle = '';
    
    if($iconbox_icon_color != ''){
        $icol = ";color:".$iconbox_icon_color;
    }
    
    if($iconbox_icon_bg_color != ''){
        if($icon_bg_style == 'filled'){
            $i_bgcol = "background-color:".$iconbox_icon_bg_color;
        } else if($icon_bg_style == 'outlined'){
            $i_bgcol = "border-color:".$iconbox_icon_bg_color;
        }
        
    }
    
    if($iconbox_title_color != ''){
        $tcol = " style='color:".$iconbox_title_color."'";
    }
    
    if($iconbox_icon_color != '' || $iconbox_icon_bg_color != ''){
        $istyle = ' style="'.$i_bgcol.$icol.'"';
    }
    
    if($it_animation != ''){
        $fx = ' fx';
        $anim = $it_animation;
    }
    if($use_icon == '1'){
        vc_icon_element_fonts_enqueue( $icon_type );
        $iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';
    }
    
    $ic_txt = '';
    if($icon_text != ''){
        $iconClass = '';
        $ic_txt = '<span>'.$icon_text.'</span>';
    }
    
    if($iconbox_button_color != '' || $iconbox_button_color != ''){
        $mstyle = 'style="border-color:'.$iconbox_button_bg_color.';color:'.$iconbox_button_color.'"';
    }
    
    if($anim != ''){$data_anim = ' data-animate="'.esc_js($anim).'"';}
    if($duration != ''){$data_dur = ' data-animation-duration="'.esc_js($duration).'"';}
    if($delay != ''){$data_del = ' data-animation-delay="'.esc_js($delay).'"';}
    if($iconbox_style == "1"){
      $output  = '<div class="icons-style-1'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
          $output .= '<i class="animat-icon '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
          $output .= '<h3 class="bold uppercase heading"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
          $output .= '<p>'.wp_kses($content,$allowedposttags,null).'</p>';
          if($show_more == '1'){
               $output .= '<a class="btn btn-grey shape" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
          }
      $output .= '</div>';
   }else if($iconbox_style == "2"){
      $output  = '<div class="icons-style-2'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
          $output .= '<i class="'.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
          $output .= '<h3 class="bold uppercase heading"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
          $output .= '<p>'.wp_kses($content,$allowedposttags,null).'</p>';
          if($show_more == '1'){
               $output .= '<a class="btn btn-grey shape" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
          }
      $output .= '</div>';
   }else if($iconbox_style == "3"){
      $output  = '<div class="icon-box box-1'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
          $output .= '<div class="block-icon '.$icon_bg_style.' lg-icon">';
            $output .= '<i class="'.$iconClass.' '.$icon_box_shape.'"'.$istyle.'>'.$ic_txt.'</i>';
          $output .= '</div>';
              $output .= '<h3 class="t-center"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
              $output .= '<p class="t-center">'.wp_kses($content,$allowedposttags,null).'</p>';
              if($show_more == '1'){
                   $output .= '<a class="center-more btn btn-grey shape" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
              }
              $output .= '</p>';
      $output .= '</div>';
   }else if($iconbox_style == "4"){
      $output  = '<div class="icon-box box-1 bordered'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
          $output .= '<div class="inner">';
            $output .= '<div class="block-icon lg-icon transparent"><i class="'.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i></div>';
            $output .= '<h3 class="t-center"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
            $output .= '<p class="t-center">'.wp_kses($content,$allowedposttags,null);
              if($show_more == '1'){
                   $output .= '<a class="center-more btn btn-grey shape" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
              }
            $output .= '</p>';
          $output .= '</div>';
      $output .= '</div>';
   }else if($iconbox_style == "5"){
      $output  = '<div class="icon-box gry-border-1 shape'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
          $output .= '<div class="block-icon filled md-icon">';
            $output .= '<i class="main-bg shape '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
          $output .= '</div>';
              $output .= '<h3 class="t-center bottom_half_border"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
              $output .= '<p class="t-center">'.wp_kses($content,$allowedposttags,null);
              if($show_more == '1'){
                   $output .= '<a class="center-more btn btn-grey shape" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
              }
              $output .= '</p>';
      $output .= '</div>';
   }else if($iconbox_style == "6"){
      $output  = '<div class="icon-box gry-border-2 shape'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
        $output .= '<h3 class="t-center head-bg"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
      
        $output .= '<div class="block-icon">';
            $output .= '<i class="main-color '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
        $output .= '</div>';
        
        $output .= '<p class="t-center icon-desc">'.wp_kses($content,$allowedposttags,null);
            if($show_more == '1'){
                   $output .= '<a class="center-more btn btn-grey shape" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
              }
        $output .= '</p>';
      
      $output .= '</div>';
   }else if($iconbox_style == "7"){
      $output   = '<div class="icon-box-small'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
        $output .= '<i class="main-color no-after '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
        $output .= '<h3 class="bold uppercase"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
        $output .= '<p>'.wp_kses($content,$allowedposttags,null);
            if($show_more == '1'){
                $output .= '<a class="r-more main-color" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
            }
        $output .= '</p>';
      $output .= '</div>'; 
   }else if($iconbox_style == "8"){
      $output   = '<div class="icon-box-small'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
        $output .= '<i class="main-bg shape md-icon '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
        $output .= '<div class="icon-sm-desc md-desc">';
            $output .= '<h4'.$tcol.'>'.esc_html($iconbox_title).'</h4>';
            $output .= '<p>'.wp_kses($content,$allowedposttags,null);
                if($show_more == '1'){
                    $output .= '<a class="r-more main-color" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
                }
            $output .= '</p>';
        $output .= '</div>';
      $output .= '</div>'; 
   }else if($iconbox_style == "9"){
      $output   = '<div class="icon-box-small padding-vertical-20'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
        $output .= '<i class="outlined shape main-border main-color '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
        $output .= '<div class="icon-sm-desc">';
            $output .= '<h3 class="bold uppercase"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
            $output .= '<p>'.wp_kses($content,$allowedposttags,null);
                if($show_more == '1'){
                    $output .= '<a class="r-more main-color" href="'.esc_url($iconbox_more).'"'.$mstyle.'>'.esc_attr($iconbox_more_text).'</a>';
                }
            $output .= '</p>';
        $output .= '</div>';
      $output .= '</div>'; 
   }else if($iconbox_style == "10"){
      $output   = '<div class="icon-box-lg'.$fx.'" '.$data_anim.$data_del.$data_dur.'>';
        $output .= '<i class="f-left font-70 margin-top-30 '.$iconClass.'"'.$istyle.'>'.$ic_txt.'</i>';
        $output .= '<div class="margin-left-100">';
            $output .= '<h3 class="uppercase bold txt-shadow"'.$tcol.'>'.esc_html($iconbox_title).'</h3>';
            $output .= '<p class="txt-shadow">'.wp_kses($content,$allowedposttags,null).'</p>';
                if($show_more == '1'){
                    $output .= '<a class="btn btn-outlined shape"'.$mstyle.' href="'.esc_url($iconbox_more).'">'.esc_attr($iconbox_more_text).'</a>';
                }
        $output .= '</div>';
      $output .= '</div>'; 
   }
     
    return $output; 
 
}
add_shortcode('it_iconbox', 'it_iconbox_shortcode');

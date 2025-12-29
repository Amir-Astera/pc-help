<?php
function it_testimonial_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
        'author'        => '',
        'slogan'        => '',
        'image'         => '',
        'img_size'      => 'thumbnail',
        'el_class'      => ''
    ), $atts));
    
    global $block_style;
    
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size ) );
    
    $img_output = $img['thumbnail'];
      $output = '';
      
      if($block_style == "1"){
          
          $output .= '<div class="testimonials-bg main-bg">';
              $output .= '<div class="testimonials-img">'.$img_output.'</div>';
          
                $output .= '<div class="testimonials-name white">';
                    $output .= '<strong>'.esc_html($author).'</strong>';
                    $output .='<br><span class="alter-bg testo-pos">' .esc_html($slogan).'</span>';
                $output .= '</div>';
                $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
          $output .= '</div>';
          
      }else if($block_style == "2"){
          
          $output .= '<div class="'.$el_class.'">';
            $output .= '<div class="testimonials-img">'.$img_output.'</div>';
            $output .= '<div class="testimonials-name main-bg shape">';
                $output .= '<strong>'.esc_html($author).'</strong>: '.esc_html($slogan);
              $output .= '</div>';
            $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
          $output .= '</div>';
          
      }else if($block_style == "3"){
          
          $output .= '<div class="'.$el_class.'">';
              $output .= '<div>';
                  $output .= '<div class="testimonials-bg t-center shape lg">';
                      $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
                      $output .= '<div class="testimonials-name main-color"><strong>'.esc_html($author).'</strong><br><span class="dark-color block"> '.esc_html($slogan).'</span></div>';
                  $output .= '</div>';
                  $output .= '<div class="testimonials-img main-border">'.$img_output.'</div>';
              $output .= '</div>';
          $output .= '</div>';
          
      }else if($block_style == "4"){
          
          $output .= '<div class="'.$el_class.'">';
              $output .= '<div>';
                  $output .= '<div class="testimonials-bg white shape lg">';
                      $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
                  $output .= '</div>';
                  $output .= '<div class="testimonials-img main-border">'.$img_output.'</div>';
                  $output .= '<div class="testimonials-name main-color"><strong>'.esc_html($author).'</strong><br><span class="white block"> '.esc_html($slogan).'</span></div>';
              $output .= '</div>';
          $output .= '</div>';
          
      }else if($block_style == "5"){
          
          $output .= '<div>';            
            $output .= '<blockquote class="bquote-3 shape '.$el_class.'">';
                  $output .= '<div class="testimonials-img">'.$img_output.'</div>';
                      $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
                  $output .= '<span class="t-center bottom"><b class="main-color">'.esc_html($author).'</b> - '.esc_html($slogan).'</span>';
            $output .= '</blockquote>';
          $output .= '</div>';
          
      }else if($block_style == "6"){
          
          $output .= '<div class="'.$el_class.'">';
              $output .= '<div>';
                  $output .= '<div class="testimonials-bg white shape">';
                      $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
                  $output .= '</div>';
                  $output .= '<div class="testimonials-img main-border">'.$img_output.'</div>';
                  $output .= '<div class="testimonials-name main-color"><strong>'.esc_html($author).'</strong><br><span class="dark-color block"> '.esc_html($slogan).'</span></div>';
              $output .= '</div>';
          $output .= '</div>';
          
      }else if($block_style == "7"){
          
          $output .= '<div>';            
            $output .= '<blockquote class="bquote-4 shape '.$el_class.'">';
                  $output .= '<div class="testimonials-img">'.$img_output.'</div>';
                      $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
                  $output .= '<span class="main-bg t-center"><b class="dark-color">'.esc_html($author).'</b> - '.esc_html($slogan).'</span>';
            $output .= '</blockquote>';
          $output .= '</div>';
          
      }else if($block_style == "simple"){
          
          $output .= '<div class="testimonials-bg '.$el_class.'">';            
                  $output .= '<div class="testimonials-img">'.$img_output.'</div>';
                  $output .= '<div class="text">'.wp_kses($content,$allowedposttags,null).'</div>';
                  $output .= '<div class="testimonials-name"><strong class="main-color">'.esc_html($author).'</strong><br><span class="testo-pos"> '.esc_html($slogan).'</span></div>';
          $output .= '</div>';
          
      }else if($block_style == "8"){
          $output .= '<div class="col-md-4">';
                $output .= '<div class="testimonials-bg"><div class="testimonials-img">'.$img_output.'</div>';
                $output .= '<div>'.wp_kses($content,$allowedposttags,null).'</div>';
           $output .= '</div>';
           
           $output .= '<div class="testimonials-name main-color"> <strong>'.esc_html($author).'</strong>: '.esc_html($slogan).'</div>';
                
          $output .= '</div>';
      }
    return $output; 
 
}
add_shortcode('it_testimonial', 'it_testimonial_shortcode');
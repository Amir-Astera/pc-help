<?php
function it_features_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
    'feature_title'         => '',
    'feature_link'          => '',
    'feature_style'         => '1',
    'feature_image'         => '',
    'show_more'             => '',
    'feature_more'          => '',
    'feature_more_text'     => '',
    'img_size'              => 'large',
    ), $atts));
    
    $img_id = preg_replace( '/[^\d]/', '', $feature_image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size ) );
    $img_output = $img['thumbnail'];
          $output = '';
          if($feature_style == "1"){
              $output .= '<div class="feature-img">';
                  $output .='<figure class="shape">';
                      $output .= $img_output;
                      if($show_more == '1'){
                          $output .='<a href="'.esc_url($feature_more).'" class="top-angle"><span>+</span></a>'; 
                      }
                  $output .= '</figure>';
                  $output .= '<div class="feature-details no-hover">';
                        $output .= '<h5 class="bold feature-head main-color">'.esc_html($feature_title).'</h5>';
                        $output .= wp_kses($content,$allowedposttags,null);
                    $output .= '</div>';
                  
              $output .= '</div>';
          }else if($feature_style == "2"){
              $output = '<div class="feature-img">';
                  $output .='<figure class="shape">';
                      $output .= $img_output;
                      if($show_more == '1'){
                           $output .='<a href="'.esc_url($feature_more).'" class="top-angle"><span>+</span></a>'; 
                      }
                  $output .= '</figure>';
                  $output .= '<div class="feature-details-hidden">';
                        $output .= '<h5 class="bold feature-head main-color">'.esc_html($feature_title).'</h5>';
                        $output .= wp_kses($content,$allowedposttags,null);
                    $output .= '</div>';
                  
              $output .= '</div>';
          }else if($feature_style == "3"){
              $output = '<div class="feature-img2 t-center">';
                  $output .='<figure class="shape lg">';
                      $output .= $img_output;
                      if($show_more == '1'){
                           $output .='<a href="'.esc_url($feature_more).'" class="shape"><span>+</span></a>'; 
                      }
                  $output .= '</figure>';
                  $output .= '<div class="feature-details2">';
                        $output .= '<h4 class="bold feature-head2 uppercase">'.esc_html($feature_title).'</h4>';
                        $output .= wp_kses($content,$allowedposttags,null);
                    $output .= '</div>';
                  
              $output .= '</div>';
          }
          
    return $output; 
 
}
add_shortcode('it_feature', 'it_features_shortcode');






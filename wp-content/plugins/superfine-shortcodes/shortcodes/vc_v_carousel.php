<?php 
function it_v_slide_shortcode($atts, $content=null){
    global $allowedposttags;
    extract(shortcode_atts( array(
    'slide_link'        => '',
    'slide_image'         => '',
    'img_size'      => 'large', 
    ), $atts));
    $output = '';
    $img_id = preg_replace( '/[^\d]/', '', $slide_image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'image_size' => $img_size ) );
    $img_output = $img['thumbnail'];
          $output .= '<div>';
          if($slide_image != ''){
              $output .= $img_output;
          }          
          $output .= wp_kses($content,$allowedposttags,null);
          $output .= '</div>'; 
          
          
          
    return $output; 
 
}
add_shortcode('it_v_slide', 'it_v_slide_shortcode');
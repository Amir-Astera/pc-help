<?php 
function it_camera_slide_shortcode($atts, $content=null){
    extract(shortcode_atts( array(
    'slide_title'           => '',
    'slide_link'            => '',
    'image'                 => '',
    'thumbnail'             => '',
    'd_fx'                    => '',
     
    ), $atts));
    
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img_src = wp_get_attachment_image_src( $img_id,'full' );
    
    $thumb_id = preg_replace( '/[^\d]/', '', $thumbnail );
    $thumb_src = wp_get_attachment_image_src( $thumb_id,'thumbnail' );
    
    
          
        $output = '<div data-thumb="'.$thumb_src[0].'" data-src="'.$img_src[0].'">';
            $output .= '<div class="camera_caption fadeFromBottom">';
                $output .= '<a href="'.esc_attr($slide_link).'">'.esc_attr($slide_title).'</a>';
            $output .= '</div>';
        $output .='</div>';          
          
          
    return $output; 
 
}
add_shortcode('it_camera_slide', 'it_camera_slide_shortcode');
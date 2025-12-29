<?php
function it_member_shortcode($atts, $content=null){

    extract(shortcode_atts( array(
    'member_name'       => '',
    'member_position'   => '',
    'member_details'    => '',
    'member_style'      => '1',
    'member_fb'         => '',
    'member_tw'         => '',
    'member_ln'         => '',
    'member_go'         => '',
    'member_sk'         => '',
    'image'             => '',
    'img_size'          => 'large',
    ), $atts));
    
    $img_id = preg_replace( '/[^\d]/', '', $image );
    $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size ) );
    $img_output = $img['thumbnail'];
          if($member_style == "1"){
              $output = '<div class="team-box box-1 shape lg">';
                  $output .='<div class="team-img">';
                      $output .= $img_output;
                  $output .= '</div>';
                  $output .= '<div class="team-details">';
                    $output .= '<h3 class="team-name">'.esc_html($member_name).'</h3>';
                    $output .= '<h5 class="team-pos main-color">'.esc_html($member_position).'</h5>';
                    $output .= '<p class="hidden">'.esc_html($member_details).'</p>';
                    $output .= '<ul class="social-list">';
                        if($member_fb !='')$output .='<li><a class="shape sm fa fa-facebook" href="'.esc_url($member_fb).'" title="facebook"></a></li>';
                        if($member_tw !='')$output .='<li><a class="shape sm fa fa-linkedin" href="'.esc_url($member_ln).'" title="linkedin"></a></li>';
                        if($member_ln !='')$output .='<li><a class="shape sm fa fa-skype" href="'.esc_url($member_sk).'" title="skype"></a></li>';
                        if($member_go !='')$output .='<li><a class="shape sm fa fa-twitter" href="'.esc_url($member_tw).'" title="twitter"></a></li>';
                        if($member_sk !='')$output .='<li><a class="shape sm fa fa-google-plus" href="'.esc_url($member_go).'" title="GooglePlus"></a></li>';
                    $output .= '</ul>';
                  $output .= '</div>';
              $output .= '</div>';
          }else if($member_style == "2"){
              $output = '<div class="team-box box-2 shape lg">';
                  $output .='<div class="team-img"><span></span>';
                      $output .= $img_output;
                      $output .= '<div class="box-socials"><ul class="social-list">';
                        if($member_fb !='')$output .='<li><a class="shape sm fa fa-facebook" href="'.esc_url($member_fb).'" title="facebook"></a></li>';
                        if($member_tw !='')$output .='<li><a class="shape sm fa fa-linkedin" href="'.esc_url($member_ln).'" title="linkedin"></a></li>';
                        if($member_ln !='')$output .='<li><a class="shape sm fa fa-skype" href="'.esc_url($member_sk).'" title="skype"></a></li>';
                        if($member_go !='')$output .='<li><a class="shape sm fa fa-twitter" href="'.esc_url($member_tw).'" title="twitter"></a></li>';
                        if($member_sk !='')$output .='<li><a class="shape sm fa fa-google-plus" href="'.esc_url($member_go).'" title="GooglePlus"></a></li>';
                    $output .= '</ul></div>';
                  $output .= '</div>';
                  
                  $output .= '<div class="team-details">';
                    $output .= '<h3 class="team-name">'.esc_html($member_name).'</h3>';
                    $output .= '<h5 class="team-pos main-color">'.esc_html($member_position).'</h5>';
                    $output .= '<p class="hidden">'.esc_html($member_details).'</p>';
                    
                  $output .= '</div>';
              $output .= '</div>';
          }else if($member_style == "3"){
              $output = '<div class="team-box box-3 shape lg">';
                  $output .='<div class="team-img"><span></span>';
                      $output .= $img_output;
                  $output .= '</div>';
                  $output .= '<div class="team-details main-bg">';
                    $output .= '<h3 class="team-name white">'.esc_html($member_name).'</h3>';
                    $output .= '<h5 class="team-pos white">'.esc_html($member_position).'</h5>';
                    $output .= '<p class="hidden">'.esc_html($member_details).'</p>';
                    $output .= '<ul class="social-list">';
                        if($member_fb !='')$output .='<li><a class="shape sm fa fa-facebook" href="'.esc_url($member_fb).'" title="facebook"></a></li>';
                        if($member_tw !='')$output .='<li><a class="shape sm fa fa-linkedin" href="'.esc_url($member_ln).'" title="linkedin"></a></li>';
                        if($member_ln !='')$output .='<li><a class="shape sm fa fa-skype" href="'.esc_url($member_sk).'" title="skype"></a></li>';
                        if($member_go !='')$output .='<li><a class="shape sm fa fa-twitter" href="'.esc_url($member_tw).'" title="twitter"></a></li>';
                        if($member_sk !='')$output .='<li><a class="shape sm fa fa-google-plus" href="'.esc_url($member_go).'" title="GooglePlus"></a></li>';
                    $output .= '</ul>';
                  $output .= '</div>';
              $output .= '</div>';
          }else if($member_style == "4"){
              $output = '<div class="team-box box-4 shape lg">';
                  $output .='<div class="team-img main-bg">';
                      $output .= $img_output;
                  $output .= '</div>';
                  $output .= '<div class="team-details main-bg">';
                    $output .= '<h3 class="team-name">'.esc_html($member_name).'</h3>';
                    $output .= '<h5 class="team-pos white">'.esc_html($member_position).'</h5>';
                    $output .= '<p>'.esc_html($member_details).'</p>';
                    $output .= '<ul class="social-list">';
                        if($member_fb !='')$output .='<li><a class="shape sm fa fa-facebook" href="'.esc_url($member_fb).'" title="facebook"></a></li>';
                        if($member_tw !='')$output .='<li><a class="shape sm fa fa-linkedin" href="'.esc_url($member_ln).'" title="linkedin"></a></li>';
                        if($member_ln !='')$output .='<li><a class="shape sm fa fa-skype" href="'.esc_url($member_sk).'" title="skype"></a></li>';
                        if($member_go !='')$output .='<li><a class="shape sm fa fa-twitter" href="'.esc_url($member_tw).'" title="twitter"></a></li>';
                        if($member_sk !='')$output .='<li><a class="shape sm fa fa-google-plus" href="'.esc_url($member_go).'" title="GooglePlus"></a></li>';
                    $output .= '</ul>';
                  $output .= '</div>';
              $output .= '</div>';
          }else if($member_style == "5"){
              $output = '<div class="team-box box-5 shape lg">';
                  $output .='<div class="team-img rounded-img">';
                      $output .= $img_output;
                  $output .= '</div>';
                  $output .= '<div class="team-details">';
                    $output .= '<h3 class="team-name">'.esc_html($member_name).'</h3>';
                    $output .= '<h5 class="team-pos main-color">'.esc_html($member_position).'</h5>';
                    $output .= '<p class="hidden">'.esc_html($member_details).'</p>';
                    $output .= '<ul class="social-list">';
                        if($member_fb !='')$output .='<li><a class="shape sm fa fa-facebook" href="'.esc_url($member_fb).'" title="facebook"></a></li>';
                        if($member_tw !='')$output .='<li><a class="shape sm fa fa-linkedin" href="'.esc_url($member_ln).'" title="linkedin"></a></li>';
                        if($member_ln !='')$output .='<li><a class="shape sm fa fa-skype" href="'.esc_url($member_sk).'" title="skype"></a></li>';
                        if($member_go !='')$output .='<li><a class="shape sm fa fa-twitter" href="'.esc_url($member_tw).'" title="twitter"></a></li>';
                        if($member_sk !='')$output .='<li><a class="shape sm fa fa-google-plus" href="'.esc_url($member_go).'" title="GooglePlus"></a></li>';
                    $output .= '</ul>';
                  $output .= '</div>';
              $output .= '</div>';
          }
          
    return $output; 
 
}
add_shortcode('it_member', 'it_member_shortcode');






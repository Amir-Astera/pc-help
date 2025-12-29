<?php 

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_vc_testimonials extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $block_style;
            extract(shortcode_atts(array(
                'el_class' => '',
                'block_style'   => '1',
                'testo_slides' => '2',
                'testo_scroll' => '2',
                'testo_fade' => '0',
                'testo_speed' => '500',
                'testo_arrows' => '',
                'testo_dots' => '',
                'testo_infinite' => '',
                'testo_auto' => '',
                
            ), $atts));
            
            $output = '';
            $t_slides = $t_scrolls = $t_fade = $t_speed = $t_arrows = $t_dots = $t_auto = $t_infinite = '';
            $t_slides = " data-slidesnum='$testo_slides'";
            $t_scrolls = " data-scamount='$testo_scroll'";
            $t_fade = " data-fade='$testo_fade'";                
            $t_speed = " data-speed='$testo_speed'";
            $t_arrows = " data-arrows='$testo_arrows'";
            $t_dots = " data-dots='$testo_dots'";
            $t_auto = " data-auto='$testo_auto'";
            $t_infinite = " data-infinite='$testo_infinite'";
            
            $attrs = $t_slides.$t_scrolls.$t_fade.$t_speed.$t_arrows.$t_infinite.$t_dots.$t_auto;
            
            if($block_style == '8'){
                $output .= '<div class="testimonials-8">';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }else {
                if($block_style == '5' || $block_style == '7'){
                     $output .= '<div class="testimonials horizontal-slider bquotes_slider"'.$attrs.'>';
                }else if($block_style == '6'){
                     $output .= '<div class="testimonials horizontal-slider testimonials-4 dark"'.$attrs.'>';
                }else if($block_style == 'simple'){
                     $output .= '<div class="testimonials normal-testimonials horizontal-slider"'.$attrs.'>';
                }else{
                     $output .= '<div class="testimonials horizontal-slider testimonials-'.$block_style.'"'.$attrs.'>';
                }               
                
                    
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }
            
            
            return $output;
        }
    }

    class WPBakeryShortCode_it_clients extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {
            global $cl_style;
            extract(shortcode_atts(array(
                'el_class'          => '',
                'cl_style'          => '1',
                'cl_slides'         => '2',
                'cl_scroll'         => '2',
                'cl_fade'           => '0',
                'cl_speed'          => '500',
                'cl_arrows'         => '',
                'cl_dots'           => '',
                'cl_infinite'       => '1',
                'cl_auto'           => '1',
            ), $atts));
            
            $output = '';
            
            $c_slides = $c_scrolls = $c_fade = $c_speed = $c_arrows = $c_dots = $c_auto = $c_infinite = '';
            $c_slides = " data-slidesnum='$cl_slides'";
            $c_scrolls = " data-scamount='$cl_scroll'";
            $c_fade = " data-fade='$cl_fade'";                
            $c_speed = " data-speed='$cl_speed'";
            $c_arrows = " data-arrows='$cl_arrows'";
            $c_dots = " data-dots='$cl_dots'";
            $c_auto = " data-auto='$cl_auto'";
            $c_infinite = " data-infinite='$cl_infinite'";
            
            $attrs = $c_slides.$c_scrolls.$c_fade.$c_speed.$c_arrows.$c_infinite.$c_dots.$c_auto;
            
            if($cl_style == '1'){
                $output .= '<div class="clients-grid1'.$el_class.'">';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }else if($cl_style == '2'){
                $output .= '<div class="clients-grid2'.$el_class.'">';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }else if($cl_style == '3'){
                $output .= '<div class="clients-grid3'.$el_class.'">';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }else if($cl_style == '4'){
                $output .= '<div class="horizontal-slider '.$el_class.'" '.$attrs.'>';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            }
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_v_carousel extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'el_class' => '',
                'v_slides' => '1',
                'v_scroll' => '1',
                'v_fade' => '',
                'v_speed' => '500',
                'v_arrows' => '',
                'v_dots' => '',
                'v_infinite' => '1',
                'v_auto' => '1',
            ), $atts));
            
            $output = '';
            $t2_slides = $t2_scrolls = $t2_fade = $t2_speed = $t2_arrows = $t2_dots = $t2_auto = $t2_infinite = '';
            $t2_slides = " data-slidesnum='$v_slides'";
            $t2_scrolls = " data-scamount='$v_scroll'";
            $t2_fade = " data-fade='$v_fade'";                
            $t2_speed = " data-speed='$v_speed'";
            $t2_arrows = " data-arrows='$v_arrows'";
            $t2_dots = " data-dots='$v_dots'";
            $t2_auto = " data-auto='$v_auto'";
            $t2_infinite = " data-infinite='$v_infinite'";
            
            $attrs2 = $t2_slides.$t2_scrolls.$t2_fade.$t2_speed.$t2_arrows.$t2_infinite.$t2_dots.$t2_auto;
            
            $output = '<div class="slider-content '.$el_class.'">';
                $output .= '<div class="banner-slick vertical-slider" '.$attrs2.'>';
                    $output .= do_shortcode( $content );
                $output .= '</div>';
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_camera_slideshow extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'el_class' => '',
                'height' => '',
                'slide_link' => '',
                'pagination' => '',
                'thumbnails' => '',
                'loader' => '',
                'align'     => '',
                'fx'     => '',
                'bardirection'     => '',
                'barposition'     => '',
                'navigation'      => '',
                'playPause'       => ''
            ), $atts));
            
            $output = '<div class="camera_wrap camera_magenta_skin camera-slider '.$el_class.'" data-fx="'.$fx.'" data-alignment="'.$align.'" 
            data-height="'.$height.'" data-pagination="'.$pagination.'" data-thumbnails="'.$thumbnails.'" data-loader="'.$loader.'" data-bardirection="'.$bardirection.'" 
            data-barposition="'.$barposition.'" data-navigation="'.$navigation.'" data-playPause="'.$playPause.'">';
                $output .= do_shortcode( $content );
            $output .= '</div>';
            
            return $output;
        }
    }
    
    class WPBakeryShortCode_it_social_icons extends WPBakeryShortCodesContainer {
        protected function content($atts, $content = null) {

            extract(shortcode_atts(array(
                'el_class' => '',
            ), $atts));
            
            $output = '<ul class="social-list '.$el_class.'">';
                $output .= do_shortcode( $content );
            $output .= '</ul>';
            
            return $output;
        }
    }
    
} 
   


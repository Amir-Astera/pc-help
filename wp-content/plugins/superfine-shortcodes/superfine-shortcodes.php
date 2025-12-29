<?php
/*
Plugin Name: SUPERFINE Shortcodes
Plugin URI: http://www.it-rays.net/
Description: This is a custom Visual Composer addon for making custom shortcodes.
Author: IT-RAYS
Version: 1.1.2
Author URI: http://www.it-rays.net/
*/

if (!defined('ABSPATH')) die('-1');

defined( 'TI_PLUGIN_DIR') or define( 'TI_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

class VCExtendAddonCustomShortCodes {
  
    function __construct() {
        
        add_action( 'vc_after_init', array( $this, 'it_vc_shortcodes' ) );
        include_once plugin_dir_path( __FILE__ ) . "shortcodes/it_gallery.php";      
    }
    
  	public function it_vc_shortcodes(){
        
        $config_path = TI_PLUGIN_DIR . '/config';
        
        vc_lean_map( 'it_heading', null, $config_path . '/custom-shortcodes/shortcode-heading.php' );
        vc_lean_map( 'it_iconbox', null, $config_path . '/custom-shortcodes/shortcode-icon-boxes.php' );
        vc_lean_map( 'vc_testimonials', null, $config_path . '/custom-shortcodes/shortcode-testimonials.php' );   
        vc_lean_map( 'it_testimonial', null, $config_path . '/custom-shortcodes/shortcode-testimonial.php' );
        vc_lean_map( 'it_fun_staff', null, $config_path . '/custom-shortcodes/shortcode-fun-staff.php' );        
        vc_lean_map( 'it_breaking_news', null, $config_path . '/custom-shortcodes/shortcode-breaking-news.php' );   
        vc_lean_map( 'it_blog', null, $config_path . '/custom-shortcodes/shortcode-blog.php' );
        vc_lean_map( 'it_recent_posts', null, $config_path . '/custom-shortcodes/shortcode-recent-posts.php' );
        vc_lean_map( 'it_posts_category', null, $config_path . '/custom-shortcodes/shortcode-posts-category.php' );
        vc_lean_map( 'it_new_in_pictures', null, $config_path . '/custom-shortcodes/shortcode-news-in-pictures.php' );
        vc_lean_map( 'it_clients', null, $config_path . '/custom-shortcodes/shortcode-clients.php' );
        vc_lean_map( 'it_client', null, $config_path . '/custom-shortcodes/shortcode-client.php' );
        vc_lean_map( 'it_member', null, $config_path . '/custom-shortcodes/shortcode-member.php' );
        vc_lean_map( 'it_feature', null, $config_path . '/custom-shortcodes/shortcode-features.php' );
        vc_lean_map( 'it_v_carousel', null, $config_path . '/custom-shortcodes/shortcode-vertical-carousel.php' );
        vc_lean_map( 'it_v_slide', null, $config_path . '/custom-shortcodes/shortcode-vertical-slide.php' );
        vc_lean_map( 'it_gmap', null, $config_path . '/custom-shortcodes/shortcode-gmap.php' );
        vc_lean_map( 'it_counter', null, $config_path . '/custom-shortcodes/shortcode-counter.php' );
        vc_lean_map( 'it_counter2', null, $config_path . '/custom-shortcodes/shortcode-counter2.php' );
        vc_lean_map( 'it_divider', null, $config_path . '/custom-shortcodes/shortcode-dividers.php' );
        vc_lean_map( 'it_camera_slideshow', null, $config_path . '/custom-shortcodes/shortcode-camera-slideshow.php' );
        vc_lean_map( 'it_camera_slide', null, $config_path . '/custom-shortcodes/shortcode-camera-slide.php' );
        vc_lean_map( 'it_social_icons', null, $config_path . '/custom-shortcodes/shortcode-social-icons.php' );
        vc_lean_map( 'it_social_icon', null, $config_path . '/custom-shortcodes/shortcode-social-icon.php' );

        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }
        
        if ( !is_admin() ){
            foreach ( glob( plugin_dir_path( __FILE__ ) . "shortcodes/vc_*.php" ) as $file ) {
                include_once $file;
            }
        }
        
        global $vc_manager;
        $vc_manager->setIsAsTheme();
        $vc_manager->disableUpdater(); 
        
        include_once( TI_PLUGIN_DIR . '/inc/extends.php' );

        vc_remove_param( "vc_video", "el_class" );
        
        function icons_lib(){
             return array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon library', 'js_composer' ),
                'value' => array(
                    esc_html__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                    esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                    esc_html__( 'Typicons', 'js_composer' ) => 'typicons',
                    esc_html__( 'Entypo', 'js_composer' ) => 'entypo',
                    esc_html__( 'Linecons', 'js_composer' ) => 'linecons',
                    esc_html__( 'Pixel', 'js_composer' ) => 'pixelicons',
                ),
                'param_name' => 'icon_type',
                "group" => "Icon",
                'description' => esc_html__( 'Select icon library.', 'js_composer' ),
                'dependency' => array( 'element' => 'use_icon', 'not_empty' => true)
            );
        }
        
        function icons_fa(){
            return array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-info-circle',
                "group" => "Icon",
                'settings' => array(
                    'emptyIcon' => false,
                    'iconsPerPage' => 4000,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            );    
        }
        
        function icons_oc(){
            return array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_openiconic',
                "group" => "Icon",
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'openiconic',
                    'iconsPerPage' => 4000,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            );    
        }
        
        function icons_ti(){
            return array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_typicons',
                "group" => "Icon",
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'typicons',
                    'iconsPerPage' => 4000,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            );    
        }
        
        function icons_entypo(){
            return array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_entypo',
                "group" => "Icon",
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'entypo',
                    'iconsPerPage' => 4000,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
            );    
        }
        
        function icons_line(){
            return array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_linecons',
                "group" => "Icon",
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'linecons',
                    'iconsPerPage' => 4000,
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            );    
        }
        
        function icons_px(){
            return array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'js_composer' ),
                'param_name' => 'icon_pixelicons',
                "group" => "Icon",
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'pixelicons',
                    'source' => array(
                        array( 'vc_pixel_icon vc_pixel_icon-alert' => esc_html__( 'Alert', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-info' => esc_html__( 'Info', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-tick' => esc_html__( 'Tick', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-explanation' => esc_html__( 'Explanation', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-address_book' => esc_html__( 'Address book', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_html__( 'Alarm clock', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-anchor' => esc_html__( 'Anchor', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-application_image' => esc_html__( 'Application Image', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-arrow' => esc_html__( 'Arrow', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-asterisk' => esc_html__( 'Asterisk', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-hammer' => esc_html__( 'Hammer', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-balloon' => esc_html__( 'Balloon', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_html__( 'Balloon Buzz', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_html__( 'Balloon Facebook', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_html__( 'Balloon Twitter', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-battery' => esc_html__( 'Battery', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-binocular' => esc_html__( 'Binocular', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_excel' => esc_html__( 'Document Excel', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_image' => esc_html__( 'Document Image', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_music' => esc_html__( 'Document Music', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_office' => esc_html__( 'Document Office', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_pdf' => esc_html__( 'Document PDF', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_html__( 'Document Powerpoint', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-document_word' => esc_html__( 'Document Word', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-bookmark' => esc_html__( 'Bookmark', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-camcorder' => esc_html__( 'Camcorder', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-camera' => esc_html__( 'Camera', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-chart' => esc_html__( 'Chart', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-chart_pie' => esc_html__( 'Chart pie', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-clock' => esc_html__( 'Clock', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-fire' => esc_html__( 'Fire', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-heart' => esc_html__( 'Heart', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-mail' => esc_html__( 'Mail', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-play' => esc_html__( 'Play', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-shield' => esc_html__( 'Shield', 'js_composer' ) ),
                        array( 'vc_pixel_icon vc_pixel_icon-video' => esc_html__( 'Video', 'js_composer' ) ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'pixelicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            );    
        }
        
        function it_animation(){
            return array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'CSS Animation', 'js_composer' ),
                'param_name' => 'it_animation', 
                'admin_label' => true,
                "base" => "css_animation",
                "as_parent" => array('except' => 'css_animation'),
                'edit_field_class' => 'vc_col-md-12 vc_column',
                "content_element" => true,
                "icon" => "css_animation",
                'value' => array(
                    esc_html__( 'No Animation', 'js_composer' ) => '',
                    esc_html__( 'bounce', 'js_composer' ) => 'bounce',
                    esc_html__( 'flash', 'js_composer' ) => 'flash',
                    esc_html__( 'pulse', 'js_composer' ) => 'pulse',
                    esc_html__( 'rubberBand', 'js_composer' ) => 'rubberBand',
                    esc_html__( 'shake', 'js_composer' ) => 'shake',
                    esc_html__( 'swing', 'js_composer' ) => 'swing',
                    esc_html__( 'tada', 'js_composer' ) => 'tada',
                    esc_html__( 'wobble', 'js_composer' ) => 'wobble',
                    esc_html__( 'jello', 'js_composer' ) => 'jello',

                    esc_html__( 'bounceIn', 'js_composer' ) => 'bounceIn',
                    esc_html__( 'bounceInDown', 'js_composer' ) => 'bounceInDown',
                    esc_html__( 'bounceInLeft', 'js_composer' ) => 'bounceInLeft',
                    esc_html__( 'bounceInRight', 'js_composer' ) => 'bounceInRight',
                    esc_html__( 'bounceInUp', 'js_composer' ) => 'bounceInUp',

                    esc_html__( 'bounceOut', 'js_composer' ) => 'bounceOut',
                    esc_html__( 'bounceOutDown', 'js_composer' ) => 'bounceOutDown',
                    esc_html__( 'bounceOutLeft', 'js_composer' ) => 'bounceOutLeft',
                    esc_html__( 'bounceOutRight', 'js_composer' ) => 'bounceOutRight',
                    esc_html__( 'bounceOutUp', 'js_composer' ) => 'bounceOutUp',

                    esc_html__( 'fadeIn', 'js_composer' ) => 'fadeIn',
                    esc_html__( 'fadeInDown', 'js_composer' ) => 'fadeInDown',
                    esc_html__( 'fadeInDownBig', 'js_composer' ) => 'fadeInDownBig',
                    esc_html__( 'fadeInLeft', 'js_composer' ) => 'fadeInLeft',
                    esc_html__( 'fadeInLeftBig', 'js_composer' ) => 'fadeInLeftBig',
                    esc_html__( 'fadeInRight', 'js_composer' ) => 'fadeInRight',
                    esc_html__( 'fadeInRightBig', 'js_composer' ) => 'fadeInRightBig',
                    esc_html__( 'fadeInUp', 'js_composer' ) => 'fadeInUp',
                    esc_html__( 'fadeInUpBig', 'js_composer' ) => 'fadeInUpBig',

                    esc_html__( 'fadeOut', 'js_composer' ) => 'fadeOut',
                    esc_html__( 'fadeOutDown', 'js_composer' ) => 'fadeOutDown',
                    esc_html__( 'fadeOutDownBig', 'js_composer' ) => 'fadeOutDownBig',
                    esc_html__( 'fadeOutLeft', 'js_composer' ) => 'fadeOutLeft',
                    esc_html__( 'fadeOutLeftBig', 'js_composer' ) => 'fadeOutLeftBig',
                    esc_html__( 'fadeOutRight', 'js_composer' ) => 'fadeOutRight',
                    esc_html__( 'fadeOutRightBig', 'js_composer' ) => 'fadeOutRightBig',
                    esc_html__( 'fadeOutUp', 'js_composer' ) => 'fadeOutUp',
                    esc_html__( 'fadeOutUpBig', 'js_composer' ) => 'fadeOutUpBig',

                    esc_html__( 'flip', 'js_composer' ) => 'flip',
                    esc_html__( 'flipInX', 'js_composer' ) => 'flipInX',
                    esc_html__( 'flipInY', 'js_composer' ) => 'flipInY',
                    esc_html__( 'flipOutX', 'js_composer' ) => 'flipOutX',
                    esc_html__( 'flipOutY', 'js_composer' ) => 'flipOutY',

                    esc_html__( 'lightSpeedIn', 'js_composer' ) => 'lightSpeedIn',
                    esc_html__( 'lightSpeedOut', 'js_composer' ) => 'lightSpeedOut',

                    esc_html__( 'rotateIn', 'js_composer' ) => 'rotateIn',
                    esc_html__( 'rotateInDownLeft', 'js_composer' ) => 'rotateInDownLeft',
                    esc_html__( 'rotateInDownRight', 'js_composer' ) => 'rotateInDownRight',
                    esc_html__( 'rotateInUpLeft', 'js_composer' ) => 'rotateInUpLeft',
                    esc_html__( 'rotateInUpRight', 'js_composer' ) => 'rotateInUpRight',

                    esc_html__( 'rotateOut', 'js_composer' ) => 'rotateOut',
                    esc_html__( 'rotateOutDownLeft', 'js_composer' ) => 'rotateOutDownLeft',
                    esc_html__( 'rotateOutDownRight', 'js_composer' ) => 'rotateOutDownRight',
                    esc_html__( 'rotateOutUpLeft', 'js_composer' ) => 'rotateOutUpLeft',
                    esc_html__( 'rotateOutUpRight', 'js_composer' ) => 'rotateOutUpRight',

                    esc_html__( 'slideInUp', 'js_composer' ) => 'slideInUp',
                    esc_html__( 'slideInDown', 'js_composer' ) => 'slideInDown',
                    esc_html__( 'slideInLeft', 'js_composer' ) => 'slideInLeft',
                    esc_html__( 'slideInRight', 'js_composer' ) => 'slideInRight',

                    esc_html__( 'slideOutUp', 'js_composer' ) => 'slideOutUp',
                    esc_html__( 'slideOutDown', 'js_composer' ) => 'slideOutDown',
                    esc_html__( 'slideOutLeft', 'js_composer' ) => 'slideOutLeft',
                    esc_html__( 'slideOutRight', 'js_composer' ) => 'slideOutRight',
                                      
                    esc_html__( 'zoomIn', 'js_composer' ) => 'zoomIn',
                    esc_html__( 'zoomInDown', 'js_composer' ) => 'zoomInDown',
                    esc_html__( 'zoomInLeft', 'js_composer' ) => 'zoomInLeft',
                    esc_html__( 'zoomInRight', 'js_composer' ) => 'zoomInRight',
                    esc_html__( 'zoomInUp', 'js_composer' ) => 'zoomInUp',

                    esc_html__( 'zoomOut', 'js_composer' ) => 'zoomOut',
                    esc_html__( 'zoomOutDown', 'js_composer' ) => 'zoomOutDown',
                    esc_html__( 'zoomOutLeft', 'js_composer' ) => 'zoomOutLeft',
                    esc_html__( 'zoomOutRight', 'js_composer' ) => 'zoomOutRight',
                    esc_html__( 'zoomOutUp', 'js_composer' ) => 'zoomOutUp',

                    esc_html__( 'hinge', 'js_composer' ) => 'hinge',
                    esc_html__( 'rollIn', 'js_composer' ) => 'rollIn',
                    esc_html__( 'rollOut', 'js_composer' ) => 'rollOut',
                ),
                'description' => esc_html__( '', 'js_composer' )
            );    
        }

        function it_animation_delay(){
            return array(
                "type" => "textfield",
                "heading" => esc_html__( "Animation Duration", 'js_composer' ),
                "param_name" => "duration",
                'edit_field_class' => 'vc_col-xs-6 vc_column',
                "value" => '',
                'dependency' => array('element' => 'it_animation', 'not_empty' => true),
                "description" => esc_html__( "", 'js_composer' ),
            );    
        }
        
        function it_animation_duration(){
            return array(
                "type" => "textfield",
                "heading" => esc_html__( "Animation Delay", 'js_composer' ),
                "param_name" => "delay",
                'edit_field_class' => 'vc_col-xs-6 vc_column',
                'dependency' => array('element' => 'it_animation', 'not_empty' => true),
                "value" => '',
                "description" => esc_html__( "", 'js_composer' ),
            );    
        }             
               
        // add parameter settings.
        $rowAtts = array(
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Full Width Row', 'js_composer' ),
                'param_name' => 'fluid',
                'description' => esc_html__( 'If selected, the row will be full width.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'class' => 'it_checkbox',
                'edit_field_class' => 'vc_col-xs-6 vc_column',
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Stretch Content', 'js_composer' ),
                'param_name' => 'full_content',
                'description' => esc_html__( 'If selected, the row content will be stretched.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'class' => 'it_checkbox',
                'edit_field_class' => 'vc_col-xs-6 vc_column',
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Equal height', 'js_composer' ),
                'param_name' => 'equal_height',
                'edit_field_class' => 'vc_col-xs-6 vc_column',
                'description' => esc_html__( 'If checked columns will be set to equal height.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Columns gap', 'js_composer' ),
                'param_name' => 'gap',
                'edit_field_class' => 'vc_col-xs-6 vc_column',
                'value' => array(
                    '0px' => '0',
                    '1px' => '1',
                    '2px' => '2',
                    '3px' => '3',
                    '4px' => '4',
                    '5px' => '5',
                    '10px' => '10',
                    '15px' => '15',
                    '20px' => '20',
                    '25px' => '25',
                    '30px' => '30',
                    '35px' => '35',
                ),
                'std' => '0',
                'description' => esc_html__( 'Select gap between columns in row.', 'js_composer' ),
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background Color', 'js_composer' ),
                'param_name' => 'section_bg_color',
                'edit_field_class' => 'vc_col-xs-3 vc_column',
                'group' => 'Design options',
                'description' => esc_html__( '', 'js_composer' ),
            ),array(
                'type' => 'it_up_img',
                'heading' => esc_html__( 'Background Image', 'js_composer' ),
                'param_name' => 'it_bg_img',
                'group' => 'Design options',
                'edit_field_class' => 'vc_col-xs-9 vc_column',
                'description' => esc_html__( '', 'js_composer' )
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Repeat', 'js_composer' ),
                'param_name' => 'bg_image_repeat',
                'edit_field_class' => 'vc_col-xs-4 vc_column',
                'group' => 'Design options',
                'value' => array(
                          esc_html__( 'Repeat', 'js_composer' ) => '',
                          esc_html__( 'Repeat Horizontally', 'js_composer' ) => 'repeat-x',
                          esc_html__('Repeat Vertically', 'js_composer') => 'repeat-y',
                          esc_html__('No Repeat', 'js_composer') => 'no-repeat'
                          ),
                'description' => esc_html__( '', 'js_composer' ),
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Attachment', 'js_composer' ),
                'param_name' => 'bg_image_attachment',
                'edit_field_class' => 'vc_col-xs-4 vc_column',
                'group' => 'Design options',
                'value' => array(
                          esc_html__( 'Scroll', 'js_composer' ) => '',
                          esc_html__( 'Fixed', 'js_composer' ) => 'fixed',
                          ),
                'description' => esc_html__( '', 'js_composer' ),
          ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Position', 'js_composer' ),
                'param_name' => 'bg_image_position',
                'edit_field_class' => 'vc_col-xs-4 vc_column',
                'group' => 'Design options',
                'value' => array(
                          esc_html__( 'Left Top', 'js_composer' ) => '',
                          esc_html__( 'Left Center', 'js_composer' ) => '0% 50%',
                          esc_html__( 'Left Bottom', 'js_composer') => '0% 100%',
                          esc_html__( 'Right Top', 'js_composer') => '100% 0%',
                          esc_html__( 'Right Center', 'js_composer' ) => '100% 50%',
                          esc_html__( 'Right Bottom', 'js_composer' ) => '100% 100%',
                          esc_html__( 'Center Top', 'js_composer') => '50% 0%',
                          esc_html__( 'Center Center', 'js_composer') => '50% 50%',
                          esc_html__( 'Center Bottom', 'js_composer' ) => '50% 100%'
                          ),
                'description' => esc_html__( '', 'js_composer' ),
          ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Full Background ?', 'js_composer' ),
                'param_name' => 'bg_cover',
                'group' => 'Design options',
                'edit_field_class' => 'vc_col-xs-4 vc_column',
                'description' => esc_html__( 'If selected, the background image will be 100% full.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'class' => 'it_checkbox'
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Parallax Effect ?', 'js_composer' ),
                'param_name' => 'parallax_check',
                'description' => esc_html__( 'If selected, this will apply the parallax effect on the background image.', 'js_composer' ),
                'group' => 'Design options',
                'edit_field_class' => 'vc_col-xs-4 vc_column',
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'class' => 'it_checkbox'
            ),array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Overlay ?', 'js_composer' ),
                'param_name' => 'bg_overlay',
                'group' => 'Design options',
                'edit_field_class' => 'vc_col-xs-4 vc_column',
                'description' => esc_html__( 'If selected, there will be an overlay layer over the background image.', 'js_composer' ),
                'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
                'class' => 'it_checkbox'
            ),array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Overlay Color', 'js_composer' ),
                'param_name' => 'overlay_color',
                'group' => 'Design options',
                'edit_field_class' => 'vc_col-xs-3 vc_column',
                'description' => esc_html__( '', 'js_composer' ),
                'dependency' => array( 'element' => 'bg_overlay', 'not_empty' => true)
            ),array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Overlay Opacity', 'js_composer' ),
                'param_name' => 'overlay_opacity',
                'edit_field_class' => 'vc_col-xs-9 vc_column',
                'group' => 'Design options',
                'description' => esc_html__( 'Overlay transparency, value should be between 0 and 1.', 'js_composer' ),
                'value' => '0.5',
                'dependency' => array( 'element' => 'bg_overlay', 'not_empty' => true)
            ),array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Padding', 'js_composer' ),
                'param_name' => 'row_padd',
                'edit_field_class' => 'vc_col-xs-6 vc_column',
                'description' => esc_html__( '', 'js_composer' ),
                'value' => array(
                    esc_html__( 'Normal Padding', 'js_composer' ) => 'section',
                    esc_html__( 'Small Padding', 'js_composer' ) => 'sm-padding',
                    esc_html__( 'Medium Padding', 'js_composer' ) => 'md-padding',
                    esc_html__( 'Large Padding', 'js_composer' ) => 'lg-padding',
                    esc_html__( 'Exrta Large Padding', 'js_composer' ) => "xl-padding",
                    esc_html__( 'No Padding', 'js_composer' ) => 'no-padding',
                ),
                'std' => 'section',
                  ),array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'ID', 'js_composer' ),
                        'param_name' => 'extra_id',
                        'edit_field_class' => 'vc_col-xs-6 vc_column',
                        'description' => esc_html__( '', 'js_composer' ),
                  ),array(
                        'type' => 'it_up_img',
                        'heading' => esc_html__( 'Video Poster', 'js_composer' ),
                        'param_name' => 'video_poster',
                        'group' => 'Video Background',
                        'description' => esc_html__( '', 'js_composer' )
                  ),array(
                        'type' => 'it_video_bg',
                        'heading' => esc_html__( 'video/mp4', 'js_composer' ),
                        'param_name' => 'video_mp4',
                        'group' => 'Video Background',
                        'description' => esc_html__( '', 'js_composer' )
                  ),array(
                        'type' => 'it_video_bg',
                        'heading' => esc_html__( 'video/webm', 'js_composer' ),
                        'param_name' => 'video_webm',
                        'group' => 'Video Background',
                        'description' => esc_html__( '', 'js_composer' )
                  ),array(
                        'type' => 'it_video_bg',
                        'heading' => esc_html__( 'video/ogv', 'js_composer' ),
                        'param_name' => 'video_ogv',
                        'group' => 'Video Background',
                        'description' => esc_html__( '', 'js_composer' )
                  ),array(
                        "type" => "textfield",
                        "heading" => esc_html__("Extra class name", "js_composer"),
                        "param_name" => "el_class",
                        "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'YouTube video background?', 'js_composer' ),
                        'param_name' => 'video_bg',
                        'group' => 'Video Background',
                        'description' => esc_html__( 'If checked, YouTube video will be used as row background.', 'js_composer' ),
                        'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'YouTube link', 'js_composer' ),
                        'param_name' => 'video_bg_url',
                        'group' => 'Video Background',
                        'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k', // default video url
                        'description' => esc_html__( 'Add YouTube link.', 'js_composer' ),
                        'dependency' => array(
                            'element' => 'video_bg',
                            'not_empty' => true,
                        ),
                    )
                );

                $tabsAtts = array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Style', 'js_composer' ),
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__( 'Classic', 'js_composer' ) => 'classic',
                        esc_html__( 'Modern', 'js_composer' ) => 'modern',
                        esc_html__( 'Flat', 'js_composer' ) => 'flat',
                        esc_html__( 'Outline', 'js_composer' ) => 'outline',
                        'Bottom Lined List' => 'style-1',
                        'Main Background Color' => 'style-2',
                        'Bared List' => 'style-3',
                        'Large Tabs 1' => 'style-lg',
                        'Large Tabs 2' => 'style-lg tabs-bg',
                    ),
                    "std" => 'default',
                    'description' => esc_html__( 'Auto rotate tabs each X seconds.', 'js_composer' )
                ); 
                
                $accAtts = array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Accordion style', 'js_composer' ),
                        'base' => 'vc_tta_accordion',
                        'param_name' => 'style',
                        'value' => array(
                            esc_html__( 'Classic', 'js_composer' ) => 'classic',
                            esc_html__( 'Modern', 'js_composer' ) => 'modern',
                            esc_html__( 'Flat', 'js_composer' ) => 'flat',
                            esc_html__( 'Outline', 'js_composer' ) => 'outline',
                            'Style 1' => 'style-1',
                            'Style 2' => 'style-2',
                            'Style 3' => 'style-3',
                            'Style 4' => 'style-4',
                            'Style 5' => 'style-5',
                        ),
                        'std' => 'classic',
                    ),array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Shape', 'js_composer' ),
                        'base' => 'vc_tta_accordion',
                        'param_name' => 'shape',
                        'value' => array(
                            esc_html__( 'Rounded', 'js_composer' ) => 'rounded',
                            esc_html__( 'Square', 'js_composer' ) => 'square',
                            esc_html__( 'Round', 'js_composer' ) => 'round',
                            'Theme Shape' => 'shape',
                        ),
                        'std' => 'rounded',
                    )
                );
                
                $iconShape = array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Background shape', 'js_composer' ),
                    //'base' => 'vc_icon',
                    'param_name' => 'background_style',
                    'value' => array(
                       esc_html__( 'None', 'js_composer' ) => '',
                        esc_html__( 'Circle', 'js_composer' ) => 'rounded',
                        esc_html__( 'Square', 'js_composer' ) => 'boxed',
                        esc_html__( 'Rounded', 'js_composer' ) => 'rounded-less',
                        esc_html__( 'Outline Circle', 'js_composer' ) => 'rounded-outline',
                        esc_html__( 'Outline Square', 'js_composer' ) => 'boxed-outline',
                        esc_html__( 'Outline Rounded', 'js_composer' ) => 'rounded-less-outline',
                        "Theme Default Shape" => "s shape",
                        "New Angle" => "s new-angle",
                        "Left Angle" => "s left-angle",
                        "Right Angle" => "s right-angle",
                        "Top Angle" => "s top-angle",
                        "Bottom Angle" => "s bottom-angle",
                    ),
                    'std' => 'rounded',
                );
                 
                $acctabAtts = array(
                    icons_lib(),
                    icons_fa(),
                    icons_oc(),
                    icons_ti(),
                    icons_entypo(),
                    icons_line(),
                    icons_px(),
                );

                $anim = array(
                   it_animation(),
                   it_animation_delay(),
                   it_animation_duration(), 
                ); 

                $btnAtts = array(
                    array(
                       'type' => 'dropdown',
                        'heading' => esc_html__( 'Size', 'js_composer' ),
                        'param_name' => 'size',
                        'description' => esc_html__( 'Select button display size.', 'js_composer' ),
                        'value' => array(
                            'Mini' => 'xs',
                            'Small' => 'sm',
                            'Normal' => 'md',
                            'Large' => 'lg',
                            'X-Large' => 'xl',
                        ), 
                    ),array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Shape', 'js_composer' ),
                        'param_name' => 'shape',
                        'value' => array(
                            esc_html__( 'Rounded', 'js_composer' ) => 'rounded',
                            esc_html__( 'Square', 'js_composer' ) => 'square',
                            esc_html__( 'Round', 'js_composer' ) => 'round',
                            "Theme Default Shape" => "s shape",
                            "New Angle" => "s new-angle",
                            "Left Angle" => "s left-angle",
                            "Right Angle" => "s right-angle",
                            "Top Angle" => "s top-angle",
                            "Bottom Angle" => "s bottom-angle",
                        ),
                        'description' => esc_html__( 'Select button shape.', 'js_composer' )
                    ),
                );
                
                $iconAtts = array(
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Use Icon', 'js_composer' ),
                        'param_name' => 'use_icon',
                        'value' => array(
                            esc_html__( 'yes', 'js_composer' ) => '1',
                        )
                    ),
                    icons_lib(),
                    icons_fa(),
                    icons_oc(),
                    icons_ti(),
                    icons_entypo(),
                    icons_line(),
                    icons_px(),
                );
             
            $piatts = array(
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use Icon', 'js_composer' ),
                    'edit_field_class'    => 'vc_col-xs-6 vc_column',
                    'param_name' => 'use_icon',
                    "group" => "Icon",
                    'value' => array(
                        esc_html__( 'yes', 'js_composer' ) => '1',
                    )
                ),
                icons_lib(),
                icons_fa(),
                icons_oc(),
                icons_ti(),
                icons_entypo(),
                icons_line(),
                icons_px(),
             );
            
            $progressAtts = array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Bar color', 'js_composer' ),
                    'param_name' => 'bgcolor',
                    'value' => array(
                        esc_html__( 'Grey', 'js_composer' ) => 'bar_grey',
                        esc_html__( 'Blue', 'js_composer' ) => 'bar_blue',
                        esc_html__( 'Turquoise', 'js_composer' ) => 'bar_turquoise',
                        esc_html__( 'Green', 'js_composer' ) => 'bar_green',
                        esc_html__( 'Orange', 'js_composer' ) => 'bar_orange',
                        esc_html__( 'Red', 'js_composer' ) => 'bar_red',
                        esc_html__( 'Black', 'js_composer' ) => 'bar_black',
                        esc_html__( 'Theme Color', 'js_composer' ) => 'main-bg',
                        esc_html__( 'Custom Color', 'js_composer' ) => 'custom'
                    ),
                    'description' => esc_html__( 'Select bar background color.', 'js_composer' ),
                    'admin_label' => true
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Bar custom color', 'js_composer' ),
                    'param_name' => 'custombgcolor',
                    'description' => esc_html__( 'Select custom background color for bars.', 'js_composer' ),
                    'dependency' => array( 'element' => 'bgcolor', 'value' => array( 'custom' ) )
                ),array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Style', 'js_composer' ),
                    'param_name' => 'barsstyle',
                    'value' => array(
                        esc_html__( 'Default Style', 'superfine' ) => '',
                        esc_html__( 'Tiny Bars', 'superfine' ) => 'tool-tip tiny-line',
                        esc_html__( 'Small Bars', 'superfine' ) => 'tool-tip rounded-bars small-line',
                        esc_html__( 'Large Bars', 'superfine' ) => 'rounded-bars lg-line tool-tip',
                        esc_html__( 'X-Large Bars', 'superfine' ) => 'xl-line rounded-bars',
                        esc_html__( 'Dark Background', 'superfine' ) => 'style-5 shape lg',
                        esc_html__( 'Light Background', 'superfine' ) => 'style-6 shape lg',
                    ),
                    'description' => esc_html__( 'Select bar Style.', 'js_composer' ),
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Extra class name', 'js_composer' ),
                    'param_name' => 'el_class',
                    'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
                )
            );

            $it_colors = array(
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Custom color', 'js_composer' ),
                    'param_name' => 'it_color',
                    'description' => esc_html__( 'Select custom color.', 'js_composer' ),
                ) 
            );
            
            $videoAtts = array(
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use Self Hosted Video', 'js_composer' ),
                    'param_name' => 'up_video',
                    'value' => array(
                        esc_html__( 'yes', 'js_composer' ) => '1',
                    )
                ),
                array(
                    'type' => 'it_up_img',
                    'heading' => esc_html__( 'Video Poster', 'js_composer' ),
                    'param_name' => 'vc_video_poster',
                    'group' => 'Upload Video',
                    'description' => esc_html__( '', 'js_composer' ),
                    'dependency' => array(
                        'element' => 'up_video',
                        'value' => '1',
                    ),
                ),array(
                    'type' => 'it_video_bg',
                    'heading' => esc_html__( 'video/mp4', 'js_composer' ),
                    'param_name' => 'vc_video_mp4',
                    'group' => 'Upload Video',
                    'description' => esc_html__( '', 'js_composer' ),
                    'dependency' => array(
                        'element' => 'up_video',
                        'value' => '1',
                    ),
                ),array(
                    'type' => 'it_video_bg',
                    'heading' => esc_html__( 'video/webm', 'js_composer' ),
                    'param_name' => 'vc_video_webm',
                    'group' => 'Upload Video',
                    'description' => esc_html__( '', 'js_composer' ),
                    'dependency' => array(
                        'element' => 'up_video',
                        'value' => '1',
                    ),
                ),array(
                    'type' => 'it_video_bg',
                    'heading' => esc_html__( 'video/ogv', 'js_composer' ),
                    'param_name' => 'vc_video_ogv',
                    'group' => 'Upload Video',
                    'description' => esc_html__( '', 'js_composer' ),
                    'dependency' => array(
                        'element' => 'up_video',
                        'value' => '1',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Extra class name', 'js_composer' ),
                    'param_name' => 'el_class',
                    'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
                ) 
            );

        vc_remove_element( "vc_gmaps" );
    
        // remove params from elements.
        vc_remove_param( "vc_row", "full_width" );
        vc_remove_param( "vc_row", "parallax_image" );
        vc_remove_param( "vc_row", "parallax" );
        vc_remove_param( "vc_row", "video_bg" );    
        vc_remove_param( "vc_row", "video_bg_url" );
        vc_remove_param( "vc_row", "video_bg_parallax" );
        vc_remove_param( "vc_row", "video_bg_url" );
        vc_remove_param( "vc_row", "css" ); 
        vc_remove_param( "vc_row", "el_id" );
        vc_remove_param( "vc_row", "equal_height" );
        vc_remove_param( "vc_row", "gap" );
        vc_remove_param( "vc_row", "content_placement" ); 
        vc_remove_param( "vc_row", "el_class" );
                    
        vc_remove_param( "vc_progress_bar", "bgcolor" );
        vc_remove_param( "vc_progress_bar", "custombgcolor" );  
        vc_remove_param( "vc_progress_bar", "el_class" );
        
        //add params to elements.    
        vc_add_params( "vc_column", $anim );
        vc_add_params( "vc_column_inner", $anim );
        vc_add_params( 'vc_row', $rowAtts );
        vc_add_params( 'vc_tta_accordion', $accAtts );
        vc_add_param ( 'vc_tta_tabs', $tabsAtts );
        vc_add_params( 'vc_btn', $btnAtts );
        vc_add_params( 'vc_pie', $piatts );
        vc_add_params( 'vc_progress_bar', $progressAtts );
        vc_add_params( 'vc_video', $videoAtts );
        vc_add_param ( 'vc_icon', $iconShape );
        vc_add_params( 'vc_custom_heading', $iconAtts );
        
        // update vc_map after adding params.
        vc_map_update( 'vc_column', $anim );
        vc_map_update( 'vc_column_inner', $anim );
        vc_map_update( 'vc_row', $rowAtts );
        vc_map_update( 'vc_tta_accordion', $accAtts );
        vc_map_update( 'vc_tta_tabs', $tabsAtts );
        vc_map_update( 'vc_btn', $btnAtts );
        vc_map_update( 'vc_pie', $piatts );
        vc_map_update( 'vc_progress_bar', $progressAtts );
        vc_map_update( 'vc_video', $videoAtts );
        vc_map_update( 'vc_icon', $iconShape );
        vc_map_update( 'vc_custom_heading', $iconAtts );
            
        add_action('admin_print_styles', 'it_scripts_styles');
        function it_scripts_styles(){
            wp_enqueue_style( 'superfine-css', plugins_url( '/assets/css/css.css', __FILE__ ) );
        }
        
        function it_vc_icon( $settings, $value ) {
          $output = '<div>';
          $output  .= '<i class="cust-icon ico '.$value.'"></i><a class="button button-primary btn_icon" href="#">Add Icon</a><input type="hidden" name="'.$settings['param_name'].'" class="wpb_vc_param_value it_vc_icon icon-value icon_input '. $settings['param_name'] .' '. $settings['type'] .'" value="'. $value .'" /><a class="button icon-remove">Remove Icon</a>';
          $output   .= '</div>';
          return $output;
        }
        vc_add_shortcode_param('it_vc_icon', 'it_vc_icon');
        
        // upload image parameter
        function it_upload_img( $settings, $value ) {
          return '<input class="regular-text wpb_vc_param_value wpb-textinput ' .
                     esc_attr( $settings['param_name'] ) . ' ' .
                     esc_attr( $settings['type'] ) . '_field" name="' . esc_attr( $settings['param_name'] ) . '" type="text" value="' . esc_attr( $value ) . '" /><input class="upload_image_button" type="button" value="Upload Image" /><div class="no-margin clear-img"><img class="logo-im" alt="" src="'. esc_attr( $value ) .'" /> <a class="remove-img" href="#">remove</a></div>';
        }
        vc_add_shortcode_param('it_up_img', 'it_upload_img');

        // section video background parameter
        function it_upload_video_bg( $settings, $value ) {
          return '<input class="regular-text wpb_vc_param_value wpb-textinput ' .
                     esc_attr( $settings['param_name'] ) . ' ' .
                     esc_attr( $settings['type'] ) . '_field" name="' . esc_attr( $settings['param_name'] ) . '" type="text" value="' . esc_attr( $value ) . '" /><input class="upload_video_button" type="button" value="Browse" />';
        }
        vc_add_shortcode_param('it_video_bg', 'it_upload_video_bg');

        function it_dropdown_cats( ) {
            $categories_obj = get_categories('hide_empty=0');
            $categories = array();
            foreach ($categories_obj as $pn_cat){
                $categories[$pn_cat->cat_name] = $pn_cat->category_nicename;
            }  
            $categories=array("All Categories"=>"") + $categories;
            return $categories;
        }

        function colorCreator($colour, $per) {  
            $colour = substr( $colour, 1 ); // Removes first character of hex string (#) 
            $rgb = ''; // Empty variable 
            $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature
            if  ($per < 0 ) // Check to see if the percentage is a negative number 
            { 
                // DARKER 
                $per =  abs($per); // Turns Neg Number to Pos Number 
                for ($x=0;$x<3;$x++) 
                { 
                    $c = hexdec(substr($colour,(2*$x),2)) - $per; 
                    $c = ($c < 0) ? 0 : dechex($c); 
                    $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
                }   
            }  
            else 
            { 
                // LIGHTER         
                for ($x=0;$x<3;$x++) 
                {             
                    $c = hexdec(substr($colour,(2*$x),2)) + $per; 
                    $c = ($c > 255) ? 'ff' : dechex($c); 
                    $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
                }    
            } 
            return '#'.$rgb; 
        }

    }   
    
}

new VCExtendAddonCustomShortCodes();


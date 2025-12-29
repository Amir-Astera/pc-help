<?php 
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.com
 * @copyright 2014 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
 
  /* General Settings
  ===========================================*/         
        
        $goglfonts = array();
        $url = FRAMEWORK_URI .'/assets/fonts/fonts.json';
        $response = wp_remote_get( $url );
        $body = wp_remote_retrieve_body($response);
        $fonts    =  json_decode( $body);
        foreach ( $fonts->items as $key => $font ) {
          $goglfonts[$font->family] = $font->family;
        }
        $selfont = array('' => '-- Select Font Family --');
        $goglfonts = $selfont + $goglfonts;
        $this->settings['general-heading'] = array(
            'section' => 'it_general',
            'title'   => '',
            'desc'    => esc_html__( 'General','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'general-acc'
        );
        if ( class_exists( 'VCExtendAddonCustomShortCodes' ) ) {
            $this->settings['import_data'] = array(
                'title'   => esc_html__( 'One-Click Install Demo Data','superfine' ),
                'desc'    => esc_html__( 'Be Sure, this will overwrite the existing data.','superfine' ),
                'std'     => '',
                'type'    => 'import_data',
                'section' => 'it_general'
            );
        }else{
            $this->settings['plugin_label'] = array(
                'title'   => esc_html__( 'One-Click Install Demo Data','superfine' ),
                'desc'    => 'Please Install SUPERFINE Shortcodes Plugin to import the demo data <a href="themes.php?page=tgmpa-install-plugins&plugin=superfine-shortcodes">Install Required Plugins Here</a>',
                'std'     => '',
                'class'   => 'hidden-desc',
                'type'    => 'label',
                'section' => 'it_general'
            );
        }
        $this->settings['custom_css'] = array(
            'section' => 'it_general',
            'title'   => esc_html__( 'Custom CSS','superfine' ),
            'desc'    => esc_html__( 'Insert here any custom css code.','superfine' ),
            'type'    => 'textarea',
            'std'     => ''
        );
        $this->settings['custom_js'] = array(
            'section' => 'it_general',
            'title'   => esc_html__( 'Custom javascript','superfine' ),
            'desc'    => esc_html__( 'Insert here Custom javascript code.','superfine' ),
            'type'    => 'textarea',
            'std'     => ''
        );
        $this->settings['tags_limit'] = array(
            'title'   => esc_html__( 'Tags Limit','superfine' ),
            'desc'    => esc_html__( 'Number of tags  displayed in widgets.','superfine' ),
            'std'     => '10',
            'type'    => 'number',
            'section' => 'it_general'
        );
        $this->settings['analytics'] = array(
            'section' => 'it_general',
            'title'   => esc_html__( 'Google Analytics - Tracking Code','superfine' ),
            'desc'    => esc_html__( 'Insert Your Google Analytics Tracking ID.','superfine' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['twitter-heading'] = array(
            'section' => 'it_general',
            'title'   => '',
            'desc'    => esc_html__( 'Twitter API Config','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'tw-acc'
        );
        $this->settings['twitteruser'] = array(
            'title'   => esc_html__( 'Twitter user name','superfine' ),
            'desc'    => esc_html__( 'Your twitter user.','superfine' ),
            'std'     => 'IT_RAYS',
            'type'    => 'text',
            'section' => 'it_general'
        );
        $this->settings['wid_id'] = array(
            'title'   => esc_html__( 'Widget ID','superfine' ),
            'desc'    => esc_html__( 'Your twitter Widget ID.','superfine' ),
            'std'     => '529778322134167553',
            'type'    => 'text',
            'section' => 'it_general'
        );
        $this->settings['tweets_limit'] = array(
            'title'   => esc_html__( 'Tweets Limit','superfine' ),
            'desc'    => esc_html__( 'The limit of tweets number that will be retrieved from twitter.','superfine' ),
            'std'     => '10',
            'type'    => 'number',
            'section' => 'it_general'
        );
        $this->settings['search-heading'] = array(
            'section' => 'it_general',
            'title'   => '',
            'desc'    => esc_html__( 'Search Page Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'srch-acc'
        );
        $this->settings['search_sidebar'] = array(
            'title'   => esc_html__( 'Search Sidebar','superfine' ),
            'desc'    => esc_html__( 'Full width or with sidebar ?','superfine' ),
            'std'     => 'nobar',
            'type'    => 'select',
            'section' => 'it_general',
            'choices' => array(
                'right' => 'Right Sidebar',
                'left' => 'Left Sidebar',
                'nobar'  => 'No Sidebar'
            )
        );
        
        /* Top Bar Settings
       ==========================================*/ 
        $this->settings['top-bar-heading'] = array(
            'section' => 'it_topbar',
            'title'   => '',
            'desc'    => esc_html__( 'Top Bar Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'top-bar-acc'
        );
        $this->settings['show_top_bar'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'Show top bar','superfine' ),
            'desc'    => esc_html__( 'Show/Hide top bar above header.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );          
        $this->settings['topbarleft'] = array(
            'title'   => esc_html__( 'Top bar left content','superfine' ),
            'desc'    => '',
            'std'     => 'contact',
            'type'    => 'select',
            'section' => 'it_topbar',
            'choices' => array(
                'socials' => 'Social Icons',
                'contact' => 'Contact Info',
                'userlinks' => 'Top Bar Menu Links',
                'loginregister' => 'Login / Register Links',
                'text' => 'HTML or text',
                'wpml' => 'Language Switcher (WPML)',
                'empty' => 'Empty ( No Content )'
            )
        );
        $this->settings['top_left_text'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'HTML or text','superfine' ),
            'desc'    => esc_html__( 'Add text to be displayed in the left top bar.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => 'You can add html or text here',
            'dependency' => array(
                'element' => 'topbarleft',
                'value' => 'text'
            ),
        );
        
        $this->settings['topbarcenter'] = array(
            'title'   => esc_html__( 'Top bar center content','superfine' ),
            'desc'    => '',
            'std'     => 'socials',
            'type'    => 'select',
            'section' => 'it_topbar',
            'choices' => array(
                'socials' => 'Social Icons',
                'contact' => 'Contact Info',
                'userlinks' => 'Top Bar Menu Links',
                'loginregister' => 'Login / Register Links',
                'text' => 'HTML or text',
                'wpml' => 'Language Switcher (WPML)',
                'empty' => 'Empty ( No Content )'
            )
        );
        $this->settings['top_center_text'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'HTML or text','superfine' ),
            'desc'    => esc_html__( 'Add text to be displayed in the center of top bar.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => 'You can add html or text here',
            'dependency' => array(
                'element' => 'topbarcenter',
                'value' => 'text'
            ),
        );
        
        $this->settings['topbarright'] = array(
            'title'   => esc_html__( 'Top bar Right content','superfine' ),
            'desc'    => '',
            'std'     => 'text',
            'type'    => 'select',
            'section' => 'it_topbar',
            'choices' => array(
                'socials' => 'Social Icons',
                'contact' => 'Contact Info',
                'userlinks' => 'Top Bar Menu Links',
                'loginregister' => 'Login / Register Links',
                'text' => 'HTML or text',
                'wpml' => 'Language Switcher (WPML)',
                'empty' => 'Empty ( No Content )'
            )
        );
        $this->settings['top_right_text'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'HTML or text','superfine' ),
            'desc'    => esc_html__( 'Add text to be displayed in the right top bar.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => esc_html__('You can add html or text here','superfine'),
            'dependency' => array(
                'element' => 'topbarright',
                'value' => 'text'
            ),
        );
        $this->settings['login_welcome'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'Hide Login Welcome Message','superfine' ),
            'desc'    => esc_html__( 'Hide login message in the login box.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'dependency' => array(
                'element' => array('topbarright','topbarleft','topbarcenter'),
                'value' => 'loginregister'
            ),
        );
        $this->settings['login_welcome_message'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'Login Welcome Message','superfine' ),
            'desc'    => esc_html__( 'You can add text to login welcome message in the login box.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'dependency' => array(
                'element' => array('topbarright','topbarleft','topbarcenter'),
                'value' => 'loginregister'
            ),            
        );
        if(class_exists('Woocommerce')) {
            $this->settings['topbar_show_cart'] = array(
                'section' => 'it_topbar',
                'title'   => esc_html__( 'Show Shopping Cart','superfine' ),
                'desc'    => esc_html__( 'Show the shopping cart in the top bar.','superfine' ),
                'type'    => 'checkbox',
                'std'     => '0'
            );
            $this->settings['topbar_cart_position'] = array(
                'title'   => esc_html__( 'Cart Position','superfine' ),
                'desc'    => '',
                'std'     => 'right',
                'type'    => 'select',
                'section' => 'it_topbar',
                'choices' => array(
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right'
                ),
                'dependency' => array(
                    'element' => 'topbar_show_cart',
                    'not_empty' => true
                ),
            );
        }
        $this->settings['top-bar-styling'] = array(
            'section' => 'it_topbar',
            'title'   => '',
            'desc'    => esc_html__( 'Top Bar Styling','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'tb-style-acc'
        );
        $this->settings['barbgcolor'] = array(
            'title'   => esc_html__( 'Top Bar background color','superfine' ),
            'desc'    => esc_html__( 'Choose a solid color for the top bar background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_topbar',
            'class'   => '',
        );
        $this->settings['bar_image'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Select or insert image url for top bar background.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['bar_img_full_width'] = array(
            'section' => 'it_topbar',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'Make the top bar background image display at 100% width and height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['bar_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_topbar',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        $this->settings['barcolor'] = array(
            'title'   => esc_html__( 'Top Bar color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the top bar elements','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_topbar',
            'class'   => '',
        );
        $this->settings['bariconcolor'] = array(
            'title'   => esc_html__( 'Top Bar Icons color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the top bar Icons','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_topbar',
            'class'   => '',
        );
        
        /* Header Settings
       ==========================================*/
       
       $this->settings['header-layouts-heading'] = array(
            'section' => 'it_header',
            'title'   => '',
            'desc'    => esc_html__( 'Header Layouts','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'hed-layout-acc'
        );
       $this->settings['header_layout'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Choose header layout','superfine' ),
            'desc'    => esc_html__( 'Choose header layout from the below images','superfine' ),
            'type'    => 'radio',
            'std'     => 'header-1',
            'class'   => 'head-imgs',
            'choices' => array(
                'header-1' => '',
                'header-2' => '',
                'header-3' => '',
                'header-4' => '',
                'header-5' => '',
                'header-6' => '',
                'header-7' => '',
                'header-8' => '',
                'header-9' => '',
                'header-banner' => '',
                'header-left' => '',
                'header-right' => '',
                'header-transparent-1-boxed' => '',
                'header-transparent-1-fluid' => '',
                'header-transparent-2' => '',
                'header-semi-transparent-light' => '',
                'header-semi-transparent-dark' => '',
            )
        );       
        $this->settings['header-heading'] = array(
            'section' => 'it_header',
            'title'   => '',
            'desc'    => esc_html__( 'Header Styling','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'header-acc'
        );
        $this->settings['menu_effect'] = array(
            'title'   => esc_html__( 'Main Menu Effect','superfine' ),
            'desc'    => esc_html__( 'Choose effect for the main menu items.','superfine' ),
            'std'     => 'to-bottom',
            'type'    => 'select',
            'section' => 'it_header',
            'class'   => '',
            'choices' => array(
                'to-bottom' => 'To Bottom',
                'to-top' => 'To Top',
                'to-right' => 'To Right',
                'to-left' => 'To Left',
                'scale'   => 'scale',
                ''  => 'No Effect'
            )
        );
        /*$this->settings['mega_menu_style'] = array(
            'title'   => esc_html__( 'Mega Menu Style','superfine' ),
            'desc'    => esc_html__( 'Select how the Mega menu will appear.','superfine' ),
            'std'     => 'mega-1',
            'type'    => 'select',
            'section' => 'it_header',
            'class'   => '',
            'choices' => array(
                'mega-1' => 'Default Style',
                'mega-2' => 'Style 2',
                'mega-3' => 'Style 3',
            )
        );*/
        $this->settings['sub_menu_color'] = array(
            'title'   => esc_html__( 'Sub Menu Color','superfine' ),
            'desc'    => esc_html__( 'Select the sub menu color.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_header',
            'class'   => '',
            'choices' => array(
                '' => 'Default Style',
                'dark-submenu' => 'Dark Sub Menu',
                'colored-submenu' => 'Colored Sub Menu',
            )
        );
        $this->settings['nav_bg_color'] = array(
            'title'   => esc_html__( 'Background color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the header background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'class'   => '',
        );
        $this->settings['nav_image'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Select or insert image url for header background.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['nav_img_full_width'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'Make the Header background image display at 100% width and height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['nav_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_header',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        $this->settings['nav_text_color'] = array(
            'title'   => esc_html__( 'Links color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the header menu links','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'class'   => '',
        );
        $this->settings['nav_icon_color'] = array(
            'title'   => esc_html__( 'Menu Icons color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the main menu icons.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'class'   => '',
        );
        $this->settings['show_search'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Show Search box','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Search box in header.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['show_cart'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Show Cart box','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Cart box in header.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['header_banner'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Header Banner Image','superfine' ),
            'desc'    => esc_html__( 'Select or insert image url for the Header Banner Image.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['header_banner_link'] = array(
            'title'   => esc_html__( 'Header Banner Link','superfine' ),
            'desc'    => esc_html__( 'Insert the Banner LINK. Ex: http://www.google.com','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_header'
        );
        
        $this->settings['logo_inputs'] = array(
            'section' => 'it_header',
            'title'   => '',
            'desc'    => esc_html__( 'Logo settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'logo-acc'
        );
        $this->settings['site_title'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Site Title','superfine' ),
            'desc'    => esc_html__( 'Your logo will be at the top left. ','superfine' ),
            'type'    => 'text',
            'multilang' => true,
            'std'     => get_bloginfo()
        );
        $this->settings['logo_font'] = array(
            'title'   => esc_html__( 'Logo Font Family','superfine' ),
            'desc'    => esc_html__( 'Choose Font Family from the list below','superfine' ),
            'std'     => 'Raleway',
            'type'    => 'select',
            'section' => 'it_header',
            'choices' => $goglfonts
        );
        $this->settings['logo_font_size'] = array(
            'title'   => esc_html__( 'Logo Font Size','superfine' ),
            'desc'    => esc_html__( 'Choose Font size for logo in px. Ex: 50px','superfine' ),
            'std'     => '',
            'type'    => 'number',
            'section' => 'it_header'
        );
        $this->settings['logo_font_weight'] = array(
            'title'   => esc_html__( 'Logo Font Weight','superfine' ),
            'desc'    => esc_html__( 'Choose Font weight for Logo','superfine' ),
            'std'     => '900',
            'type'    => 'select',
            'section' => 'it_header',
            'choices' => array(
                ''  => '-- Select --',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            )
        );
        $this->settings['logo_font_color'] = array(
            'title'   => esc_html__( 'Logo Text Color','superfine' ),
            'desc'    => esc_html__( 'Color for the Logo text.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'defcolor' => ''
        );
        $this->settings['header_logo_image'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Logo image','superfine' ),
            'desc'    => esc_html__( 'Select or insert image url for logo image.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['slogan_inputs'] = array(
            'section' => 'it_header',
            'title'   => '',
            'desc'    => esc_html__( 'Slogan settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'slogan-acc'
        );
        $this->settings['site_slogan'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Site Slogan','superfine' ),
            'desc'    => '',
            'multilang' => true,
            'type'    => 'text',
            'std'     => get_bloginfo( 'description' )
        );
        $this->settings['slogan_font'] = array(
            'title'   => esc_html__( 'Slogan Font Family','superfine' ),
            'desc'    => esc_html__( 'Choose Font Family from the list below','superfine' ),
            'std'     => 'Lato',
            'type'    => 'select',
            'section' => 'it_header',
            'choices' => $goglfonts
        );
        $this->settings['slogan_font_size'] = array(
            'title'   => esc_html__( 'Slogan Font Size','superfine' ),
            'desc'    => esc_html__( 'Choose Font size for Slogan','superfine' ),
            'std'     => '11',
            'type'    => 'number',
            'section' => 'it_header'
        );
        $this->settings['slogan_font_weight'] = array(
            'title'   => esc_html__( 'Slogan Font Weight','superfine' ),
            'desc'    => esc_html__( 'Choose Font weight for Slogan','superfine' ),
            'std'     => '500',
            'type'    => 'select',
            'section' => 'it_header',
            'choices' => array(
                ''  => '-- Select --',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            )
        );
        $this->settings['slogan_font_color'] = array(
            'title'   => esc_html__( 'slogan Text Color','superfine' ),
            'desc'    => esc_html__( 'Color for the slogan text.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'defcolor' => ''
        );
        $this->settings['sticky_header'] = array(
            'section' => 'it_header',
            'title'   => '',
            'desc'    => esc_html__( 'Sticky Header settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'sticky-acc'
        );
        $this->settings['sticky_header_on'] = array(
            'section' => 'it_header',
            'title'   => esc_html__( 'Enable Sticky Header','superfine' ),
            'desc'    => esc_html__( 'Check this box to Enable Sticky Header.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['sticky_bg_color'] = array(
            'title'   => esc_html__( 'Background Color','superfine' ),
            'desc'    => esc_html__( 'Background color for sticky header.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'defcolor' => ''
        );
        $this->settings['sticky_bg_trans'] = array(
            'title'   => esc_html__( 'Background Opacity','superfine' ),
            'desc'    => esc_html__( 'type the opacity level for sticky header background. between (0 lowest to 1 Heighest)','superfine' ),
            'std'     => '0.7',
            'type'    => 'text',
            'section' => 'it_header'
        );
        $this->settings['sticky_text_color'] = array(
            'title'   => esc_html__( 'Text Color','superfine' ),
            'desc'    => esc_html__( 'Text color for sticky header items.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_header',
            'defcolor' => ''
        );
                       
        /* Footer
        ============================================*/
        $this->settings['footer-heading'] = array(
            'section' => 'it_footer',
            'title'   => '',
            'desc'    => esc_html__( 'Footer Style','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'footer-acc'
        );
        $this->settings['footer_style'] = array(
            'title'   => esc_html__( 'Footer Style','superfine' ),
            'desc'    => esc_html__( 'Select the footer style from the list below','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_footer',
            'class'   => '',
            'choices' => array(
                '1' => 'Footer 1',
                '2' => 'Footer 2',
                '3' => 'Footer 3',
                '4' => 'Footer 4',
                'light' => 'Light Colored Footer',
                'minimal-1' => 'Minimal Footer 1',
                'minimal-2' => 'Minimal Footer 2',
                'minimal-3' => 'Minimal Footer 3',
                'minimal-4' => 'Minimal Footer 4'
            )
        );
        $this->settings['footer-style'] = array(
            'section' => 'it_footer',
            'title'   => '',
            'desc'    => esc_html__( 'Top Footer Bar Style','superfine' ),
            'type'    => 'heading',
            'std'     => '1',
            'class'   => 'accordion',
            'data_id' => 'foot-style-acc'
        );
        $this->settings['footer_top_show'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Show Top footer bar above Footer','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Top footer bar above Footer.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['footer_top_content'] = array(
            'title'   => esc_html__( 'Content','superfine' ),
            'desc'    => esc_html__( 'Choose what to show in top footer bar','superfine' ),
            'std'     => 'twitter',
            'type'    => 'select',
            'section' => 'it_footer',
            'choices' => array(
                'twitter'  => 'Twitter Feed',
                'cta' => 'Call to Action',
                'txt' => 'Text',
                'text_socs' => 'Text + Social Icons',
            )
        );
        $this->settings['footer3_top_left_txt'] = array(
            'title'   => esc_html__( 'Left Text','superfine' ),
            'desc'    => '',
            'std'     => 'SuperFine - Multipurpose WordPress Theme is Specially For You.',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_footer',
            'dependency' => array(
                'element' => 'footer_top_content',
                'value' => 'cta'
            ),
        );
        $this->settings['footer3_top_right_button_text'] = array(
            'title'   => esc_html__( 'Right Button text','superfine' ),
            'desc'    => '',
            'std'     => 'Purchase Now',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_footer',
            'dependency' => array(
                'element' => 'footer_top_content',
                'value' => 'cta'
            ),
        );
        $this->settings['footer3_top_right_button_link'] = array(
            'title'   => esc_html__( 'Right Button Link','superfine' ),
            'desc'    => '',
            'std'     => '#',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_footer',
            'dependency' => array(
                'element' => 'footer_top_content',
                'value' => 'cta'
            ),
        );
        $this->settings['footer_top_txt'] = array(
            'title'   => esc_html__( 'Text','superfine' ),
            'desc'    => '',
            'std'     => '',
            'type'    => 'editor',
            'multilang' => true,
            'section' => 'it_footer',
            'dependency' => array(
                'element' => 'footer_top_content',
                'value' => 'txt'
            ),
        );
        $this->settings['footer_top_txt_socs'] = array(
            'title'   => esc_html__( 'Social Icons Left Text','superfine' ),
            'desc'    => '',
            'std'     => '',
            'type'    => 'editor',
            'multilang' => true,
            'section' => 'it_footer',
            'dependency' => array(
                'element' => 'footer_top_content',
                'value' => 'text_socs'
            ),
        );
        $this->settings['foot_top_bg_color'] = array(
            'title'   => esc_html__( 'Background color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_footer',
            'class'   => '',
        );
        $this->settings['foot_top_image'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Select Image or insert image url.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['foot_top_bg_img_full_width'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'background image 100% in width & height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['foot_top_bg_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_footer',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        $this->settings['footer-widgets-heading'] = array(
            'section' => 'it_footer',
            'title'   => '',
            'desc'    => esc_html__( 'Footer Widgets settings','superfine' ),
            'type'    => 'heading',
            'std'     => '1',
            'class'   => 'accordion',
            'data_id' => 'foot-widgets-acc'
        );
        $this->settings['enable_footer_widgets'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Footer Widgets','superfine' ),
            'desc'    => esc_html__( 'Check the box to display footer widgets.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['footer_columns_number'] = array(
            'title'   => esc_html__( 'Number of Footer Columns','superfine' ),
            'desc'    => esc_html__( 'Number of columns in the footer.','superfine' ),
            'std'     => '3',
            'type'    => 'select',
            'section' => 'it_footer',
            'class'   => '3',
            'choices' => array(
                '12' => '1',
                '6' => '2',
                '4' => '3',
                '3' => '4'
            )
        );
        $this->settings['foot_bg_color'] = array(
            'title'   => esc_html__( 'Background color','superfine' ),
            'desc'    => esc_html__( 'Choose a color for the Footer background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_footer',
            'class'   => '',
        );
        $this->settings['footer_image'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Select an image or insert a url.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['footer_bg_img_full_width'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'background image 100% in width & height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['footer_bg_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_footer',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
         $this->settings['footer-copy-heading'] = array(
            'section' => 'it_footer',
            'title'   => '',
            'desc'    => esc_html__( 'Bottom Footer Bar Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'foot-bottom-acc'
        );
        $this->settings['show_bottom_footer'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Show Bottom Footer Bar','superfine' ),
            'desc'    => esc_html__( 'Show / Hide bottom footer bar.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['copyright_bg_color'] = array(
            'title'   => esc_html__( 'Background color','superfine' ),
            'desc'    => esc_html__( 'Footer Bottom Bar background color.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_footer',
            'class'   => '',
        );
        $this->settings['copyright_text_color'] = array(
            'title'   => esc_html__( 'Text color','superfine' ),
            'desc'    => esc_html__( 'Footer Bottom Bar text color.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_footer',
            'class'   => '',
        );
        $this->settings['copyright_image'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Select an image or insert a url.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['copyright_bg_img_full_width'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'background image 100% in width & height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['copyright_bg_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_footer',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        $this->settings['enable_copyrights'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Show copyrights','superfine' ),
            'desc'    => esc_html__( 'Check the box to display the copyright text.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['copyrights'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Copyrights Text','superfine' ),
            'desc'    => esc_html__( 'Enter the text that displays in the copyright bar. HTML markup can be used.','superfine' ),
            'type'    => 'editor',
            'multilang' => true,
            'dependency' => array(
                'element' => 'enable_copyrights',
                'not_empty' => true
            ),
            'std'     => '&copy; Copyrights <b class="main-color">SuperFine</b> 2015. All rights reserved.'
        );        
        $this->settings['footer-minimal-style'] = array(
            'section' => 'it_footer',
            'title'   => '',
            'desc'    => esc_html__( 'Minimal Footer Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '1',
            'class'   => 'accordion',
            'data_id' => 'footer-min-acc'
        );
        $this->settings['minimal-logo'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Minimal Footer Logo','superfine' ),
            'desc'    => esc_html__( 'Select an image or insert an url.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['minimal-text'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Description','superfine' ),
            'desc'    => esc_html__( 'Insert here the description text.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vestibulum a velit eu ante scelerisque vulputate.Mauris mauris ante.'
        );
        $this->settings['address_minimal_footer'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Show Address in minimal footer 1','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the Address in minimal footer.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['email_minimal_footer'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Show Email in minimal footer 1','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the Email in minimal footer.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['phone_minimal_footer'] = array(
            'section' => 'it_footer',
            'title'   => esc_html__( 'Show Phone in minimal footer 1','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the Phone in minimal footer.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
              
        /* Appearance
        ===========================================*/
        $this->settings['general_css_heading'] = array(
            'section' => 'it_appearance',
            'title'   => '',
            'desc'    => 'General options',
            'type'    => 'heading',
            'class'   => 'accordion',
            'data_id' => 'general_css-acc'
        );
        $this->settings['is_responsive'] = array(
            'section' => 'it_appearance',
            'title'   => esc_html__( 'Responsive Layout','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Use responsive design features. If unchecked, the fixed layout is used.','superfine' )
        );
        $this->settings['main_width'] = array(
            'title'   => esc_html__( 'Content Width','superfine' ),
            'desc'    => esc_html__( 'Define the main site width. In px Ex: 1170 (Just numbers are allowed)','superfine' ),
            'std'     => '1170',
            'type'    => 'number',
            'section' => 'it_appearance',
            'class'   => ''
        );
        $this->settings['favicon'] = array(
            'section' => 'it_appearance',
            'title'   => esc_html__( 'Favicon','superfine' ),
            'desc'    => esc_html__( 'Upload icon image that represents your website identity (16px x 16px)','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['page_transitions'] = array(
            'section' => 'it_appearance',
            'title'   => esc_html__( 'Page Transitions','superfine' ),
            'desc'    => esc_html__( 'Enable / disable Page Transitions.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['data-animsition-in'] = array(
            'title'   => esc_html__( 'animation In','superfine' ),
            'desc'    => esc_html__( 'Select page animation In.','superfine' ),
            'std'     => 'fade-in',
            'type'    => 'select',
            'section' => 'it_appearance',
            'class'   => '',
            'choices' => array(
                'fade-in' => 'Fade In',
                'fade-in-up-sm' => 'Fade In Up Small',
                'fade-in-up' => 'Fade In Up',
                'fade-in-up-lg' => 'Fade In Up Large',
                'fade-in-down-sm' => 'Fade In Down Small',
                'fade-in-down' => 'Fade In Down',
                'fade-in-down-lg' => 'Fade In Down Large',
                'fade-in-left-sm' => 'Fade In Left Small',
                'fade-in-left' => 'Fade In Left',
                'fade-in-left-lg' => 'Fade In Left Large',
                'fade-in-right-sm' => 'Fade In Right Small',
                'fade-in-right' => 'Fade In Right',
                'fade-in-right-lg' => 'Fade In Right Large',
                'rotate-in-sm' => 'Rotate In Small',
                'rotate-in' => 'Rotate In',
                'rotate-in-lg' => 'Rotate In Large',
                'flip-in-x-fr' => 'Flip In X FR',
                'flip-in-x' => 'Flip In X',
                'flip-in-x-nr' => 'Flip In X NR',
                'flip-in-y-fr' => 'Flip In Y FR',
                'flip-in-y' => 'Flip In Y',
                'flip-in-y-nr' => 'Flip In Y NR',
                'zoom-in-sm' => 'Zoom In Small',
                'zoom-in' => 'Zoom In',
                'zoom-in-lg' => 'Zoom In Large',
                'overlay-slide-in-top' => 'Overlay Slide In Top',
                'overlay-slide-in-bottom' => 'Overlay Slide In Bottom',
                'overlay-slide-in-left' => 'Overlay Slide In Left',
                'overlay-slide-in-right' => 'Overlay Slide In Right',
            )
        );
        $this->settings['data-animsition-out'] = array(
            'title'   => esc_html__( 'animation Out','superfine' ),
            'desc'    => esc_html__( 'Select page animation Out.','superfine' ),
            'std'     => 'fade-out',
            'type'    => 'select',
            'section' => 'it_appearance',
            'class'   => '',
            'choices' => array(
                'fade-out' => 'Fade Out',
                'fade-out-up-sm' => 'Fade Out Up Small',
                'fade-out-up' => 'Fade Out Up',
                'fade-out-up-lg' => 'Fade Out Up Large',
                'fade-out-down-sm' => 'Fade Out Down Small',
                'fade-out-down' => 'Fade Out Down',
                'fade-out-down-lg' => 'Fade Out Down Large',
                'fade-out-left-sm' => 'Fade Out Left Small',
                'fade-out-left' => 'Fade Out Left',
                'fade-out-left-lg' => 'Fade Out Left Large',
                'fade-out-right-sm' => 'Fade Out Right Small',
                'fade-out-right' => 'Fade Out Right',
                'fade-out-right-lg' => 'Fade Out Right Large',
                'rotate-out-sm' => 'Rotate Out Small',
                'rotate-out' => 'Rotate Out',
                'rotate-out-lg' => 'Rotate Out Large',
                'flip-out-x-fr' => 'Flip Out X FR',
                'flip-out-x' => 'Flip Out X',
                'flip-out-x-nr' => 'Flip Out X NR',
                'flip-out-y-fr' => 'Flip Out Y FR',
                'flip-out-y' => 'Flip Out Y',
                'flip-out-y-nr' => 'Flip Out Y NR',
                'zoom-out-sm' => 'Zoom Out Small',
                'zoom-out' => 'Zoom Out',
                'zoom-out-lg' => 'Zoom Out Large',
                'overlay-slide-out-top' => 'Overlay Slide Out Top',
                'overlay-slide-out-bottom' => 'Overlay Slide Out Bottom',
                'overlay-slide-out-left' => 'Overlay Slide Out Left',
                'overlay-slide-out-right' => 'Overlay Slide Out Right',
            )
        );
        $this->settings['general_layout_heading'] = array(
            'section' => 'it_appearance',
            'title'   => '',
            'desc'    => 'Layout Options',
            'type'    => 'heading',
            'class'   => 'accordion',
            'data_id' => 'layout-opt-acc'
        );
        $this->settings['layout'] = array(
            'title'   => esc_html__( 'Choose layout','superfine' ),
            'desc'    => esc_html__( 'Boxed or wide layout?','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_appearance',
            'class'   => 'layout-select',
            'choices' => array(
                '' => 'Wide',
                'boxed' => 'Boxed'
            )
        );
        $this->settings['shape'] = array(
            'title'   => esc_html__( 'Choose Shape','superfine' ),
            'desc'    => esc_html__( 'Select Your Prefered Shape','superfine' ),
            'std'     => 'new-angle',
            'type'    => 'select',
            'section' => 'it_appearance',
            'class'   => 'shape-select',
            'choices' => array(
                'new-angle' => 'Default Angled Shape',
                'round' => 'Round',
                'border5px' => 'Rounded',
                'square' => 'Square',
                'right-angle' => 'Right Angle',
                'left-angle' => 'Left Angle',
                'top-angle' => 'Top Angle',
                'bottom-angle' => 'Bottom Angle',
            )
        );
        $this->settings['bodybgcolor'] = array(
            'title'   => esc_html__( 'Body background color','superfine' ),
            'desc'    => esc_html__( 'Choose a solid color for the body','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_appearance',
            'class'   => ''
        ); 
        $this->settings['bodyfontcolor'] = array(
            'title'   => esc_html__( 'Body Font color','superfine' ),
            'desc'    => esc_html__( 'Choose a solid color for the body Text','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_appearance',
            'class'   => ''
        );
        $this->settings['usepatterns'] = array(
            'section' => 'it_appearance',
            'title'   => esc_html__( 'Use patterns ?','superfine' ),
            'type'    => 'checkbox',
            'std'     => '',
            'class'   => 'use-pat',
            'desc'    => esc_html__( 'If yes, select the pattern from below:','superfine' )
        ); 
        $this->settings['patterns-imgs'] = array(
            'title'   => esc_html__( 'Pattern Background Image','superfine' ),
            'desc'    => esc_html__( 'select pattern background image for body.','superfine' ),
            'std'     => '',
            'type'    => 'arrayItems',
            'section' => 'it_appearance',
            'class'   => 'patterns',
            'items' => array(
                ''.get_template_directory_uri() .'/assets/images/patterns/bg1.jpg' => '1',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg2.jpg' => '2',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg3.jpg' => '3',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg4.jpg' => '4',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg5.jpg' => '5',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg6.jpg' => '6',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg7.jpg' => '7',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg8.jpg' => '8',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg9.jpg' => '9',
                ''.get_template_directory_uri() .'/assets/images/patterns/bg10.jpg' => '10'
            )
        );
        $this->settings['bodybgimage'] = array(
            'title'   => esc_html__( 'Upload Background image','superfine' ),
            'desc'    => esc_html__( 'upload image or insert a url.','superfine' ),
            'std'     => '',
            'type'    => 'file',
            'section' => 'it_appearance',
            'class'   => ''
        );
        $this->settings['body_bg_img_parallax'] = array(
            'title'   => esc_html__( 'Fixed Background','superfine' ),
            'desc'    => '',
            'std'     => '',
            'type'    => 'checkbox',
            'section' => 'it_appearance',
            'class'   => ''
        );
        $this->settings['body_bg_full_width'] = array(
            'section' => 'it_appearance',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'background image 100% in width & height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['body_bg_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_appearance',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        
        /* Page title.
        ============================================*/
        $this->settings['page-title-options'] = array(
            'section' => 'it_pagetitles',
            'title'   => '',
            'desc'    => 'Page Titles',
            'type'    => 'heading',
            'class'   => '',
        );
        $this->settings['page_head_style'] = array(
            'title'   => esc_html__( 'Page Title Style','superfine' ),
            'desc'    => esc_html__( 'Select the page Title style.','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_pagetitles',
            'class'   => '',
            'choices' => array(
                '1' => 'Normal Page Title',
                '2' => 'Centered Page Title',
                '3' => 'Centered Page Title Style 2',
                '4' => 'Minimal Page Title',
            )
        ); 
        $this->settings['page_head_height'] = array(
            'title'   => esc_html__( 'Custom Height','superfine' ),
            'desc'    => esc_html__( 'Insert the height (in px). Ex: 200 (Only numbers allowed)','superfine' ),
            'std'     => '',
            'type'    => 'number',
            'section' => 'it_pagetitles',
            'class'   => ''
        );
        $this->settings['title_icon'] = array(
            'title'   => esc_html__( 'Page Title icon','superfine' ),
            'desc'    => esc_html__( 'Choose icon for page title.','superfine' ),
            'std'     => '',
            'type'    => 'icon',
            'section' => 'it_pagetitles',
            'class'   => ''
        );

        $this->settings['use_page_head_bg'] = array(
            'title'   => esc_html__( 'Custom Page Title Background','superfine' ),
            'desc'    => esc_html__( 'Use custom Page Title Background.','superfine' ),
            'std'     => '',
            'type'    => 'checkbox',
            'section' => 'it_pagetitles',
            'class'   => ''
        );
        $this->settings['page_head_bg'] = array(
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Choose an image or insert a url.','superfine' ),
            'std'     => '',
            'type'    => 'file',
            'section' => 'it_pagetitles',
            'class'   => ''
        );
        $this->settings['page_head_parallax'] = array(
            'title'   => esc_html__( 'Parallax Background','superfine' ),
            'desc'    => '',
            'std'     => '',
            'type'    => 'checkbox',
            'section' => 'it_pagetitles',
            'class'   => ''
        );
        $this->settings['page_head_full_width'] = array(
            'section' => 'it_pagetitles',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'background image 100% in width & height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['page_head_img_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_pagetitles',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        
        /* Colors.
        ============================================*/
        $this->settings['layout-options'] = array(
            'section' => 'it_colors',
            'title'   => '',
            'desc'    => 'Colors',
            'type'    => 'heading',
            'class'   => '',
            'data_id' => ''
        );
        $this->settings['skin_css'] = array(
            'title'   => esc_html__( 'Theme Color','superfine' ),
            'desc'    => esc_html__( 'Select your skin color Light / Dark.','superfine' ),
            'std'     => 'light',
            'type'    => 'select',
            'section' => 'it_colors',
            'class'   => '',
            'choices' => array(
                'light' => 'Light Colored Theme',
                'dark' => 'Dark Colored Theme'
            )
        );
        $this->settings['colors_css'] = array(
            'title'   => esc_html__( 'Predefined Color Schemes','superfine' ),
            'desc'    => esc_html__( 'Select your favourite color schemes from the list below or you can select the last item - custom - and choose yours.','superfine' ),
            'std'     => 'default',
            'type'    => 'select',
            'section' => 'it_colors',
            'class'   => 'color-select',
            'choices' => array(
                'default' => 'Default Skin',
                'skin1' => 'skin1',
                'skin2' => 'skin2',
                'skin3' => 'skin3',
                'skin4' => 'skin4',
                'skin5' => 'skin5',
                'skin6' => 'skin6',
                'skin7' => 'skin7',
                'skin8' => 'skin8',
                'skin9' => 'skin9',
                'skin10' => 'skin10',
                'skin11' => 'skin11',
                'skin12' => 'skin12',
                'custom' => 'Custom Colors...'
            )
        );
        $this->settings['skin_color'] = array(
            'title'   => esc_html__( 'Choose Your Custom color','superfine' ),
            'desc'    => esc_html__( 'Choose from this color pallet the color suits your needs.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_colors',
            'dependency' => array(
                'element' => 'colors_css',
                'value' => 'custom'
            ),
        );
        
        /* Typography.
        ============================================*/
        $this->settings['body_heading'] = array(
            'section' => 'it_typography',
            'title'   => '',
            'desc'    => esc_html__( 'Body Typography','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'body_ty-acc'
        );
        $this->settings['body_font'] = array(
            'title'   => esc_html__( 'Font Family','superfine' ),
            'desc'    => esc_html__( 'Choose Font Family from the list below','superfine' ),
            'std'     => 'Lato',
            'type'    => 'select',
            'section' => 'it_typography',
            'choices' => $goglfonts
        );
        $this->settings['body_font_size'] = array(
            'title'   => esc_html__( 'Font Size','superfine' ),
            'desc'    => esc_html__( 'Choose Font size for all body elemets','superfine' ),
            'std'     => '',
            'type'    => 'number',
            'section' => 'it_typography'
        );
        $this->settings['body_font_weight'] = array(
            'title'   => esc_html__( 'Font Weight','superfine' ),
            'desc'    => esc_html__( 'Choose Font size for Body font weights','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_typography',
            'choices' => array(
                ''  => '-- Select --',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            )
        );
        $this->settings['body_line_height'] = array(
            'title'   => esc_html__( 'Line Height','superfine' ),
            'desc'    => esc_html__( 'Choose Line Height for all body elemets','superfine' ),
            'std'     => '',
            'type'    => 'number',
            'section' => 'it_typography'
        );
        
        $this->settings['menu_heading'] = array(
            'section' => 'it_typography',
            'title'   => '',
            'desc'    => esc_html__( 'Menu Typography','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'menu_ty-acc'
        );
        $this->settings['menu_font'] = array(
            'title'   => esc_html__( 'Font Family','superfine' ),
            'desc'    => esc_html__( 'Choose Font Family from the list below','superfine' ),
            'std'     => 'Raleway',
            'type'    => 'select',
            'section' => 'it_typography',
            'choices' => $goglfonts
        );
        $this->settings['menu_font_size'] = array(
            'title'   => esc_html__( 'Font Size','superfine' ),
            'desc'    => esc_html__( 'Choose Font size for menu items','superfine' ),
            'std'     => '13',
            'type'    => 'number',
            'section' => 'it_typography'
        );
        $this->settings['menu_font_weight'] = array(
            'title'   => esc_html__( 'Font Weight','superfine' ),
            'desc'    => esc_html__( 'Choose Font weight for menu items','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_typography',
            'choices' => array(
                ''  => '-- Select --',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            )
        );
        $this->settings['menu_line_height'] = array(
            'title'   => esc_html__( 'Line Height','superfine' ),
            'desc'    => esc_html__( 'Choose Line Height for Menu items','superfine' ),
            'std'     => '',
            'type'    => 'number',
            'section' => 'it_typography'
        );
        
        $this->settings['headings_heading'] = array(
            'section' => 'it_typography',
            'title'   => '',
            'desc'    => esc_html__( 'Headings Typography','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'headings_ty-acc'
        );
        $this->settings['headings_font'] = array(
            'title'   => esc_html__( 'Font Family','superfine' ),
            'desc'    => esc_html__( 'Choose Font Family from the list below','superfine' ),
            'std'     => 'Raleway',
            'type'    => 'select',
            'section' => 'it_typography',
            'choices' => $goglfonts
        );
        $this->settings['headings_font_weight'] = array(
            'title'   => esc_html__( 'Font Weight','superfine' ),
            'desc'    => esc_html__( 'Choose Font weight for Headings items','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_typography',
            'choices' => array(
                ''  => '-- Select --',
                'normal' => 'normal',
                'bold' => 'bold',
                'lighter' => 'lighter',
                'bolder' => 'bolder',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                'inherit' => 'inherit'
            )
        );
        
        
        /* Blog options.
        ============================================*/
        $this->settings['blog_listing_heading'] = array(
            'section' => 'it_blogoptions',
            'title'   => '',
            'desc'    => esc_html__( 'Blog listing page settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'general_bl-acc'
        );
        $this->settings['blogstyle'] = array(
            'title'   => esc_html__( 'Blog Listing Style','superfine' ),
            'desc'    => esc_html__( 'Select blog posts listing style.','superfine' ),
            'std'     => 'large',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'blog-style',
            'choices' => array(
                'large' => 'Blog Large Image',
                'small' => 'Blog Small Image',
                'timeline' => 'Blog Timeline',
                'masonry' => 'Blog Masonry',
                'grid' => 'Blog Grid'
            )
        );
        $this->settings['masonry_cols'] = array(
            'title'   => esc_html__( 'Masonry Columns Per Row','superfine' ),
            'desc'    => esc_html__( 'Blog masonry columns per row.','superfine' ),
            'std'     => '6',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'masonry-cols',
            'choices' => array(
                '6' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns'
            ),
            'dependency' => array(
                'element' => 'blogstyle',
                'value' => 'masonry'
            ),
        );
        $this->settings['grid_cols'] = array(
            'title'   => esc_html__( 'Grid Columns Per Row','superfine' ),
            'desc'    => esc_html__( 'Select blog grid columns per row.','superfine' ),
            'std'     => '6',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'grid-cols',
            'choices' => array(
                '6' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns'
            ),
            'dependency' => array(
                'element' => 'blogstyle',
                'value' => 'grid'
            ),
        );
        $this->settings['blog_sidebar'] = array(
            'title'   => esc_html__( 'Blog Sidebar','superfine' ),
            'desc'    => esc_html__( 'Full width or with sidebar ?','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'layout-content',
            'choices' => array(
                'right' => 'Right Sidebar',
                'left' => 'Left Sidebar',
                'nobar'  => 'No Sidebar'
            )
        );
        $this->settings['blog_image_size'] = array(
            'title'   => esc_html__( 'Blog Featured Image Size','superfine' ),
            'desc'    => esc_html__( 'Select Blog Featured Image Size.','superfine' ),
            'std'     => 'blog-large-image',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => '',
            'choices' => array(
                'thumbnail' => 'Thumbnail - 150x150',
                'blog-small-image' => 'Medium - 400x380',
                'large' => 'Large - 1024x1024',
                'blog-large-image' => 'Blog Large Image - 1170x470',
                'full' => 'Original Size'
            )
        );
        $this->settings['it_excerpt'] = array(
            'title'   => esc_html__( 'Excerpt Length','superfine' ),
            'desc'    => esc_html__( 'Select Max. Excerpt length ONLY For Posts Shoercodes','superfine' ),
            'std'     => '200',
            'type'    => 'text',
            'section' => 'it_blogoptions',
        );
        $this->settings['pager_type'] = array(
            'title'   => esc_html__( 'Pager Type','superfine' ),
            'desc'    => esc_html__( 'Select your prefered pager style.','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'pager-type',
            'choices' => array(
                '1' => 'Numeric + Navigation',
                '2' => 'Older Newer',
                '3' => 'Load More Button'
            )
        );
        $this->settings['pager_style'] = array(
            'title'   => esc_html__( 'Pager Style','superfine' ),
            'desc'    => esc_html__( 'style for only Numeric Pager.','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'pager-style',
            'choices' => array(
                '1' => 'Default Pager Style',
                '2' => 'Diamonds Links',
                '3' => 'Circle Links',
                '4' => 'Bottom Borders',
                '5' => 'Bar Style',
                '6' => 'Bar Style 2',
                '7' => 'Bar Style 3'
            ),
            'dependency' => array(
                'element' => 'pager_type',
                'value' => '1'
            ),
        );
        $this->settings['pager_position'] = array(
            'title'   => esc_html__( 'Pager Position','superfine' ),
            'desc'    => esc_html__( 'position for only Numeric Pager.','superfine' ),
            'std'     => 'centered',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => 'pager-position',
            'choices' => array(
                'f-left' => 'Left',
                'centered' => 'Center',
                'f-right' => 'Right'
            ),
            'dependency' => array(
                'element' => 'pager_type',
                'value' => '1'
            ),
        );
        // Single post
        $this->settings['blog_single_heading'] = array(
            'section' => 'it_blogoptions',
            'title'   => '',
            'desc'    => esc_html__( 'Single blog post page settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'single_bl-acc'
        );
        $this->settings['blog_single_sidebar'] = array(
            'title'   => esc_html__( 'Single Post Sidebar','superfine' ),
            'desc'    => esc_html__( 'Full width or with sidebar ?','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'choices' => array(
                'right' => 'Right Sidebar',
                'left' => 'Left Sidebar',
                'nobar'  => 'No Sidebar'
            )
        );
        $this->settings['singlepostimg_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Post Image','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Post image.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['single_title_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Title','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Post title.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['post_icon_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Post Icon','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Post Icon.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singlepostimg_size'] = array(
            'title'   => esc_html__( 'Blog Single Featured Image Size','superfine' ),
            'desc'    => esc_html__( 'Select Blog Single Featured Image Size.','superfine' ),
            'std'     => 'full',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => '',
            'choices' => array(
                'thumbnail' => 'Thumbnail - 150x150',
                'medium' => 'Medium - 300x300',
                'large' => 'Large - 1024x1024',
                'blog-large-image' => 'Blog Large Image - 1170x470',
                'full' => 'Original Size'
            )
        );
        $this->settings['singledate_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Date','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Date.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleauthor_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show By Author','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Author info.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singlecategory_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Category','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show category.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singlecontent_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Post Content','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Post content.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singletags_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Tags','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Tags.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprevnext_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Post navigation','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Previous/Next post navigation.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singlecomment_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Comments','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Comments.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singlerelated_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Related Posts','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Related Posts.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['blog_socials_heading'] = array(
            'section' => 'it_blogoptions',
            'title'   => '',
            'desc'    => esc_html__( 'Share post settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'share_bl-acc'
        );
        $this->settings['singlesocial_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Social Sharing options','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Social Sharing options.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['fb_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Facebook','superfine' ),
            'desc'    => esc_html__( 'Show / Hide facebook share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['tw_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Twitter','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Twitter share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['gplus_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Google Plus','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Google Plus share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['ln_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show LinkedIn','superfine' ),
            'desc'    => esc_html__( 'Show / Hide LinkedIn share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['pin_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Pinterest','superfine' ),
            'desc'    => esc_html__( 'Show / Hide pinterest share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['xing_on'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Xing','superfine' ),
            'desc'    => esc_html__( 'Show / Hide xing share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        
        // Authors Page
        $this->settings['author-heading'] = array(
            'section' => 'it_blogoptions',
            'title'   => '',
            'desc'    => esc_html__( 'Authors Page Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'author-acc'
        );
        $this->settings['show_auth_info'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Author Info','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the author info.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['show_auth_posts'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Show Author Posts','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the author Posts.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['auth_posts_style'] = array(
            'title'   => esc_html__( 'Author Posts Listing Style','superfine' ),
            'desc'    => esc_html__( 'Select Author Posts listing style.','superfine' ),
            'std'     => 'large',
            'type'    => 'select',
            'section' => 'it_blogoptions',
            'class'   => '',
            'choices' => array(
                'large' => 'Large Image',
                'small' => 'Small Image',
                'timeline' => 'Timeline',
                'masonry' => 'Masonry',
                'grid' => 'Grid'
            )
        );
        $this->settings['auth_content_before'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Content Before','superfine' ),
            'desc'    => esc_html__( 'Add Text or HTML at the top of auther page.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => ''
        );
        $this->settings['auth_content_after'] = array(
            'section' => 'it_blogoptions',
            'title'   => esc_html__( 'Content After','superfine' ),
            'desc'    => esc_html__( 'Add Text or HTML at the end of auther page.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => ''
        );
        
        /* SideBars.
        ============================================*/
        $this->settings['sidebars-options'] = array(
            'section' => 'it_sidebars',
            'title'   => '',
            'desc'    => 'Side Bars',
            'type'    => 'heading',
            'class'   => '',
        );
        $this->settings['sidebars'] = array(
            'section' => 'it_sidebars',
            'title'   => esc_html__( 'sidebars','superfine' ),
            'desc'    => esc_html__( 'Add unlimited sidebars the go to <a href="widgets.php">Widgets</a> to add widgets for it.','superfine' ),
            'type'    => 'sidebars',
            'std'     => ''
        );

        /* Social icons.
        ============================================*/ 
        $this->settings['socialicons-options'] = array(
            'section' => 'it_socialicons',
            'title'   => '',
            'desc'    => 'Social Icons',
            'type'    => 'heading',
            'class'   => '',
        );       
        $this->settings['social_icons'] = array(
            'section' => 'it_socialicons',
            'title'   => esc_html__( 'Social Icon','superfine' ),
            'desc'    => esc_html__( 'Add unlimited social icons.','superfine' ),
            'type'    => 'socials',
            'class'   => 'cont_locs',
            'std'     => '0'
        );
        
        for($i = 0; $i < soc_item() ; ++$i){
            $g = $i+1;
            $this->settings['social_icon'.$g] = array(
                'title'   => esc_html__( 'Icon','superfine' ),
                'desc'    => '',
                'std'     => '',
                'type'    => 'icon',
                'multilang' => true, 
                'group'     => 'contact_'.$g,
                'section' => 'it_socialicons'
            );
            $this->settings['social_icon_title'.$g] = array(
                'title'   => esc_html__( 'Title ','superfine' ),
                'desc'    => '',
                'std'     => '',
                'type'    => 'text',
                'multilang' => true,     
                'group'     => 'contact_'.$g,
                'section' => 'it_socialicons'
            );
            $this->settings['social_icon_link'.$g] = array(
                'title'   => esc_html__( 'Link ','superfine' ),
                'desc'    => '',
                'std'     => '',
                'type'    => 'text',      
                'group'     => 'contact_'.$g,
                'section' => 'it_socialicons'
            );
        }
        
        /* Project Page.
        ============================================*/
        $this->settings['single-pro-heading'] = array(
            'section' => 'it_portfolio',
            'title'   => '',
            'desc'    => esc_html__( 'Single Project Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'single-pro-acc'
        );
        $this->settings['singleprojectimg_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Post Image','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Project image.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprojectdate_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Date','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Date.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprojectauthor_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show By Author','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Author info.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprojectcategory_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Category','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show category.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprojectcontent_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Post Content','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Project content.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprojecttags_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Tags','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Tags.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['singleprojectrelated_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Related Projects','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Related Projects.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['project_socials_heading'] = array(
            'section' => 'it_portfolio',
            'title'   => '',
            'desc'    => esc_html__( 'Share Project settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'single_pro-acc'
        );
        $this->settings['singleprojectsocial_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Social Sharing options','superfine' ),
            'desc'    => esc_html__( 'check this if you need to Show Social Sharing options.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['projectfb_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Facebook','superfine' ),
            'desc'    => esc_html__( 'Show / Hide facebook share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['projecttw_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Twitter','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Twitter share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['projectgplus_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Google Plus','superfine' ),
            'desc'    => esc_html__( 'Show / Hide Google Plus share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['projectln_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show LinkedIn','superfine' ),
            'desc'    => esc_html__( 'Show / Hide LinkedIn share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['projectpin_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Pinterest','superfine' ),
            'desc'    => esc_html__( 'Show / Hide pinterest share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['projectxing_on'] = array(
            'section' => 'it_portfolio',
            'title'   => esc_html__( 'Show Xing','superfine' ),
            'desc'    => esc_html__( 'Show / Hide xing share button.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['project_archive_heading'] = array(
            'section' => 'it_portfolio',
            'title'   => '',
            'desc'    => esc_html__( 'Archive settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'single-arc-acc'
        );
        $this->settings['portfoliostyle'] = array(
            'title'   => esc_html__( 'Archive & Tags Style','superfine' ),
            'desc'    => esc_html__( 'Choose project archive & tags style.','superfine' ),
            'std'     => 'grid',
            'type'    => 'select',
            'section' => 'it_portfolio',
            'choices' => array(
                'grid' => 'Grid Style',
                'large' => 'Posts Style',
            )
        );
        /* woocommerce
        ===========================================*/
        $this->settings['shop_heading'] = array(
            'section' => 'it_woocommerce',
            'title'   => '',
            'desc'    => esc_html__( 'Products Listing Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'shop-acc'
        );
        $this->settings['show_sidebar_woo'] = array(
            'section' => 'it_woocommerce',
            'title'   => esc_html__( 'Show Side Bar','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide sidebar in woocommerce page.','superfine' )
        );
        $this->settings['sidebar_position_woo'] = array(
            'title'   => esc_html__( 'Sidebar Position','superfine' ),
            'desc'    => esc_html__( 'Select the position of the sidebar.','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_woocommerce',
            'class'   => '',
            'choices' => array(
                'right' => 'Right',
                'left' => 'Left'
            )
        );
        $this->settings['columns_woo'] = array(
            'title'   => esc_html__( 'Products Columns','superfine' ),
            'desc'    => esc_html__( 'Select the number of columns per row.','superfine' ),
            'std'     => '4',
            'type'    => 'select',
            'section' => 'it_woocommerce',
            'class'   => '',
            'choices' => array(
                '6' => '2 Columns',
                '4' => '3 Columns',
                '3' => '4 Columns'
            )
        );
        $this->settings['pager_style_woo'] = array(
            'title'   => esc_html__( 'Pager Style','superfine' ),
            'desc'    => esc_html__( 'Select your prefered pager style.','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_woocommerce',
            'class'   => 'pager-style',
            'choices' => array(
                '1' => 'Default Pager Style',
                '2' => 'Diamonds Links',
                '3' => 'Circle Links',
                '4' => 'Bottom Borders',
                '5' => 'Bar Style',
                '6' => 'Bar Style 2',
                '7' => 'Bar Style 3'
            )
        );
        $this->settings['pager_position_woo'] = array(
            'title'   => esc_html__( 'Pager Position','superfine' ),
            'desc'    => esc_html__( 'Select pager position for Pager.','superfine' ),
            'std'     => 'centered',
            'type'    => 'select',
            'section' => 'it_woocommerce',
            'class'   => 'pager-position',
            'choices' => array(
                'f-left' => 'Left',
                'centered' => 'Center',
                'f-right' => 'Right'
            )
        );
        
        $this->settings['product_single_heading'] = array(
            'section' => 'it_woocommerce',
            'title'   => '',
            'desc'    => esc_html__( 'Single Product page settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'shop-single-acc'
        );
        
        $this->settings['show_sidebar_single_woo'] = array(
            'section' => 'it_woocommerce',
            'title'   => esc_html__( 'Show Side Bar ?','superfine' ),
            'type'    => 'checkbox',
            'std'     => '',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide sidebar in single product page.','superfine' )
        );
        
        $this->settings['single_sidebar_position_woo'] = array(
            'title'   => esc_html__( 'Sidebar Position','superfine' ),
            'desc'    => esc_html__( 'Select the position of the sidebar.','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_woocommerce',
            'class'   => '',
            'choices' => array(
                'right' => 'Right',
                'left' => 'Left'
            )
        );
        
        $this->settings['related_heading'] = array(
            'section' => 'it_woocommerce',
            'title'   => '',
            'desc'    => esc_html__( 'Related Products settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'shop-related-acc'
        );
        $this->settings['show_related_woo'] = array(
            'section' => 'it_woocommerce',
            'title'   => esc_html__( 'Show Related Products ?','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide Related Products in single product page.','superfine' )
        );
        $this->settings['related_per_page'] = array(
            'title'   => esc_html__( 'Related Products Per Page','superfine' ),
            'desc'    => esc_html__( 'Related Products Per Page','superfine' ),
            'std'     => '4',
            'type'    => 'number',
            'group'     => '',
            'section' => 'it_woocommerce'
        );
        $this->settings['related_columns_woo'] = array(
            'title'   => esc_html__( 'Related Products Columns','superfine' ),
            'desc'    => esc_html__( 'Select the number of columns per row.','superfine' ),
            'std'     => '4',
            'type'    => 'select',
            'section' => 'it_woocommerce',
            'class'   => '',
            'choices' => array(
                '6' => '2 Columns',
                '4' => '3 Columns',
                '3' => '4 Columns'
            )
        );
        
        $this->settings['home_shop_heading'] = array(
            'section' => 'it_woocommerce',
            'title'   => '',
            'desc'    => esc_html__( 'Home Shop 1 settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'shop-home-acc'
        );
        
        $this->settings['link_1_text'] = array(
            'title'   => esc_html__( 'Link 1 Text','superfine' ),
            'desc'    => esc_html__( 'Add here the link 1 text','superfine' ),
            'std'     => 'Shop by Category',
            'type'    => 'text',
            'multilang' => true, 
            'group'     => '',
            'section' => 'it_woocommerce'
        );
        $this->settings['link_1_link'] = array(
            'title'   => esc_html__( 'Link 1 Link','superfine' ),
            'desc'    => esc_html__( 'Add here the link 1 link','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'multilang' => true, 
            'group'     => '',
            'section' => 'it_woocommerce'
        );
        $this->settings['link_2_text'] = array(
            'title'   => esc_html__( 'Link 2 Text','superfine' ),
            'desc'    => esc_html__( 'Add here the link 2 text','superfine' ),
            'std'     => 'Sell with Us',
            'type'    => 'text',
            'multilang' => true, 
            'group'     => '',
            'section' => 'it_woocommerce'
        );
        $this->settings['link_2_link'] = array(
            'title'   => esc_html__( 'Link 2 Link','superfine' ),
            'desc'    => esc_html__( 'Add here the link 2 link','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'multilang' => true, 
            'group'     => '',
            'section' => 'it_woocommerce'
        );
        $this->settings['link_3_text'] = array(
            'title'   => esc_html__( 'Link 3 Text','superfine' ),
            'desc'    => esc_html__( 'Add here the link 3 text','superfine' ),
            'std'     => 'Daily Deals',
            'type'    => 'text',
            'multilang' => true, 
            'group'     => '',
            'section' => 'it_woocommerce'
        );
        $this->settings['link_3_link'] = array(
            'title'   => esc_html__( 'Link 3 Link','superfine' ),
            'desc'    => esc_html__( 'Add here the link 3 link','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'multilang' => true, 
            'group'     => '',
            'section' => 'it_woocommerce'
        );        
        
        /* bbpress
        ===========================================*/
        $this->settings['bbpress-options'] = array(
            'section' => 'it_bbpress',
            'title'   => '',
            'desc'    => 'Forums',
            'type'    => 'heading',
            'class'   => '',
        );
        $this->settings['show_sidebar_bb'] = array(
            'section' => 'it_bbpress',
            'title'   => esc_html__( 'Show Side Bar','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide sidebar in forums page.','superfine' )
        );
        $this->settings['sidebar_position_bb'] = array(
            'title'   => esc_html__( 'Sidebar Position','superfine' ),
            'desc'    => esc_html__( 'Select the position of the sidebar.','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_bbpress',
            'class'   => '',
            'choices' => array(
                'right' => 'Right',
                'left' => 'Left'
            )
        );
        $this->settings['pager_style_bb'] = array(
            'title'   => esc_html__( 'Pager Style','superfine' ),
            'desc'    => esc_html__( 'Select your prefered pager style.','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_bbpress',
            'class'   => 'pager-style',
            'choices' => array(
                '1' => 'Default Pager Style',
                '2' => 'Diamonds Links',
                '3' => 'Circle Links',
                '4' => 'Bottom Borders',
                '5' => 'Bar Style',
                '6' => 'Bar Style 2',
                '7' => 'Bar Style 3'
            )
        );
        $this->settings['pager_position_bb'] = array(
            'title'   => esc_html__( 'Pager Position','superfine' ),
            'desc'    => esc_html__( 'Select pager position for Pager.','superfine' ),
            'std'     => 'centered',
            'type'    => 'select',
            'section' => 'it_bbpress',
            'class'   => 'pager-position',
            'choices' => array(
                'f-left' => 'Left',
                'centered' => 'Center',
                'f-right' => 'Right'
            )
        );
        $this->settings['show_welcome_bb'] = array(
            'section' => 'it_bbpress',
            'title'   => esc_html__( 'Show Welcome message','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide welcome message.','superfine' )
        );
        $this->settings['welcome_bb'] = array(
            'section' => 'it_bbpress',
            'title'   => esc_html__( 'Welcome Message','superfine' ),
            'desc'    => esc_html__( 'Insert here the welcome message that will appear in the top of the forums.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => 'Welcome to our Forums! We love to have you part of our friendly community, discovering the best in everything. As a member, the system will remember where you left off in threads and with sufficient post count.'
        );
        
        /* buddypress
        ===========================================*/
        $this->settings['buddypress-options'] = array(
            'section' => 'it_buddypress',
            'title'   => '',
            'desc'    => 'Activity',
            'type'    => 'heading',
            'class'   => '',
        );
        $this->settings['show_sidebar_bp'] = array(
            'section' => 'it_buddypress',
            'title'   => esc_html__( 'Show Side Bar','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide sidebar in buddypress page.','superfine' )
        );
        $this->settings['sidebar_position_bp'] = array(
            'title'   => esc_html__( 'Sidebar Position','superfine' ),
            'desc'    => esc_html__( 'Select the position of the sidebar.','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_buddypress',
            'class'   => '',
            'choices' => array(
                'right' => 'Right',
                'left' => 'Left'
            )
        );
        
        /* Downloads
        ===========================================*/
        $this->settings['downloads-options'] = array(
            'section' => 'it_downloads',
            'title'   => '',
            'desc'    => 'Downloads',
            'type'    => 'heading',
            'class'   => '',
        );
        $this->settings['show_sidebar_edd'] = array(
            'section' => 'it_downloads',
            'title'   => esc_html__( 'Show Side Bar','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide sidebar in downloads page.','superfine' )
        );
        $this->settings['sidebar_position_edd'] = array(
            'title'   => esc_html__( 'Sidebar Position','superfine' ),
            'desc'    => esc_html__( 'Select the position of the sidebar.','superfine' ),
            'std'     => 'right',
            'type'    => 'select',
            'section' => 'it_downloads',
            'class'   => '',
            'choices' => array(
                'right' => 'Right',
                'left' => 'Left'
            )
        );
        $this->settings['columns_edd'] = array(
            'title'   => esc_html__( 'downloads Columns','superfine' ),
            'desc'    => esc_html__( 'Select number of columns per row.','superfine' ),
            'std'     => '4',
            'type'    => 'select',
            'section' => 'it_downloads',
            'class'   => '',
            'choices' => array(
                '6' => '2 Columns',
                '4' => '3 Columns',
                '3' => '4 Columns'
            )
        );
        $this->settings['pager_style_edd'] = array(
            'title'   => esc_html__( 'Pager Style','superfine' ),
            'desc'    => esc_html__( 'Select pager style.','superfine' ),
            'std'     => '1',
            'type'    => 'select',
            'section' => 'it_downloads',
            'class'   => 'pager-style',
            'choices' => array(
                '1' => 'Default Pager Style',
                '2' => 'Diamonds Links',
                '3' => 'Circle Links',
                '4' => 'Bottom Borders',
                '5' => 'Bar Style',
                '6' => 'Bar Style 2',
                '7' => 'Bar Style 3'
            )
        );
        $this->settings['pager_position_edd'] = array(
            'title'   => esc_html__( 'Pager Position','superfine' ),
            'desc'    => esc_html__( 'Select pager position.','superfine' ),
            'std'     => 'centered',
            'type'    => 'select',
            'section' => 'it_downloads',
            'class'   => 'pager-position',
            'choices' => array(
                'f-left' => 'Left',
                'centered' => 'Center',
                'f-right' => 'Right'
            )
        );
                
        /* Contact Details
        ===========================================*/
        $this->settings['contact-headings'] = array(
            'section' => 'it_contact',
            'title'   => '',
            'desc'    => 'Contact Details',
            'type'    => 'heading',
            'class'   => '',
        );
        $this->settings['contact_address_title'] = array(
            'title'   => esc_html__( 'Address Title','superfine' ),
            'desc'    => esc_html__( 'Headquarters:','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_contact'
        );
        $this->settings['contact_address'] = array(
            'title'   => esc_html__( 'Address','superfine' ),
            'desc'    => esc_html__( 'Your contact Address.','superfine' ),
            'std'     => '123 Street Name, City, Country',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_contact'
        );
        $this->settings['contact_address_top_bar'] = array(
            'section' => 'it_contact',
            'title'   => esc_html__( 'Show Address on top bar info','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the Address on top bar info.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '0'
        );
        $this->settings['contact_phone_title'] = array(
            'title'   => esc_html__( 'Phone Title','superfine' ),
            'desc'    => esc_html__( 'Phone:','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_contact'
        );
        $this->settings['contact_phone'] = array(
            'title'   => esc_html__( 'Phone Number','superfine' ),
            'desc'    => esc_html__( 'Your contact phone number.','superfine' ),
            'std'     => '+1(888)000-0000',
            'type'    => 'text',
            'section' => 'it_contact'
        );
        $this->settings['contact_phone_top_bar'] = array(
            'section' => 'it_contact',
            'title'   => esc_html__( 'Show Phone on top bar info','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the Phone on top bar info.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        $this->settings['contact_email_title'] = array(
            'title'   => esc_html__( 'Email Title','superfine' ),
            'desc'    => esc_html__( 'Email:','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_contact'
        );
        $this->settings['contact_email'] = array(
            'title'   => esc_html__( 'Email Address','superfine' ),
            'desc'    => esc_html__( 'Your contact email address.','superfine' ),
            'std'     => 'mail@domain.com',
            'type'    => 'text',
            'section' => 'it_contact'
        );
        $this->settings['contact_email_top_bar'] = array(
            'section' => 'it_contact',
            'title'   => esc_html__( 'Show Email on top bar info','superfine' ),
            'desc'    => esc_html__( 'Show / Hide the Email on top bar info.','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1'
        );
        
        /* Coming Soon
        ===========================================*/
        $this->settings['soon-settings'] = array(
            'section' => 'it_soon',
            'title'   => '',
            'desc'    => esc_html__( 'Coming Soon Settings','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'soon-acc'
        );
        $this->settings['enable_maintenace_mode'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Enable Maintenace Mode','superfine' ),
            'type'    => 'checkbox',
            'std'     => '',
            'class'   => '',
            'desc'    => esc_html__( 'Close site for visitors & Display coming soon message.','superfine' )
        );
        $this->settings['soon_large_heading'] = array(
            'title'   => esc_html__( 'Large Heading ','superfine' ),
            'desc'    => esc_html__( 'large heading at the top of the page.','superfine' ),
            'std'     => 'We Will be back Soon',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_soon'
        );
        $this->settings['soon_lg_head_color'] = array(
            'title'   => esc_html__( 'Large Heading color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for Large Heading','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#ffffff'
        );
        $this->settings['soon_large_heading2'] = array(
            'title'   => esc_html__( 'Large Heading 2','superfine' ),
            'desc'    => esc_html__( 'large heading 2 at the top of the page .','superfine' ),
            'std'     => 'THIS SITE IS UNDER CONSTRUCTION',
            'type'    => 'text',
            'multilang' => true,
            'section' => 'it_soon'
        );
        $this->settings['soon_lg_head2_color'] = array(
            'title'   => esc_html__( 'Large Heading 2 color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for Large Heading 2','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#ffffff'
        );
        $this->settings['soon_decription'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Description','superfine' ),
            'desc'    => esc_html__( 'Insert here the description text.','superfine' ),
            'multilang' => true,
            'type'    => 'editor',
            'std'     => 'WE WILL REACH YOU VERY SOON!'
        );
        $this->settings['soon_desc_color'] = array(
            'title'   => esc_html__( 'Description color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for description','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#ffffff'
        );
        $this->settings['show_count_down'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Show Counter','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide count-down timer.','superfine' )
        );
        $this->settings['soon_date'] = array(
            'title'   => esc_html__( 'Date','superfine' ),
            'desc'    => esc_html__( 'enter date with format: year/month/day. Ex: 2020/10/20','superfine' ),
            'std'     => '2017/1/1',
            'type'    => 'text',
            'class'   => 'date-soon',
            'section' => 'it_soon'
        );
        $this->settings['digits_bg'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Digits Background Image','superfine' ),
            'desc'    => esc_html__( 'Select an image or insert a url.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['digits_color'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Digits color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for digits.','superfine' ),
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#ffffff'
        );
        $this->settings['soon_count_color'] = array(
            'title'   => esc_html__( 'Digits Bottom text color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for digits bottom text','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#ffffff'
        );
        $this->settings['soon-socials-styling'] = array(
            'section' => 'it_soon',
            'title'   => '',
            'desc'    => esc_html__( 'Social Icons','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'soon-soc-acc'
        );
        $this->settings['show_social_links'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Show Social Links','superfine' ),
            'type'    => 'checkbox',
            'std'     => '1',
            'class'   => '',
            'desc'    => esc_html__( 'Show / Hide the social links.','superfine' )
        );
        $this->settings['soon_facebook'] = array(
            'title'   => esc_html__( 'Facebook','superfine' ),
            'desc'    => esc_html__( 'Facebook link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_twitter'] = array(
            'title'   => esc_html__( 'Twitter','superfine' ),
            'desc'    => esc_html__( 'Twitter link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_linkedin'] = array(
            'title'   => esc_html__( 'LinkedIn','superfine' ),
            'desc'    => esc_html__( 'LinkedIn link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_google-plus'] = array(
            'title'   => esc_html__( 'Google+','superfine' ),
            'desc'    => esc_html__( 'Google+ link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_skype'] = array(
            'title'   => esc_html__( 'Skype','superfine' ),
            'desc'    => esc_html__( 'Skype link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_rss'] = array(
            'title'   => esc_html__( 'RSS','superfine' ),
            'desc'    => esc_html__( 'RSS link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_youtube'] = array(
            'title'   => esc_html__( 'Youtube','superfine' ),
            'desc'    => esc_html__( 'Youtube link.','superfine' ),
            'std'     => '',
            'type'    => 'text',
            'section' => 'it_soon'
        );
        $this->settings['soon_socials_bgcolor'] = array(
            'title'   => esc_html__( 'Social icons Background color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => ''
        );
        $this->settings['soon_socials_hoverbgcolor'] = array(
            'title'   => esc_html__( 'Social icons Hover Background color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for hover background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => ''
        );
        $this->settings['soon_socials_color'] = array(
            'title'   => esc_html__( 'Social icons color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color social icons text.','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#ffffff'
        );
        $this->settings['soon_socials_border'] = array(
            'title'   => esc_html__( 'Social icons Border color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for border','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => '#fff'
        );
        $this->settings['soon-styling'] = array(
            'section' => 'it_soon',
            'title'   => '',
            'desc'    => esc_html__( 'Coming Soon Styling','superfine' ),
            'type'    => 'heading',
            'std'     => '',
            'class'   => 'accordion',
            'data_id' => 'soon-styling-acc'
        );
        $this->settings['soon_bgcolor'] = array(
            'title'   => esc_html__( 'background color','superfine' ),
            'desc'    => esc_html__( 'Choose solid color for page background','superfine' ),
            'std'     => '',
            'type'    => 'color',
            'section' => 'it_soon',
            'class'   => '',
            'defcolor' => ''
        );
        $this->settings['soon_bg'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( 'Background Image','superfine' ),
            'desc'    => esc_html__( 'Select an image or insert a url.','superfine' ),
            'type'    => 'file',
            'std'     => ''
        );
        $this->settings['soon_bg_full_width'] = array(
            'section' => 'it_soon',
            'title'   => esc_html__( '100% Background Image','superfine' ),
            'desc'    => esc_html__( 'background image 100% width & height.','superfine' ),
            'type'    => 'checkbox',
            'std'     => ''
        );
        $this->settings['soon_bg_repeat'] = array(
            'title'   => esc_html__( 'Background repeat','superfine' ),
            'desc'    => esc_html__( 'Select how the background image repeats.','superfine' ),
            'std'     => '',
            'type'    => 'select',
            'section' => 'it_soon',
            'class'   => '',
            'choices' => array(
                ''  => '-- Select --',
                'no-repeat' => 'no-repeat',
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y'
            )
        );
        $this->settings['soon_bg_img_parallax'] = array(
            'title'   => esc_html__( 'Fixed Background','superfine' ),
            'desc'    => '',
            'std'     => '',
            'type'    => 'checkbox',
            'section' => 'it_soon',
            'class'   => ''
        );
        
        return $this->settings;
        
?>

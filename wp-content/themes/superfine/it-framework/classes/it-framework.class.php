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

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
} 

class ITFramework {
    
    public $sections;
    public $checkboxes;
    public $settings;
    
    public function __construct() {
        
        $this->checkboxes = array();
        $this->settings = array();
        $this->get_option();
        $this->sections['it_general']              = '<i class="fa fa-gears"></i>General Settings';
        $this->sections['it_topbar']               = '<i class="fa fa-bars"></i>Top Bar Settings';
        $this->sections['it_header']               = '<i class="fa fa-leaf"></i>Header Settings';
        $this->sections['it_footer']               = '<i class="fa fa-sliders"></i>Footer Settings';
        $this->sections['it_appearance']           = '<i class="fa fa-tachometer"></i>Appearance';
        $this->sections['it_pagetitles']           = '<i class="fa fa-cog"></i>Page Titles';
        $this->sections['it_colors']               = '<i class="fa fa-paint-brush"></i>Colors';
        $this->sections['it_typography']           = '<i class="fa fa-edit"></i>Typography';
        $this->sections['it_blogoptions']          = '<i class="fa fa-book"></i>Blog options';
        $this->sections['it_sidebars']             = '<i class="fa fa-tags"></i>Sidebars';
        $this->sections['it_socialicons']          = '<i class="fa fa-share-alt"></i>Social icons';
        $this->sections['it_portfolio']            = '<i class="fa fa-gift"></i>Project Page <span class="hint success">portfolio</span>';
        $this->sections['it_woocommerce']          = '<i class="fa fa-shopping-cart"></i>Shop <span class="hint">WooCommerce</span>';
        $this->sections['it_bbpress']              = '<i class="fa fa-comments"></i>Forums<span class="hint success">BBPress</span>';
        $this->sections['it_buddypress']           = '<i class="fa fa-group"></i>Activity<span class="hint">BuddyPress</span>';
        $this->sections['it_contact']              = '<i class="fa fa-phone-square"></i>Contact Details';
        $this->sections['it_soon']                 = '<i class="fa fa-sign-in"></i>Coming Soon Settings';
        
        add_action( 'admin_menu', array( &$this, 'add_pages' ) );
        
        add_action( 'admin_init', array( &$this, 'register_settings' ) );
                
        register_setting( 'theme_options', 'theme_options', array ( &$this, 'validate_settings' ) );
                
        if ( ! get_option( 'theme_options' ) ) $this->initialize_settings(); 
                        
    }
    
    public function add_pages() {
        
        $admin_page = add_theme_page('Theme settings', 'SuperFine', 'manage_options', 'theme-options', array( &$this, 'display_page' ) );
        
        add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'scripts' ) );
        
        add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'styles' ) );
    }

    public function create_setting( $args = array() ) {
        
        $defaults = array(
            'id'                    => 'default_field',
            'title'                 => esc_html__( 'Default Field','superfine' ),
            'desc'                  => esc_html__( 'This is a default description.','superfine' ),
            'std'                   => '',
            'type'                  => 'text',
            'src'                   => '',
            'link'                  => '',
            'group'                 => '',
            'section'               => 'it_general',
            'choices'               => array(),
            'class'                 => '',
            'defcolor'              => '',
            'data_id'               => '',
            'items'                 => array(),
            'sidebar'               => array(),
            'slides'                => array(),
            'dependency'            => array()
        );
            
        extract( wp_parse_args( $args, $defaults ) );
        
        $field_args = array(
            'type'                  => $type,
            'id'                    => $id,
            'desc'                  => $desc,
            'std'                   => $std,
            'src'                   => $src,
            'link'                  => $link,
            'group'                 => $group,
            'choices'               => $choices,
            'items'                 => $items,
            'sidebar'               => $sidebar,
            'label_for'             => $id,
            'class'                 => $class,
            'defcolor'              => $defcolor,
            'slides'                => $slides,
            'data_id'               => $data_id,
            'dependency'            => $dependency
        );
        
        if ( $type == 'checkbox' ){
            $this->checkboxes[] = $id;
        }
            
        
        add_settings_field( $id, $title, array( $this, 'display_setting' ), 'theme-options', $section, $field_args );
        
    }
    
    public function initialize_settings() {
        $default_settings = array();
        $std = '';
        foreach ( $this->settings as $id => $setting ) {
            if ( $setting['type'] != 'heading' )
                if ( isset($setting['std']) ){
                    $default_settings[$id] = $setting['std'];
                }
        }
        
        update_option( 'theme_options', $default_settings );        
        
        add_action( 'optionsframework_after_validate', array( $this, 'save_options_notice' ) );
    }
    
    public function register_settings() {
        
        foreach ( $this->sections as $slug => $title ) {
                add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'theme-options' );
        }
        
        $this->get_option();
        
        foreach ( $this->settings as $id => $setting ) {
            $setting['id'] = $id;
            $this->create_setting( $setting );
        }
    }
    
    public function display_page() {
        
        echo '<div class="theme-options">';
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ){
                echo '<div class="new-upd updated fade"><p>' . esc_html__( 'Theme options updated.','superfine' ) . '</p></div>';
                settings_errors( 'theme_options' );
            }
            echo '<span class="hidden spconfirm">'.__("Click OK to reset. Any theme settings will be lost!","superfine").'</span>';
            echo '<span class="hidden themeURI">'.THEME_URI.'</span>';
            
            echo '<div class="wrap form-wrapper theme_opts_form">';
                echo '<span class="hidden adm">'.esc_attr(admin_url()).'</span>';            
                
                echo '<form action="options.php" method="post" class="reset-abs"><button type="submit" class="but-sub" name="reset"><i class="fa fa-refresh"></i><span>' . esc_html__( 'Restore Defaults','superfine' ) . '</span></button>';
                    settings_fields( 'theme_options' );
                echo '</form>';
                    
                    echo '<div class="ui-tabs">';
                        echo '<div class="top-lft-logo"></div>';
                        echo '<div class="bot-copyrights">IT-RAYS Framework. v 1.0.0.</div>';
                        echo '<ul class="ui-tabs-nav">';
                            foreach ( $this->sections as $section_slug => $section ){
                                echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
                            }
                        echo '</ul>';
                        
                        echo '<div class="tabs_wrap">';
                            echo '<form action="options.php" method="post" class="main-options-form">';
                                settings_fields( 'theme_options' );
                                echo '<button name="Submit" type="submit" class="submit-abs"><i class="fa fa-save"></i><span>' . esc_html__( 'Save Changes','superfine' ) . '</span></button>';
                                $this->it_settings_sections( $_GET['page'] ); 
                            echo '</form>';

                        echo '</div>';
                    echo '</div>';
                
            echo '</div>';
            
            echo '<script type="text/javascript">
                jQuery(document).ready(function($) {
                    var sections = [];';
                    foreach ( $this->sections as $section_slug => $section )
                        echo "sections['$section'] = '$section_slug';";
                    
                    echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
                    wrapped.each(function() {
                        $(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
                    });
                    $(".ui-tabs-panel").each(function(index) {
                        $(this).attr("id", sections[$(this).children("h3").html()]);
                        if (index > 0)
                            $(this).addClass("ui-tabs-hiden");
                    });
                    $(".ui-tabs").tabs({
                        //fx: { opacity: "toggle", duration: "slow" }
                    });
                    $(".wrap h3, .wrap table").show();
                });
            </script>';
        echo '</div>';
        
    }
    
    public function display_section() {
        
    }
        
    public function display_setting( $args = array() ) {
        extract( $args );
        $options = get_option( 'theme_options' );
        $arri = array();
        if ( ! isset( $options[$id] ) && $type != 'checkbox' )
            $options[$id] = $std;
        elseif ( ! isset( $options[$id] ) )
            $options[$id] = 0;
        
        $field_class = '';
        if ( $class != '' )
            $field_class = ' ' . $class;    
        
        // dependencies.
        $dep_element = $dep_value = $em_arr = '';
        foreach ( $dependency as $key => $value ) {
                
            $el_arr = $dependency['element'];
            
            if ( isset( $dependency['value'] ) ){
                $vl_arr = $dependency['value'];
            }
            
            if ( isset( $dependency['not_empty'] ) ){
                $em_arr = $dependency['not_empty'];
            }
            
            $el = $vl = '';
            
            if ( is_array($el_arr)){
                
                foreach ( $el_arr as $keys => $val ) {
                    $el .= "theme_options[".$val."],";
                }
                $dep_element = " data-dependency='".$el."'";
                $dep_value = " data-dep='".$dependency['value']."'";
                
            }else if ( isset( $dependency['value']) && is_array($vl_arr)){
                
                foreach ( $vl_arr as $keya => $vala ) {
                    if ( isset( $dependency['not_empty'] ) ){
                        $vl .= "theme_options[".$vala."],";
                    }
                }
                $dep_element = " data-dependency='".$dependency['elemet']."'";
                if ( isset( $dependency['value'] ) ){
                    $dep_value = " data-dep='".$vl."'";
                }
                
            }else{
                
                if ( isset( $options[$value] ) ){
                    $dep_element = " data-dependency='theme_options[$dependency[element]]'";
                    if ( isset( $dependency['value'] ) ){
                        $dep_value = " data-dep='".$dependency['value']."'";
                    }
                }else if ( $em_arr ){
                    $dep_element = " data-dependency='theme_options[$dependency[element]]'";
                    if($em_arr == true){
                       $dep_value = " data-dep='1'"; 
                    }else{
                        $dep_value = " data-dep='0'";
                    }
                    
                }
                
            }
            
        }
        
        switch ( $type ) {
            
            case 'heading':
                
                $d_id = '';
                if($data_id){
                    $d_id = ' data-id='.$data_id;
                }
                echo '<div class="sec-heading' . $field_class . '"'.$d_id.'><h4>' . $desc . '</h4></div>';
                break;
            
            case 'checkbox':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<input class="it_checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="theme_options[' . $id . ']" value="'. esc_attr($options[$id]) .'" ' . checked( $options[$id], 1, false ) . ' /></div>';
                break;
            
            case 'select':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<select class="select' . $field_class . '" name="theme_options[' . $id . ']">';
                foreach ( $choices as $value => $label )
                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
                echo '</select></div>';
                break;
            
            case 'radio':
                
                $i = 0;
                echo '<div class="rit-inputs"'.$dep_element.$dep_value.'>';
                foreach ( $choices as $value => $label ) {
                echo '<div class="radio-select"><img class="head-img" src="'.FRAMEWORK_ASSETS_URI.'/images/" >
                <input class="radio'. $field_class .'" type="radio" name="theme_options['. $id .']" id="'. $id . $i .'" value="'. esc_attr( $value ) .'" '. checked( $options[$id], $value, false ) .'> 
                <label for="'. $id . $i .'">'. $label .'</label></div>';
                    if ( $i < count( $options ) - 1 )
                    $i++;
                }
                echo '</div>';
                break;
            
            case 'textarea':
                 
                 echo '<div class="group"'.$dep_element.$dep_value.'>';
                 if ( class_exists( 'SitePress' ) && isset($this->settings[$id]['multilang']) ) {
                     $languages2  = icl_get_languages();
                     $current2    = ICL_LANGUAGE_CODE;
                     $lang2       = ICL_LANGUAGE_NAME;
                     foreach ( $languages2 as $key2 => $value2 ) {
                        $class2      = ( $key2 == $current2 ) ? '' : 'hidden';
                        $value_key2  = ( ! empty( $options[$key2] ) ) ? $options[$key2] : '';
                        $value2 = $id.'-'.$key2;
                        if ( ! isset( $options[$value2] ) && $type != 'checkbox' )
                        $options[$value2] = $std;
                        echo '<textarea class="regular-text' . $field_class . ' '. $class2 . '" placeholder="' . $std . '" name="'. ('theme_options['. $id.'-'.$key2 .']') .'" rows="5" cols="30">' . format_for_editor( $options[$value2] ) . '</textarea>';
                     }
                     echo '<div class="langg">'.__('You Are Editing in Language.','superfine').'( <strong>'.$lang2.'</strong> )</div>';
                 } else {
                    echo '<textarea class="regular-text' . $field_class . '" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . format_for_editor( $options[$id] ) . '</textarea>'; 
                 }
                 echo '</div>';
                 break;
            
            case 'editor':                
                
                echo '<div class="wp-ed"'.$dep_element.$dep_value.'>';
                if ( class_exists( 'SitePress' ) && isset($this->settings[$id]['multilang']) ) {
                    $languages  = icl_get_languages();
                     $current    = ICL_LANGUAGE_CODE;
                     $lang       = ICL_LANGUAGE_NAME;
                     foreach ( $languages as $key => $value ) {
                        $class      = ( $key == $current ) ? '' : 'hidden';
                        $value_key  = ( ! empty( $options[$key] ) ) ? $options[$key] : '';
                        $value = $id.'-'.$key;
                        if ( ! isset( $options[$value] ) && $type != 'checkbox' )
                        $options[$value] = $std;
                        
                        $content = $options[$value];
                        $editor_id = $id.'-'.$key;
                        $editor_settings = array(
                            'textarea_name' => 'theme_options[' . $id.'-'.$key . ']',
                            'textarea_rows'=>20,
                            'tinymce' => FALSE
                        );
                        echo '<div class="'.$class.'">';
                        echo wp_editor( $content, $editor_id, $editor_settings );
                        echo '</div>';
                     }
                    echo '<div class="langg">'.__('You Are Editing in Language.','superfine').'( <strong>'.$lang.'</strong> )</div>';
                }else {
                    $content = $options[$id];
                    $editor_id = $id;
                    $editor_settings = array(
                        'textarea_name' => 'theme_options[' . $id . ']',
                        'textarea_rows'=>20,
                        'tinymce' => FALSE
                    ); 
                    echo wp_editor( $content, $editor_id, $editor_settings );
                }
                
                echo '</div>';
                break;
                
            case 'password':
                
                echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="theme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
                break;
            
            case 'text':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                if ( class_exists( 'SitePress' ) && isset($this->settings[$id]['multilang']) ) {
                     $languages  = icl_get_languages();
                     $current    = ICL_LANGUAGE_CODE;
                     $lang       = ICL_LANGUAGE_NAME;
                     foreach ( $languages as $key => $value ) {
                        $type       = ( $key == $current ) ? 'text' : 'hidden';
                        $value_key  = ( ! empty( $options[$key] ) ) ? $options[$key] : '';
                        $value = $id.'-'.$key;
                        if ( ! isset( $options[$value] ) && $type != 'checkbox' )
                        $options[$value] = $std;
                        echo '<input class="regular-text' . esc_attr( $field_class ) . '" type="'. $type .'" placeholder="' . $std . '" name="'. ('theme_options['. $id.'-'.$key .']') .'" value="'. esc_attr( $options[$value] ) .'" />';
                     }
                     echo '<div class="langg">'.__('You Are Editing in Language.','superfine').'( <strong>'.$lang.'</strong> )</div>';
                }else{
                    echo '<input class="regular-text' . esc_attr( $field_class ) . '" type="text" id="' . esc_attr( $id ) . '" name="theme_options[' . $id . ']" placeholder="' . esc_attr( $std ) . '" value="' . esc_attr( $options[$id] ) . '" />'; 
                }
                echo '</div>';
                break;
            
            case 'number':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<input class="regular-text' . $field_class . '" type="number" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" /> </div>';
                break;
            
            case 'email':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<input class="regular-text' . $field_class . '" type="email" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" /> </div>';
                break;
            
            case 'url':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<input class="regular-text' . $field_class . '" type="url" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" /> </div>';
                break;
                 
            case 'color':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<input class="color-chooser'. $field_class .'" type="text" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '"  data-default-color="' . $defcolor . '" /></div>';
                break;    
            
            case 'image':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<img class="img-choose' . $field_class . '" id="' . $id . '" name="theme_options[' . $id . ']" placeholder="' . $std . '"  /></div>';
                break;
                 
            case 'file':
                
                echo '<div class="inputs"'.$dep_element.$dep_value.'>';
                echo '
                    <input class="regular-text'. $field_class .'" id="' . $id . '" type="text" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />
                    <button class="upload_image_button" type="button">Upload Image</button><div class="clear-img"><img class="logo-im" alt="" src="'. esc_attr( $options[$id] ) .'" /> <a class="remove-img" href="#" title="Remove Image"></a></div></div>';
                break;
            
            case 'arrayItems':
                
                echo '<div class="group"'.$dep_element.$dep_value.'>';
                echo '<div class="patterns-div' . $field_class . '"><input class="hidden' . $field_class . '" id="' . $id . '" type="text" name="theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
                    foreach ( $items as $value => $label )
                    echo '<img src="' . esc_attr( $value ) . '" class="pattern-img" />';
                echo '</div></div>';
                break;
                
            case 'sidebars':
                
                echo '<a class="button button-primary add_bar" href="#">Add sidebar</a><div class="app_div"></div>';
                echo '<div><input class="bar_txt ' . $field_class . '" type="hidden" name="theme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" /></div>'; 
                break;
            
            case 'plugin_label':
                
                echo '<div class="' . $field_class . '"'.$id.'><h4>' . $title . '</h4></div>'; 
                break;
            
            case 'locations':
                
                global $vllu;
                $vllu = $options[$id];
                echo '<a class="button button-primary add_location" href="#">Add Office</a>';
                        echo '<div><input class="loc_txt ' . $field_class . '" type="hidden" id="'.$id.'" name="theme_options[' . $id . ']" value="' . esc_attr( $vllu ) . '" /></div>';
                break;
                
            case 'icon':
                
                echo '<i class="ico"></i>
                <a class="button button-primary btn_icon" href="#">Add Icon</a>
                <input type="hidden" name="theme_options[' . $id . ']" id="' . $id . '" class="icon_cust '.$field_class.'" value="' . esc_attr( $options[$id] ) . '" />
                <a class="button icon-remove" title="Remove Icon"><i class="fa fa-times"></i></a>';
                break;
            
            case 'socials':
                global $ico;
                $ico = $options[$id];
                echo '<a class="button button-primary add_social" href="#">Add Social Icon</a>';
                echo '<div><input class="loc_txt ' . $field_class . '" type="hidden" id="'.$id.'" name="theme_options[' . $id . ']" value="' . esc_attr( $ico ) . '" /></div>';
                break;
            
            case 'import_data':
                
                echo '<a class="button button-primary import_btn" href="#">Import Demo Data</a><span class="loader"></span><div class="import_message"></div><div class="noticeImp">This can take several minutes, please wait and do not worry!</div>
                <div class="attachments"><input type="checkbox" name="' . $id . '" id="' . $id . '" value="1"' . checked( $options[$id], 1, false ) .'/>  Download and import file attachments!</div>';
                break; 
               
            case 'link':
                 
                 echo '<div class="group"'.$dep_element.$dep_value.'>';
                 echo '<a href="' . $link . '">'. $desc .'</a></div>';
                 break; 
            
            case 'label':
                 
                 echo '<div class="group ' . $field_class . '"'.$dep_element.$dep_value.'>';
                 echo '<label>'. $desc .'</div>';
                 break;

        }
    }
    
    public function get_option() {
        require_once(  FRAMEWORK_DIR . '/config/it-framework-config.php' );
    }        
    
    public function it_settings_sections( $page ) {
        global $wp_settings_sections, $wp_settings_fields;

        if ( ! isset( $wp_settings_sections[$page] ) )
            return;
            
        foreach ( (array) $wp_settings_sections[$page] as $section ) {
            if ( $section['title'] )
                echo "<h3>{$section['title']}</h3>\n";

            if ( $section['callback'] )
                call_user_func( $section['callback'], $section );

            if ( ! isset( $wp_settings_fields ) || !isset( $wp_settings_fields[$page] ) || !isset( $wp_settings_fields[$page][$section['id']] ) )
                continue;
            echo '<div class="form-div"><div class="opts-ul '.$section["id"].'">';
            $this->it_settings_fields( $page, $section['id'] );
            echo '</div></div>';
        }         
    }

    public function it_settings_fields($page, $section) {
        global $wp_settings_fields;
        
        if ( ! isset( $wp_settings_fields[$page][$section] ) )
            return;

        foreach ( (array) $wp_settings_fields[$page][$section] as $field ) {
            $gro='';
            if($field['args']['group']){
                $gro = ' group_'.$field['args']['group'];
            }
            echo '<div class="section'.$gro.'">';
            if ( !empty($field['args']['label_for']) )
                echo '<div class="lbl"><label class="opt-lbl" for="' . esc_attr( $field['args']['label_for'] ) . '">' . $field['title'] . '</label><span class="description">' . $field['args']['desc'] . '</span></div>';
            else
                echo $field['title'];
            call_user_func($field['callback'], $field['args']);
            echo '</div>';
        }
    }
    
    public function validate_settings( $input ) { 
        $options = get_option( 'theme_options' );
        
        if ( isset( $_POST['reset'] ) ) {
            return $this->get_default_values();
        }else{
            return $input;
        }
        
        $clean = array();
        
        
        foreach ( $options as $option ) {

            if ( ! isset( $option['id'] ) ) {
                continue;
            }

            if ( ! isset( $option['type'] ) ) {
                continue;
            }

            $id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

            // Set checkbox to false if it wasn't sent in the $_POST
            if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
                $input[$id] = false;
            }

            // Set each item in the multicheck to false if it wasn't sent in the $_POST
            if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
                foreach ( $option['options'] as $key => $value ) {
                    $input[$id][$key] = false;
                }
            }

            // For a value to be submitted to database it must pass through a sanitization filter
            if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
                $clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
            }
        }

        // Hook to run after validation
        do_action( 'optionsframework_after_validate', $clean );

        return $clean; 
    }
    
    public function get_default_values() {
        $output = array();
        foreach ( (array) $this->settings as $option ) {
            if ( ! isset( $option['id'] ) ) {
                continue;
            }
            if ( ! isset( $option['std'] ) ) {
                continue;
            }
            if ( ! isset( $option['type'] ) ) {
                continue;
            }
            if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
                $output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
            }
        }
        return $output;
    }
    
    public function scripts() {
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('upload-js', FRAMEWORK_ASSETS_URI . '/js/upload.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('select-js', FRAMEWORK_ASSETS_URI . '/js/jquery.dd.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('popup-js', FRAMEWORK_ASSETS_URI.'/js/popup.js' ,array('jquery'), '1.0.0', true);
        wp_enqueue_script('framework-js', FRAMEWORK_ASSETS_URI . '/js/framework.js', array('jquery'), '1.0.0', true);
    }
    
    public function styles() {
        wp_enqueue_style('assets', FRAMEWORK_ASSETS_URI.'/css/assets.css');
        wp_enqueue_style( 'framework-css', FRAMEWORK_ASSETS_URI . '/css/framework.css' );
        wp_enqueue_style('thickbox');
        wp_enqueue_style( 'wp-color-picker' );
    }
    
}
$theme_options = new ITFramework();



<?php
return array(
    "name" => esc_html__("Dividers", "js_composer"),
    "base" => "it_divider",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'adds block separators with many styles', 'js_composer' ),
    'icon' => 'no-bg fa fa-arrows-h',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Divider Style",'superfine'),
            "param_name" => "divider_class",
            "value" => array(
                'Short With Centered Icon'                  =>'1',
                'Wide With Centered Icon'                   =>'2',
                'Wide With Centered BG Icon'                =>'3',
                'Wide With Centered Outlined Icon'          =>'4',
                'Short With Left Icon'                      =>'5',
                'Wide With Left Icon'                       =>'6',
                'Wide With Left BG Icon'                    =>'7',
                'Wide With Left Outlined Icon'              =>'8',
                'Short With Right Icon'                     =>'9',
                'Wide With Right Icon'                      =>'10',
                'Wide With Right BG Icon'                   =>'11',
                'Wide With Right Outlined Icon'          =>'12',
                'Short With Two Centered Icons'             =>'13',
                'Back To Top Icon'                          =>'14',
            ),
            "description" => esc_html__("Select Divider style.",'superfine')
         ),
         array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1'
        ),
         icons_lib(),
         icons_fa(),
         icons_oc(),
         icons_ti(),
         icons_entypo(),
         icons_line(),
         icons_px(),
         it_animation(),
         it_animation_delay(),
         it_animation_duration(),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Color",'superfine'),
            "param_name" => "div_i_color",
            "group"  => "Icon",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("select Icon color.",'superfine'),
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Background Color",'superfine'),
            "param_name" => "div_bg_color",
            "group"  => "Icon",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("select Icon Background color.",'superfine'),
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    

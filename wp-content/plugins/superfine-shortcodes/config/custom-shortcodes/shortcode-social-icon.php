<?php
return array(
    "name" => esc_html__("Social Icon", 'js_composer'),
    "base" => "it_social_icon",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'Add Social icon', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-share',
    "as_child" => array('only' => 'it_social_icons'),
    "params" => array(
        array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Use Icon', 'js_composer' ),
        'param_name' => 'use_icon',
        'value' => array(
            esc_html__( 'yes', 'js_composer' ) => '1',
        ),
        'std'  => '1',
        'group' => 'General'
        ),
        array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Title",'superfine'),
        "param_name" => "icon_title",  
        "value" => '',
        "description" => esc_html__("type the icon title.",'superfine') ,
        'group' => 'General'
        ),
        array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Link",'superfine'),
        "param_name" => "icon_link",  
        "value" => '',
        "description" => esc_html__("type the icon link.",'superfine') ,
        'group' => 'General'
        ),
        array(
        "type" => "textfield",
        "heading" => esc_html__("Extra class name", "js_composer"),
        "param_name" => "el_class",
        'group' => 'General',
        "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer"),
        ),
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        array(
        "type" => "colorpicker",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Color",'superfine'),
        "param_name" => "icon_color",
        'edit_field_class'    => 'vc_col-xs-4 vc_column',
        "description" => esc_html__("select icon color.",'superfine'),
        'group' => 'Icon'
        ),
        array(
        "type" => "colorpicker",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Background Color",'superfine'),
        "param_name" => "icon_bg_color",
        'edit_field_class'    => 'vc_col-xs-4 vc_column',
        "description" => esc_html__("select icon background color.",'superfine'),
        'group' => 'Icon'
        ),
        array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Has Tooltip ?', 'js_composer' ),
        'param_name' => 'icon_tooltip',
        'edit_field_class'    => 'vc_col-xs-4 vc_column',
        'description' => esc_html__( 'If selected, this will show tooltip.', 'js_composer' ),
        'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        'group' => 'Icon'
        ),
        array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Shape",'superfine'),
        "param_name" => "icon_shape",
        'edit_field_class'    => 'vc_col-xs-6 vc_column',
        "value" => array(
            "Default Theme Shape" => "shape",
            "New Angle" => "new-angle",
            "Round" => "round",
            "Square" => "square",
            "Rounded" => "border5px",
            "Left Angle" => "left-angle",
            "Right Angle" => "right-angle",
            "Top Angle" => "top-angle",
            "Bottom Angle" => "bottom-angle",
        ),
        "description" => esc_html__("Select icon shape.",'superfine'),
        'group' => 'Icon'
        ),
        array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Size",'superfine'),
        "param_name" => "icon_size", 
        'edit_field_class'    => 'vc_col-xs-6 vc_column',
        "value" => array(
            "Small" => "sm-icon",
            "Normal" => "md-icon",
            "Large" => "lg-icon",
            "X-Large" => "xl-icon",
        ),
        "description" => esc_html__("Select icon size.",'superfine'),
        'group' => 'Icon'
        ),
    )
);
    

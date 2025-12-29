<?php
return array(
    'name' => esc_html__( 'Heading 2', 'js_composer' ),
    'base' => 'it_heading',
    'icon' => 'no-bg fa fa-header',
    'save_always' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'other custom heading with many styles', 'js_composer' ),
    'params' => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Style",'superfine'),
            "param_name" => "heading_style",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => array(
                'Full Background Heading' =>'style1',
                'Centered Heading 1' =>'style2',
                'Centered Heading 2' =>'style3',
                'Centered Heading 3' =>'style4',
                'Centered Heading 4' =>'style5',
                'Centered Heading 5' =>'style6',
                'Side Heading 1' =>'side_head',
                'Side Heading 2' =>'style7',
                'Side Heading 3' =>'style8',
                'Side Heading 4' =>'style9',
                'Side Heading 5' =>'style10',
            ),
            "std" => "full-heading", 
        ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            'param_name' => 'use_icon',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Text', 'js_composer' ),
            'param_name' => 'text', 
            'admin_label' => true,
            'group' => 'Heading',
            'value' => esc_html__( 'This is custom heading element', 'js_composer' ),
        ),array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Custom Color', 'js_composer' ),
            'param_name' => 'head_txt_color',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'group' => 'Heading',
            'description' => esc_html__( '', 'js_composer' ),
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'param_name' => 'head_extrabold',
            'group' => 'Heading',
            'value' => array(
                '-- Select --' => '',
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
            ),
            'std'  => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font Size', 'js_composer' ),
            'param_name' => 'head_size',
            'group' => 'Heading',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'value'  => ''
        ), 
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Uppercase', 'js_composer' ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'param_name' => 'head_upper',
            'group' => 'Heading',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Text', 'js_composer' ),
            'param_name' => 'content',
            'holder' => 'div',
            'admin_label' => true,
            'group' => 'Sub Heading',
            'value' => esc_html__( 'This is custom sub heading text', 'js_composer' ),
        ),array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Font Weight', 'js_composer' ),
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            'param_name' => 'extrabold',
            'group' => 'Sub Heading',
            'value' => array(
                '-- Select --' => '',
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
            ),
            'std'  => ''
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Uppercase', 'js_composer' ),
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            'param_name' => 'upper',
            'group' => 'Sub Heading',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font Size', 'js_composer' ),
            'param_name' => 'sub_size',
            'group' => 'Sub Heading',
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            'value'  => ''
        ), 
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Icon Color', 'js_composer' ),
            'param_name' => 'icon_color',
            'description' => esc_html__( '', 'js_composer' ),
            'group'  => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true)
        ),
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),    
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
        )
    )
);
    
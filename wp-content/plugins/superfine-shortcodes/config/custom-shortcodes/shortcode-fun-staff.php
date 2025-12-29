<?php
return array(
    "name" => esc_html__("Fun Staff", 'js_composer'),
    "base" => "it_fun_staff",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-paper-plane-o',
    "content_element" => true,
    "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Item Title",'superfine'),
            "param_name" => "item_title",
            "group" => 'Title',
            "value" => '',
            "description" => esc_html__("type the item title.",'superfine')
         ),
         array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "title_color",
            "group" => 'Title',
            "description" => esc_html__("color of the title.", "js_composer")
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'param_name' => 'use_icon',
            "group" => "Title",
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1'
        ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Item Value",'superfine'),
            "param_name" => "item_value",
            "value" => '',
            "group" => 'Value',
            "description" => esc_html__("type here the item value.",'superfine'),
         ),
         array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Numbers Animations in counter ?', 'js_composer' ),
            'param_name' => 'has_counter',
            "group" => 'Value',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "value_color",
            "group" => 'Value',
            "description" => esc_html__("color of the value number.", "js_composer")
        ),
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon Size", "js_composer"),
            "param_name" => "icon_size",
            "group" => 'Icon',
            "description" => esc_html__("Icon Font Size.", "js_composer"),
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true)
        ),array(
            "type" => "dropdown",
            "holder" => "div",
            "group" => 'Icon',
            "class" => "ic_style",
            "heading" => esc_html__("Icon Style",'superfine'),
            "param_name" => "icon_style",
            "value" => array(
                'Circle'  => 'circle',
                'Shape'   => 'shape',
            ),
            "std" => "circle",
            "description" => esc_html__("select the icon style.",'superfine'),
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true)
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Dimensions", "js_composer"),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            "param_name" => "dimensions",
            "group" => 'Icon',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("Width of icon circle.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Circle Width", "js_composer"),
            "param_name" => "width",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("the circle size.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Circle Value", "js_composer"),
            "param_name" => "circle_value",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("the Width of the border.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Border Width", "js_composer"),
            "param_name" => "bordersize",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("the Width of the border.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Circle Type", "js_composer"),
            "param_name" => "type",
            "group" => 'Icon',
            "value"     => array(
                "Full" => "",
                "Half" => "half"
            ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("the circle type Full or Half.", "js_composer")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Foreground Color", "js_composer"),
            "param_name" => "fg_color",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("foreground color of the circle.", "js_composer")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "js_composer"),
            "param_name" => "bg_color",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("background color of the cicle.", "js_composer")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Fill Color", "js_composer"),
            "param_name" => "fill",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("background color of the whole circle.", "js_composer")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color", "js_composer"),
            "param_name" => "icon_color",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'circle',
            ),
            "description" => esc_html__("Choose the color of the icon.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape Type", "js_composer"),
            "param_name" => "icon_shape",
            "group" => 'Icon',
            "value"     => array(
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
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'shape',
            ),
            "description" => esc_html__("the circle type Full or Half.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shape Style", "js_composer"),
            "param_name" => "shape_style",
            "group" => 'Icon',
            "value"     => array(
                "Filled" => "filled",
                "Outlined" => "outlined",
            ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'shape',
            ),
            "description" => esc_html__("the circle type Full or Half.", "js_composer")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Shape BG Color", "js_composer"),
            "param_name" => "shape_color",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'shape',
            ),
            "description" => esc_html__("background color of the Shape.", "js_composer")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color", "js_composer"),
            "param_name" => "shape_icon_color",
            "group" => 'Icon',
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'dependency' => array(
                'element' => 'icon_style',
                'value' => 'shape',
            ),
            "description" => esc_html__("background color of the Icon.", "js_composer")
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
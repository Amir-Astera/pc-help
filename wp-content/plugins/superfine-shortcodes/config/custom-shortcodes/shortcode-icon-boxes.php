<?php
return array(
    "name" => esc_html__("Icon Box", 'js_composer'),
    "base" => "it_iconbox",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-bars',
    'description' => esc_html__( 'icon boxes with many styles', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Box Style",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "iconbox_style",
            "value" => array(
                'style 1' =>'1',
                'style 2' =>'2',
                'style 3' =>'3',
                'style 4' =>'4',
                'style 5' =>'5',
                'style 6' =>'6',
                'style 7' =>'7',
                'style 8' =>'8',
                'style 9' =>'9',
                'style 10' =>'10',
            ),
            "description" => esc_html__("Select Box style.",'superfine'),
         ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use Icon', 'js_composer' ),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            'param_name' => 'use_icon',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'std'  => '1'
        ),array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Box Title",'superfine'),
            "param_name" => "iconbox_title",
            "value" => '',
            "description" => esc_html__("type the box title.",'superfine')
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "js_composer"),
            "param_name" => "iconbox_title_color",
            "description" => esc_html__("color of the title.", "js_composer")
        ),array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Box Content",'superfine'),
            "param_name" => "content",
            "value" => esc_html__("Hello, I'm the box content you can change me to whatever text you want.",'superfine'),
            "description" => esc_html__("type here the description for the icon box content.",'superfine')
         ),
        it_animation(),
        it_animation_delay(),
        it_animation_duration(),
        icons_lib(),
        icons_fa(),
        icons_oc(),
        icons_ti(),
        icons_entypo(),
        icons_line(),
        icons_px(),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color", "js_composer"),
            "param_name" => "iconbox_icon_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "group" => "Icon",
            "description" => esc_html__("color of the icon.", "js_composer")
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Background Color", "js_composer"),
            "param_name" => "iconbox_icon_bg_color",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "group" => "Icon",
            "description" => esc_html__("Background color of the icon.", "js_composer")
        ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Style",'superfine'),
            "param_name" => "icon_bg_style",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => array(
                'Filled' =>'filled',
                'Outlined' =>'outlined',
                'transparent' =>'transparent',
            ),
            "description" => esc_html__("Select Icon style.",'superfine'),
            'group'       => 'Icon',
            'dependency' => array(
                'element' => 'use_icon', 'not_empty' => true,
            ),
            'dependency' => array(
                'element' => 'iconbox_style','value' => '3'
            )  
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Shape",'superfine'),
            "param_name" => "icon_box_shape",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => array(
                'New Angle' =>'new-angle',
                'Circle' =>'circle',
                'Square' =>'square',
                'Rounded' =>'rounded',
                'Right Angle' =>'right-angle',
                'Left Angle' =>'left-angle',
                'Top Angle' =>'top-angle',
                'Bottom Angle' =>'bottom-angle',
                'Theme Default Shape' =>'shape',
            ),
            "description" => esc_html__("Select Icon shape.",'superfine'),
            "group" => "Icon",
            'dependency' => array(
                'element' => 'iconbox_style',
                'value' => '3'
            ),
         ),array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon text",'superfine'),
            "param_name" => "icon_text",
            "group" => "Icon",
            'dependency' => array( 'element' => 'use_icon', 'not_empty' => true),
            "value" => "",
            "description" => esc_html__("<b>Note:</b>This Will replace the icon with your new text.",'superfine')
         ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Read More Link ?", "js_composer"),
            "param_name" => "show_more",
            'edit_field_class'    => 'vc_col-md-3 vc_column t_slides',
            'group'       => 'More Link',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Read More Text",'superfine'),
            "param_name" => "iconbox_more_text",
            "value" => '',
            "description" => esc_html__("type here the text for Read More.",'superfine'),
            'group'       => 'More Link'
         ),array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Box Link",'superfine'),
            "param_name" => "iconbox_more",
            "value" => '',
            "description" => esc_html__("type here the link for this box.",'superfine'),
            'group'       => 'More Link'
         ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "iconbox_button_bg_color",
            'group'       => 'More Link',
            'edit_field_class'    => 'vc_col-md-6 vc_column t_slides',
            "description" => esc_html__("Background color of the read more button.", "js_composer")
        ),array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", "js_composer"),
            "param_name" => "iconbox_button_color",
            'edit_field_class'    => 'vc_col-md-6 vc_column t_slides',
            'group'       => 'More Link',
            "description" => esc_html__("color of the read more button.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            'group' => 'Extras',
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    
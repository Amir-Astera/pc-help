<?php
return array(
    "name" => esc_html__("Features", 'js_composer'),
    "base" => "it_feature", 
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'adds feature', 'js_composer' ),
    'icon' => 'no-bg fa fa-cogs',
    "class" => "",
    "content_element" => true,
    "params" => array(
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Feature Style",'superfine'),
            "param_name" => "feature_style",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => array(
                'style 1' =>'1',
                'style 2' =>'2',
                'style 3' =>'3'
            )
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "feature_image",
            "value" => '',
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'superfine'),
            "param_name" => "feature_title"
         ),array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content",'superfine'),
            "holder" => "div",
            "param_name" => "content",
            "value" => esc_html__("Hello, I'm the box content you can change me to whatever text you want.",'superfine'),
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
            "heading" => esc_html__("Box Link",'superfine'),
            "param_name" => "feature_more",
            "value" => '',
            "description" => esc_html__("type here the link for this box.",'superfine'),
            'group'       => 'More Link'
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    

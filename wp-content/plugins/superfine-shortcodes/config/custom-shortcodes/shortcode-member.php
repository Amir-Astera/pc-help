<?php
return array(
    "name" => esc_html__("Team Member", 'js_composer'),
    "base" => "it_member", 
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'adds team member with details', 'js_composer' ),
    'icon' => 'no-bg fa fa-user',
    "class" => "",
    "content_element" => true,
    "params" => array(
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Style",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "member_style",
            "value" => array(
                'style 1' =>'1',
                'style 2' =>'2',
                'style 3' =>'3',
                'style 4' =>'4',
                'style 5' =>'5',
            )
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "image",
            "value" => '',
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Name",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "member_name"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Position",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "member_position"
         ),array(
            "type" => "textarea",
            "heading" => esc_html__("Details",'superfine'),
            "param_name" => "member_details"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Facebook",'superfine'),
            "param_name" => "member_fb",
            "group"     => "Socials"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Twitter",'superfine'),
            "param_name" => "member_tw",
            "group"     => "Socials"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("LinkedIn",'superfine'),
            "param_name" => "member_ln",
            "group"     => "Socials"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Google Plus",'superfine'),
            "param_name" => "member_go",
            "group"     => "Socials"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Skype",'superfine'),
            "param_name" => "member_sk",
            "group"     => "Socials"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    

<?php
return array(
    "name" => esc_html__("Camera Slide", 'js_composer'),
    "base" => "it_camera_slide",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-camera',
    "as_child" => array('only' => 'it_camera_slideshow'),
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Title",'superfine'),
            "param_name" => "slide_title",
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Link",'superfine'),
            "param_name" => "slide_link",
            "value" => '',
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Thumbnail",'superfine'),
            "param_name" => "thumbnail",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => '',
         ),array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'superfine'),
            "param_name" => "image",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => '',
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    

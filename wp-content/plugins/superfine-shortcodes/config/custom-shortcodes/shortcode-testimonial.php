<?php
return array(
    "name" => esc_html__("Testimonial BlockQuote", 'js_composer'),
    "base" => "it_testimonial",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    "content_element" => true,
    'icon' => 'no-bg fa fa-comment-o',
    "as_child" => array('only' => 'vc_testimonials'),
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Author",'superfine'),
            "param_name" => "author",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Slogan",'superfine'),
            "param_name" => "slogan",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "value" => '',
         ),
         array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'superfine'),
            "param_name" => "image",
            "value" => '',
         ),
         array(
            "type" => "textarea_html",
            "heading" => esc_html__("Text",'superfine'),
            "param_name" => "content",
            "value" => esc_html__("Hello, I'm the box content you can change me to whatever text you want.",'superfine'),
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);

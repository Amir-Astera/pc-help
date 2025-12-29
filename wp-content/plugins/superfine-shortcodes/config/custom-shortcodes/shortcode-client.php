<?php
return array(
    "name" => esc_html__("Client", 'js_composer'),
    "base" => "it_client",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-user',
    "class" => "",
    "content_element" => true,
    "show_settings_on_create" => true,
    "as_child" => array('only' => 'it_clients'),
    "params" => array(
         array(
            "type" => "attach_image",
            "heading" => esc_html__("Image",'superfine'),
            "param_name" => "image",
            "value" => '',
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Link",'superfine'),
            "param_name" => "client_link"
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    

<?php
return array(
    "name" => esc_html__("Social Icons", "js_composer"),
    "base" => "it_social_icons",
    "as_parent" => array('only' => 'it_social_icon'),
    'icon' => 'no-bg fa fa-share-alt',
    'show_settings_on_create' => false,
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    "content_element" => true,
    'description' => esc_html__( 'Add Social Icons', 'js_composer' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
); 
    

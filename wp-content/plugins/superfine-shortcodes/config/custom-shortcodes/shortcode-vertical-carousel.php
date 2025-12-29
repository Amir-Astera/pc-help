<?php
return array(
    "name" => esc_html__("Vertical Carousel", "js_composer"),
    "base" => "it_v_carousel",   
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-sliders',
    'description' => esc_html__( 'container to show list of carousel slides', 'js_composer' ),
    "as_parent" => array('only' => 'it_v_slide'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "v_slides",
            'value' => '1',
            'edit_field_class'    => 'vc_col-xs-4 vc_column c_slides',
            "description" => esc_html__("number of visible slides.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "v_scroll",
            'value' => '1',
            'edit_field_class'    => 'vc_col-xs-4 vc_column c_slides',
            "description" => esc_html__("number of slides that will scroll.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slide Speed", "js_composer"),
            "param_name" => "v_speed",
            'value' => '300',
            'edit_field_class'    => 'vc_col-xs-4 vc_column c_slides',
            "description" => esc_html__("select the speed that slide will be changed.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Fade ?", "js_composer"),
            "param_name" => "v_fade",
            'edit_field_class'    => 'vc_col-xs-3 vc_column c_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Auto Play ?", "js_composer"),
            "param_name" => "v_auto",
            'edit_field_class'    => 'vc_col-xs-3 vc_column c_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Arrows ?", "js_composer"),
            "param_name" => "v_arrows",
            'edit_field_class'    => 'vc_col-xs-3 vc_column c_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Bullets ?", "js_composer"),
            "param_name" => "v_dots",
            'edit_field_class'    => 'vc_col-xs-3 vc_column c_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite ?", "js_composer"),
            "param_name" => "v_infinite",
            'edit_field_class'    => 'vc_col-xs-3 vc_column c_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
);
    

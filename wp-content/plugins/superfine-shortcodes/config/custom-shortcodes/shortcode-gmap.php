<?php
return array(
    "name" => esc_html__("Google Map", 'js_composer'),
    "base" => "it_gmap",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-map-marker',
    "class" => "",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Zoom', 'js_composer' ),
            'param_name' => 'gmap_zoom',
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            'value' => '',
            'description' => esc_html__( 'Change zoom value.', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Height', 'js_composer' ),
            'param_name' => 'gmap_height',
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            'value' => '',
            'description' => esc_html__( 'Add map height value.', 'js_composer' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Disable Mouse Wheel', 'js_composer' ),
            'param_name' => 'no_scroll',
            'description' => esc_html__( 'If selected, the google map scroll will be disabled.', 'js_composer' ),
            'value' => array( esc_html__( 'Yes', 'js_composer' ) => '1' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Latitude', 'js_composer' ),
            'param_name' => 'gmap_latitude',
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            'description' => esc_html__( '', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Longitude', 'js_composer' ),
            'param_name' => 'gmap_longitude',
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            'description' => esc_html__( '', 'js_composer' )
        ),
        array(
            'type' => 'textarea_safe',
            'heading' => esc_html__( 'Headquarter', 'js_composer' ),
            'param_name' => 'gmap_headquarter',
            'description' => esc_html__( '', 'js_composer' )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
        )
    )
);
    

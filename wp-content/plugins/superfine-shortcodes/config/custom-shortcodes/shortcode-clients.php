<?php
return array(
    "name" => esc_html__("Clients", "js_composer"),
    "base" => "it_clients",   
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-users',
    'description' => esc_html__( 'container to show list of clients or images', 'js_composer' ),
    "as_parent" => array('only' => 'it_client'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Block Style",'superfine'),
            "param_name" => "cl_style",
            "value" => array(
                'Grid 6 Columns' =>'1',
                'Grid 4 Columns' =>'2',
                'Grid 3 Columns' =>'3',
                'Carousel' =>'4',
            ),
            "description" => esc_html__("Select Item style.",'superfine')
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "cl_slides",
            'group'  => 'Carousel',
            'value' => '2',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            "description" => esc_html__("number of visible slides.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "cl_scroll",
            'value' => '2',
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            "description" => esc_html__("number of slides that will scroll.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slide Speed", "js_composer"),
            "param_name" => "cl_speed",
            'value' => '300',
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            "description" => esc_html__("select the speed that slide will be changed.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Fade ?", "js_composer"),
            "param_name" => "cl_fade",
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Auto Play ?", "js_composer"),
            "param_name" => "cl_auto",
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Arrows ?", "js_composer"),
            "param_name" => "cl_arrows",
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Bullets ?", "js_composer"),
            "param_name" => "cl_dots",
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite ?", "js_composer"),
            "param_name" => "cl_infinite",
            'group'  => 'Carousel',
            'dependency' => array(
                'element' => 'cl_style',
                'value' => '4'
            ),
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
    

<?php
return array(
    "name" => esc_html__("Testimonials", "js_composer"),
    "base" => "vc_testimonials",
    "as_parent" => array('only' => 'it_testimonial'),
    'icon' => 'no-bg fa fa-comments-o',
    'save_always' => true,
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    "content_element" => true,
    'description' => esc_html__( 'Add testimonial parent container', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Style",'superfine'),
            "param_name" => "block_style",
            "value" => array(
                'Style 1' =>'1',
                'Style 2' =>'2',
                'Style 3' =>'3',
                'Style 4' =>'4',
                'Style 5' =>'5',
                'Style 6' =>'6',
                'Style 7' =>'7',
                'Simple Carousel' =>'simple',
                'Grid style' =>'8',
            ),
            "description" => esc_html__("Select Item style.",'superfine')
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "testo_slides",
            'value' => '2',
            'edit_field_class'    => 'vc_col-xs-4 vc_column t_slides',
            "description" => esc_html__("number of visible slides.", "js_composer"),
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "testo_scroll",
            'value' => '2',
            'edit_field_class'    => 'vc_col-xs-4 vc_column t_slides',
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
            "description" => esc_html__("number of slides that will scroll.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slide Speed", "js_composer"),
            "param_name" => "testo_speed",
            'value' => '300',
            'edit_field_class'    => 'vc_col-xs-4 vc_column t_slides',
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
            "description" => esc_html__("select the speed that slide will be changed.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Fade ?", "js_composer"),
            "param_name" => "testo_fade",
            'edit_field_class'    => 'vc_col-xs-2 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Auto Play ?", "js_composer"),
            "param_name" => "testo_auto",
            'edit_field_class'    => 'vc_col-xs-2 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Arrows ?", "js_composer"),
            "param_name" => "testo_arrows",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Bullets ?", "js_composer"),
            "param_name" => "testo_dots",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite ?", "js_composer"),
            "param_name" => "testo_infinite",
            'edit_field_class'    => 'vc_col-xs-2 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array(
                'element' => 'block_style',
                'value' => array('1','2','3','4','5','6','7','simple')
            ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    ),
    "js_view" => 'VcColumnView'
);
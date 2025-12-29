<?php
return array(
    "name" => esc_html__("Recent Posts", "js_composer"),
    "base" => "it_recent_posts",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-pencil-square-o',
    'description' => esc_html__( 'adds recent posts in news page', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => esc_html__("Style",'superfine'),
            "param_name" => "rp_style",
            "value" => array(
                'Style 1'   => '1',
                'Style 2'   => '2',
                'Style 3'   => '3',
                'First Large Image' => '4',
                'Small Image'   => '5',
            ),
            "description" => esc_html__("select the recent posts style.",'superfine')
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Category",'superfine'),
            "param_name" => "it_cat",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the item category.",'superfine')
         ),array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Carousel ?', 'js_composer' ),
            'param_name' => 'has_carousel',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            'dependency' => array( 'element' => 'rp_style', 'value' => array('1','2','3')),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Number Of Posts", "js_composer"),
            "param_name" => "max_pos",
            'value' => '5',
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("Max. Number of Posts.", "js_composer"),
        ),array(
            "type" => "dropdown",
            "heading" => esc_html__("Non Carousel Columns", "js_composer"),
            "param_name" => "rp_cols",
            "value" => array(
                '1 Columns'   => '12',
                '2 Columns'   => '6',
                '3 Columns'   => '4',
                '4 Columns'   => '3',
            ),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("Number of Coulmns in case not Carousel view.", "js_composer"),
            'dependency' => array( 'element' => 'rp_style', 'value' => array('1','2','3')),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to show", "js_composer"),
            "param_name" => "rp_slides",
            'value' => '2',
            'edit_field_class'    => 'vc_col-xs-4 vc_column t_slides',
            "description" => esc_html__("number of visible slides.", "js_composer"),
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slides to Scroll", "js_composer"),
            "param_name" => "rp_scroll",
            'value' => '2',
            'edit_field_class'    => 'vc_col-xs-4 vc_column t_slides',
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
            "description" => esc_html__("number of slides that will scroll.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Slide Speed", "js_composer"),
            "param_name" => "rp_speed",
            'value' => '300',
            'edit_field_class'    => 'vc_col-xs-4 vc_column t_slides',
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
            "description" => esc_html__("select the speed that slide will be changed.", "js_composer")
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Fade ?", "js_composer"),
            "param_name" => "rp_fade",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Auto Play ?", "js_composer"),
            "param_name" => "rp_auto",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
        ),array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Arrows ?", "js_composer"),
            "param_name" => "rp_arrows",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Show Bullets ?", "js_composer"),
            "param_name" => "rp_dots",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Infinite ?", "js_composer"),
            "param_name" => "rp_infinite",
            'edit_field_class'    => 'vc_col-xs-3 vc_column t_slides',
            'value' => array(
                esc_html__( 'yes', 'js_composer' ) => '1',
            ),
            "group" => 'Carousel',
            'dependency' => array(
                'element' => 'has_carousel',
                'value' => '1'
            ),
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )  
    )
);
    
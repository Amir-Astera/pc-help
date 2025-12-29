<?php
return array(
    "name" => esc_html__("Counter 2", 'js_composer'),
    "base" => "it_counter2",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'description' => esc_html__( 'add another numbers counter style', 'js_composer' ),
    'icon' => 'no-bg fa fa-paper-plane-o',
    "params" => array(
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Before",'superfine'),
            "param_name" => "title_before",  
            "value" => '',
            'group' => 'General'
         ),
          array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text After",'superfine'),
            "param_name" => "title_after",
            'group' => 'General'
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Color",'superfine'),
            "param_name" => "text_color",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("select text color.",'superfine'),
            'group' => 'General'
         ),
          array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text Size",'superfine'),
            "param_name" => "text_size",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("type text size in px.",'superfine'),
            'group' => 'General'
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("From",'superfine'),
            "param_name" => "init_value",
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            "value" => '0',
            'group' => 'Counter Values'
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("To",'superfine'),
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            "value" => '1000',
            "param_name" => "item_value",
            'group' => 'Counter Values'
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Start After",'superfine'),
            "param_name" => "item_timer",
            'edit_field_class'    => 'vc_col-xs-4 vc_column',
            "value" => '100',
            "description" => esc_html__("time in ms Ex:(1000).",'superfine'),
            'group' => 'Counter Values'
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Numbers Color",'superfine'),
            "param_name" => "numbers_color",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("select Number color.",'superfine'),
            'group' => 'Counter Values'
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Numbers Size",'superfine'),
            "param_name" => "numbers_size",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "description" => esc_html__("type numbers size in px.",'superfine'),
            'group' => 'Counter Values'
         ),
         it_animation(),
         it_animation_delay(),
         it_animation_duration(),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer"),
            'group' => 'General'
        )
    )
);
    

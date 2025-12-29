<?php
return array(
    "name" => esc_html__("News In Pictures", "js_composer"),
    "base" => "it_new_in_pictures",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-photo',
    'description' => esc_html__( 'choose images in news to be shown in news page', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Category",'superfine'),
            "param_name" => "it_cat",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the item category.",'superfine')
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )  
    )
);
    
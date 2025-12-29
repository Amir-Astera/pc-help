<?php
return array(
    "name" => esc_html__("Posts From Category", "js_composer"),
    "base" => "it_posts_category",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-tags',
    'description' => esc_html__( 'choose posts from specific category', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Category",'superfine'),
            "param_name" => "it_category",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the item category.",'superfine')
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Number of posts", "js_composer"),
            "param_name" => "max_posts",
            'value' => '3',
            "description" => esc_html__("number of visible Posts.", "js_composer")
        ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    
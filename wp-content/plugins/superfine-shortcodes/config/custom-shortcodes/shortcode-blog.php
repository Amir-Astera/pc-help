<?php
return array(
    "name" => esc_html__("Blog Shortcode", "js_composer"),
    "base" => "it_blog",
    'category' => esc_html__( 'Custom Shortcodes', 'js_composer' ),
    'icon' => 'no-bg fa fa-book',
    'description' => esc_html__( 'Add Blog Posts To Page', 'js_composer' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Category",'superfine'),
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "param_name" => "it_category",
            "value" => it_dropdown_cats(),
            "description" => esc_html__("type the post category.",'superfine')
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Blog Style",'superfine'),
            "param_name" => "blog_style",
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            "value" => array(
                'Large Image' => 'large',
                'Small Image' => 'small',
                'Blog Grid' => 'grid',
                'Blog Masonry' => 'masonry',
                'TimeLine' => 'timeline',
            ),
            "description" => esc_html__("Select the Blog Style.",'superfine'),
            "std"   => 'large'
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Pager Type",'superfine'),
            "param_name" => "pager_type",
            'edit_field_class'    => 'vc_col-xs-3 vc_column',
            "value" => array(
                'Numeric' => '1',
                'Older - Newer' => '2',
                'Load More' => '3'
            ),                           
            "description" => esc_html__("select the pager type.",'superfine'),
            "std"   => '1'
         )/*,array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            'edit_field_class'    => 'vc_col-xs-6 vc_column',
            "heading" => esc_html__("Posts Per Page",'superfine'),
            "param_name" => "posts_per_page",
            "value" => '',
            "description" => esc_html__("enter the number of posts to be shown per page.",'superfine')
         )*/,array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Coulmns",'superfine'),
            "param_name" => "blog_cols",
            "value" => array(
                '2 Columns' => '6',
                '3 Columns' => '4',
                '4 Columns' => '3',
            ),
            'dependency' => array(
                'element' => 'blog_style',
                'value' => array('grid','masonry')
            ),                              
            "description" => esc_html__("select how many coulmns.",'superfine'),
            "std"   => 'large'
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Timeline style",'superfine'),
            "param_name" => "tl_sidebar",
            "value" => array(
                'Left Side Bar' => 'left_bar',
                'Right Side Bar' => 'right_bar',
                'No Side Bar' => 'no_bar',
            ),
            'dependency' => array(
                'element' => 'blog_style',
                'value' => array('timeline')
            ),                            
            "description" => esc_html__("select the timeline style.",'superfine'),
            "std"   => 'left_bar'
         ),array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Pager Style",'superfine'),
            "param_name" => "pager_style",
            "value" => array(
                'Default Pager Style'   => '1',
                'Diamonds Links'        => '2',
                '3Circle Links'         => '3',
                'Bottom Borders'        => '4',
                'Bar Style'             => '5',
                'Bar Style 2'           => '6',
                'Bar Style 3'           => '7'
            ),
            'dependency' => array(
                'element' => 'pager_type',
                'value' => array('1')
            ),                              
            "description" => esc_html__("select the blog style.",'superfine'),
            "std"   => 'large'
         ),array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
    
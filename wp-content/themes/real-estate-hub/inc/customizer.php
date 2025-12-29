<?php
/**
 * Real Estate Hub: Customizer
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function real_estate_hub_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Real_Estate_Hub_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Real_Estate_Hub_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'real_estate_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( ' Custom Home Page ', 'real-estate-hub' ),
	    'description' => __( 'Description of what this panel does.', 'real-estate-hub' ),
	) );

	//TP General Option
	$wp_customize->add_section('real_estate_hub_tp_general_settings',array(
        'title' => __('TP General Option', 'real-estate-hub'),
        'panel' => 'real_estate_hub_panel_id',
        'priority' => 1,
    ) );
	$wp_customize->add_setting('real_estate_hub_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'real_estate_hub_sanitize_choices'
	));
 	$wp_customize->add_control('real_estate_hub_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'real-estate-hub'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'real-estate-hub'),
		'section' => 'real_estate_hub_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','real-estate-hub'),
		'Container' => __('Container','real-estate-hub'),
		'Container Fluid' => __('Container Fluid','real-estate-hub')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('real_estate_hub_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'real_estate_hub_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_hub_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'real-estate-hub'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'real-estate-hub'),
        'section' => 'real_estate_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','real-estate-hub'),
            'left' => __('Left','real-estate-hub'),
            'right' => __('Right','real-estate-hub'),
            'three-column' => __('Three Columns','real-estate-hub'),
            'four-column' => __('Four Columns','real-estate-hub'),
            'grid' => __('Grid Layout','real-estate-hub')
        ),
	) );
	$wp_customize->add_setting('real_estate_hub_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'real_estate_hub_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_hub_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'real-estate-hub'),
        'description'   => __('This option work for single blog page', 'real-estate-hub'),
        'section' => 'real_estate_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','real-estate-hub'),
            'left' => __('Left','real-estate-hub'),
            'right' => __('Right','real-estate-hub'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('real_estate_hub_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'real_estate_hub_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_hub_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'real-estate-hub'),
        'description'   => __('This option work for pages.', 'real-estate-hub'),
        'section' => 'real_estate_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','real-estate-hub'),
            'left' => __('Left','real-estate-hub'),
            'right' => __('Right','real-estate-hub')
        ),
	) );
	$wp_customize->add_setting( 'real_estate_hub_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new  Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_sticky',
	) ) );
	
	//TP Preloader Option
	$wp_customize->add_section('real_estate_hub_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'real-estate-hub'),
		'priority' => 1,
		'panel' => 'real_estate_hub_panel_id'
	) );
	$wp_customize->add_setting( 'real_estate_hub_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'real_estate_hub_tp_preloader_color1_option', array(
		'label'     => __('Preloader First Ring Color', 'real-estate-hub'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.','real-estate-hub'),
	    'section' => 'real_estate_hub_prelaoder_option',
	    'settings' => 'real_estate_hub_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'real_estate_hub_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'real_estate_hub_tp_preloader_color2_option', array(
		'label'     => __('Preloader Second Ring Color', 'real-estate-hub'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'real-estate-hub'),
	    'section' => 'real_estate_hub_prelaoder_option',
	    'settings' => 'real_estate_hub_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'real_estate_hub_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'real_estate_hub_tp_preloader_bg_color_option', array(
		'label'     => __('Preloader Background Color', 'real-estate-hub'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'real-estate-hub'),
	    'section' => 'real_estate_hub_prelaoder_option',
	    'settings' => 'real_estate_hub_tp_preloader_bg_color_option',
  	)));

	//TP Color Option
	$wp_customize->add_section('real_estate_hub_color_option',array(
     'title'         => __('TP Color Option', 'real-estate-hub'),
     'priority' => 1,
     'panel' => 'real_estate_hub_panel_id'
    ) );
	$wp_customize->add_setting( 'real_estate_hub_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'real_estate_hub_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'real-estate-hub'),
	    'section' => 'real_estate_hub_color_option',
	    'settings' => 'real_estate_hub_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'real_estate_hub_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'real_estate_hub_tp_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'real-estate-hub'),
	    'section' => 'real_estate_hub_color_option',
	    'settings' => 'real_estate_hub_tp_color_option_link',
  	)));
	
	//TP Blog Option
	$wp_customize->add_section('real_estate_hub_blog_option',array(
        'title' => __('TP Blog Option', 'real-estate-hub'),
        'panel' => 'real_estate_hub_panel_id',
        'priority' => 1,
    ) );
    /** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment'),
        'sanitize_callback' => 'real_estate_hub_sanitize_sortable',
    ));
    $wp_customize->add_control(new Real_Estate_Hub_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'real-estate-hub'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'real-estate-hub') ,
        'section' => 'real_estate_hub_blog_option',
        'choices' => array(
            'date' => __('date', 'real-estate-hub') ,
            'author' => __('author', 'real-estate-hub') ,
            'comment' => __('comment', 'real-estate-hub') ,
        ) ,
    )));
    $wp_customize->add_setting( 'real_estate_hub_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'real_estate_hub_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'real_estate_hub_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','real-estate-hub' ),
		'section'     => 'real_estate_hub_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
    $wp_customize->add_setting('real_estate_hub_read_more_text',array(
		'default'=> __('Read More','real-estate-hub'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_read_more_text',array(
		'label'	=> __('Edit Button Text','real-estate-hub'),
		'section'=> 'real_estate_hub_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'real_estate_hub_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_blog_option',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_remove_read_button',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_blog_option',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_remove_tags',
	) ) );
	
	//menu typography
	$wp_customize->add_section( 'real_estate_hub_menu_typography', array(
	    	'title'      => __( 'Menu Typography', 'real-estate-hub' ),
	    	'priority' => 2,
			'panel' => 'real_estate_hub_panel_id'
	) );
	$wp_customize->add_setting('real_estate_hub_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'real_estate_hub_sanitize_choices'
 	));
 	$wp_customize->add_control('real_estate_hub_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','real-estate-hub'),
		'section' => 'real_estate_hub_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','real-estate-hub'),
		   'Lowercase' => __('Lowercase','real-estate-hub'),
		   'Capitalize' => __('Capitalize','real-estate-hub'),
		),
	) );
	$wp_customize->add_setting('real_estate_hub_menu_font_size', array(
		'default' => 14,
	    'sanitize_callback' => 'real_estate_hub_sanitize_number_range',
	));
	$wp_customize->add_control(new Real_Estate_Hub_Range_Slider($wp_customize, 'real_estate_hub_menu_font_size', array(
	    'section' => 'real_estate_hub_menu_typography',
	    'label' => esc_html__('Font Size', 'real-estate-hub'),
	    'input_attrs' => array(
	        'min' => 0,
	        'max' => 20,
	        'step' => 1
    )
	)));

	// Top bar Section
	$wp_customize->add_section( 'real_estate_hub_topbar', array(
    	'title'      => __( 'Header Settings', 'real-estate-hub' ),
		'panel' => 'real_estate_hub_panel_id',
      	'priority' => 2,
	) );
	$wp_customize->add_setting('real_estate_hub_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_topbar_text',array(
		'label'	=> __('Add Topbar Text','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_call_text',array(
		'label'	=> __('Add Call Text','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'real_estate_hub_sanitize_phone_number'
	));
	$wp_customize->add_control('real_estate_hub_call',array(
		'label'	=> __('Add Phone Number','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_mail_text',array(
		'label'	=> __('Add Email Text','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('real_estate_hub_mail',array(
		'label'	=> __('Add Mail Address','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_header_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_header_button',array(
		'label'	=> __('Add Button Text','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_hub_header_button_link',array(
		'label'	=> __('Add Button URL','real-estate-hub'),
		'section'=> 'real_estate_hub_topbar',
		'type'=> 'url'
	));

	//Home Page Slider
	$wp_customize->add_section( 'real_estate_hub_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'real-estate-hub' ),
		'panel' => 'real_estate_hub_panel_id',
      	'priority' => 3,
	) );
	$wp_customize->add_setting( 'real_estate_hub_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_slider_section',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_slider_arrows',
	) ) );
	$wp_customize->add_setting('real_estate_hub_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_slider_short_heading',array(
		'label'	=> __('Add short Heading','real-estate-hub'),
		'section'=> 'real_estate_hub_slider_section',
		'type'=> 'text'
	));
	for ( $real_estate_hub_count = 1; $real_estate_hub_count <= 4; $real_estate_hub_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'real_estate_hub_slider_page' . $real_estate_hub_count, array(
			'default'           => '',
			'sanitize_callback' => 'real_estate_hub_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'real_estate_hub_slider_page' . $real_estate_hub_count, array(
			'label'    => __( 'Select Slide Image Page', 'real-estate-hub' ),
			'section'  => 'real_estate_hub_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'real_estate_hub_search_icon', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Slider Serach Option', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_slider_section',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_search_icon',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_post_option', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_post_option', array(
		'label'       => esc_html__( 'Show / Hide Slider post', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_slider_section',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_post_option',
	) ) );
	$real_estate_hub_args = array('numberposts' => -1);
	$post_list = get_posts($real_estate_hub_args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}
	$wp_customize->add_setting('real_estate_hub_slide_post_section_category',array(
		'sanitize_callback' => 'real_estate_hub_sanitize_choices',
	));
	$wp_customize->add_control('real_estate_hub_slide_post_section_category',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','real-estate-hub'),
		'section' => 'real_estate_hub_slider_section',
	));

	//Our projects
	$wp_customize->add_section( 'real_estate_hub_project_section' , array(
    	'title'      => __( 'Our Projects Section', 'real-estate-hub' ),
    	'priority' => 3,
		'panel' => 'real_estate_hub_panel_id'
	) );
	$wp_customize->add_setting( 'real_estate_hub_show_hide_product_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_show_hide_product_section', array(
		'label'       => esc_html__( 'Show / Hide Our Projects Section', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_project_section',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_show_hide_product_section',
	) ) );
	$wp_customize->add_setting('real_estate_hub_project_subheading_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_project_subheading_heading',array(
		'label'	=> __('Add Sub Heading','real-estate-hub'),
		'section'=> 'real_estate_hub_project_section',
		'type'=> 'text'
	));
	$wp_customize->add_setting('real_estate_hub_project_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_project_heading',array(
		'label'	=> __('Add Heading','real-estate-hub'),
		'section'=> 'real_estate_hub_project_section',
		'type'=> 'text'
	));
	$real_estate_hub_categories = get_categories();
	$cats = array();
	$i = 0;
	$real_estate_hub_offer_cat[]= 'select';
	foreach($real_estate_hub_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$real_estate_hub_offer_cat[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('real_estate_hub_project_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'real_estate_hub_sanitize_choices',
	));
	$wp_customize->add_control('real_estate_hub_project_section_category',array(
		'type'    => 'select',
		'choices' => $real_estate_hub_offer_cat,
		'label' => __('Select Category','real-estate-hub'),
		'section' => 'real_estate_hub_project_section',
	));

	//footer
	$wp_customize->add_section('real_estate_hub_footer_section',array(
		'title'	=> __('Footer Text','real-estate-hub'),
		'description'	=> __('Add copyright text.','real-estate-hub'),
		'priority' => 4,
		'panel' => 'real_estate_hub_panel_id'

	));
	$wp_customize->add_setting('real_estate_hub_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_hub_footer_text',array(
		'label'	=> __('Copyright Text','real-estate-hub'),
		'section'	=> 'real_estate_hub_footer_section',
		'type'		=> 'text'
	));

	// footer columns
	$wp_customize->add_setting('real_estate_hub_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'real_estate_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('real_estate_hub_footer_columns',array(
		'label'	=> __('Footer Widget Columns','real-estate-hub'),
		'section'	=> 'real_estate_hub_footer_section',
		'setting'	=> 'real_estate_hub_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'real_estate_hub_tp_footer_bg_color_option', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'real_estate_hub_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'real-estate-hub'),
			'description' => __('It will change the complete footer widget backgorund color.', 'real-estate-hub'),
			'section' => 'real_estate_hub_footer_section',
			'settings' => 'real_estate_hub_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('real_estate_hub_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'real_estate_hub_footer_widget_image',array(
	    'label' => __('Footer Widget Background Image','real-estate-hub'),
	    'section' => 'real_estate_hub_footer_section'
	)));
	$wp_customize->add_setting( 'real_estate_hub_return_to_header', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
 	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_return_to_header', array(
		 'label'       => esc_html__( 'Show / Hide Return to header', 'real-estate-hub' ),
		 'section'     => 'real_estate_hub_footer_section',
		 'type'        => 'toggle',
		 'settings'    => 'real_estate_hub_return_to_header',
	) ) );

   	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('real_estate_hub_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'real_estate_hub_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_hub_scroll_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'real-estate-hub'),
     'description'   => __('This option work for scroll to top', 'real-estate-hub'),
     'section' => 'real_estate_hub_footer_section',
     'choices' => array(
         'Right' => __('Right','real-estate-hub'),
         'Left' => __('Left','real-estate-hub'),
         'Center' => __('Center','real-estate-hub')
     ),
	) );

	//Mobile responsive
	$wp_customize->add_section('real_estate_hub_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'real-estate-hub'),
		'priority' => 5,
		'panel' => 'real_estate_hub_panel_id'
	) );
	$wp_customize->add_setting( 'real_estate_hub_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_mob_search_icon', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_mob_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Slider Serach Option', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_mob_search_icon',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_post_option_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
    ) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_post_option_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider post', 'real-estate-hub' ),
		'section'     => 'real_estate_hub_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_post_option_mob',
	) ) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->add_setting( 'real_estate_hub_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'real-estate-hub' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_site_title_text',
	) ) );

	//Site Identity logo site title size
	$wp_customize->add_setting('real_estate_hub_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'real_estate_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('real_estate_hub_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','real-estate-hub'),
		'section'	=> 'title_tagline',
		'setting'	=> 'real_estate_hub_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));
	$wp_customize->add_setting( 'real_estate_hub_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'real-estate-hub' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_site_tagline_text',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('real_estate_hub_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'real_estate_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('real_estate_hub_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','real-estate-hub'),
		'section'	=> 'title_tagline',
		'setting'	=> 'real_estate_hub_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));
    $wp_customize->add_setting('real_estate_hub_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'real_estate_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('real_estate_hub_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','real-estate-hub'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	)); 
	$wp_customize->add_setting('real_estate_hub_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'real_estate_hub_sanitize_choices'
	));
   	$wp_customize->add_control('real_estate_hub_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'real-estate-hub'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'real-estate-hub'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','real-estate-hub'),
            'Same Line' => __('Same Line','real-estate-hub')
        ),
	) );
	$wp_customize->add_setting('real_estate_hub_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'real_estate_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('real_estate_hub_per_columns',array(
		'label'	=> __('Product Per Row','real-estate-hub'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	//Woo Commerce
	$wp_customize->add_setting('real_estate_hub_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'real_estate_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('real_estate_hub_product_per_page',array(
		'label'	=> __('Product Per Page','real-estate-hub'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting( 'real_estate_hub_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'real-estate-hub' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product page sidebar', 'real-estate-hub' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'real_estate_hub_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'real_estate_hub_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'real_estate_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Real_Estate_Hub_Toggle_Control( $wp_customize, 'real_estate_hub_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'real-estate-hub' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'real_estate_hub_related_product',
	) ) );

}
add_action( 'customize_register', 'real_estate_hub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Real Estate Hub 1.0
 * @see real_estate_hub_customize_register()
 *
 * @return void
 */
function real_estate_hub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Real Estate Hub 1.0
 * @see real_estate_hub_customize_register()
 *
 * @return void
 */
function real_estate_hub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'REAL_ESTATE_HUB_PRO_THEME_NAME' ) ) {
	define( 'REAL_ESTATE_HUB_PRO_THEME_NAME', esc_html__( 'Real Estate Hub Pro Theme', 'real-estate-hub' ));
}
if ( ! defined( 'REAL_ESTATE_HUB_PRO_THEME_URL' ) ) {
	define( 'REAL_ESTATE_HUB_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/estate-agency-wordpress-theme/'));
}
if ( ! defined( 'REAL_ESTATE_HUB_DOC_URL' ) ) {
	define( 'REAL_ESTATE_HUB_DOC_URL', esc_url('https://www.themespride.com/demo/docs/real-estate-hub/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Real_Estate_Hub_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Real_Estate_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Real_Estate_Hub_Customize_Section_Pro(
				$manager,
				'real_estate_hub_section_pro',
				array(
					'priority'   => 9,
					'title'    => REAL_ESTATE_HUB_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'real-estate-hub' ),
					'pro_url'  => esc_url( REAL_ESTATE_HUB_PRO_THEME_URL, 'real-estate-hub' ),
				)
			)
		);		
			// Register sections.
		$manager->add_section(
			new Real_Estate_Hub_Customize_Section_Pro(
				$manager,
				'real_estate_hub_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'real-estate-hub' ),
					'pro_text' => esc_html__( 'Click Here', 'real-estate-hub' ),
					'pro_url'  => esc_url( REAL_ESTATE_HUB_DOC_URL, 'real-estate-hub'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'real-estate-hub-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'real-estate-hub-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Real_Estate_Hub_Customize::get_instance();

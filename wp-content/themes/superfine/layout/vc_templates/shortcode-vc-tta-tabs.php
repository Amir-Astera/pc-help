<?php

vc_map( array(
	'name' => esc_html__( 'Tabs', 'superfine' ),
	'base' => 'vc_tta_tabs',
	'icon' => 'icon-wpb-ui-tab-content',
	'is_container' => true,
	'show_settings_on_create' => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	'category' => esc_html__( 'Content', 'superfine' ),
	'description' => esc_html__( 'Tabbed content', 'superfine' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'param_name' => 'title',
			'heading' => esc_html__( 'Widget title', 'superfine' ),
			'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				__( 'Classic', 'superfine' ) => 'classic',
				__( 'Modern', 'superfine' ) => 'modern',
				__( 'Flat', 'superfine' ) => 'flat',
				__( 'Outline', 'superfine' ) => 'outline',
			),
			'heading' => esc_html__( 'Style', 'superfine' ),
			'description' => esc_html__( 'Select tabs display style.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'shape',
			'value' => array(
				__( 'Rounded', 'superfine' ) => 'rounded',
				__( 'Square', 'superfine' ) => 'square',
				__( 'Round', 'superfine' ) => 'round',
			),
			'heading' => esc_html__( 'Shape', 'superfine' ),
			'description' => esc_html__( 'Select tabs shape.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'heading' => esc_html__( 'Color', 'superfine' ),
			'description' => esc_html__( 'Select tabs color.', 'superfine' ),
			'value' => getVcShared( 'colors-dashed' ),
			'std' => 'grey',
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'no_fill_content_area',
			'heading' => esc_html__( 'Do not fill content area?', 'superfine' ),
			'description' => esc_html__( 'Do not fill content area with color.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'spacing',
			'value' => array(
				__( 'None', 'superfine' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => esc_html__( 'Spacing', 'superfine' ),
			'description' => esc_html__( 'Select tabs spacing.', 'superfine' ),
			'std' => '1',
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'gap',
			'value' => array(
				__( 'None', 'superfine' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => esc_html__( 'Gap', 'superfine' ),
			'description' => esc_html__( 'Select tabs gap.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'tab_position',
			'value' => array(
				__( 'Top', 'superfine' ) => 'top',
				__( 'Bottom', 'superfine' ) => 'bottom',
			),
			'heading' => esc_html__( 'Position', 'superfine' ),
			'description' => esc_html__( 'Select tabs navigation position.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'alignment',
			'value' => array(
				__( 'Left', 'superfine' ) => 'left',
				__( 'Right', 'superfine' ) => 'right',
				__( 'Center', 'superfine' ) => 'center',
			),
			'heading' => esc_html__( 'Alignment', 'superfine' ),
			'description' => esc_html__( 'Select tabs section title alignment.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'autoplay',
			'value' => array(
				__( 'None', 'superfine' ) => 'none',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'10' => '10',
				'20' => '20',
				'30' => '30',
				'40' => '40',
				'50' => '50',
				'60' => '60',
			),
			'std' => 'none',
			'heading' => esc_html__( 'Autoplay', 'superfine' ),
			'description' => esc_html__( 'Select auto rotate for tabs in seconds (Note: disabled by default).', 'superfine' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'active_section',
			'heading' => esc_html__( 'Active section', 'superfine' ),
			'value' => 1,
			'description' => esc_html__( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'pagination_style',
			'value' => array(
				__( 'None', 'superfine' ) => '',
				__( 'Square Dots', 'superfine' ) => 'outline-square',
				__( 'Radio Dots', 'superfine' ) => 'outline-round',
				__( 'Point Dots', 'superfine' ) => 'flat-round',
				__( 'Fill Square Dots', 'superfine' ) => 'flat-square',
				__( 'Rounded Fill Square Dots', 'superfine' ) => 'flat-rounded',
			),
			'heading' => esc_html__( 'Pagination style', 'superfine' ),
			'description' => esc_html__( 'Select pagination style.', 'superfine' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'pagination_color',
			'value' => getVcShared( 'colors-dashed' ),
			'heading' => esc_html__( 'Pagination color', 'superfine' ),
			'description' => esc_html__( 'Select pagination color.', 'superfine' ),
			'param_holder_class' => 'vc_colored-dropdown',
			'std' => 'grey',
			'dependency' => array(
				'element' => 'pagination_style',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'superfine' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'superfine' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'superfine' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'superfine' ),
		),
	),
	'js_view' => 'VcBackendTtaTabsView',
	'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapse">
	<div class="vc_general ddddd vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
		<div class="vc_tta-tabs-container">'
	                   . '<ul class="vc_tta-tabs-list">'
	                   . '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
	                   . '</ul>
		</div>
		<div class="vc_tta-panels vc_clearfix {{container-class}}">
		  {{ content }}
		</div>
	</div>
</div>',
	'default_content' => '
[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'superfine' ), 1 ) . '"][/vc_tta_section]
[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'superfine' ), 2 ) . '"][/vc_tta_section]
	',
	'admin_enqueue_js' => array(
		vc_asset_url( 'lib/vc_tabs/vc-tabs.js' ),
	),
) );

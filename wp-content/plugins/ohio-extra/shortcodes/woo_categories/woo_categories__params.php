<?php

/**
* WPBakery Page Builder Ohio Video shortcode params
*/

vc_lean_map( 'ohio_woo_categories', 'ohio_woo_categories_sc_map' );

function ohio_woo_categories_sc_map() {
	return array(
		'name' => __( 'WC Categories', 'ohio-extra' ),
		'description' => __( 'Display WooCommerce categories', 'ohio-extra' ),
		'base' => 'ohio_woo_categories',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/woo_categories_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Layout', 'ohio-extra' ),
				'param_name' => 'layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_088.svg',
						'key' => 'boxed',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_086.svg',
						'key' => 'default',
						'title' => __( 'Offset', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Alignment', 'ohio-extra' ),
				'param_name' => 'alignment',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_woo_categories_types',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Categories', 'ohio-extra' ),
				'param_name' => 'woo_categories',
				'description' => 'Leave empty to output all categories.'
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description Position', 'ohio-extra' ),
				'param_name' => 'subtitle_position',
				'value' => array(
					__( 'Before Title', 'ohio-extra' ) => 'top',
					__( 'After Title', 'ohio-extra' ) => 'bottom',
				),
				'std' => 'none',
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shape Border', 'ohio-extra' ),
				'param_name' => 'border_width',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'boxed'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shape Corners', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Equal Height', 'ohio-extra' ),
				'description' => __( 'Convert a rectangular image into a cropped square.', 'ohio-extra' ),
				'param_name' => 'equal_height',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tilt Effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Drop Shadow', 'ohio-extra' ),
				'param_name' => 'drop_shadow',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shadow Intensity', 'ohio-extra' ),
				'param_name' => 'drop_shadow_intensity',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use % units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '10',
				'dependency' => array(
					'element' => 'drop_shadow',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Hover Effect', 'ohio-extra' ),
				'param_name' => 'card_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Image Scaling', 'ohio-extra' ) => 'scale',
					__( 'Image Overlay', 'ohio-extra' ) => 'overlay',
					__( 'Image Greyscale', 'ohio-extra' ) => 'greyscale',
				),
				'std' => 'none',
			),

			// Grid.
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Number of Columns', 'ohio-extra' ),
				'param_name' => 'layout_columns',
				'value' => array(
					__( '1 Column', 'ohio-extra' ) => '1',
					__( '2 Columns', 'ohio-extra' ) => '2',
					__( '3 Columns', 'ohio-extra' ) => '3',
					__( '4 Columns', 'ohio-extra' ) => '4'
				),
			),

			// Button.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Add Button?', 'ohio-extra' ),
				'param_name' => 'add_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Link', 'ohio-extra' ),
				'param_name' => 'button_link',
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Add Icon?', 'ohio-extra' ),
				'param_name' => 'icon_use',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Position', 'ohio-extra' ),
				'param_name' => 'icon_position',
				'std' => 'left',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom Image', 'ohio-extra' ) => 'user_image'
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Icon', 'ohio-extra' ),
				'param_name' => 'icon_as_icon',
				'settings' => array(),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				)
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Custom Image', 'ohio-extra' ),
				'param_name' => 'icon_as_image',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'user_image'
					)
				)
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title Typography', 'ohio-extra' ),
				'param_name' => 'title_typo'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Description Typography', 'ohio-extra' ),
				'param_name' => 'description_typo'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Shape Background Color', 'ohio-extra' ),
				'param_name' => 'background_color',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'boxed'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Shape Border Color', 'ohio-extra' ),
				'param_name' => 'border_color',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'boxed'
					)
				)
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button', 'ohio-extra' ),
				'param_name' => 'button',
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				)
			),

			// Design Options.
            array(
                'type' => 'css_editor',
                'heading' => __( 'CSS', 'ohio-extra' ),
                'param_name' => 'content_styles',
                'group' => __( 'Design Options', 'ohio-extra' ),
            ),
            array(
                'type' => 'ohio_divider',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'param_name' => 'other_settings_title',
                'value' => __( 'Other', 'ohio-extra' ),
            ),
            array(
                'type' => 'textfield',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'heading' => __( 'CSS Class', 'ohio-extra' ),
                'param_name' => 'css_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ohio-extra' ),
            ),

			// Appear Effect.
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear Effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade Up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade Down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade Left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade Right', 'ohio-extra' ) => 'fade-right',
					__( 'Flip Up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip Down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom In', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom Out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}
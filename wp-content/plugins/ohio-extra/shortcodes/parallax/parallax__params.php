<?php

/**
* WPBakery Page Builder Ohio Parallax shortcode params
*/

vc_lean_map( 'ohio_parallax', 'ohio_parallax_sc_map' );

function ohio_parallax_sc_map() {
	return array(
		'name' => __( 'Parallax', 'ohio-extra' ),
		'description' => __( 'Parallax scrolling effect for background images', 'ohio-extra' ),
		'base' => 'ohio_parallax',
		'category' => __( 'Ohio', 'ohio-extra' ),
		"content_element" => true,
		"is_container" => true,
		"js_view" => 'VcColumnView',
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/parallax_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Direction', 'ohio-extra' ),
				'param_name' => 'parallax',
				'value' => array(
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal'
				),
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Background Image', 'ohio-extra' ),
				'param_name' => 'image',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Background Size', 'ohio-extra' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Auto', 'ohio-extra' ) => '',
					__( 'Contain', 'ohio-extra' ) => 'contain',
					__( 'Cover', 'ohio-extra' )   => 'cover',
					__( 'Auto 100%', 'ohio-extra' )  => 'auto 100%',
					__( '100% Auto', 'ohio-extra' )  => '100% auto',
					__( '100% 100%', 'ohio-extra' )  => '100% 100%',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Speed', 'ohio-extra' ),
				'param_name' => 'parallax_speed',
				'description' => __( 'Enter parallax speed ratio (Default value is 1.0)', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use Overlay?', 'ohio-extra' ),
				'param_name' => 'use_overlay',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),

			// Styles.
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay Color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'dependency' => array(
					'element' => 'use_overlay',
					'value' => '1'
				),
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

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Ohio_Parallax extends WPBakeryShortCodesContainer {
		
	}
}
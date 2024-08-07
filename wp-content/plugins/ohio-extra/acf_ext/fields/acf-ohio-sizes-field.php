<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if ( ! class_exists( 'acf_field_ohio_sizes' ) ) :


class acf_field_ohio_sizes extends acf_field {

	
	function __construct( $settings ) {

		$this->name = 'ohio_sizes';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = esc_html__( 'Ohio Responsive Font Sizes', 'ohio-extra' );
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'basic';
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		$this->defaults = array(
			'add_theme_inherited' => true
		);
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> esc_html__( 'Error! Please enter a higher value', 'ohio-extra' ),
		);
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		$this->settings = $settings;

		// do not delete!
    	parent::__construct();
	}

	function render_field( $field ) {
		$field_value = false;
		if ( $field['value'] ) {
			$field_value = json_decode( $field['value'] );
		}

		$text = acf_get_sub_array( $field, array('id', 'class', 'name', 'value') );
		$hidden = acf_get_sub_array( $field, array('name', 'value') );
		$uniqid = uniqid( 'ohio-typo' );
?>

		<div class="ohio-acf-sizes-field-content" data-uniqid="<?php echo $uniqid; ?>">

			<?php acf_hidden_input( $hidden ); ?>

			<div class="row">
				<div class="vc_col-lg-4 column">
					<b class="label"><a class="tip" href="https://developer.mozilla.org/en-US/docs/Glossary/Viewport" target="_blank"><?php esc_html_e('Laptop ≤ 1440px', 'ohio-extra'); ?></a></b>
					<b class="label"><?php esc_html_e( 'Font Size', 'ohio-extra' ); ?>
						<a class="tip" title="Use CSS unit value." href="https://www.w3schools.com/cssref/css_units.asp" target="_blank"><?php esc_html_e( 'CSS Units', 'ohio-extra' ); ?></a>
					</b>
					<input type="text" name="size-laptop"<?php if ( is_object( $field_value ) && isset( $field_value->laptop_size ) ) { echo ' value="' . $field_value->laptop_size . '"'; } ?>>
				</div>
				<div class="vc_col-lg-4 column">
					<b class="label"><a class="tip" href="https://developer.mozilla.org/en-US/docs/Glossary/Viewport" target="_blank"><?php esc_html_e('Tablet ≤ 1180px', 'ohio-extra'); ?></a></b>
					<b class="label"><?php esc_html_e( 'Font Size', 'ohio-extra' ); ?>
						<a class="tip" title="Use CSS unit value." href="https://www.w3schools.com/cssref/css_units.asp" target="_blank"><?php esc_html_e( 'CSS Units', 'ohio-extra' ); ?></a>
					</b>
					<input type="text" name="size-tablet"<?php if ( is_object( $field_value ) && isset( $field_value->tablet_size ) ) { echo ' value="' . $field_value->tablet_size . '"'; } ?>>
				</div>
				<div class="vc_col-lg-4 column">
					<b class="label"><a class="tip" href="https://developer.mozilla.org/en-US/docs/Glossary/Viewport" target="_blank"><?php esc_html_e('Mobile ≤ 768px', 'ohio-extra'); ?></a></b>
					<b class="label"><?php esc_html_e( 'Font Size', 'ohio-extra' ); ?>
						<a class="tip" title="Use CSS unit value." href="https://www.w3schools.com/cssref/css_units.asp" target="_blank"><?php esc_html_e( 'CSS Units', 'ohio-extra' ); ?></a>
					</b>
					<input type="text" name="size-mobile"<?php if ( is_object( $field_value ) && isset( $field_value->mobile_size ) ) { echo ' value="' . $field_value->mobile_size . '"'; } ?>>
				</div>
			</div>
			<div class="row">
				<div class="vc_col-lg-4 column">
					<b class="label"><a class="tip" href="https://developer.mozilla.org/en-US/docs/Glossary/Viewport" target="_blank"><?php esc_html_e('Laptop ≤ 1440px', 'ohio-extra'); ?></a></b>
					<b class="label"><?php esc_html_e( 'Line Height', 'ohio-extra' ); ?>
						<a class="tip" title="Use CSS unit value." href="https://www.w3schools.com/cssref/css_units.asp" target="_blank"><?php esc_html_e( 'CSS Units', 'ohio-extra' ); ?></a>
					</b>
					<input type="text" name="height-laptop"<?php if ( is_object( $field_value ) && isset( $field_value->laptop_height ) ) { echo ' value="' . $field_value->laptop_height . '"'; } ?>>
				</div>
				<div class="vc_col-lg-4 column">
					<b class="label"><a class="tip" href="https://developer.mozilla.org/en-US/docs/Glossary/Viewport" target="_blank"><?php esc_html_e('Tablet ≤ 1180px', 'ohio-extra'); ?></a></b>
					<b class="label"><?php esc_html_e( 'Line Height', 'ohio-extra' ); ?>
						<a class="tip" title="Use CSS unit value." href="https://www.w3schools.com/cssref/css_units.asp" target="_blank"><?php esc_html_e( 'CSS Units', 'ohio-extra' ); ?></a>
					</b>
					<input type="text" name="height-tablet"<?php if ( is_object( $field_value ) && isset( $field_value->tablet_height ) ) { echo ' value="' . $field_value->tablet_height . '"'; } ?>>
				</div>
				<div class="vc_col-lg-4 column">
					<b class="label"><a class="tip" href="https://developer.mozilla.org/en-US/docs/Glossary/Viewport" target="_blank"><?php esc_html_e('Mobile ≤ 768px', 'ohio-extra'); ?></a></b>
					<b class="label"><?php esc_html_e( 'Line Height', 'ohio-extra' ); ?>
						<a class="tip" title="Use CSS unit value." href="https://www.w3schools.com/cssref/css_units.asp" target="_blank"><?php esc_html_e( 'CSS Units', 'ohio-extra' ); ?></a>
					</b>
					<input type="text" name="height-mobile"<?php if ( is_object( $field_value ) && isset( $field_value->mobile_height ) ) { echo ' value="' . $field_value->mobile_height . '"'; } ?>>
				</div>
			</div>
		</div>

		<?php
	}

	function input_admin_enqueue_scripts() {
		global $wp_scripts, $wp_styles;

		$url = $this->settings['url'];
		$version = $this->settings['version'];

		// wp_register_style( 'acf-input-ohio', "{$url}assets/css/input.css", array( 'acf-input' ), $version );
		wp_enqueue_style( 'acf-input-ohio' );
		
		wp_register_script( 'acf-input-ohio-typo', "{$url}assets/js/input.js", array( 'acf-input' ), $version );
		wp_enqueue_script('acf-input-ohio-typo');
	}

	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}

// initialize
new acf_field_ohio_sizes( $this->settings );

// class_exists check
endif;

?>
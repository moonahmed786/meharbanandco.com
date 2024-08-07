<?php


function ohio_register_plugins() {
	$plugins = array(
		array(
			'name' => 'WPBakery Page Builder',
			'slug' => 'js_composer',
			'source' => 'https://plugins.clbthemes.com/js_composer.zip',
			'required' => true,
			'version' => '7.7.2',
			'force_activation' => false,
			'force_deactivation' => false
		),
		array(
			'name' => 'Advanced Custom Fields PRO',
			'slug' => 'advanced-custom-fields-pro',
			'source' => 'https://plugins.clbthemes.com/advanced-custom-fields-pro.zip',
			'required' => true,
			'version' => '6.3.3',
			'force_activation' => false,
			'force_deactivation' => false
		),
		array(
			'name' => 'Elementor',
			'slug' => 'elementor',
			'required' => true
		),
		array(
			'name' => 'WooCommerce',
			'slug' => 'woocommerce',
			'required' => true
		),
		array(
			'name' => 'Slider Revolution',
			'slug' => 'slider-revolution',
			'source' => 'https://plugins.clbthemes.com/slider-revolution.zip',
			'required' => true,
			'version' => '6.7.14',
			'force_activation' => false,
			'force_deactivation' => false
		),
		array(
			'name' => 'Ohio Portfolio',
			'slug' => 'ohio-portfolio',
			'source' => 'https://plugins.clbthemes.com/ohio-portfolio-v113.zip',
			'required' => true,
			'version' => '1.1.3',
			'force_activation' => false,
			'force_deactivation' => false
		),
		array(
			'name' => 'Ohio Extra',
			'slug' => 'ohio-extra',
			'source' => 'https://plugins.clbthemes.com/ohio-extra-v341.zip',
			'required' => true,
			'version' => '3.4.1',
			'force_activation' => false,
			'force_deactivation' => false
		),
		array(
			'name' => 'Ohio Importer',
			'slug' => 'ohio-importer',
			'source' => 'https://plugins.clbthemes.com/ohio-importer-v125.zip',
			'required' => true,
			'version' => '1.2.5',
			'force_activation' => false,
			'force_deactivation' => false
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => false
		),
		array(
			'name' => 'Instagram Feed',
			'slug' => 'instagram-feed',
			'required' => false
		),
		array(
			'name' => 'Envato Market',
			'slug' => 'envato-market',
			'source' => 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' => false,
			'version' => '2.0.11',
			'force_activation' => false,
			'force_deactivation' => false
		),
	);

	$config = array(
		'domain' => 'ohio',
		'default_path' => '',
		'menu' => 'install-required-plugins',
		'has_notices' => true,
		'is_automatic' => false,
		'message' => ''
	);
	
	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'ohio_register_plugins' );
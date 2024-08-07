<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-gallery.php' );

/**
 * Class WPBakeryShortCode_Vc_images_carousel
 */
class WPBakeryShortCode_Vc_Images_Carousel extends WPBakeryShortCode_Vc_Gallery {
	protected static $carousel_index = 1;

	/**
	 * WPBakeryShortCode_Vc_images_carousel constructor.
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsCssScripts();
	}

	public function jsCssScripts() {
		wp_register_script( 'vc_transition_bootstrap_js', vc_asset_url( 'lib/vc/vc_carousel/js/transition.min.js' ), array(), WPB_VC_VERSION, true );
		wp_register_script( 'vc_carousel_js', vc_asset_url( 'lib/vc/vc_carousel/js/vc_carousel.min.js' ), array( 'vc_transition_bootstrap_js' ), WPB_VC_VERSION, true );
		wp_register_style( 'vc_carousel_css', vc_asset_url( 'lib/vc/vc_carousel/css/vc_carousel.min.css' ), array(), WPB_VC_VERSION );
	}

	/**
	 * @return string
	 */
	public static function getCarouselIndex() {
		return ( self::$carousel_index ++ ) . '-' . time();
	}

	/**
	 * @param $size
	 * @return string
	 */
	protected function getSliderWidth( $size ) {
		global $_wp_additional_image_sizes;
		$width = '100%';
		if ( in_array( $size, get_intermediate_image_sizes(), true ) ) {
			if ( in_array( $size, array(
				'thumbnail',
				'medium',
				'large',
			), true ) ) {
				$width = get_option( $size . '_size_w' ) . 'px';
			} else {
				if ( isset( $_wp_additional_image_sizes ) && isset( $_wp_additional_image_sizes[ $size ] ) ) {
					$width = $_wp_additional_image_sizes[ $size ]['width'] . 'px';
				}
			}
		} else {
			preg_match_all( '/\d+/', $size, $matches );
			if ( count( $matches[0] ) > 1 ) {
				$width = $matches[0][0] . 'px';
			}
		}

		return $width;
	}
}

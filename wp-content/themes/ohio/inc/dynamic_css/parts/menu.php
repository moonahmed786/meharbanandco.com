<?php
/*
    Page

    Table of contents: (use search)

    # General
        ## 1. Hamburger Menu Overlay
        ## 2. Hamburger Caption Fill
        ## 3. Hamburger Menu Typography
        ## 4. Overlay Details Typography
        ## 5. Overlay Social Accounts Typography

    # Mobile Menu
        ## 6. Initial Resolution
        ## 7. Background
        ## 8. Mobile Menu Typography
*/

OhioOptions::get( 'page_header_menu_style_settings' ); // trigger selection chain
$style_settings_select_type = OhioOptions::get_last_select_type();


# General

## 1. Hamburger Menu Overlay
$background_type = OhioOptions::get( 'page_header_overlay_menu_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_overlay_menu_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_overlay_menu', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.clb-popup.hamburger-nav';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Hamburger Caption Fill
$hamburger_caption_background = OhioOptions::get_global( 'page_hamburger_menu_caption_background' );
if ( $hamburger_caption_background ) {
	$_selector = '.hamburger-outer';
	$_css = 'background-color:' . $hamburger_caption_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Hamburger Menu Typography
$hamburger_menu_typo = OhioOptions::get( 'page_fullscreen_menu_text_typo' );
if ( $hamburger_menu_typo ) {
	$_selector = '.hamburger-nav .menu .mega-menu-item > a';
	$_css = OhioHelper::parse_acf_typo_to_css( $hamburger_menu_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Overlay Details Typography
$hamburger_overlay_details_typo = OhioOptions::get( 'page_fullscreen_menu_details_text_typo' );
if ( $hamburger_overlay_details_typo ) {
	$_selector = [
		'.hamburger-nav .details-column:not(.social-networks)',
		'.hamburger-nav .details-column:not(.social-networks) b'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $hamburger_overlay_details_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. Overlay Social Accounts Typography
$hamburger_overlay_socials_typo = OhioOptions::get( 'page_fullscreen_menu_social_networks_typo' );
if ( $hamburger_overlay_socials_typo ) {
	$_selector = '.hamburger-nav .social-networks .network';
	$_css = OhioHelper::parse_acf_typo_to_css( $hamburger_overlay_socials_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Mobile Menu

## 6. Initial Resolution
$mobile_menu_initial_resolution = OhioOptions::get_global( 'page_mobile_menu_initial_resolution' );
if ( $mobile_menu_initial_resolution ) {
	$_selector = [
		'@media screen and (max-width: ' . $mobile_menu_initial_resolution . 'px) { .header',
		'.mobile-overlay'
	];
	$_css = '';
	$_css .= 'opacity: 0;';
	$_css .= '}';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. Background
$background_type = OhioOptions::get( 'page_mobile_header_menu_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_mobile_header_menu_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_mobile_header_menu', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.header.-mobile:not(.-sticky)';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. Mobile Menu Typography
$mobile_menu_typo = OhioOptions::get_global( 'mobile_header_menu_typo' );
if ( $mobile_menu_typo ) {
    $_selector = [
		'.header.-mobile .nav',
		'.header.-mobile .mobile-overlay .copyright',
		'.header.-mobile .mobile-overlay .lang-dropdown',
		'.header.-mobile .mobile-overlay .close-bar .icon-button:not(.-small)'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $mobile_menu_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Select chevron color
	preg_match_all( "/(?=color\:([^\s]+))/", $_css, $matches );
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = [
			'.header.-mobile .mobile-overlay .lang-dropdown'
		];
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}

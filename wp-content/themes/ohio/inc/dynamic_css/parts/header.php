<?php
/*
    Page

    Table of contents: (use search)

    # General
        ## 1. Wrap Container Width
        ## 2. Side Gaps
        ## 3. Height
        ## 4. Background
        ## 5. Border Style
        ## 6. Border Color
        ## 7. Header Typography

    # Sticky Header
        ## 8. Height
        ## 9. Background
        ## 10. Border Style
        ## 11. Border Color
        ## 12. Sticky Header Typography

    # Mobile Header
        ## 13. Mobile Header Typography

    # Subheader
        ## 14. Height
        ## 15. Background
        ## 16. Content Typography

    # CTA Buttons
        ## 17. Button Text Color
        ## 18. Button Fill Color
*/

OhioOptions::get( 'page_header_menu_style_settings' ); // trigger selection chain
$style_settings_select_type = OhioOptions::get_last_select_type();


# General

## 1. Wrap Container Width
$wrap_container_width = OhioOptions::get( 'page_header_content_wrapper_width', null, false, true );
if ( $wrap_container_width ) {
	$_selector = [
		'.header-wrap.page-container'
	];
    $_css = 'max-width:' . $wrap_container_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Side Gaps
$side_gaps = OhioOptions::get( 'page_header_full_width_margins_size', null, false, true );
if ( $side_gaps ) {
	$_selector = [
        '.header .header-wrap:not(.page-container)',
        '.hamburger-nav .close-bar',
    ];
    $_css = 'padding-left:' . $side_gaps . '; padding-right:' . $side_gaps . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

## 3. Height
$header_height = OhioOptions::get_by_type( 'page_header_menu_height', $style_settings_select_type );
if ( $header_height ) {
	$_selector = [
        ':root'
    ];
    $_css = '--clb-header-height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $header_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

## 4. Background
$background_type = OhioOptions::get( 'page_header_menu_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_menu_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_menu', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.header:not(.-sticky)';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. Border Style
$header_border_visibility = OhioOptions::get_by_type( 'page_header_menu_border_visibility', $style_settings_select_type );
$header_border_style = OhioOptions::get( 'page_header_menu_border_type' );
if ( $header_border_style && $header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-header-border-style', $header_border_style );
}

## 6. Border Color
$header_border_color = OhioOptions::get( 'page_header_menu_border_color' );
if ( $header_border_color && $header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-header-border-color', $header_border_color );
}

## 7. Header Typography
$header_typo = OhioOptions::get_by_type( 'page_header_menu_text_typo', $style_settings_select_type );
if ( $header_typo ) {
    $_selector = [
        '.header:not(.-sticky):not(.-mobile) .menu-blank',
        '.header:not(.-sticky):not(.-mobile) .menu > li > a',
		'.header:not(.-sticky) .hamburger-outer',
        '.header:not(.-sticky) .branding-title',
        '.header:not(.-sticky) .icon-button:not(.-overlay-button):not(.-small)',
        '.header:not(.-sticky) .cart-button-total a',
        '.header:not(.-sticky) .lang-dropdown'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $header_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Select chevron color
	preg_match_all( "/(?=color\:([^\s]+))/", $_css, $matches );
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = '.header:not(.-sticky):not(.-mobile):not(.light-typo):not(.dark-typo) .lang-dropdown';
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}


# Sticky Header

## 8. Height
$sticky_header_height = OhioOptions::get( 'page_header_sticky_height' );
if ( $sticky_header_height ) {
	$_selector = [
        '.header.-sticky:not(.-fixed) .header-wrap'
    ];
    $_css = 'height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $sticky_header_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

## 9. Background
$background_type = OhioOptions::get( 'page_header_fixed_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_fixed_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_fixed', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.header.-sticky';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 10. Border Style
$sticky_header_border_visibility = OhioOptions::get_by_type( 'page_header_sticky_menu_border_visibility', $style_settings_select_type );
$header_border_style = OhioOptions::get( 'page_header_sticky_menu_border_type' );
if ( $header_border_style && $sticky_header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-sticky-header-border-style', $header_border_style );
}

## 11. Border Color
$header_border_color = OhioOptions::get( 'page_header_sticky_menu_border_color' );
if ( $header_border_color && $sticky_header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-sticky-header-border-color', $header_border_color );
}

## 12. Sticky Header Typography
$sticky_header_typo = OhioOptions::get( 'page_header_sticky_text_typo' );
if ( $sticky_header_typo ) {
	$_selector = [
        '.-sticky:not(.-mobile) .menu-blank',
        '.-sticky:not(.-mobile) .menu > li > a',
		'.-sticky .hamburger-outer',
        '.-sticky .branding-title',
        '.-sticky .icon-button:not(.-overlay-button):not(.-small)',
        '.-sticky .cart-button-total a',
        '.-sticky .lang-dropdown'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $sticky_header_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Select chevron color
	preg_match_all( "/(?=color\:([^\s]+))/", $_css, $matches );
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = '.-sticky .menu-optional .lang-dropdown';
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}


# Mobile Header

## 13. Mobile Header Typography
$mobile_header_typo = OhioOptions::get( 'page_mobile_header_menu_color' );
if ( $mobile_header_typo ) {
	$_selector = [
		'.header.-mobile:not(.-sticky) .hamburger-outer',
		'.header.-mobile:not(.-sticky) .branding-title',
		'.header.-mobile:not(.-sticky) .icon-button:not(.-overlay-button):not(.-small)',
        '.header.-mobile:not(.-sticky) .cart-button-total a',
        '.header.-mobile:not(.-sticky) .lang-dropdown',
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $mobile_header_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Subheader

OhioOptions::get( 'page_subheader_style' ); // trigger select chain
$style_select_type = OhioOptions::get_last_select_type();

## 14. Height
$subheader_height = OhioOptions::get_by_type( 'page_subheader_height', $style_settings_select_type );
if ( $subheader_height ) {
	$_selector = [
        ':root'
    ];
    $_css = '--clb-subheader-height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $subheader_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

## 15. Background
$background_type = OhioOptions::get( 'page_subheader_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_subheader_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_subheader', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.subheader';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 16. Content Typography
$content_typo = OhioOptions::get_by_type( 'page_subheader_text_typo', $style_select_type );
if ( $content_typo ) {
    $_content_typo_css = OhioHelper::parse_acf_typo_to_css( $content_typo );

    if ( $_content_typo_css ) {
        $_selector = [
			'.subheader',
			'.subheader a'
		];
        $_css = $_content_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# CTA Buttons

## 17. Button Text Color
$cta_button_color = OhioOptions::get( 'custom_button_for_header_color' );
if ( $cta_button_color ) {
	$_selector = '.menu-optional .button-group .button';
	$_css = '--clb-color-white:' . $cta_button_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 18. Button Fill Color
$cta_button_background = OhioOptions::get( 'custom_button_for_header_background' );
if ( $cta_button_background ) {
	$_selector = '.menu-optional .button-group .button';
	$_css = '--clb-button-color:' . $cta_button_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

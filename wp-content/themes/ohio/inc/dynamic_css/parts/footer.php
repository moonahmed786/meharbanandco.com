<?php
/*
    Footer

    Table of contents: (use search)

    # General
    	## 1. Wrap Container Width
    	## 2. Side Gaps
        ## 3. Footer Background
        ## 4. Widget Titles Typography
        ## 5. Widget Content Typography
        ## 6. Widget Links Typography

    # Copyright Area
        ## 7. Copyright Area Background
        ## 8. Copyright Content Typography
        ## 9. Copyright Links Typography

    # Other
        ## 10. Footer Logo
        ## 11. Logo Height
*/


# General

## 1. Wrap Container Width
$wrap_container_width = OhioOptions::get( 'page_footer_content_wrapper_width', null, false, true );
if ( $wrap_container_width ) {
	$_selector = '.site-footer .page-container';
    $_css = 'max-width:' . $wrap_container_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Side Gaps
$side_gaps = OhioOptions::get( 'page_footer_full_width_margins_size', null, false, true );
if ( $side_gaps ) {
	$_selector = '.site-footer .page-container.-full-w';
    $_css = 'padding-left:' . $side_gaps . '; padding-right:' . $side_gaps . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

## 3. Footer Background
$background_type = OhioOptions::get( 'page_footer_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_footer_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_footer', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.site-footer';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Widget Titles Typography
$widget_titles_typo = OhioOptions::get( 'page_footer_widget_title_typo' );
if ( $widget_titles_typo ) {
	$_widget_titles_typo_css = OhioHelper::parse_acf_typo_to_css( $widget_titles_typo );

	if ( $_widget_titles_typo_css ) {
		$_selector = '.site-footer .widget-title';
		$_css = $_widget_titles_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

## 5. Widget Content Typography
$widget_content_typo = OhioOptions::get( 'page_footer_text_typo' );
if ( $widget_content_typo ) {
	$_widget_content_typo_css = OhioHelper::parse_acf_typo_to_css( $widget_content_typo );

	if ( $_widget_content_typo_css ) {
		$_selector = [
			'.site-footer h6',
			'.site-footer .widgets',
			'.site-footer .scroll-top',
			'.site-footer .color-switcher-item.dark',
			'.site-footer .button',
			'.site-footer input'
		];
		$_css = $_widget_content_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

## 6. Widget Links Typography
$widget_links_typo = OhioOptions::get( 'page_footer_links_typo' );
if ( $widget_links_typo ) {
	$_widget_links_typo_css = OhioHelper::parse_acf_typo_to_css( $widget_links_typo );

	if ( $_widget_links_typo_css ) {
		$_selector = '.site-footer a:not(:hover):not(.-undash):not(.-unlink):not(.button):not(.icon-button):not([rel="tag"])';
		$_css = $_widget_links_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}


# Copyright Area

## 7. Copyright Area Background
$copyright_background_type = OhioOptions::get( 'page_footer_copyright_section_background_type' );
$copyright_background_select_type = OhioOptions::get_last_select_type();
$copyright_background_color = OhioOptions::get_by_type( 'page_footer_copyright_section_background_color', $copyright_background_select_type );
$copyright_background_image = OhioHelper::get_background_image_css_by_type( 'page_footer_copyright_section', $copyright_background_select_type );
if ( $copyright_background_color || $copyright_background_image ) {
	$_selector = '.site-footer-copyright';
	$_css = '';
	$_css .= 'background-color:' . $copyright_background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $copyright_background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. Copyright Content Typography
$copyright_content_typo = OhioOptions::get( 'page_footer_copyright_section_text_typo' );
if ( $copyright_content_typo ) {
	$_copyright_content_typo_css = OhioHelper::parse_acf_typo_to_css( $copyright_content_typo );

	if ( $_copyright_content_typo_css ) {
		$_selector = '.site-footer-copyright .holder';
		$_css = $_copyright_content_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

## 9. Copyright Links Typography
$copyright_links_typo = OhioOptions::get( 'page_footer_copyright_section_links_typo' );
if ( $copyright_links_typo ) {
	$_copyright_links_typo_css = OhioHelper::parse_acf_typo_to_css( $copyright_links_typo );

	if ( $_copyright_links_typo_css ) {
		$_selector = '.site-footer-copyright a:not(:hover):not(.-undash):not(.-unlink):not(.button):not(.icon-button):not([rel="tag"])';
		$_css = $_copyright_links_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}


# Other

## 10. Footer Logo
$footer_sitename_typo = false;
$footer_logo_type = OhioOptions::get( 'page_footer_logo_widget_type', 'logo_inverse' );
$footer_logo_select_type = OhioOptions::get_last_select_type();
if ( $footer_logo_type == 'sitename' ) {
	$footer_sitename_typo = OhioOptions::get_by_type( 'page_footer_sitename_typo', $footer_logo_select_type );
}
if ( $footer_sitename_typo ) {
	$footer_sitename_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_sitename_typo );

	if ( $footer_sitename_typo_css ) {
		$_selector = '.site-footer .logo .title';
		$_css = $footer_sitename_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

## 11. Logo Height
$footer_logo_height = OhioOptions::get( 'page_footer_logo_height' );
if ( $footer_logo_height ) {
	$_selector = [
        '.site-footer .branding .logo img'
    ];
    $_css = 'min-height:${height}px; height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $footer_logo_height, $_css );
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

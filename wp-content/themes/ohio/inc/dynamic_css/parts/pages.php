<?php
/*
    Page

    Table of contents: (use search)

    # General
        ## 1. Wrap Container Width
        ## 2. Upper Gap
        ## 3. Lower Gap
        ## 4. Side Gaps
        ## 5. Boxed Layout Indent
        ## 6. Background

    # Page Headline
    	## 7. Height
    	## 8. Background
    	## 9. Overlay
    	## 10. Heading Typography
    	## 11. Subtitle Typography
	
	# Back Button
    	## 12. Caption Typography
	
	# Sidebar
    	## 13. Background
    	## 14. Widget Titles Typography
        ## 15. Widget Content Typography
	
	# Breadcrumbs
    	## 16. Slugs Typography
*/

OhioOptions::get( 'page_typography_settings' ); // trigger select chain
$typography_settings_select_type = OhioOptions::get_last_select_type();


# General

## 1. Wrap Container Width
$wrap_container_width = OhioOptions::get( 'page_content_wrapper_width', null, false, true );
if ( $wrap_container_width ) {
	$_selector = [
		'.page-container:not(.-full-w)',
		'.page-container:not(.-full-w) .elementor-section.elementor-section-boxed > .elementor-container',
		'.elementor .elementor-section.elementor-section-boxed > .elementor-container',
	];
    $_css = 'max-width:' . $wrap_container_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Upper Gap
$upper_gap = OhioOptions::get( 'page_top_padding_spacing', null, false, true );
if ( $upper_gap ) {
	$_selector = '.page-container.top-offset';
    $_css = 'padding-top:' . $upper_gap . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Lower Gap
$lower_gap = OhioOptions::get( 'page_bottom_padding_spacing', null, false, true );
if ( $lower_gap ) {
	$_selector = '.page-container.bottom-offset';
    $_css = 'padding-bottom:' . $lower_gap . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Side Gaps
$side_gaps = OhioOptions::get( 'page_full_width_margins_size', null, false, true );
if ( $side_gaps ) {
	$_selector = [
		'.page-container.-full-w',
		'.page-container.-full-w .elementor-section-stretched:not(.elementor-section-full_width) > .elementor-container'
	];
    $_css = 'padding-left:' . $side_gaps . '; padding-right:' . $side_gaps . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

## 5. Boxed Layout Indent
$boxed_layout = OhioOptions::get( 'page_use_boxed_wrapper', false );
$boxed_layout_indent = OhioOptions::get( 'page_boxed_wrapper_margins_size', null, false, true );
if ( $boxed_layout && $boxed_layout_indent ) {
	$_selector = '.boxed-container';
    $_css = 'margin-left:' . $boxed_layout_indent . '; margin-right:' . $boxed_layout_indent . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

## 6. Background
$background_type = OhioOptions::get( 'page_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = [
		'.site-content',
		'.page-headline:before'
	];
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Page Headline

## 7. Height
$page_headline_height = OhioOptions::get( 'page_header_title_height', null, false, true );
$page_headline_fullscreen = OhioOptions::get( 'page_header_title_fullscreen', false );
if ( $page_headline_height && ! $page_headline_fullscreen ) {
	$_selector = [
        '.page-headline'
    ];
    $_css = 'min-height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $page_headline_height, $_css );
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

## 6. Background
$background_type = OhioOptions::get( 'page_header_title_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_title_background_color', $background_select_type );

if ( $background_type == 'featured' ) {
	$background_image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
	
	if ( ! $background_image ) { // get the background image if the featured image is missing
		$background_image = OhioOptions::get_by_type( 'page_header_title_background_image', $background_select_type );
	}

} elseif ( $background_type == 'image' ) {
	$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_title', $background_select_type );
}

if ( $background_color || $background_image ) {
	$_selector = '.page-headline .bg-image';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'featured' ) {
		$_css .= 'background-image:url(\'' . esc_url( $background_image ) . '\');';

	} elseif ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 9. Overlay
$page_headline_overlay = OhioOptions::get( 'page_header_title_overlay_color' );
if ( $page_headline_overlay ) {
	if ( substr( trim( $page_headline_overlay ), 0, 4 ) != 'rgba' ) {
		$page_headline_overlay = OhioHelper::hex_to_rgba( $page_headline_overlay, .5 );
	}
    $_selector = '.page-headline::after';
    $_css = 'background-color:' . $page_headline_overlay . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 10. Heading Typography
$page_headline_title_typo = json_decode( OhioOptions::get_by_type( 'page_header_title_typo', $typography_settings_select_type, '' ) );
if ( $page_headline_title_typo ) {
    $_selector = '.page-headline .title';
    $_css = OhioHelper::parse_acf_typo_to_css( $page_headline_title_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 11. Subtitle Typography
$page_headline_subtitle_typo = json_decode( OhioOptions::get_by_type( 'page_header_subtitle_typo', $typography_settings_select_type, '' ) );
if ( $page_headline_subtitle_typo ) {
	$_selector = [
		'.page-headline .post-meta-holder',
		'.page-headline .headline-meta'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $page_headline_subtitle_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Back Button

## 12. Caption Typography
$back_button_caption_typo = json_decode( OhioOptions::get_by_type( 'page_header_previous_button_typo', $typography_settings_select_type, '' ) );
if ( $back_button_caption_typo ) {
	$_selector = '.back-link:not(.light-typo):not(.dark-typo)';
    $_css = OhioHelper::parse_acf_typo_to_css( $back_button_caption_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Sidebar

## 13. Background
$background_type = OhioOptions::get( 'page_sidebar_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_sidebar_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_sidebar', $background_select_type );
if ( $background_color || $background_image ) {
    $_selector = '.page-sidebar.-boxed';
    $_css = '';
    $_css .= 'background-color:' . $background_color . ';';

    if ( $background_type == 'image' ) {
        $_css .= $background_image;
    }
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 14. Widget Titles Typography
$widgets_title_typo = OhioOptions::get_global( 'widgets_heading_typo' );
if ( $widgets_title_typo ) {
	$_selector = [
		'.widget-title',
		'.widget h2',
		'.widget .wp-block-search__label',
		'.widget .wc-block-product-search__label'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $widgets_title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 15. Widget Content Typography
$widgets_content_typo = OhioOptions::get_global( 'widgets_content_typo' );
if ( $widgets_content_typo ) {
	$_selector = [
		'.widget',
		'.widget a',
		'.widget input',
		'.widget select',
		'.widget_recent_entries ul a',
		'.widget_recent_comments ul span',
		'.widget_recent_comments ul a'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $widgets_content_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Breadcrumbs

## 16. Slugs Typography
$slugs_typo = OhioOptions::get( 'page_breadcrumbs_text_typo' );
if ( $slugs_typo ) {
    $_selector = [
        '.breadcrumb',
        '.filter-holder',
        '.filter-holder select'
    ];
    $_css = OhioHelper::parse_acf_typo_to_css( $slugs_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

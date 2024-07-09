<?php
/*
    General

    Table of contents: (use search)

    # General
        ## 1. Primary Color
        ## 2. Primary Fill Color
        ## 3. Overlay Color
        ## 4. Highlight Color
        ## 5. Lines & Dividers Color
        ## 6. Links Color
        ## 7. Links Color (Hover)
        ## 8. Corner Radius
        ## 9. Grid Gutters

    # Buttons
        ## 10. Button Fill Color
        ## 11. Button Fill Color (Hover)
        ## 12. Button Corner Radius

    # Color Mode
        ## 13. Dark Mode Fill Color
        ## 14. Dark Mode Text Color
*/


# General

## 1. Primary Color
$brand_color = OhioOptions::get_global( 'page_brand_color' );
if ( $brand_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-primary', $brand_color );

    // Heading Widget highlighted text gradient color
    $brand_color_highlighted = OhioHelper::hex_to_rgba( $brand_color, .5 );
    $_selector = [
        '.heading .title .highlighted-text'
    ];
    $_css = 'background-image: linear-gradient(' . $brand_color_highlighted . ', ' . $brand_color_highlighted . ');';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Primary Fill Color
$fill_color = OhioOptions::get_global( 'page_backgrounds_color' );
if ( $fill_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-fill-color', $fill_color );
}

## 3. Overlay Color
$overlay_color = OhioOptions::get_global( 'page_overlay_color' );
if ( $overlay_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-overlay', $overlay_color );
}

## 4. Highlight Color
$selection_color = OhioOptions::get_global( 'page_selection_color' );
if ( $selection_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-selection-color', $selection_color );
}

## 5. Lines & Dividers Color
$borders_color = OhioOptions::get_global( 'page_borders_color' );
if ( $borders_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-border-color', $borders_color );
}

## 6. Links Color
$links_color = OhioOptions::get_global( 'page_links_color' );
if ( $links_color ) {
    $_selector = [
        '.content-area a:not(.-unlink):not(.tag)',
        '.project-content a:not(.-unlink):not(.tag)',
        '.woocommerce-product-details__short-description a:not(.-unlink):not(.tag)',
        '.wpb-content-wrapper a:not(.-unlink):not(.tag)',
        '.elementor a:not(.-unlink):not(.tag)'
    ];
    $_css = '--clb-link-color:' . $links_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. Links Color (Hover)
$links_hover_color = OhioOptions::get_global( 'page_links_hover_color' );
if ( $links_hover_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-link-hover-color', $links_hover_color );
}

## 8. Corner Radius
$container_corners = OhioOptions::get_global( 'page_container_corners' );
if ( $container_corners ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-border-radius', $container_corners );
}

## 9. Grid Gutters
$grid_gutter = OhioOptions::get_global( 'page_grid_gutter' );
if ( $grid_gutter ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-grid-gutter', $grid_gutter );
}


# Buttons

## 10. Button Fill Color
$buttons_color = OhioOptions::get_global( 'page_buttons_color' );
if ( $buttons_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-button-color', $buttons_color );
}

## 11. Button Fill Color (Hover)
$buttons_hover_color = OhioOptions::get_global( 'page_buttons_hover_color' );
if ( $buttons_hover_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-button-hover-color', $buttons_hover_color );
}

## 12. Button Corner Radius
$buttons_corners = OhioOptions::get_global( 'page_buttons_corners' );
if ( $buttons_corners ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-button-border-radius', $buttons_corners );
}


# Color Mode

## 13. Dark Mode Fill Color
$dark_mode_fill_color = OhioOptions::get_global( 'page_dark_mode_background_color' );
if ( $dark_mode_fill_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-dm-fill-color', $dark_mode_fill_color );
}

## 14. Dark Mode Text Color
$dark_mode_text_color = OhioOptions::get_global( 'page_dark_mode_text_color' );
if ( $dark_mode_text_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-dm-color-white', $dark_mode_text_color );
}
<?php
/*
    Page

    Table of contents: (use search)

	# Social Media
		## 1. Social Media Typography

    # Subscribe Popup
    	## 2. Background (Featured Image)
        ## 3. Popup Height
        ## 4. Popup Width
        ## 5. Background Color
        ## 6. Overlay Color
        ## 7. Close Button Color
        ## 8. Heading Typography
        ## 9. Description Typography
        ## 10. Form Typography
	
	# Notices
    	## 11. Background
    	## 12. Button Color
    	## 13. Notice Typography
    	## 14. Notice Link Typography
*/


# Social Media

## 1. Social Media Typography
$social_networks_typo = OhioOptions::get( 'page_social_networks_typo' );
if ( $social_networks_typo ) {
	$_selector = '.elements-bar:not(.light-typo):not(.dark-typo) .social-bar';
	$_css = OhioHelper::parse_acf_typo_to_css( $social_networks_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# Subscribe Popup

## 2. Background (Featured Image)
$background_type = OhioOptions::get( 'subscribe_popup_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'subscribe_popup_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'subscribe_popup', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = [
		'.popup-subscribe .thumbnail'
	];
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Popup Height
$subscribe_popup_height = OhioOptions::get_global( 'subscribe_popup_height' );
if ( $subscribe_popup_height ) {
    $_selector = [
        '.popup-subscribe'
    ];
    $_css = 'height:${height}px;';
    $_css = OhioHelper::parse_responsive_height_to_css( $subscribe_popup_height, $_css );
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

## 4. Popup Width
$subscribe_popup_width = OhioOptions::get_global( 'subscribe_popup_width' );
if ( $subscribe_popup_width ) {
    $_selector = [
        '.popup-subscribe'
    ];
    $_css = 'width:${height}px;';
    $_css = OhioHelper::parse_responsive_height_to_css( $subscribe_popup_width, $_css );
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

## 5. Background Color
$popup_background_color = OhioOptions::get_global( 'subscribe_popup_window_background_color' );
if ( $popup_background_color ) {
    $_selector = '.popup-subscribe';
    $_css = 'background-color:' . $popup_background_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 6. Overlay Color
$overlay_color = OhioOptions::get_global( 'subscribe_popup_overlay_color', null, false, true );
if ( $overlay_color ) {
    $_selector = '.clb-popup.subscribe-popup:not(.-slide-in)';
    $_css = 'background-color:' . $overlay_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. Close Button Color
$close_button_color = OhioOptions::get_global( 'subscribe_popup_close_button_color', null, false, true );
if ( $close_button_color ) {
    $_selector = [
        '.clb-popup.subscribe-popup .close-bar .icon-button .icon',
        '.clb-popup.subscribe-popup.-slide-in .close-bar .icon-button .icon'
    ];
    $_css = 'color:' . $close_button_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. Heading Typography
$heading_typo = OhioOptions::get_global( 'subscribe_popup_title_typo' );
if ( $heading_typo ) {
    $_heading_typo_css = OhioHelper::parse_acf_typo_to_css( $heading_typo );

    if ( $_heading_typo_css ) {
        $_selector = '.popup-subscribe .title';
        $_css = $_heading_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

## 9. Description Typography
$description_typo = OhioOptions::get_global( 'subscribe_popup_details_typo' );
if ( $description_typo ) {
    $_description_typo_css = OhioHelper::parse_acf_typo_to_css( $description_typo );

    if ( $_description_typo_css ) {
        $_selector = '.popup-subscribe p';
        $_css = $_description_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

## 10. Form Typography
$form_typo = OhioOptions::get_global( 'subscribe_popup_form_typo' );
if ( $form_typo ) {
    $_form_typo_css = OhioHelper::parse_acf_typo_to_css( $form_typo );

    if ( $_form_typo_css ) {
        $_selector = [
            '.popup-subscribe .contact-form .wpcf7-list-item-label',
            '.popup-subscribe .contact-form textarea',
            '.popup-subscribe .contact-form select',
            '.popup-subscribe .contact-form input',
            '.popup-subscribe .contact-form input::placeholder'
        ];
        $_css = $_form_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# Notices

## 11. Background
$notice_background_color = OhioOptions::get_global( 'notification_background_color' );
if ( $notice_background_color ) {
	$_selector = [
		'.notification .alert',
		'.notification .alert.-blur'
	];
	$_css = 'background-color:' . $notice_background_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 12. Button Color
$notice_button_color = OhioOptions::get_global( 'notification_button_background_color' );
if ( $notice_button_color ) {
	$_selector = '.notification .button';
	$_css = 'background-color:' . $notice_button_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 13. Notice Typography
$notice_typo = OhioOptions::get_global( 'notification_details_typo' );
if ( $notice_typo ) {
	$_selector = '.notification .alert';
	$_css = OhioHelper::parse_acf_typo_to_css( $notice_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 14. Notice Link Typography
$notice_link_typo = OhioOptions::get_global( 'notification_link_typo' );
if ( $notice_link_typo ) {
	$_selector = '.notification .alert a';
	$_css = OhioHelper::parse_acf_typo_to_css( $notice_link_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

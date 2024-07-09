<?php

add_action( 'admin_menu', 'register_ohio_hub_page' );
function register_ohio_hub_page() {
    add_menu_page(
        'Ohio Theme',
        'Ohio Theme', // side menu title
        'edit_others_posts',
        'ohio_hub',
        false,
        get_template_directory_uri() . '/inc/tgmpa/theme_settings.png', // icon
        2 // order
    );
}

add_filter( 'option_page_capability_ohio_hub', 'ohio_hub_capability' );
function ohio_hub_capability( $capability ) {
    return 'edit_others_posts';
}

/**
 * Subpages
 */

// Dashboard
add_action( 'admin_menu', 'register_ohio_hub_subpage_dashboard' );
function register_ohio_hub_subpage_dashboard() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Dashboard ', 'edit_others_posts', 'ohio_hub', 'ohio_hub_dashboard_page' );
}
function ohio_hub_dashboard_page() {
    include 'pages/dashboard-page.php';
}

// Settings
add_action( 'admin_menu', 'register_ohio_hub_subpage_settings' );
function register_ohio_hub_subpage_settings() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Theme Settings', 'edit_others_posts', 'ohio_hub_settings', 'ohio_hub_settings_page' ); 
}
function ohio_hub_settings_page() {
    include 'pages/settings-page.php';
}

// AJAX license registration and removing
add_action( 'wp_ajax_ohio_save_license_code', 'ohio_save_license_code' );
function ohio_save_license_code() {
    $data = str_replace('\"', '"', $_POST['license'] );
    $data = json_decode($data);

    if (!$data) return false;

    if ( !empty( $data->code ) && !empty( $data->sold_at ) && !empty( $data->supported_until ) ) {
        add_option( 'ohio_license_code', $data->code );
        add_option( 'ohio_license_sold_at', $data->sold_at );

        $timestamp = (new \DateTime( $data->supported_until ))->getTimestamp();
        add_option( 'ohio_license_support_until', $timestamp );

        if ( !empty( $data->type ) ) {
            add_option( 'ohio_license_type', $data->type );
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_remove_license_code', 'ohio_remove_license_code' );
function ohio_remove_license_code() {
    $response = wp_remote_post( 'https://demo.clbthemes.com/v1/deregister', [
        'timeout' => 15,
        'redirection' => 15,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => [
            'X-COLABRIO-REFERER' => 'https://' . $_SERVER['HTTP_HOST']
        ],
        'cookies' => [],
        'body' => [
            'code' => get_option( 'ohio_license_code', '' )
        ],
    ] );

    if ( !is_wp_error( $response ) && $response['body'] == 'OK' ) {
        delete_option( 'ohio_license_code' );
        delete_option( 'ohio_license_sold_at' );
        delete_option( 'ohio_license_support_until' );
        delete_option( 'ohio_license_type' );
    } else {
        // error_log(json_encode($response['body']));
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_check_last_version', 'ohio_check_last_version' );
function ohio_check_last_version() {
    $ohio_theme = wp_get_theme( get_template() );
    $current = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '3.0.0';
    $response = wp_remote_get( 'https://demo.clbthemes.com/v1/version/ohio' );
    $actual = wp_remote_retrieve_body( $response );

    echo json_encode([
        'current' => $current,
        'actual' => $actual
    ]);

    update_option( 'ohio_last_available_version', $actual );

    wp_die();
}

/* Sync other languages */
add_action( 'wp_ajax_ohio_sync_settings_with_main_lang', 'ohio_sync_settings_with_main_lang' );
function ohio_sync_settings_with_main_lang() {
    $current_lang = $_POST['current_lang'];
    if ( ! $current_lang) wp_die();

    function ohio_mock_acf_post_id($post_id) {
        return 'options';
    }

    add_filter('acf/validate_post_id', 'ohio_mock_acf_post_id');
    $options = get_field_objects('options');

    $values = [];
    foreach ( $options as $field ) {
        $values[$field['name']] = get_field( $field['name'], 'options', false );
    }

    remove_filter('acf/validate_post_id', 'ohio_mock_acf_post_id');
    foreach ($values as $key => $value) {
        update_field( $key, $value, 'options_' . $current_lang );
    }

    wp_die('OK');
}

// License message
add_action( 'admin_notices', 'ohio_hub_license_notice' );
function ohio_hub_license_notice() {
    if ( ! get_option( 'ohio_license_code', '' ) ): ?>
    <div class="notice o-notice activation warning">
        <div class="holder">
            <i class="bi bi-exclamation-triangle"></i>
            <strong><?php _e( 'License activation is required.', 'ohio-extra' ); ?></strong> <?php _e( 'Activate your license to be able to use all the built-in features.', 'ohio-extra' ); ?>
        </div>
        <div class="holder">
            <a class="btn" href="admin.php?page=ohio_hub"><i class="bi bi-plus-circle-dotted"></i><?php _e( 'Connect & Activate', 'ohio-extra' ); ?></a><?php _e( 'or', 'ohio-extra' ); ?><a class="btn btn-flat" target="_blank" href="https://1.envato.market/5Q25j"><?php _e( 'Buy License', 'ohio-extra' ); ?></a>
        </div>
    </div>
    <?php endif;
}

add_action( 'admin_notices', 'ohio_hub_save_settings_notice');
function ohio_hub_save_settings_notice() {
    ?>
    <div class="notice o-notice o-notice-settings success notice-success">
        <div class="holder">
            <i class="bi bi-check2-circle"></i>
            <?php _e( 'Theme Settings have been successfully updated.', 'ohio-extra' ); ?>
        </div>
    </div>
    <div class="notice o-notice o-notice-settings error notice-error is-dismissible">
        <div class="holder">
            <i class="bi bi-exclamation-triangle"></i>
            <?php _e( 'Oops, something went wrong. Please try again.', 'ohio-extra' ); ?>
        </div>
    </div>
    <?php
}

function ohio_export_theme_settings() {
    global $wpdb;

    $options = $wpdb->get_results( 'SELECT option_name, option_value FROM ' . $wpdb->options .' WHERE option_name LIKE "%options_global%" AND option_name NOT LIKE "%_google_maps_api_key"' );

    echo json_encode( $options );
    wp_die();
}

add_action( 'wp_ajax_ohio_export_theme_settings', 'ohio_export_theme_settings' );

function ohio_import_theme_settings() {
    global $wpdb;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $settings = json_decode( file_get_contents($_FILES['settings']['tmp_name']) );
    if ( ! empty( $settings ) ) {
        $options_table = $wpdb->prefix . 'options';
        foreach ($settings as $key => $value) {
            if ( ! empty($value->option_name) && ! empty ($value->option_value)) {
                $exists = $wpdb->get_var( $wpdb->prepare('SELECT COUNT(*) FROM ' . $options_table . ' WHERE option_name = %s', $value->option_name ) );
                if ( $exists ) {
                    $wpdb->update( $options_table, ['option_value' => $value->option_value], ['option_name' => $value->option_name], ['%s'] );
                } else {
                    $wpdb->insert( $options_table, ['option_value' => $value->option_value, 'option_name' => $value->option_name, 'autoload' => 'no'], ['%s', '%s', '%s'] );
                }
            }
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_import_theme_settings', 'ohio_import_theme_settings' );

function ohio_reset_theme_settings() {
    global $wpdb;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $options_table = $wpdb->prefix . 'options';
    $wpdb->query('DELETE FROM ' . $options_table . ' WHERE option_name LIKE "%options_global%"');

    wp_die();
}

add_action( 'wp_ajax_ohio_reset_theme_settings', 'ohio_reset_theme_settings');

include 'ohio-options-pages-class.php';

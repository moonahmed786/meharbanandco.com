<?php
/**
 * Ohio WordPress Theme
 *
 * Color mode switcher template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$color_mode = OhioSettings::get_color_mode();
$dark_mode = $color_mode == 'dark';
$auto_mode = $color_mode == 'auto';

$show_switcher = OhioOptions::get( 'page_dark_mode_switcher', false );
$show_mobile_switcher = OhioOptions::get( 'page_dark_mode_switcher_mobile', true );
$color_switcher_position = OhioOptions::get_global( 'page_dark_mode_switcher_position' );
$color_switcher_layout = OhioOptions::get_global( 'page_dark_mode_switcher_layout', 'default' );

$extra_classes = '';
if ( $color_switcher_layout == 'simple' ) {
    $extra_classes .= ' -simple';
}
if ( $show_mobile_switcher ) {
    $extra_classes .= ' color-switcher-mobile';
}
if ( $color_switcher_position == 'bottom_left' ) {
    $extra_classes .= ' -left';
}
if ( $color_switcher_position == 'bottom_right' ) {
    $extra_classes .= ' -right';
}

$dark_mode_classes = '';
if ( $dark_mode ) {
    $dark_mode_classes .= ' dark';
}

?>

<?php if ( $show_switcher && !$auto_mode ) : ?>
    <div class="color-switcher cursor-as-pointer -invisible<?php echo esc_attr( $extra_classes . $dark_mode_classes ); ?>">
        <div class="color-switcher-item light">
            <div class="color-switcher-item-state">
                <?php if ( $color_switcher_layout == 'default' ): ?>
                    <span class="caption"><?php esc_html_e( 'Light', 'ohio' ); ?></span>
                <?php endif; ?>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6.75C10.2375 6.75 11.25 7.7625 11.25 9C11.25 10.2375 10.2375 11.25 9 11.25C7.7625 11.25 6.75 10.2375 6.75 9C6.75 7.7625 7.7625 6.75 9 6.75ZM9 5.25C6.93 5.25 5.25 6.93 5.25 9C5.25 11.07 6.93 12.75 9 12.75C11.07 12.75 12.75 11.07 12.75 9C12.75 6.93 11.07 5.25 9 5.25ZM1.5 9.75H3C3.4125 9.75 3.75 9.4125 3.75 9C3.75 8.5875 3.4125 8.25 3 8.25H1.5C1.0875 8.25 0.75 8.5875 0.75 9C0.75 9.4125 1.0875 9.75 1.5 9.75ZM15 9.75H16.5C16.9125 9.75 17.25 9.4125 17.25 9C17.25 8.5875 16.9125 8.25 16.5 8.25H15C14.5875 8.25 14.25 8.5875 14.25 9C14.25 9.4125 14.5875 9.75 15 9.75ZM8.25 1.5V3C8.25 3.4125 8.5875 3.75 9 3.75C9.4125 3.75 9.75 3.4125 9.75 3V1.5C9.75 1.0875 9.4125 0.75 9 0.75C8.5875 0.75 8.25 1.0875 8.25 1.5ZM8.25 15V16.5C8.25 16.9125 8.5875 17.25 9 17.25C9.4125 17.25 9.75 16.9125 9.75 16.5V15C9.75 14.5875 9.4125 14.25 9 14.25C8.5875 14.25 8.25 14.5875 8.25 15ZM4.4925 3.435C4.2 3.1425 3.72 3.1425 3.435 3.435C3.1425 3.7275 3.1425 4.2075 3.435 4.4925L4.23 5.2875C4.5225 5.58 5.0025 5.58 5.2875 5.2875C5.5725 4.995 5.58 4.515 5.2875 4.23L4.4925 3.435ZM13.77 12.7125C13.4775 12.42 12.9975 12.42 12.7125 12.7125C12.42 13.005 12.42 13.485 12.7125 13.77L13.5075 14.565C13.8 14.8575 14.28 14.8575 14.565 14.565C14.8575 14.2725 14.8575 13.7925 14.565 13.5075L13.77 12.7125ZM14.565 4.4925C14.8575 4.2 14.8575 3.72 14.565 3.435C14.2725 3.1425 13.7925 3.1425 13.5075 3.435L12.7125 4.23C12.42 4.5225 12.42 5.0025 12.7125 5.2875C13.005 5.5725 13.485 5.58 13.77 5.2875L14.565 4.4925ZM5.2875 13.77C5.58 13.4775 5.58 12.9975 5.2875 12.7125C4.995 12.42 4.515 12.42 4.23 12.7125L3.435 13.5075C3.1425 13.8 3.1425 14.28 3.435 14.565C3.7275 14.85 4.2075 14.8575 4.4925 14.565L5.2875 13.77Z"/></svg>
            </div>
        </div>
        <div class="color-switcher-item dark">
            <div class="color-switcher-item-state">
                <?php if ( $color_switcher_layout == 'default' ): ?>
                    <span class="caption"><?php esc_html_e( 'Dark', 'ohio' ); ?></span>
                <?php endif; ?>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66222 3.23111C6.50222 3.8 6.42222 4.39556 6.42222 5C6.42222 8.62667 9.37333 11.5778 13 11.5778C13.6044 11.5778 14.2 11.4978 14.7689 11.3378C13.8444 13.6133 11.6044 15.2222 9 15.2222C5.56889 15.2222 2.77778 12.4311 2.77778 9C2.77778 6.39556 4.38667 4.15556 6.66222 3.23111ZM9 1C4.58222 1 1 4.58222 1 9C1 13.4178 4.58222 17 9 17C13.4178 17 17 13.4178 17 9C17 8.59111 16.9644 8.18222 16.9111 7.79111C16.04 9.00889 14.6178 9.8 13 9.8C10.3511 9.8 8.2 7.64889 8.2 5C8.2 3.39111 8.99111 1.96 10.2089 1.08889C9.81778 1.03556 9.40889 1 9 1Z"/></svg>
            </div>
        </div>
        <div class="color-switcher-toddler">
            <div class="color-switcher-toddler-wrap">
                <div class="color-switcher-toddler-item light">
                    <div class="color-switcher-item-state">
                        <?php if ( $color_switcher_layout == 'default' ): ?>
                            <span class="caption"><?php esc_html_e( 'Light', 'ohio' ); ?></span>
                        <?php endif; ?>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 6.75C10.2375 6.75 11.25 7.7625 11.25 9C11.25 10.2375 10.2375 11.25 9 11.25C7.7625 11.25 6.75 10.2375 6.75 9C6.75 7.7625 7.7625 6.75 9 6.75ZM9 5.25C6.93 5.25 5.25 6.93 5.25 9C5.25 11.07 6.93 12.75 9 12.75C11.07 12.75 12.75 11.07 12.75 9C12.75 6.93 11.07 5.25 9 5.25ZM1.5 9.75H3C3.4125 9.75 3.75 9.4125 3.75 9C3.75 8.5875 3.4125 8.25 3 8.25H1.5C1.0875 8.25 0.75 8.5875 0.75 9C0.75 9.4125 1.0875 9.75 1.5 9.75ZM15 9.75H16.5C16.9125 9.75 17.25 9.4125 17.25 9C17.25 8.5875 16.9125 8.25 16.5 8.25H15C14.5875 8.25 14.25 8.5875 14.25 9C14.25 9.4125 14.5875 9.75 15 9.75ZM8.25 1.5V3C8.25 3.4125 8.5875 3.75 9 3.75C9.4125 3.75 9.75 3.4125 9.75 3V1.5C9.75 1.0875 9.4125 0.75 9 0.75C8.5875 0.75 8.25 1.0875 8.25 1.5ZM8.25 15V16.5C8.25 16.9125 8.5875 17.25 9 17.25C9.4125 17.25 9.75 16.9125 9.75 16.5V15C9.75 14.5875 9.4125 14.25 9 14.25C8.5875 14.25 8.25 14.5875 8.25 15ZM4.4925 3.435C4.2 3.1425 3.72 3.1425 3.435 3.435C3.1425 3.7275 3.1425 4.2075 3.435 4.4925L4.23 5.2875C4.5225 5.58 5.0025 5.58 5.2875 5.2875C5.5725 4.995 5.58 4.515 5.2875 4.23L4.4925 3.435ZM13.77 12.7125C13.4775 12.42 12.9975 12.42 12.7125 12.7125C12.42 13.005 12.42 13.485 12.7125 13.77L13.5075 14.565C13.8 14.8575 14.28 14.8575 14.565 14.565C14.8575 14.2725 14.8575 13.7925 14.565 13.5075L13.77 12.7125ZM14.565 4.4925C14.8575 4.2 14.8575 3.72 14.565 3.435C14.2725 3.1425 13.7925 3.1425 13.5075 3.435L12.7125 4.23C12.42 4.5225 12.42 5.0025 12.7125 5.2875C13.005 5.5725 13.485 5.58 13.77 5.2875L14.565 4.4925ZM5.2875 13.77C5.58 13.4775 5.58 12.9975 5.2875 12.7125C4.995 12.42 4.515 12.42 4.23 12.7125L3.435 13.5075C3.1425 13.8 3.1425 14.28 3.435 14.565C3.7275 14.85 4.2075 14.8575 4.4925 14.565L5.2875 13.77Z"/></svg>
                    </div>
                </div>
                <div class="color-switcher-toddler-item dark">
                    <div class="color-switcher-item-state">
                        <?php if ( $color_switcher_layout == 'default' ): ?>
                            <span class="caption"><?php esc_html_e( 'Dark', 'ohio' ); ?></span>
                        <?php endif; ?>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66222 3.23111C6.50222 3.8 6.42222 4.39556 6.42222 5C6.42222 8.62667 9.37333 11.5778 13 11.5778C13.6044 11.5778 14.2 11.4978 14.7689 11.3378C13.8444 13.6133 11.6044 15.2222 9 15.2222C5.56889 15.2222 2.77778 12.4311 2.77778 9C2.77778 6.39556 4.38667 4.15556 6.66222 3.23111ZM9 1C4.58222 1 1 4.58222 1 9C1 13.4178 4.58222 17 9 17C13.4178 17 17 13.4178 17 9C17 8.59111 16.9644 8.18222 16.9111 7.79111C16.04 9.00889 14.6178 9.8 13 9.8C10.3511 9.8 8.2 7.64889 8.2 5C8.2 3.39111 8.99111 1.96 10.2089 1.08889C9.81778 1.03556 9.40889 1 9 1Z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
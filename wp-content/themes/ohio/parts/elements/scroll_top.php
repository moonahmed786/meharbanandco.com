<?php
/**
 * Ohio WordPress Theme
 *
 * Scroll to the top template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$show_scroll = OhioOptions::get( 'page_show_arrow', true );
$show_scroll_mobile = OhioOptions::get( 'page_show_arrow_tablet', false );
$scroll_top_position = OhioOptions::get( 'page_arrow_position' );

$extra_classes = '';
if ( !$show_scroll ) {
	$extra_classes .= ' vc_hidden-lg';
}
if ( !$show_scroll_mobile ) {
	$extra_classes .= ' vc_hidden-md vc_hidden-sm vc_hidden-xs';
}
if ( $scroll_top_position == 'bottom_left' ) {
	$extra_classes .= ' -left';
}
if ( $scroll_top_position == 'bottom_right' ) {
	$extra_classes .= ' -right';
}

?>

<a href="#" class="scroll-top -undash -unlink -small-t<?php echo esc_attr( $extra_classes ); ?>">

	<?php if ( $scroll_top_position == 'bottom_left' || $scroll_top_position == 'bottom_right' ) : ?>

		<button class="icon-button -small -no-transition" aria-controls="site-navigation" aria-expanded="false">
		    <i class="icon -no-transition">
		    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M442.5-170v-476L223-426.5 170-480l310-310 310 310-53 53.5L517.5-646v476h-75Z"/></svg>
		    </i>
		</button>

	<?php else : ?>

		<div class="scroll-top-bar">
			<div class="scroll-track"></div>
		</div>

	<?php endif; ?>

	<div class="scroll-top-holder titles-typo">
		<?php esc_html_e( 'Scroll to top', 'ohio' ); ?>
	</div>
</a>
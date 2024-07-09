<?php
	$header_button = OhioOptions::get_global( 'custom_button_for_header', false );
	$button_link = OhioOptions::get_global( 'custom_button_for_header_link' );
?>

<?php if ( $header_button ) : ?>

	<?php if ( $button_link ) : ?>
		<a href="<?php echo esc_url( $button_link['url'] ); ?>" class="button -small btn-optional" target="<?php echo esc_html( $button_link['target'] ); ?>">
			<?php echo esc_html( $button_link['title'] ); ?>
		</a>
	<?php endif; ?>

	<?php if ( have_rows( 'global_custom_button_extra', 'option' ) ) : ?>

	    <?php while ( have_rows( 'global_custom_button_extra', 'option' ) ) : the_row(); ?>

	        <?php
	        	$button_link = get_sub_field( 'button_extra_link', 'option' );
	        	$button_type = get_sub_field( 'button_extra_type', 'option' );
	        	$type_class = '';
	        	if ( $button_type ) {
	        		$type_class = ' -' . $button_type;
	        	}
	        ?>

	        <a href="<?php echo esc_url( $button_link['url'] ); ?>" class="button -small btn-optional<?php echo esc_attr( $type_class ); ?>" target="<?php echo esc_html( $button_link['target'] ); ?>">
				<?php echo esc_html( $button_link['title'] ); ?>
			</a>
	      
	    <?php endwhile; ?>

	<?php endif; ?>

<?php endif; ?>
<?php
	// Settings
	$prev_post = get_adjacent_post( false, '', false );
	$next_post = get_adjacent_post( false, '', true );

	$first_post = get_posts( array( 'numberposts' => 1) );

	if (!$next_post) $next_post = $first_post[0];

	$toggle_post_column = ( !empty( $prev_post ) && !empty( $next_post ) ) ? '6' : '12';

	$show_prev_n_next = OhioOptions::get( 'post_previous_n_next_visibility', true );

	if ( ( $prev_post || $next_post ) && $show_prev_n_next ) :
?>

<div class="sticky-nav">
	<div class="sticky-nav-thumbnail -fade-up"
		<?php 
			$next_image_thumb = get_the_post_thumbnail_url( $next_post, 'medium_large' );
			if ( $next_image_thumb) {
				echo 'style="background-image: url(\'' . $next_image_thumb . '\');"';
			}
		?>
		>
	</div>
	<div class="sticky-nav-holder">
		<div class="sticky-nav-headline">
			<h6 class="title">
				<?php esc_html_e( 'Next Post', 'ohio' ); ?>
			</h6>
			<div class="nav-group">
				<a class="icon-button prev" href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>">
				    <i class="icon">
				    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8,16l1.4-1.4L3.8,9H16V7H3.8l5.6-5.6L8,0L0,8L8,16z"/></svg>
				    </i>
				</a>
				<a class="icon-button next" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
				    <i class="icon">
				    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
				    </i>
				</a>
			</div>
		</div>
		<a class="titles-typo -undash" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
			<?php
				$next_title = get_the_title( $next_post->ID );
				if ( empty( $next_title ) ) {
					echo wp_kses( '[' . get_the_date( false, $next_post->ID ) . ']', 'default' );
				} else {
					echo wp_kses( $next_title, 'default' );
				}
			?>
		</a>
	</div>
</div>
<?php endif; ?>
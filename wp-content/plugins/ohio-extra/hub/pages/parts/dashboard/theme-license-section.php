<h2 class="clb-headline"><?php _e( 'Theme Registration', 'ohio-extra' ); ?></h2>

<?php if ( get_option( 'ohio_license_code', false ) ): ?>

	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'Theme Overview', 'ohio-extra' ); ?></h2>
			<a href="#remove" class="btn btn-flat" id="ohio-remove-theme-license">
				<i class="bi bi-dash-circle-dotted"></i>
				<?php _e( 'Detach License', 'ohio-extra' ); ?>
			</a>
		</div>

		<div class="clb-group-details">
			<?php _e( 'You have successfully registered the theme, all theme updates and premium bundled plugins can be installed.', 'ohio-extra' ); ?>
		</div>

		<table class="clb-group-content clb-group-table table-col-2">
			<tbody>
				<tr>
					<td><?php _e( 'License', 'ohio-extra' ); ?></a>:</td>
					<td>
						<label class="active"><mark class="yes"><?php _e( 'Activated', 'ohio-extra' ); ?></mark></label>&nbsp; 
						<?php echo get_option( 'ohio_license_type', 'Regular License' ); ?>
						<a class="tips" target="_blank" href="https://themeforest.net/licenses/terms/regular"><i class="bi bi-info-circle"></i></a>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'License Key:', 'ohio-extra' ); ?></a></td>
					<td><b><?php echo get_option( 'ohio_license_code', '-' ); ?></b></td>
				</tr>
				<tr>
					<td><?php _e( 'Registration Date:', 'ohio-extra' ); ?></td>
					<td><?php echo get_option( 'ohio_license_sold_at', '-' ); ?></td>
				</tr>
				<tr>
					<td><?php _e( 'Registered Domain:', 'ohio-extra' ); ?></a></td>
					<td><a href="<?php echo '//' . $_SERVER['HTTP_HOST']; ?>"><?php echo $_SERVER['HTTP_HOST']; ?>/</a> <a class="tips" target="_blank" href="https://themeforest.net/licenses/terms/regular"><i class="bi bi-info-circle"></i></a></td>
				</tr>
				<tr>
					<td><?php _e( 'Theme Directory:', 'ohio-extra' ); ?></a></td>
					<td><?php echo '..' . get_raw_theme_root( get_stylesheet() ) . '/' . get_stylesheet(); ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Group 2cl -->
	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'Theme Support', 'ohio-extra' ); ?></h2>
			<a target="_blank" href="https://1.envato.market/5Q25j" class="btn btn-flat">
				<i class="bi bi-arrow-clockwise"></i>
				<?php _e( 'Renew Support', 'ohio-extra' ); ?>
			</a>
		</div>
		<div class="clb-group-details">
			<?php _e( 'Many support queries and technical questions will already be answered on our', 'ohio-extra' ); ?> <a target="_blank" href="https://docs.clbthemes.com/ohio/"><?php _e( 'documentation website', 'ohio-extra' ); ?></a>.
		</div>
		<table class="clb-group-content clb-group-table table-col-2">
			<tbody>
				<tr>
					<td><?php _e( 'Support Status:', 'ohio-extra' ); ?></td>
					<td>
						<?php
							$support_timestamp = get_option( 'ohio_license_support_until' );
							if ( !empty( $support_timestamp ) && is_numeric( $support_timestamp ) ):
								$diff_timestamp = $support_timestamp - time();
								if ($diff_timestamp > 0) {
									echo '<label class="active"><mark class="yes">Supported</mark></label>';
									$days = ceil( $diff_timestamp / 60 / 60 / 24 );
									echo '&nbsp; ' . $days . ' days left';
								} else {
									echo '<label class="inactive"><mark class="no">Unsupported</mark></label>&nbsp; <a target="_blank" href="https://1.envato.market/5Q25j">Renew Support?</a>';
								}
							endif;
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

<?php else: ?>

	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'Activation', 'ohio-extra' ); ?></h2>
		</div>
		<div class="clb-group-details">
			<?php _e( 'Thank you for choosing Ohio. Now it\'s time to create something awesome.', 'ohio-extra' ); ?>
		</div>
		<div class="clb-group-content">
			<div class="clb-steps">
				<div class="clb-steps-item">
					<div class="step-number">1</div>
					<div class="dashed"></div>
					<p><?php _e( 'Hint the "Connect & Activate" button below to get started with activation:', 'ohio-extra' ); ?></p>
					<a href="#" class="btn btn-large btn-activate" id="ohio-activate-theme-license"><svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.2849 0.120735C14.7711 -0.1293 12.9731 -0.00428241 10.9182 0.620805C7.32212 3.12115 4.23976 6.62164 3.9829 12.3724C3.9829 12.4975 3.59761 12.3724 3.46918 12.3724C2.57016 10.4972 2.18486 8.49691 2.95545 5.74652C3.21231 5.49649 2.69859 5.24645 2.57016 5.24645C2.44172 5.49649 1.67114 6.24659 1.15741 7.12171C-1.28279 11.2473 0.25839 16.623 4.62506 18.8734C8.99173 21.2487 14.3858 19.7485 16.826 15.4979C19.5231 10.6222 16.9545 0.995857 15.2849 0.120735Z" fill="white"/></svg><span><?php _e( 'Connect & Activate', 'ohio-extra' ); ?></span></a>
				</div>
				<div class="clb-steps-item">
					<div class="step-number">2</div>
					<div class="dashed"></div>
					<p><?php _e( 'Login with your Envato account to authorize the theme\'s purchase code.', 'ohio-extra' ); ?></p>
				</div>
				<div class="clb-steps-item">
					<div class="step-number">3</div>
					<div class="dashed"></div>
					<p><?php _e( 'Choose a valid', 'ohio-extra' ); ?> <a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"><?php _e( 'Purchase Code', 'ohio-extra' ); ?></a> <?php _e( 'from the list and hint the "Proceed" button.', 'ohio-extra' ); ?></p>
				</div>
				<div class="clb-steps-item">
					<div class="step-number">4</div>
					<div class="dashed"></div>
					<p><?php _e( 'That is it, you’re all set!', 'ohio-extra' ); ?><br> <?php _e( 'Your theme license is activated now.', 'ohio-extra' ); ?></p>
				</div>
			</div>
		</div>
		<div class="clb-group-footer">
			<span><?php _e( 'Need a new license?', 'ohio-extra' ); ?> <a href="https://1.envato.market/5Q25j" target="_blank"><?php _e( 'Buy License', 'ohio-extra' ); ?></a></span>
		</div>
	</div>

<?php endif; ?>

<h2 class="clb-headline"><?php _e( 'System Status', 'ohio-extra' ); ?></h2>

<div class="o-notice o-notice-system-status">
	<div class="holder">
		<i class="bi bi-info-circle"></i>
		<?php _e( 'Please copy and paste this information in your ticket when contacting support:', 'ohio-extra' ); ?>
	</div>
	<a id="get-system-report" href="#" class="btn"><i class="bi bi-text-paragraph"></i><?php _e( 'Get System Report', 'ohio-extra' ); ?></a>
	<textarea id="system-report" style="display: none;" class="system-report" readonly><?php 
			// WordPress information
			$wp_version = get_bloginfo('version');
			$wp_language = get_bloginfo('language');
			$wp_charset = get_bloginfo('charset');
			$wp_debug_mode = WP_DEBUG ? 'Enabled' : 'Disabled';
			$home_url = home_url();
			$site_url = site_url();
			$wp_path = ABSPATH;
			$wp_content_path = WP_CONTENT_DIR;

			// Theme information
			$theme = wp_get_theme();
			$child_theme = is_child_theme() ? 'Yes' : 'No';
			$theme_directory = get_stylesheet_directory();
			$theme_name = $theme->get('Name');
			$theme_version = $theme->get('Version');
			$theme_author = $theme->get('Author');
			$has_license_code = !!get_option( 'ohio_license_code' ) ? 'Yes' : 'No';

			// Plugins information
			$plugins = get_plugins();
			$active_plugins = get_option('active_plugins');
			$plugin_info = array();
			foreach ($plugins as $plugin_path => $plugin_data) {
				$status = in_array($plugin_path, $active_plugins) ? 'Active' : 'Inactive';
				$plugin_info[] = "{$plugin_data['Name']} (v{$plugin_data['Version']}) by {$plugin_data['Author']} - {$status}";
			}
			$plugin_list = implode("\n", $plugin_info);
			
			// Server environment
			$php_version = phpversion();
			$server_software = $_SERVER['SERVER_SOFTWARE'];
			$mysql_version = $GLOBALS['wpdb']->get_var('SELECT VERSION() AS version');
			$php_time_limit = ini_get('max_execution_time');
			$php_memory_limit = ini_get('memory_limit');
			$php_max_upload_size = ini_get('upload_max_filesize');
			$file_upload_permission = is_writable(WP_CONTENT_DIR . '/uploads') ? 'Writable' : 'Not writable';
			$https = is_ssl() ? 'Yes' : 'No';
			$enabled_php_extensions = implode( ', ', get_loaded_extensions() );

			$iconv_assert_result = 'Fail';
			if ( extension_loaded('iconv') ) {
				$ICONV_TEST = 'new-permalink';
				$iconv_result = OhioHelper::slug_from_string( $ICONV_TEST );
				$iconv_assert = !empty( $iconv_result ) && $iconv_result === $ICONV_TEST;
				$iconv_assert_result = $iconv_assert ? 'Success' : 'Fail';
			}

			$data = array(
				"WordPress Information:",
				"Version: $wp_version",
				"Language: $wp_language",
				"Charset: $wp_charset",
				"Debug mode: $wp_debug_mode",
				"Home URL: $home_url",
				"Site URL: $site_url",
				"WordPress Path: $wp_path",
				"WordPress Content Path: $wp_content_path",
				"",
				"Theme Information:",
				"Name: $theme_name",
				"Version: $theme_version",
				"Author: $theme_author",
				"Child Theme: $child_theme",
				"Theme Directory: $theme_directory",
				"Is theme activated: $has_license_code",
				"",
				"Plugins Information:",
				$plugin_list,
				"",
				"Server Environment:",
				"PHP Version: $php_version",
				"Server Software: $server_software",
				"MySQL Version: $mysql_version",
				"PHP Time Limit: $php_time_limit",
				"PHP Memory Limit: $php_memory_limit",
				"PHP Max Upload Size: $php_max_upload_size",
				"File Upload Permission: $file_upload_permission",
				"HTTPS: $https",
				"Iconv assert: $iconv_assert_result",
				"Enabled PHP extensions: $enabled_php_extensions"
			);

			$output = implode("\n", $data);
			echo $output;
		?>
	</textarea>
</div>

<!-- Group 2cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h2><?php _e( 'Theme Info', 'ohio-extra' ); ?></h2>
	</div>
	<table class="clb-group-details clb-group-table table-col-3">
		<tbody>
			<tr>
				<th><?php _e( 'Your current server configuration', 'ohio-extra' ); ?></th>
				<th><?php _e( 'Actual Value', 'ohio-extra' ); ?></th>
				<th></th>
			</tr>
		</tbody>
	</table>
	<table class="clb-group-content clb-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Theme Version:', 'ohio-extra' ); ?></td>
				<td id="ohio-version-table-value">
					<?php
						$ohio_theme = wp_get_theme( get_template() );
						$ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
						$last_stable = get_option('ohio_last_available_version', '2.0.0');

						if ( version_compare( $ohio_version, $last_stable ) >= 0 ) {
							echo $ohio_version;
						} else {
							echo '<mark class="no">' . $ohio_version . '</mark>';
						}
					?>
						<span class="ohio-new-version-available" style="<?php if ( version_compare( $ohio_version, $last_stable ) >= 0 ) { echo 'display:none'; } ?>">
							- <a href="#"><?php _e( 'New version available', 'ohio-extra' ) ?></a>&nbsp;
							<b id="ohio-version-table-placeholder"><?php echo $last_stable; ?></b>
							<a class="tips" target="_blank" href="https://docs.clbthemes.com/ohio/#updating"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
						</span>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'Theme License:', 'ohio-extra' ); ?></td>
				<td>
					<?php
						if ( get_option( 'ohio_license_code', false ) ):
							echo '<label class="active"><mark class="yes">Activated</mark></label>';
						else:
							echo '<label class="inactive"><mark class="no">Not activated</mark></label> <a class="tips" href="../wp-admin/admin.php?page=ohio_hub"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>';
						endif;
					?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'Theme Directory:', 'ohio-extra' ); ?></td>
				<td><?php echo '..' . get_raw_theme_root( get_stylesheet() ) . '/' . get_stylesheet(); ?></td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'Child Theme:', 'ohio-extra' ); ?></td>
				<td>
					<label><mark class="yes"><?php echo ( get_template_directory() === get_stylesheet_directory() ) ? 'Disabled' : 'Enabled'; ?></mark></label>
					<a class="tips" target="_blank" href="https://developer.wordpress.org/themes/advanced-topics/child-themes/">
						<i class="bi bi-info-circle"></i>
					</a>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Group 3cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h2><?php _e( 'Server Environment', 'ohio-extra' ); ?></h2>
		<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank" class="btn btn-flat">
			<i class="bi bi-question-circle"></i>
			<?php _e( 'Requirements', 'ohio-extra' ); ?></a>
	</div>
	<table class="clb-group-details clb-group-table table-col-3">
		<tbody>
			<tr>
				<th><?php _e( 'Directive', 'ohio-extra' ); ?></th>
				<th><?php _e( 'Actual Value', 'ohio-extra' ); ?></th>
				<th><?php _e( 'Required Value', 'ohio-extra' ); ?></th>
			</tr>
		</tbody>
	</table>
	<table class="clb-group-content clb-group-table table-col-3">
		<tbody>
			<tr>
				<td><?php _e( 'PHP Version:', 'ohio-extra' ); ?></td>
				<td>
					<?php
						if ( explode( ',', phpversion() )[0] >= 7 ) {
							echo phpversion();
						} else {
							echo '<mark class="no">' . phpversion() . '</mark>';
						}
					?>
				</td>
				<td>7.4.0</td>
			</tr>
			<tr>
				<td><?php _e( 'PHP Memory Limit:', 'ohio-extra' ); ?><br><span><?php _e( '(memory_limit)', 'ohio-extra' ); ?></span></td>
				<td>
					<?php
						if ( intval( ini_get( 'memory_limit' ) ) >= 256 ) {
							echo ini_get( 'memory_limit' );
						} else {
							echo '<mark class="no">' . ini_get( 'memory_limit' ) . '</mark>';
						}
					?>
				</td>
				<td>256M</td>
			</tr>
			<tr>
				<td><?php _e( 'PHP Time Limit:', 'ohio-extra' ); ?><br><span><?php _e( '(max_execution_time)', 'ohio-extra' ); ?></span></td>
				<td>
					<?php
						if ( ini_get( 'max_execution_time' ) >= 160 ) {
							echo ini_get( 'max_execution_time' );
						} else {
							echo '<mark class="no">' . ini_get( 'max_execution_time' ) . '</mark>';
							echo '<span class="error">&nbsp;';
							echo _e( '- Please adjust this value in order to meet the theme requirements.', 'ohio-extra' );
							echo '</span';
						}
					?>
				</td>
				<td>160</td>
			</tr>
			<tr>
				<td><?php _e( 'WP Max Upload Size:', 'ohio-extra' ); ?><br><span><?php _e( '(upload_max_filesize)', 'ohio-extra' ); ?></span></td>
				<td>
					<?php
						if ( intval( ini_get( 'upload_max_filesize' ) ) >= 16 ) {
							echo ini_get( 'upload_max_filesize' );
						} else {
							echo '<mark class="no">' . ini_get( 'upload_max_filesize' ) . '</mark>';
						}
					?>
				</td>
				<td>16M</td>
			</tr>
			<tr>
				<td><?php _e( 'File Upload Permission:', 'ohio-extra' ); ?><br><span><?php _e( '(file_uploads)', 'ohio-extra' ); ?></span></td>
				<td>
					<?php
						$file_uploads = is_numeric( ini_get( 'file_uploads' ) ) ? ( ini_get( 'file_uploads' ) ? 'On' : 'Off' ) : ini_get( 'file_uploads' );
						if ( $file_uploads == 'On' ) {
							echo _e( 'Available', 'ohio-extra' );
						} else {
							echo '<mark class="no">';
							echo _e( 'Disabled', 'ohio-extra' );
							echo '</mark';
						}
					?>
				</td>
				<td><?php _e( 'Available', 'ohio-extra' ); ?></td>
			</tr>
		</tbody>
	</table>
	<div class="clb-group-footer">
		<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'ohio-extra' ); ?>
	</div>
</div>

<!-- Group 2cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h2><?php _e( 'WordPress Environment', 'ohio-extra' ); ?></h2>
	</div>
	<table class="clb-group-details clb-group-table table-col-3">
		<tbody>
			<tr>
				<th><?php _e( 'Directive', 'ohio-extra' ); ?></th>
				<th><?php _e( 'Actual Value', 'ohio-extra' ); ?></th>
				<th></th>
			</tr>
		</tbody>
	</table>
	<table class="clb-group-content clb-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Home URL:', 'ohio-extra' ); ?></td>
				<td>
					<?php echo get_home_url(); ?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'Site URL:', 'ohio-extra' ); ?></td>
				<td>
					<?php echo get_site_url(); ?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'WP Version:', 'ohio-extra' ); ?></td>
				<td>
					<?php
						if ( !isset( $wp_verion ) && defined( 'ABSPATH' ) && defined( 'WPINC' ) ) {
							include ABSPATH . WPINC . '/version.php';
						}

						$wp_version_exploded = isset( $wp_version ) ? explode( '.', $wp_version ) : [ '1' ];

						if ( !isset( $wp_version ) ) {
							$wp_version = 'Undefined';
						}

						if ( $wp_version_exploded[0] >= 5 ) {
							echo $wp_version;
						} else {
							echo '<mark class="no">' . $wp_version . '</mark>';
						}
					?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'WP Language:', 'ohio-extra' ); ?></td>
				<td>
					<?php echo get_locale(); ?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'WP Multisite:', 'ohio-extra' ); ?></td>
				<td>
					<?php
						if ( is_multisite() ) { 
							echo '<label><mark class="yes">';
							echo _e( 'Enabled', 'ohio-extra' );
							echo '</mark></label>';
						} else {
							echo '<label><mark class="yes">';
							echo _e( 'Disabled', 'ohio-extra' );
							echo '</mark></label>';
						}
					?>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Group 2cl -->
<div class="clb-group">
	<div class="clb-group-headline">
		<h2><?php _e( 'Security', 'ohio-extra' ); ?></h2>
	</div>
	<table class="clb-group-details clb-group-table table-col-3">
		<tbody>
			<tr>
				<th><?php _e( 'Directive', 'ohio-extra' ); ?></th>
				<th><?php _e( 'Actual Value', 'ohio-extra' ); ?></th>
				<th></th>
			</tr>
		</tbody>
	</table>
	<table class="clb-group-content clb-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Secure Connection:', 'ohio-extra' ); ?><br><span><?php _e( '(SSL Certificate)', 'ohio-extra' ); ?></span></td>
				<td>
					<?php
						if ( is_ssl() ) {
							echo _e( 'Secured', 'ohio-extra' );
						} else {
							echo '<mark class="no">';
							echo _e( 'Not secured', 'ohio-extra' );
							echo '</mark';
						}
					?>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><?php _e( 'Hide Errors:', 'ohio-extra' ); ?><br><span><?php _e( '(WP_DEBUG)', 'ohio-extra' ); ?></span></td>
				<td>
					<?php
						if ( defined('WP_DEBUG') && true === WP_DEBUG ) {
							echo '<mark class="no">';
							echo _e( 'Errors are displayed', 'ohio-extra' );
							echo '</mark';
						} else {
							echo '<mark class="yes">';
							echo _e( 'Hidden', 'ohio-extra' );
							echo '</mark';
						}
					?>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>

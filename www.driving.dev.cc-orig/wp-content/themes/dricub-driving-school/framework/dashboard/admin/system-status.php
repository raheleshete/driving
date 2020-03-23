<?php
Class SDS_REST_System_Status_Controller {

	use pluginlist;
	/**
	 * Get array of environment information. Includes thing like software
	 * versions, and various server settings.
	 *
	 * @return array
	 */

	public function get_environment_info() {
		global $wpdb;

		// Figure out cURL version, if installed.
		$curl_version = '';
		if ( function_exists( 'curl_version' ) ) {
			$curl_version = curl_version();
			$curl_version = $curl_version['version'] . ', ' . $curl_version['ssl_version'];
		}

		// WP memory limit.
		$wp_memory_limit = $this->envato_theme_license_let_to_num( WP_MEMORY_LIMIT );
		if ( function_exists( 'memory_get_usage' ) ) {
			$wp_memory_limit = max( $wp_memory_limit, $this->envato_theme_license_let_to_num( @ini_get( 'memory_limit' ) ) );
		}

		// Test POST requests.
		$post_response            = wp_safe_remote_post(
			'https://www.paypal.com/cgi-bin/webscr',
			array(
				'timeout'     => 10,
				'user-agent'  => $this->dashboard_slug.'/' . wp_get_theme()->version,
				'httpversion' => '1.1',
				'body'        => array(
					'cmd' => '_notify-validate',
				),
			)
		);
		$post_response_successful = false;
		if ( ! is_wp_error( $post_response ) && $post_response['response']['code'] >= 200 && $post_response['response']['code'] < 300 ) {
			$post_response_successful = true;
		}

		// Test GET requests.
		$get_response            = wp_safe_remote_get( 'https://woocommerce.com/wc-api/product-key-api?request=ping&network=' . ( is_multisite() ? '1' : '0' ) );
		$get_response_successful = false;
		if ( ! is_wp_error( $post_response ) && $post_response['response']['code'] >= 200 && $post_response['response']['code'] < 300 ) {
			$get_response_successful = true;
		}

		$database_version = $this->envato_theme_license_get_server_database_version();
		
		// Return all environment info. Described by JSON Schema.
		return array(
			'home_url'                  =>home_url(),
			'site_url'                  => get_option( 'siteurl' ),
			'version'                   => wp_get_theme()->version,
			
			'wp_version'                => get_bloginfo( 'version' ),
			'wp_multisite'              => is_multisite(),
			'wp_memory_limit'           => $wp_memory_limit,
			'wp_debug_mode'             => ( defined( 'WP_DEBUG' ) && WP_DEBUG ),
			'wp_cron'                   => ! ( defined( 'DISABLE_WP_CRON' ) && DISABLE_WP_CRON ),
			'language'                  => get_locale(),
			'external_object_cache'     => wp_using_ext_object_cache(),
			'php_version'               => phpversion(),
			'php_post_max_size'         => $this->envato_theme_license_let_to_num( ini_get( 'post_max_size' ) ),
			'php_max_execution_time'    => ini_get( 'max_execution_time' ),
			'php_max_input_vars'        => ini_get( 'max_input_vars' ),
			'curl_version'              => $curl_version,
			'suhosin_installed'         => extension_loaded( 'suhosin' ),
			'max_upload_size'           => wp_max_upload_size(),
			'mysql_version'             => $database_version['number'],
			'mysql_version_string'      => $database_version['string'],
			'default_timezone'          => date_default_timezone_get(),
			'fsockopen_or_curl_enabled' => ( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ),
			'soapclient_enabled'        => class_exists( 'SoapClient' ),
			'domdocument_enabled'       => class_exists( 'DOMDocument' ),
			'gzip_enabled'              => is_callable( 'gzopen' ),
			'mbstring_enabled'          => extension_loaded( 'mbstring' ),
			'remote_post_successful'    => $post_response_successful,
			'remote_post_response'      => ( is_wp_error( $post_response ) ? $post_response->get_error_message() : $post_response['response']['code'] ),
			'remote_get_successful'     => $get_response_successful,
			'remote_get_response'       => ( is_wp_error( $get_response ) ? $get_response->get_error_message() : $get_response['response']['code'] ),
		);
	}

	private function envato_theme_license_get_server_database_version() {
		global $wpdb;
	
		if ( empty( $wpdb->is_mysql ) ) {
			return array(
				'string' => '',
				'number' => '',
			);
		}
	
		if ( $wpdb->use_mysqli ) {
			$server_info = mysqli_get_server_info( $wpdb->dbh ); // @codingStandardsIgnoreLine.
		} else {
			$server_info = mysql_get_server_info( $wpdb->dbh ); // @codingStandardsIgnoreLine.
		}
	
		return array(
			'string' => $server_info,
			'number' => preg_replace( '/([^\d.]+).*/', '', $server_info ),
		);
	}

	private function envato_theme_license_let_to_num( $size ) {
		$l    = substr( $size, -1 );
		$ret  = substr( $size, 0, -1 );
		$byte = 1024;
	
		switch ( strtoupper( $l ) ) {
			case 'P':
				$ret *= 1024;
				// No break.
			case 'T':
				$ret *= 1024;
				// No break.
			case 'G':
				$ret *= 1024;
				// No break.
			case 'M':
				$ret *= 1024;
				// No break.
			case 'K':
				$ret *= 1024;
				// No break.
		}
		return $ret;
	}

}


//
$system_status    = new SDS_REST_System_Status_Controller();
$environment      = $system_status->get_environment_info();
$errorshow=0;
?>
<div class="updated <?php echo esc_attr($system_status->menu_slug)?>message inline">
	<p>
		<?php esc_html_e( 'Please copy and paste this information in your ticket when contacting support:', 'dricub-driving-school' ); ?>
	</p>
	<p class="submit">
		<a href="<?php echo esc_url("#");?>" class="button-primary debug-report"><?php esc_html_e( 'Get system report', 'dricub-driving-school' ); ?></a>
		
	</p>
	<div id="debug-report">
		<textarea  cols="50" rows="10"readonly="readonly"></textarea>
		<p class="submit">
			<button id="copy-for-support" class="button-primary" href="<?php echo esc_url("#");?>" title="copy">
				<?php esc_html_e( 'Copy for support', 'dricub-driving-school' ); ?>
			</button>
		</p>
		<p class="copy-error hidden">
			<?php esc_html_e( 'Copying to clipboard failed. Please press Ctrl/Cmd+C to copy.', 'dricub-driving-school' ); ?>
		</p>
	</div>
</div>
<table class="<?php echo esc_attr($system_status->dashboard_slug) ?>_status_table widefat" cellspacing="0" id="status">
	<thead>
		<tr>
			<th colspan="3" data-export-label="WordPress Environment"><h2><?php esc_html_e( 'WordPress environment', 'dricub-driving-school' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="Home URL"><?php esc_html_e( 'Home URL', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The homepage URL of your site.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td><?php echo esc_html( $environment['home_url'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Site URL"><?php esc_html_e( 'Site URL', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The root URL of your site.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td><?php echo esc_html( $environment['site_url'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Theme Version"><?php esc_html_e( 'Theme version', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The version of Theme installed on your site.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td><?php echo esc_html( $environment['version'] );?></td>
		</tr>
		
		<tr>
			<td data-export-label="WP Version"><?php esc_html_e( 'WordPress version', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
			<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The version of WordPress installed on your site.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td>
				<?php
				$latest_version = get_transient( $system_status->dashboard_slug.'_system_status_wp_version_check' );

				if ( false === $latest_version ) {
					$version_check = wp_remote_get( 'https://api.wordpress.org/core/version-check/1.7/' );
					$api_response  = json_decode( wp_remote_retrieve_body( $version_check ), true );

					if ( $api_response && isset( $api_response['offers'], $api_response['offers'][0], $api_response['offers'][0]['version'] ) ) {
						$latest_version = $api_response['offers'][0]['version'];
					} else {
						$latest_version = $environment['wp_version'];
					}
					set_transient( $system_status->dashboard_slug.'_system_status_wp_version_check', $latest_version, DAY_IN_SECONDS );
				}

				if ( version_compare( $environment['wp_version'], $latest_version, '<' ) ) {
					
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( '%1$s - There is a newer version of WordPress available (%2$s)', 'dricub-driving-school' ), esc_html( $environment['wp_version'] ), esc_html( $latest_version ) ) . '</mark>';
				} else {
					echo '<mark class="yes">' . esc_html( $environment['wp_version'] ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Multisite"><?php esc_html_e( 'WordPress multisite', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            <span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Whether or not you have WordPress Multisite enabled.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td><?php $wp_multisite= ( $environment['wp_multisite'] ) ? '<span class="dashicons dashicons-yes"></span>' : '&ndash;'; 
			echo sprintf(__('%s','dricub-driving-school'),$wp_multisite);
			?></td>
		</tr>
		<tr>
			<td data-export-label="WP Memory Limit"><?php esc_html_e( 'WordPress memory limit', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            <span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The maximum amount of memory (RAM) that your site can use at one time.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( $environment['wp_memory_limit'] < 67108864 ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( '%1$s - We recommend setting memory to at least 64MB. See: %2$s', 'dricub-driving-school' ), esc_html( size_format( $environment['wp_memory_limit'] ) ), '<a href="https://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">' . esc_html__( 'Increasing memory allocated to PHP', 'dricub-driving-school' ) . '</a>' ) . '</mark>';
				} else {
					echo '<mark class="yes">' . esc_html( size_format( $environment['wp_memory_limit'] ) ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Debug Mode"><?php esc_html_e( 'WordPress debug mode', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Displays whether or not WordPress is in Debug Mode.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td>
				<?php if ( $environment['wp_debug_mode'] ) : ?>
					<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>
				<?php else : ?>
					<mark class="no">&ndash;</mark>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="WP Cron"><?php esc_html_e( 'WordPress cron', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Displays whether or not WP Cron Jobs are enabled.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php if ( $environment['wp_cron'] ) : ?>
					<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>
				<?php else : ?>
					<mark class="no">&ndash;</mark>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Language"><?php esc_html_e( 'Language', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The current language used by WordPress. Default = English', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td><?php echo esc_html( $environment['language'] ); ?></td>
		</tr>
		<tr>
			<td data-export-label="External object cache"><?php esc_html_e( 'External object cache', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Displays whether or not WordPress is using an external object cache.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php if ( $environment['external_object_cache'] ) : ?>
					<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>
				<?php else : ?>
					<mark class="no">&ndash;</mark>
				<?php endif; ?>
			</td>
		</tr>
	</tbody>
</table>
<table class="<?php echo esc_attr($system_status->dashboard_slug)?>_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Server Environment"><h2><?php esc_html_e( 'Server environment', 'dricub-driving-school' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td data-export-label="PHP Version"><?php esc_html_e( 'PHP version', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The version of PHP installed on your hosting server.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( version_compare( $environment['php_version'], '7.2', '>=' ) ) {
					echo '<mark class="yes">' . esc_html( $environment['php_version'] ) . '</mark>';
				} else {
					$update_link = ' <a href="https://docs.woocommerce.com/document/how-to-update-your-php-version/" target="_blank">' . esc_html__( 'How to update your PHP version', 'dricub-driving-school' ) . '</a>';
					$class       = 'error';

					if ( version_compare( $environment['php_version'], '5.4', '<' ) ) {
						$notice = '<span class="dashicons dashicons-warning"></span> ' . __( 'WooCommerce will run under this version of PHP, however, some features such as geolocation are not compatible. Support for this version will be dropped in the next major release. We recommend using PHP version 7.2 or above for greater performance and security.', 'dricub-driving-school' ) . $update_link;
					} elseif ( version_compare( $environment['php_version'], '5.6', '<' ) ) {
						$notice = '<span class="dashicons dashicons-warning"></span> ' . __( 'WooCommerce will run under this version of PHP, however, it has reached end of life. We recommend using PHP version 7.2 or above for greater performance and security.', 'dricub-driving-school' ) . $update_link;
					} elseif ( version_compare( $environment['php_version'], '7.2', '<' ) ) {
						$notice = __( 'We recommend using PHP version 7.2 or above for greater performance and security.', 'dricub-driving-school' ) . $update_link;
						$class  = 'recommendation';
					}

					echo '<mark class="' . esc_attr( $class ) . '">' . esc_html( $environment['php_version'] ) . ' - ' . wp_kses_post( $notice ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<?php if ( function_exists( 'ini_get' ) ) : ?>
			<tr>
				<td data-export-label="PHP Post Max Size"><?php esc_html_e( 'PHP post max size', 'dricub-driving-school' ); ?>:</td>
				<td class="help">
                	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The largest filesize that can be contained in one post.', 'dricub-driving-school' ) ; ?>"></span>
				
                </td>
				<td><?php echo esc_html( size_format( $environment['php_post_max_size'] ) ); ?></td>
			</tr>
			<tr>
				<td data-export-label="PHP Time Limit"><?php esc_html_e( 'PHP time limit', 'dricub-driving-school' ); ?>:</td>
				<td class="help">
                	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'dricub-driving-school' ) ; ?>"></span>
                </td>
				<td><?php 
				if($environment['php_max_execution_time']<300){
					echo '<span class="value_need_increase">'.esc_html( $environment['php_max_execution_time'] ).' </span> ';
					echo esc_html__('Minimum value is 300. ','dricub-driving-school');
					$errorshow=$errorshow+1;
				}else{
					echo '<span class="value_success">'.esc_html( $environment['php_max_execution_time'] ).' </span> ';
				}
				if($environment['php_max_execution_time']<600){
					echo esc_html__('600 is recommanded. ','dricub-driving-school');
				}
				if($environment['php_max_execution_time']>=600){
					echo esc_html__('Current time limit is sufficient. ','dricub-driving-school');
				}
				
				?></td>
			</tr>
			<tr>
				<td data-export-label="PHP Max Input Vars"><?php esc_html_e( 'PHP max input vars', 'dricub-driving-school' ); ?>:</td>
				<td class="help">
                	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'dricub-driving-school' ) ; ?>"></span>
                </td>
				<td><?php 
				if( $environment['php_max_input_vars']<1000){
					echo '<span class="value_need_increase">'.esc_html( $environment['php_max_input_vars'] ).' </span> '.esc_html__('Minimum value is 1000. ','dricub-driving-school');
					$errorshow=$errorshow+1;
				}else{
					echo '<span class="value_success">'.esc_html( $environment['php_max_input_vars'] ).' </span> ';
				}
				if( $environment['php_max_input_vars']<2000){
					echo esc_html__( '2000 is recommanded. ', 'dricub-driving-school' );
				}
				if( $environment['php_max_input_vars']<3000){
					echo esc_html__( '3000 or more may be required if you use lot of plugins use or you have large amount of menu item.', 'dricub-driving-school' );
				}
				?></td>
			</tr>
			<tr>
				<td data-export-label="cURL Version"><?php esc_html_e( 'cURL version', 'dricub-driving-school' ); ?>:</td>
				<td class="help">
					<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The version of cURL installed on your server.', 'dricub-driving-school' ) ; ?>"></span>
				</td>
				<td><?php echo esc_html( $environment['curl_version'] ); ?></td>
			</tr>
			<tr>
				<td data-export-label="SUHOSIN Installed"><?php esc_html_e( 'SUHOSIN installed', 'dricub-driving-school' ); ?>:</td>
				<td class="help">
                <span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Suhosin is an advanced protection system for PHP installations. It was designed to protect your servers on the one hand against a number of well known problems in PHP applications and on the other hand against potential unknown vulnerabilities within these applications or the PHP core itself. If enabled on your server, Suhosin may need to be configured to increase its data submission limits.', 'dricub-driving-school' ) ; ?>"></span>
                </td>
				<td><?php  $suhosin_installed=$environment['suhosin_installed'] ? '<span class="dashicons dashicons-yes"></span>' : '&ndash;'; 
				echo sprintf(__('%s','dricub-driving-school'),$suhosin_installed)
				?>
			
			</td>
			</tr>
		<?php endif; ?>

		<?php

		if ( $environment['mysql_version'] ) :
			?>
			<tr>
				<td data-export-label="MySQL Version"><?php esc_html_e( 'MySQL version', 'dricub-driving-school' ); ?>:</td>
				<td class="help">
                <span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The version of MySQL installed on your hosting server.', 'dricub-driving-school' ) ; ?>"></span>
                </td>
				<td>
					<?php
					if ( version_compare( $environment['mysql_version'], '5.6', '<' ) && ! strstr( $environment['mysql_version_string'], 'MariaDB' ) ) {
						/* Translators: %1$s: MySQL version, %2$s: Recommended MySQL version. */
						echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( '%1$s - We recommend a minimum MySQL version of 5.6. See: %2$s', 'dricub-driving-school' ), esc_html( $environment['mysql_version_string'] ), '<a href="https://wordpress.org/about/requirements/" target="_blank">' . esc_html__( 'WordPress requirements', 'dricub-driving-school' ) . '</a>' ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $environment['mysql_version_string'] ) . '</mark>';
					}
					?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<td data-export-label="Max Upload Size"><?php esc_html_e( 'Max upload size', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The largest filesize that can be uploaded to your WordPress installation.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td><?php echo esc_html( size_format( $environment['max_upload_size'] ) ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Default Timezone is UTC"><?php esc_html_e( 'Default timezone is UTC', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'The default timezone for your server.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( 'UTC' !== $environment['default_timezone'] ) {
				
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( 'Default timezone is %s - it should be UTC', 'dricub-driving-school' ), esc_html( $environment['default_timezone'] ) ) . '</mark>';
				} else {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="fsockopen/cURL"><?php esc_html_e( 'fsockopen/cURL', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( $environment['fsockopen_or_curl_enabled'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . esc_html__( 'Your server does not have fsockopen or cURL enabled - PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider.', 'dricub-driving-school' ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="SoapClient"><?php esc_html_e( 'SoapClient', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Some webservices like shipping use SOAP to get information from remote servers, for example, live shipping quotes from FedEx require SOAP to be installed.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td>
				<?php
				if ( $environment['soapclient_enabled'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( 'Your server does not have the %s class enabled - some gateway plugins which use SOAP may not work as expected.', 'dricub-driving-school' ), '<a href="https://php.net/manual/en/class.soapclient.php">SoapClient</a>' ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="DOMDocument"><?php esc_html_e( 'DOMDocument', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'HTML/Multipart emails use DOMDocument to generate inline CSS in templates.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( $environment['domdocument_enabled'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( 'Your server does not have the %s class enabled - HTML/Multipart emails, and also some extensions, will not work without DOMDocument.', 'dricub-driving-school' ), '<a href="https://php.net/manual/en/class.domdocument.php">DOMDocument</a>' ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="GZip"><?php esc_html_e( 'GZip', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            <span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'GZip (gzopen) is used to open the GEOIP database from MaxMind.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( $environment['gzip_enabled'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( 'Your server does not support the %s function - this is required to use the GeoIP database from MaxMind.', 'dricub-driving-school' ), '<a href="https://php.net/manual/en/zlib.installation.php">gzopen</a>' ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Multibyte String"><?php esc_html_e( 'Multibyte string', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'Multibyte String (mbstring) is used to convert character encoding, like for emails or converting characters to lowercase.', 'dricub-driving-school' ) ; ?>"></span>
        	</td>
			<td>
				<?php
				if ( $environment['mbstring_enabled'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( 'Your server does not support the %s functions - this is required for better character encoding. Some fallbacks will be used instead for it.', 'dricub-driving-school' ), '<a href="https://php.net/manual/en/mbstring.installation.php">mbstring</a>' ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Remote Post"><?php esc_html_e( 'Remote post', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'PayPal uses this method of communicating when sending back transaction information.', 'dricub-driving-school' ) ; ?>"></span>
			</td>
			<td>
				<?php
				if ( $environment['remote_post_successful'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( '%s failed. Contact your hosting provider.', 'dricub-driving-school' ), 'wp_remote_post()' ) . ' ' . esc_html( $environment['remote_post_response'] ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td data-export-label="Remote Get"><?php esc_html_e( 'Remote get', 'dricub-driving-school' ); ?>:</td>
			<td class="help">
            	<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr__( 'WooCommerce plugins may use this method of communication when checking for plugin updates.', 'dricub-driving-school' ) ; ?>"></span>
            </td>
			<td>
				<?php
				if ( $environment['remote_get_successful'] ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( '%s failed. Contact your hosting provider.', 'dricub-driving-school' ), 'wp_remote_get()' ) . ' ' . esc_html( $environment['remote_get_response'] ) . '</mark>';
				}
				?>
			</td>
		</tr>
		<?php
		$rows = apply_filters( 'woocommerce_system_status_environment_rows', array() );
		foreach ( $rows as $row ) {
			if ( ! empty( $row['success'] ) ) {
				$css_class = 'yes';
				$icon      = '<span class="dashicons dashicons-yes"></span>';
			} else {
				$css_class = 'error';
				$icon      = '<span class="dashicons dashicons-no-alt"></span>';
			}
			?>
			<tr>
				<td data-export-label="<?php echo esc_attr( $row['name'] ); ?>"><?php echo esc_html( $row['name'] ); ?>:</td>
				<td class="help">
				<span class="dashicons dashicons-editor-help" title="<?php echo  esc_attr(isset( $row['help'] ) ? $row['help'] : '' ) ; ?>"></span>
                </td>
				<td>
					<mark class="<?php echo esc_attr( $css_class ); ?>">
						<?php echo wp_kses_post( $icon ); ?> <?php echo wp_kses_data( ! empty( $row['note'] ) ? $row['note'] : '' ); ?>
					</mark>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<?php

wp_localize_script($system_status->menu_slug_dashboard . '-js', 'envato_theme_systemerrorshow', array('count' => $errorshow,'table_class'=>$system_status->dashboard_slug.'_status_table'));
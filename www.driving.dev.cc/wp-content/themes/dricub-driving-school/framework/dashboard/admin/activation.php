<?php
$license = get_option('envato_theme_license_key');
$status = get_option('envato_theme_license_key_status');
?>
<div id="activetion" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
	<h2><?php esc_attr_e('Theme License Options', 'dricub-driving-school');?></h2>
	<div class="activation_massage">
		<p><?php echo esc_html__('First enter your license key in the below field  and click the button "Save Changes". After saving "Activate License" Button will be visible.','dricub-driving-school') ?></p>
		<p><?php echo esc_html__('Then click "Activate License" button for active theme.','dricub-driving-school') ?>
	</div>
	<form method="post" action="options.php">
		<?php settings_fields('envato_theme_license');?>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" valign="top">
						<?php esc_attr_e('License Key', 'dricub-driving-school');?>
					</th>
					<td>
						<input id="envato_theme_license_key" name="envato_theme_license_key" type="text" class="regular-text" value="<?php echo esc_attr($license) ?>"  required/>
					</td>
				</tr>
				<?php if($license !=''){ ?>

					<tr valign="top">
							<th scope="row" valign="top">
								<?php esc_attr_e('Activate License', 'dricub-driving-school');?>
							</th>
							<td>
								<?php if ($status !== false && $status == 'valid') {?>
									<?php wp_nonce_field('envato_theme_nonce', 'envato_theme_nonce');?>
									<input type="submit" class="button-secondary" name="envato_theme_theme_license_deactivate" value="<?php esc_attr_e('Deactivate License', 'dricub-driving-school');?>"/>
								<?php } else {
									wp_nonce_field('envato_theme_nonce', 'envato_theme_nonce');?>
									<input type="submit" class="button-secondary" name="envato_theme_theme_license_activate" value="<?php esc_attr_e('Activate License', 'dricub-driving-school');?>"/>
								<?php }?>
							</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php submit_button();?>
	</form>
	</div>
</div>


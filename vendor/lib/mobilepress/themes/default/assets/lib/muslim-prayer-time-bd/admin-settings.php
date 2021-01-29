<?php
add_action('admin_menu', 'register_mptb_menu_page');
function register_mptb_menu_page() {
	add_options_page('Muslim Prayer Time BD', __('Prayer Settings', 'mptb'), 'manage_options','muslim-prayer-time-bd/admin-settings.php' , 'mptb_plugin_menu');
	add_action( 'admin_init', 'register_mptb_settings' );
}

function register_mptb_settings() {
	//register our settings
	register_setting( 'mptb-settings-group', 'mptb_option' );
}
function mptb_plugin_menu() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
?>
	<div class="wrap">
		<h1><?php _e('Muslim Prayer Time BD Settings', 'mptb'); ?></h1>
		<hr>
		<div class="postbox-container prayer-time-settings">
			<form method="post" action="options.php"><?php
				settings_fields( 'mptb-settings-group' );
				$city_states = district_lists(); ?>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Select the Default District', 'mptb'); ?></label>
					<select name="default_city" id="default_city">
						<option value="" selected="selected"><?php
							if(isset($_POST['default_city'])) {
								echo $_POST['default_city'];
							} else { echo 'ঢাকা'; } ?>
						</option><?php
						foreach($city_states as $city) { ?>
							<option value="<?php echo $city; ?>" <?php if(get_option('default_city') == $city) {echo "selected=selected";} ?>><?php echo $city; ?></option><?php
						} ?>
					</select>
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('District List Box Color', 'mptb'); ?></label>
					<input type="text" name="district_bg_color" class="district_bg_color" id="district_bg_color" value="<?php echo get_option('dist_bg'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('District List Font Color', 'mptb'); ?></label>
					<input type="text" name="district_font_color" class="district_font_color" id="district_bg_color" value="<?php echo get_option('dist_font'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Name Background Color', 'mptb'); ?></label>
					<input type="text" name="prayer_name_bg" class="prayer_name_bg" id="prayer_name_bg" value="<?php echo get_option('mptbg_one'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Name Font Color', 'mptb'); ?></label>
					<input type="text" name="prayer_name_font" class="prayer_name_font" id="prayer_name_font" value="<?php echo get_option('prayer_name'); ?>" />
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Name Font Weight', 'mptb'); ?></label>
					<select name="prayer_name_weight" id="prayer_name_weight">
						<?php if(get_option('pname_weight') == 'bold') { ?>
						<option value="normal"><?php _e('Normal', 'mptb'); ?></option>
						<option value="bold" selected="selected"><?php _e('Bold', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="normal" selected="selected"><?php _e('Normal', 'mptb'); ?></option>
						<option value="bold"><?php _e('Bold', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Name Text Align', 'mptb'); ?></label>
					<select name="prayer_name_align" id="prayer_name_align">
						<?php if(get_option('pname_align') == 'left') { ?>
						<option value="left" selected="selected"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } elseif(get_option('pname_align') == 'right') { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right" selected="selected"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center" selected="selected"><?php _e('Center', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Time Background Color', 'mptb'); ?></label>
					<input type="text" name="prayer_time_bg" class="prayer_time_bg" id="prayer_time_bg" value="<?php echo get_option('mptbg_two'); ?>" />
				</div>
				<div class="prayer-color">
					<label class="input-title"><?php _e('Prayer Time Font Color', 'mptb'); ?></label>
					<input type="text" name="prayer_time_font" class="prayer_time_font" id="prayer_time_font" value="<?php echo get_option('prayer_time'); ?>" />
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Time Font Weight', 'mptb'); ?></label>
					<select name="prayer_time_weight" id="prayer_time_weight">
						<?php if(get_option('ptime_weight') == 'bold') { ?>
						<option value="normal"><?php _e('Normal', 'mptb'); ?></option>
						<option value="bold" selected="selected"><?php _e('Bold', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="normal" selected="selected"><?php _e('Normal', 'mptb'); ?></option>
						<option value="bold"><?php _e('Bold', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-title"><?php _e('Prayer Time Text Align', 'mptb'); ?></label>
					<select name="prayer_time_align" id="prayer_time_align">
						<?php if(get_option('ptime_align') == 'left') { ?>
						<option value="left" selected="selected"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } elseif(get_option('ptime_align') == 'right') { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right" selected="selected"><?php _e('Right', 'mptb'); ?></option>
						<option value="center"><?php _e('Center', 'mptb'); ?></option>
						<?php } else { ?>
						<option value="left"><?php _e('Left', 'mptb'); ?></option>
						<option value="right"><?php _e('Right', 'mptb'); ?></option>
						<option value="center" selected="selected"><?php _e('Center', 'mptb'); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="prayer-options">
					<label class="input-check" id="enable-sehri"><?php _e('Enable to Show Sehri Last Time', 'mptb'); ?></label>
					<label for="enable-sehri" class="enable_sehri">
						<span><?php _e('Sehri', 'mptb'); ?></span>
						<input type="checkbox" name="mptb_option" class="tickbox" id="mptb_option" value="Enabled" <?php if(get_option('mptb_option')=="Enabled") echo('checked="checked"'); ?>/>
					</label>
				</div>
				<div id="sehri_enable">
					<div class="prayer-color">
						<label class="input-title"><?php _e('Sehri Time Background Color', 'mptb'); ?></label>
						<input type="text" name="sehri_time_bg" class="sehri_time_bg" id="sehri_time_bg" value="<?php echo get_option('sehri_bg'); ?>" />
					</div>
					<div class="prayer-color">
						<label class="input-title"><?php _e('Sehri Time Font Color', 'mptb'); ?></label>
						<input type="text" name="sehri_time_font" class="sehri_time_font" id="sehri_time_font" value="<?php echo get_option('sehri_font'); ?>" />
					</div>
					<div class="prayer-options">
						<label class="input-title"><?php _e('Sehri Time Font Weight', 'mptb'); ?></label>
						<select name="sehri_time_weight" id="sehri_time_weight">
							<?php if(get_option('sehri_weight') == 'bold') { ?>
							<option value="normal"><?php _e('Normal', 'mptb'); ?></option>
							<option value="bold" selected="selected"><?php _e('Bold', 'mptb'); ?></option>
							<?php } else { ?>
							<option value="normal" selected="selected"><?php _e('Normal', 'mptb'); ?></option>
							<option value="bold"><?php _e('Bold', 'mptb'); ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="prayer-options">
						<label class="input-title"><?php _e('Sehri Time Text Align', 'mptb'); ?></label>
						<select name="sehri_time_align" id="sehri_time_align">
							<?php if(get_option('sehri_align') == 'left') { ?>
							<option value="left" selected="selected"><?php _e('Left', 'mptb'); ?></option>
							<option value="right"><?php _e('Right', 'mptb'); ?></option>
							<option value="center"><?php _e('Center', 'mptb'); ?></option>
							<?php } elseif(get_option('sehri_align') == 'right') { ?>
							<option value="left"><?php _e('Left', 'mptb'); ?></option>
							<option value="right" selected="selected"><?php _e('Right', 'mptb'); ?></option>
							<option value="center"><?php _e('Center', 'mptb'); ?></option>
							<?php } else { ?>
							<option value="left"><?php _e('Left', 'mptb'); ?></option>
							<option value="right"><?php _e('Right', 'mptb'); ?></option>
							<option value="center" selected="selected"><?php _e('Center', 'mptb'); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php submit_button(); ?>
			</form>
		</div>
		<div class="postbox-container" style="width:30%; display: none;">
			<div class="card">
				<h2 class="title"><?php _e('Plugin Info', 'mptb'); ?></h2>
				<p>
					<?php _e('Price: Free', 'mptb'); ?>!<br/>
					<?php _e('Version: 2.0', 'mptb'); ?><br/>
					<?php _e('Scripts: PHP + CSS + JS', 'mptb'); ?><br/>
					<?php _e('Requires: Wordpress 3.0', 'mptb'); ?>+<br/>
					<?php _e('First release: 23 January, 2014', 'mptb'); ?><br/>
					<?php _e('Last update: 8 June, 2016', 'mptb'); ?><br/>
					<?php _e('Developer', 'mptb'); ?>: <a href="http://facebook.com/IKIAlam" target="_blank"><?php _e('Iftekhar', 'mptb'); ?></a><br/>
					<?php _e('Website', 'mptb'); ?>: <a href="http://www.realwebcare.com/" target="_blank"><?php _e('Real Web Care', 'mptb'); ?></a><br/>
					<?php _e('Published under', 'mptb'); ?>: <a href="http://www.gnu.org/licenses/gpl.txt"><?php _e('GNU General Public License', 'mptb'); ?></a><br/>
					<a href="http://wordpress.org/plugins/muslim-prayer-time-bd/faq/"><?php _e('FAQ', 'mptb'); ?></a> | <a href="http://wordpress.org/plugins/muslim-prayer-time-bd/changelog/"><?php _e('Changelog', 'mptb'); ?></a>
				</p>
			</div>
		</div>
	</div>
	<?php
}
$prayer_time_colors = array( 'dist_bg' => 'district_bg_color', 'dist_font' => 'district_font_color', 'sehri_weight' => 'sehri_time_weight', 'sehri_align' => 'sehri_time_align', 'sehri_bg' => 'sehri_time_bg', 'sehri_font' => 'sehri_time_font', 'default_city' => 'default_city', 'mptbg_one' => 'prayer_name_bg', 'mptbg_two' => 'prayer_time_bg', 'prayer_name' => 'prayer_name_font', 'prayer_time' => 'prayer_time_font', 'pname_weight' => 'prayer_name_weight', 'ptime_weight' => 'prayer_time_weight', 'pname_align' => 'prayer_name_align', 'ptime_align' => 'prayer_time_align' );
foreach($prayer_time_colors as $key => $color) {
	if( isset( $_POST[$color] ) ) {
		update_option( $key, sanitize_text_field( $_POST[$color] ) );
	}
}
?>
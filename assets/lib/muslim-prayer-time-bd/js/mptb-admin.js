jQuery(document).ready(function() {
	jQuery("#mptb_option").click(function() {
		if(jQuery("#mptb_option").is(":checked")){
			jQuery("#sehri_enable").slideDown("slow");
		} else {
			jQuery("#sehri_enable").slideUp("slow");
		}
	});
	if(jQuery("#mptb_option").is(":checked")){
		jQuery("#sehri_enable").css("display","block");
	} else {
		jQuery("#sehri_enable").slideUp("slow");
	}
	jQuery('.district_bg_color').wpColorPicker();
	jQuery('.district_font_color').wpColorPicker();
	jQuery('.prayer_name_bg').wpColorPicker();
	jQuery('.prayer_time_bg').wpColorPicker();
	jQuery('.sehri_time_bg').wpColorPicker();
	jQuery('.sehri_time_font').wpColorPicker();
	jQuery('.prayer_name_font').wpColorPicker();
	jQuery('.prayer_time_font').wpColorPicker();
});
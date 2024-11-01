jQuery(document).ready(function() {
	EWD_ABCO_Send_GA_User_Group();
	setTimeout(EWD_ABCO_Update_End_Times(), 2000);
});

function EWD_ABCO_Send_GA_User_Group() {
	if (ewd_abco_php_data.ga_custom_metric_enabled == "Yes" && ewd_abco_php_data.ga_custom_metric_number != "") {
		ga('set', 'metric'+ewd_abco_php_data.ga_custom_metric_number, ewd_abco_php_data.user_group);
		ga('send', 'pageview');
	}
	if (ewd_abco_php_data.ga_custom_dimension_enabled == "Yes" && ewd_abco_php_data.ga_custom_dimension_number != "") {
		ga('set', 'dimension'+ewd_abco_php_data.ga_custom_dimension_number, ewd_abco_php_data.user_group);
		ga('send', 'pageview');
	}
}

function EWD_ABCO_Update_End_Times() {
	if (typeof Event_ID !== 'undefined' && Event_ID !== null && Event_ID !== "" && Event_ID !== 0) {
		var data = 'Event_ID=' + Event_ID + '&action=abco_ajax_endtime';
		jQuery.post(ajaxurl, data, function(response) {});
	}

	setTimeout(EWD_ABCO_Update_End_Times, 5000);
}
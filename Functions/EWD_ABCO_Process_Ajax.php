<?php
function EWD_ABCO_Process_Ajax() {
	global $wpdb;
	global $EWD_ABCO_visits_table_name, $EWD_ABCO_events_table_name;

	$Event_ID = $_POST['Event_ID'];
	$Visit_ID = $wpdb->get_var($wpdb->prepare("SELECT Visit_ID FROM $EWD_ABCO_events_table_name WHERE Event_ID=%d", $Event_ID));
	$Current_Datetime = date("Y-m-d H:i:s");

	$wpdb->query("UPDATE $EWD_ABCO_events_table_name SET Event_End_Datetime='" . $Current_Datetime . "' WHERE Event_ID='" . $Event_ID . "'");
	$wpdb->query("UPDATE $EWD_ABCO_visits_table_name SET Visit_End_Datetime='" . $Current_Datetime . "' WHERE Visit_ID='" . $Visit_ID . "'");
}
add_action('wp_ajax_abco_ajax_endtime', 'EWD_ABCO_Process_Ajax');
add_action('wp_ajax_nopriv_abco_ajax_endtime', 'EWD_ABCO_Process_Ajax');

?>
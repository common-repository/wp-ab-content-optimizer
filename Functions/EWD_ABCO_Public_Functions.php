<?php

function EWD_ABCO_Get_Visits($args = array()) {
	global $wpdb;
	global $EWD_ABCO_visits_table_name;

	extract( shortcode_atts( array(
		'user_group_id' => 0,
		'user_cookie' => '',
		'pages_viewed' => 0,
		'min_start_datetime' => "",
		'max_start_datetime' => "",
		'min_end_datetime' => "",
		'max_end_datetime' => "",
	), $args));

	$Where_Conditions = "1=1";
	if ($user_group_id != 0) {
		$Where_Conditions .= " AND User_Group_ID=%d";
		$Values[] = $user_group_id;
	}
	if ($user_cookie != "") {
		$Where_Conditions .= " AND User_Cookie=%s";
		$Values[] = $user_cookie;
	}
	if ($pages_viewed != "") {
		$Where_Conditions .= " AND Pages_Viewed=%d";
		$Values[] = $pages_viewed;
	}
	if ($min_start_datetime != "") {
		$Where_Conditions .= " AND Visit_Start_Datetime>%s";
		$Values[] = $min_start_datetime;
	}
	if ($max_start_datetime != "") {
		$Where_Conditions .= " AND Visit_Start_Datetime<%s";
		$Values[] = $max_start_datetime;
	}
	if ($min_end_datetime != "") {
		$Where_Conditions .= " AND Visit_End_Datetime>%s";
		$Values[] = $min_end_datetime;
	}
	if ($max_end_datetime != "") {
		$Where_Conditions .= " AND Visit_End_Datetime<%s";
		$Values[] = $max_end_datetime;
	}

	return $wpdb->get_results($wpdb->prepare("SELECT * FROM $EWD_ABCO_visits_table_name WHERE " . $Where_Conditions, $Values));
}

function EWD_ABCO_Get_Events($args = array()) {
	global $wpdb;
	global $EWD_ABCO_events_table_name;

	extract( shortcode_atts( array(
		'visit_id' => 0,
		'user_group_id' => 0,
		'event_type' => '',
		'event_target' => '',
		'event_target_id' => 0,
		'min_start_datetime' => "",
		'max_start_datetime' => "",
		'min_end_datetime' => "",
		'max_end_datetime' => "",
	), $args));

	$Where_Conditions = "1=1";
	if ($visit_id != 0) {
		$Where_Conditions .= " AND Visit_ID=%d";
		$Values[] = $visit_id;
	}
	if ($user_group_id != 0) {
		$Where_Conditions .= " AND User_Group_ID=%d";
		$Values[] = $user_group_id;
	}
	if ($event_type != "") {
		$Where_Conditions .= " AND Event_Type=%s";
		$Values[] = $event_type;
	}
	if ($event_target != "") {
		$Where_Conditions .= " AND Event_Target=%s";
		$Values[] = $event_target;
	}
	if ($event_target_id != 0) {
		$Where_Conditions .= " AND Event_Target_ID=%d";
		$Values[] = $event_target_id;
	}
	if ($min_start_datetime != "") {
		$Where_Conditions .= " AND Event_Start_Datetime>%s";
		$Values[] = $min_start_datetime;
	}
	if ($max_start_datetime != "") {
		$Where_Conditions .= " AND Event_Start_Datetime<%s";
		$Values[] = $max_start_datetime;
	}
	if ($min_end_datetime != "") {
		$Where_Conditions .= " AND Event_End_Datetime>%s";
		$Values[] = $min_end_datetime;
	}
	if ($max_end_datetime != "") {
		$Where_Conditions .= " AND Event_End_Datetime<%s";
		$Values[] = $max_end_datetime;
	}

	return $wpdb->get_results($wpdb->prepare("SELECT * FROM $EWD_ABCO_events_table_name WHERE " . $Where_Conditions, $Values));
}

?>
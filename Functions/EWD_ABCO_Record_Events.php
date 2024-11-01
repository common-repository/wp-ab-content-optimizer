<?php
add_action('wp_head', 'EWD_ABCO_Record_Events');
function EWD_ABCO_Record_Events() {
	global $EWD_ABCO_User_Group;
	global $wpdb;
	global $EWD_ABCO_visits_table_name, $EWD_ABCO_events_table_name;

	$Enable_Tracking = get_option("EWD_ABCO_Enable_Tracking");

	if ($Enable_Tracking != "Yes" or $EWD_ABCO_User_Group == 0) {return;}

	$User_Cookie = $_COOKIE['EWD_ABCO_User_ID'];

	$Current_Datetime = date("Y-m-d H:i:s");

	$Page_URL = get_permalink();

	if (!isset($_COOKIE['EWD_ABCO_Visit_ID'])) {
		$Columns_String = "User_Group_ID,User_Cookie,Pages_Viewed,Visit_Start_Datetime,Visit_End_Datetime";
		$Values_String = "%d,%s,%d,%s,%s";
		$Values_String_Values[] = $EWD_ABCO_User_Group;
		$Values_String_Values[] = $User_Cookie;
		$Values_String_Values[] = 1;
		$Values_String_Values[] = $Current_Datetime;
		$Values_String_Values[] = $Current_Datetime;
		if ($Page_URL != "" ) {$wpdb->query($wpdb->prepare("INSERT INTO $EWD_ABCO_visits_table_name (" . $Columns_String . ") VALUES (" . $Values_String . ")", $Values_String_Values));}
		$Visit_ID = $wpdb->insert_id;

		if ($Visit_ID == 0) {return;}

		setcookie('EWD_ABCO_Visit_ID', $Visit_ID, time()+1200, '/');
		$_COOKIE['EWD_ABCO_Visit_ID'] = $Visit_ID;
	}
	else {
		$Visit_ID = $_COOKIE['EWD_ABCO_Visit_ID'];
		if (!is_numeric($Visit_ID)) {return;}

		if ($Page_URL != "" ) {$wpdb->query($wpdb->prepare("UPDATE $EWD_ABCO_visits_table_name SET Pages_Viewed = Pages_Viewed + 1 WHERE Visit_ID=%d", $Visit_ID));}

		setcookie('EWD_ABCO_Visit_ID', $Visit_ID, time()+1200, '/');
		$_COOKIE['EWD_ABCO_Visit_ID'] = $Visit_ID;
	}

	$Columns_String = "Visit_ID,User_Group_ID,Event_Type,Event_Target,Event_Target_ID,Event_Start_Datetime,Event_End_Datetime";
	$Values_String = "%d,%d,%s,%s,%d,%s,%s";
	$Values_String_Values[] = $Visit_ID;
	$Values_String_Values[] = $EWD_ABCO_User_Group;
	$Values_String_Values[] = "Page Load";
	$Values_String_Values[] = $Page_URL;
	$Values_String_Values[] = get_the_ID();
	$Values_String_Values[] = $Current_Datetime;
	$Values_String_Values[] = $Current_Datetime;
	
	if ($Page_URL != "" ) {$wpdb->query($wpdb->prepare("INSERT INTO $EWD_ABCO_events_table_name (" . $Columns_String . ") VALUES (" . $Values_String . ")", $Values_String_Values));}
	
	$Event_ID = $wpdb->insert_id;

	echo "<script>";
	echo "Event_ID = " . $Event_ID . ";";
	echo "</script>";
}


$Enable_WooCommerce_Sale_Tracking = get_option("EWD_ABCO_Enable_WooCommerce_Sale_Tracking");
if ($Enable_WooCommerce_Sale_Tracking == "Yes") {
	add_action('woocommerce_checkout_order_processed', 'EWD_ABCO_Track_WooCommerce_Order');
}

function EWD_ABCO_Track_WooCommerce_Order($post_id) {
	global $EWD_ABCO_User_Group;
	global $wpdb;
	global $EWD_ABCO_events_table_name;

	$Current_Datetime = date("Y-m-d H:i:s");

	$Columns_String = "Visit_ID,User_Group_ID,Event_Type,Event_Target,Event_Target_ID,Event_Start_Datetime,Event_End_Datetime";
	$Values_String = "%d,%d,%s,%s,%d,%s,%s";
	$Values_String_Values[] = $Visit_ID;
	$Values_String_Values[] = $EWD_ABCO_User_Group;
	$Values_String_Values[] = "WooCommerce Sale";
	$Values_String_Values[] = get_permalink($post_id);
	$Values_String_Values[] = $post_id;
	$Values_String_Values[] = $Current_Datetime;
	$Values_String_Values[] = $Current_Datetime;
	
	if ($post_id != 0) {$wpdb->query($wpdb->prepare("INSERT INTO $EWD_ABCO_events_table_name (" . $Columns_String . ") VALUES (" . $Values_String . ")", $Values_String_Values));}
}

add_action('ewd_abco_add_event', 'EWD_ABCO_Track_Event', 10, 4);
function EWD_ABCO_Track_Event($Event_Type, $Event_User_Group = 0, $Event_Target_URL = "", $Event_Target_ID = 0) {
	global $EWD_ABCO_User_Group;
	global $wpdb;
	global $EWD_ABCO_events_table_name;

	$Visit_ID = $_COOKIE['EWD_ABCO_Visit_ID'];
	if (!is_numeric($Visit_ID)) {return;}

	if ($Event_User_Group == 0) {$Insert_User_Group = $EWD_ABCO_User_Group;}
	else {$Insert_User_Group = $Event_User_Group;}

	if ($Event_Target_URL == ""  and $Event_Target_ID != 0) {$Event_Target_URL = get_permalink($Event_Target_ID);}
	if ($Event_Target_URL != ""  and $Event_Target_ID == 0) {$Event_Target_ID = url_to_postid($Event_Target_URL);}

	$Current_Datetime = date("Y-m-d H:i:s");

	$Columns_String = "Visit_ID,User_Group_ID,Event_Type,Event_Target,Event_Target_ID,Event_Start_Datetime,Event_End_Datetime";
	$Values_String = "%d,%d,%s,%s,%d,%s,%s";
	$Values_String_Values[] = $Visit_ID;
	$Values_String_Values[] = $Insert_User_Group;
	$Values_String_Values[] = $Event_Type;
	$Values_String_Values[] = $Event_Target_URL;
	$Values_String_Values[] = $Event_Target_ID;
	$Values_String_Values[] = $Current_Datetime;
	$Values_String_Values[] = $Current_Datetime;
	
	$wpdb->query($wpdb->prepare("INSERT INTO $EWD_ABCO_events_table_name (" . $Columns_String . ") VALUES (" . $Values_String . ")", $Values_String_Values));
}
?>
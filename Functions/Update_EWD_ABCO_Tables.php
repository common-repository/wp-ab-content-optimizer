<?php 
function Update_EWD_ABCO_Tables() {
	/* Add in the required globals to be able to create the tables */
  	global $wpdb;
	global $EWD_ABCO_visits_table_name, $EWD_ABCO_events_table_name;
		
	/* Create the Visits data table */  
   	$sql = "CREATE TABLE $EWD_ABCO_visits_table_name (
  		Visit_ID mediumint(9) NOT NULL AUTO_INCREMENT,
		User_Group_ID mediumint(9) DEFAULT 0 NOT NULL,
		User_Cookie text DEFAULT '' NOT NULL,
		Pages_Viewed text DEFAULT '' NOT NULL,
		Visit_Start_Datetime datetime DEFAULT '0000-00-00 00:00:00' NULL,
		Visit_End_Datetime datetime DEFAULT '0000-00-00 00:00:00' NULL,
  		UNIQUE KEY id (Visit_ID)
    	)
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
	/* Create the Events data table */  
   	$sql = "CREATE TABLE $EWD_ABCO_events_table_name (
  		Event_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  		Visit_ID mediumint(9) DEFAULT 0 NOT NULL,
  		User_Group_ID mediumint(9) DEFAULT 0 NOT NULL,
		Event_Type text DEFAULT '' NOT NULL,
		Event_Target text DEFAULT '' NOT NULL,
		Event_Target_ID mediumint(9) DEFAULT 0 NOT NULL,
		Event_Start_Datetime datetime DEFAULT '0000-00-00 00:00:00' NULL,
		Event_End_Datetime datetime DEFAULT '0000-00-00 00:00:00' NULL,
  		UNIQUE KEY id (Event_ID)
    	)
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
}
?>
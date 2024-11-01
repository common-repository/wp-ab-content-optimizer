<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function Update_EWD_ABCO_Options() {
	/* Add in the required globals to be able to create the tables */
   global $EWD_ABCO_db_version;
		
	update_option("EWD_ABCO_DB_version", $EWD_ABCO_db_version);
 
   	if (get_option("EWD_ABCO_Enable_Testing") == "") {update_option("EWD_ABCO_Enable_Testing", "No");}
      if (get_option("EWD_ABCO_Enable_Tracking") == "") {update_option("EWD_ABCO_Enable_Tracking", "No");}
      if (get_option("EWD_ABCO_Show_Page_Statistics") == "") {update_option("EWD_ABCO_Show_Page_Statistics", "Yes");}
      if (get_option("EWD_ABCO_Enable_WooCommerce_Sale_Tracking") == "") {update_option("EWD_ABCO_Enable_WooCommerce_Sale_Tracking", "Yes");}
   	if (get_option("EWD_ABCO_Add_URL_Parameter") == "") {update_option("EWD_ABCO_Add_URL_Parameter", "Yes");}
   	if (get_option("EWD_ABCO_Add_GA_Tracking_Code") == "") {update_option("EWD_ABCO_Add_GA_Tracking_Code", "No");}
   	if (get_option("EWD_ABCO_GA_Custom_Metric_Enabled") == "") {update_option("EWD_ABCO_GA_Custom_Metric_Enabled", "No");}
   	if (get_option("EWD_ABCO_GA_Custom_Dimension_Enabled") == "") {update_option("EWD_ABCO_GA_Custom_Dimension_Enabled", "No");}
   	if (get_option("EWD_ABCO_Next_Test_ID") == "") {update_option("EWD_ABCO_Next_Test_ID", 1);}
   	if (get_option("EWD_ABCO_Full_Version") == "") {update_option("EWD_ABCO_Full_Version", "Yes");}
}
?>

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_ABCO_Update_Options() {
	global $EWD_ABCO_Full_Version;

	check_admin_referer('update_options');

	//use $_POST['Options_Submit'] for write in fields
	if (isset($_POST['enable_testing'])) {update_option("EWD_ABCO_Enable_Testing", $_POST['enable_testing']);}
	if (isset($_POST['enable_tracking'])) {update_option("EWD_ABCO_Enable_Tracking", $_POST['enable_tracking']);}
	if (isset($_POST['show_page_statistics'])) {update_option("EWD_ABCO_Show_Page_Statistics", $_POST['show_page_statistics']);}
	if (isset($_POST['enable_woocommerce_sale_tracking'])) {update_option("EWD_ABCO_Enable_WooCommerce_Sale_Tracking", $_POST['enable_woocommerce_sale_tracking']);}
	if (isset($_POST['add_url_parameter'])) {update_option("EWD_ABCO_Add_URL_Parameter", $_POST['add_url_parameter']);}

	if (isset($_POST['add_ga_tracking_code'])) {update_option("EWD_ABCO_Add_GA_Tracking_Code", $_POST['add_ga_tracking_code']);}
	if (isset($_POST['Options_Submit'])) {update_option("EWD_ABCO_GA_Tracking_Code", $_POST['ga_tracking_code']);}
	if (isset($_POST['ga_custom_metric_enabled'])) {update_option("EWD_ABCO_GA_Custom_Metric_Enabled", $_POST['ga_custom_metric_enabled']);}
	if (isset($_POST['Options_Submit'])) {update_option("EWD_ABCO_GA_Custom_Metric_Number", $_POST['ga_custom_metric_number']);}
	if (isset($_POST['ga_custom_dimension_enabled'])) {update_option("EWD_ABCO_GA_Custom_Dimension_Enabled", $_POST['ga_custom_dimension_enabled']);}
	if (isset($_POST['Options_Submit'])) {update_option("EWD_ABCO_GA_Custom_Dimension_Number", $_POST['ga_custom_dimension_number']);}

	$update_message = __("Options have been succesfully updated.", 'EWD_ABCO');
	$update['Message'] = $update_message;
	$update['Message_Type'] = "Update";
	return $update;
}

function EWD_ABCO_Update_Tests() {
	check_admin_referer('update_tests');
	
	$Next_Test_ID = get_option("EWD_ABCO_Next_Test_ID");
	$Active_Test_IDs = get_option("EWD_ABCO_Active_Test_IDs");
	if (!is_array($Active_Test_IDs)) {$Active_Test_IDs = array();}

	$Active_Test_IDs[] = $Next_Test_ID;

	foreach ($Active_Test_IDs  as $Test_ID) {
		if (isset($_POST[$Test_ID . "_test_status"]) and $_POST[$Test_ID . "_test_status"] != "Delete") {
			$Test['ID'] = $Test_ID;
			$Test['Test_Name'] = $_POST[$Test_ID . "_test_name"];
			$Test['Test_Status'] = $_POST[$Test_ID . "_test_status"];
			$Test['Test_Visitors_Percentage'] = $_POST[$Test_ID . "_test_visitors_percentage"];
			$Test['Test_Theme'] = $_POST[$Test_ID . "_test_theme"];
			$Test['Custom_CSS'] = $_POST[$Test_ID . "_test_custom_css"];

			$New_Active_Test_IDs[] = $Test_ID;
			$Next_Test_ID = max($Next_Test_ID, $Test_ID+1);
			$Tests[] = $Test;

			unset($Test);
		}
	}

	update_option("EWD_ABCO_Next_Test_ID", $Next_Test_ID);
	update_option("EWD_ABCO_Active_Test_IDs", $New_Active_Test_IDs);
	update_option("EWD_ABCO_Tests", $Tests);

	$update_message = __("Tests have been succesfully updated.", 'EWD_ABCO');
	$update['Message'] = $update_message;
	$update['Message_Type'] = "Update";
	return $update;
}
?>
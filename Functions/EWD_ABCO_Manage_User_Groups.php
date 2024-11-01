<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('plugins_loaded', 'EWD_ABCO_Assign_User_To_Group');
function EWD_ABCO_Assign_User_To_Group() {
	global $EWD_ABCO_User_Group;

	$Enable_Testing = get_option("EWD_ABCO_Enable_Testing");
	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	if ($Enable_Testing != "Yes") {
		$EWD_ABCO_User_Group = 0;
		return;
	}

	if (isset($_COOKIE['EWD_ABCO_User_Group'])) {$EWD_ABCO_User_Group = $_COOKIE['EWD_ABCO_User_Group'];}
	else {$EWD_ABCO_User_Group = null;}

	foreach ($Tests as $Test) { 
		if ($Test['ID'] == $EWD_ABCO_User_Group and $Test['Test_Status'] == "Active") {$Keep_In_Group = "Yes";}
	}

	if ($Keep_In_Group != "Yes") {$EWD_ABCO_User_Group = null;}

	if (!$EWD_ABCO_User_Group) {
		foreach ($Tests as $Test) {
			if ($Test['Test_Status'] == "Active") {$Weights[$Test['ID']] = $Test['Test_Visitors_Percentage'];}
		}

		if (is_array($Weights)) {
			$EWD_ABCO_User_Group = EWD_ABCO_Get_Group_ID($Weights);
			setcookie('EWD_ABCO_User_Group', $EWD_ABCO_User_Group, time()+3600*24*90, '/');
			$_COOKIE['EWD_ABCO_User_Group'] = $EWD_ABCO_User_Group;
		}
	}

	if (!isset($_COOKIE['EWD_ABCO_User_ID'])) {
		$EWD_ABCO_Random_ID = EWD_ABCO_Create_Random_ID();
	}
	else {
		$EWD_ABCO_Random_ID = $_COOKIE['EWD_ABCO_User_ID'];
	}
	setcookie('EWD_ABCO_User_ID', $EWD_ABCO_Random_ID, time()+3600*24*90, '/');
	$_COOKIE['EWD_ABCO_User_ID'] = $EWD_ABCO_Random_ID;
}

add_action('plugins_loaded', 'EWD_ABCO_Set_Theme_For_User');
function EWD_ABCO_Set_Theme_For_User() {
	add_filter('template', 'EWD_ABCO_Change_Theme');
    add_filter('option_template', 'EWD_ABCO_Change_Theme');
    add_filter('option_stylesheet', 'EWD_ABCO_Change_Theme');
}

function EWD_ABCO_Change_Theme($theme) {
    global $EWD_ABCO_User_Group;

    $Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	if ($EWD_ABCO_User_Group != 0) {
    	foreach ($Tests as $Test) {
    		if ($Test['Test_Status'] == "Active") {
    			if ($Test['ID'] == $EWD_ABCO_User_Group) {
    				$theme = $Test['Test_Theme'];
    			}
    		}
    	}
    }
    
    return $theme;
}

function EWD_ABCO_Get_Group_ID($Weights) {
	$Rand = mt_rand(1, (int) array_sum($Weights));
	
    foreach ($Weights as $Key => $Value) {
    	$Rand -= $Value;
    	if ($Rand <= 0) {
    		return $Key;
    	}
    }
}

function EWD_ABCO_Switch_Groups() {
	global $EWD_ABCO_User_Group;

	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	if (!current_user_can('read')) {return;}

	$New_ID = $_GET['Group_ID'];

	foreach ($Tests as $Test) {
		if ($Test['ID'] == $New_ID and $Test['Test_Status'] == "Active") {
			setcookie('EWD_ABCO_User_Group', $New_ID, time()+3600*24*30, '/');
			$_COOKIE['EWD_ABCO_User_Group'] = $New_ID;
			$EWD_ABCO_User_Group = $New_ID;

			return array('Message_Type' => "Update", "Message" => "User group has been changed.");
		}
	}
}

function EWD_ABCO_Create_Random_ID($Length = 20) {
	$Letters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$Resetcode = '';
	for ($i = 0; $i < $Length; $i++) {
		$Resetcode .= $Letters[rand(0, strlen($Letters) - 1)];
	}

	return $Resetcode;
}

?>
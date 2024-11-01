<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* This file is the action handler. The appropriate function is then called based 
*  on the action that's been selected by the user. The functions themselves are all
* stored either in Prepare_Data_For_Insertion.php or Update_Admin_Databases.php */
		
function Update_EWD_ABCO_Content() {
global $ewd_abco_message;
if (isset($_GET['Action'])) {
		switch ($_GET['Action']) {
			case "EWD_ABCO_SwitchGroups":
				$ewd_abco_message = EWD_ABCO_Switch_Groups();
				break;
			case "EWD_ABCO_UpdateTests":
       			$ewd_abco_message = EWD_ABCO_Update_Tests();
				break;
			case "EWD_ABCO_UpdateOptions":
       			$ewd_abco_message = EWD_ABCO_Update_Options();
				break;
			default:
				$ewd_abco_message = __("The form has not worked correctly. Please contact the plugin developer.", 'EWD_ABCO');
				break;
		}
	}
}

?>
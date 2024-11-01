<?php
function EWD_ABCO_Add_URL_Parameters() {
	global $EWD_ABCO_User_Group;

	$Add_URL_Parameter = get_option("EWD_ABCO_Add_URL_Parameter");

	if (!is_admin() and !isset($_GET['utm_abtesting']) and $EWD_ABCO_User_Group != 0 and $Add_URL_Parameter == "Yes" and !isset($_GET['Action']) and $_GET['Action'] != "EWD_ABCO_Switch_Groups"){
		$location = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		$location .= "?utm_abtesting=" . $EWD_ABCO_User_Group;
		wp_redirect($location);
	}
}
add_action('template_redirect', 'EWD_ABCO_Add_URL_Parameters');

?>
<?php
add_action('wp_head', 'EWD_ABCO_Add_Custom_CSS');
function EWD_ABCO_Add_Custom_CSS() {
	global $EWD_ABCO_User_Group;

	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	foreach ($Tests as $Test) {
		if ($Test['ID'] == $EWD_ABCO_User_Group) {
			echo "<style>" . $Test['Custom_CSS'] . "</style>";
		}
	}
}
?>
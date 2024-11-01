<?php
function EWD_ABCO_Filter_Testing_Block($atts, $content = null) {
	global $EWD_ABCO_User_Group;

	$Enable_Testing = get_option("EWD_ABCO_Enable_Testing");
	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	if ($Enable_Testing != "Yes") {return $content;}

	extract( shortcode_atts( array(
				'id' => '0',
				'test_name' => ''),
				$atts
			)
		);

	if ($test_name != "") {
		foreach ($Tests as $Test) {
			if ($Test['Test_Name'] == $test_name) {$id = $Test['ID'];}
		}
	}

	foreach ($Tests as $Test) {
		if ($Test['ID'] == $id) {
			if ($EWD_ABCO_User_Group != $id or $Test['Test_Status'] != "Active") {$content = "";}
		}
	}

	return $content;
}
add_shortcode("ab-testing", "EWD_ABCO_Filter_Testing_Block");
?>
<?php
add_action('wp_head', 'EWD_ABCO_Include_Google_Analytics');
function EWD_ABCO_Include_Google_Analytics() {
	$Add_GA_Tracking_Code = get_option("EWD_ABCO_Add_GA_Tracking_Code");
	$GA_Tracking_Code = get_option("EWD_ABCO_GA_Tracking_Code");

	if ($Add_GA_Tracking_Code == "Yes") {

		$ReturnString = "<script>\n";
		$ReturnString .= "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n";
		$ReturnString .= "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n";
		$ReturnString .= "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n";
		$ReturnString .= "})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');\n";
		
		$ReturnString .= "ga('create', '" . $GA_Tracking_Code . "', 'auto');\n";
		$ReturnString .= "ga('send', 'pageview');\n";
		$ReturnString .= "</script>\n";
	
		echo $ReturnString;
	}
}
?>
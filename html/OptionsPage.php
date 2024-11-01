<?php 
	$Enable_Testing = get_option("EWD_ABCO_Enable_Testing");
	$Enable_Tracking = get_option("EWD_ABCO_Enable_Tracking");
	$Show_Page_Statistics = get_option("EWD_ABCO_Show_Page_Statistics");
	$Enable_WooCommerce_Sale_Tracking = get_option("EWD_ABCO_Enable_WooCommerce_Sale_Tracking");
	$Add_URL_Parameter = get_option("EWD_ABCO_Add_URL_Parameter");

	$Add_GA_Tracking_Code = get_option("EWD_ABCO_Add_GA_Tracking_Code");
	$GA_Tracking_Code = get_option("EWD_ABCO_GA_Tracking_Code");
	$GA_Custom_Metric_Enabled = get_option("EWD_ABCO_GA_Custom_Metric_Enabled");
	$GA_Custom_Metric_Number = get_option("EWD_ABCO_GA_Custom_Metric_Number");
	$GA_Custom_Dimension_Enabled = get_option("EWD_ABCO_GA_Custom_Dimension_Enabled");
	$GA_Custom_Dimension_Number = get_option("EWD_ABCO_GA_Custom_Dimension_Number");
?>
<div class="wrap abco-options-page-tabbed">
	<div class="abco-options-submenu-div">
		<ul class="abco-options-submenu abco-options-page-tabbed-nav">
			<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');">Basic</a></li>
			<li><a id="Premium_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Premium') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Premium');">Premium</a></li>
			<li><a id="Analytics_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Analytics') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Analytics');">Analytics</a></li>
		</ul>
	</div>


<div class="abco-options-page-tabbed-content">

<form method="post" action="admin.php?page=EWD-ABCO-options&DisplayPage=Options&Action=EWD_ABCO_UpdateOptions">
<?php wp_nonce_field('update_options'); ?>
<div id='Basic' class='abco-option-set'>
<h2 id='label-basic-options' class='abco-options-page-tab-title'>Basic Options</h2>
<table class="form-table">
<tr>
	<th scope="row">Enable Testing</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Enable Testing</span></legend>
			<label title='Yes'><input type='radio' name='enable_testing' value="Yes" <?php if($Enable_Testing == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='enable_testing' value="No" <?php if($Enable_Testing == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>Should testing be turned on?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Enable Tracking</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Enable Tracking</span></legend>
			<label title='Yes'><input type='radio' name='enable_tracking' value="Yes" <?php if($Enable_Tracking == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='enable_tracking' value="No" <?php if($Enable_Tracking == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>Should internal tracking be turned on, so that statistics on pageviews, time spent on pages, etc. be recorded for different groups?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Show Page Statistics</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Show Page Statistics</span></legend>
			<label title='Yes'><input type='radio' name='show_page_statistics' value="Yes" <?php if($Show_Page_Statistics == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='show_page_statistics' value="No" <?php if($Show_Page_Statistics == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>If internal tracking is enabled, should time spent on page statistics be displayed on inidividual pages?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Enable WooCommerce Sale Tracking</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Enable WooCommerce Sale Tracking/span></legend>
			<label title='Yes'><input type='radio' name='enable_woocommerce_sale_tracking' value="Yes" <?php if($Enable_WooCommerce_Sale_Tracking == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='enable_woocommerce_sale_tracking' value="No" <?php if($Enable_WooCommerce_Sale_Tracking == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>If internal tracking is enabled, should WooCommerce sales be tracked?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Add URL Parameter</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Add URL Parameter</span></legend>
			<label title='Yes'><input type='radio' name='add_url_parameter' value="Yes" <?php if($Add_URL_Parameter == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='add_url_parameter' value="No" <?php if($Add_URL_Parameter == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>Should a utm parameter (abtesting) be added whenever a visitor clicks on a URL, to help track visitors in specific groups?</p>
		</fieldset>
	</td>
</tr>
</table>
</div>

<div id='Premium' class='abco-option-set abco-hidden'>
<h2 id='label-premium-options' class='abco-options-page-tab-title'>Premium Options</h2>
Coming soon!
<table class="form-table">
</table>
</div>

<div id='Analytics' class='abco-option-set abco-hidden'>
<h2 id='label-analytics-options' class='abco-options-page-tab-title'>Google Analytics Options</h2>
<tr>
	<th scope="row">Include Google Analytics Tracking Code on Each Page</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Include Google Analytics Tracking Code on Each Page</span></legend>
			<label title='Yes'><input type='radio' name='add_ga_tracking_code' value="Yes" <?php if($Add_GA_Tracking_Code == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='add_ga_tracking_code' value="No" <?php if($Add_GA_Tracking_Code == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>Should the Google Analytics tracking code be added to each page? This is often added to a theme's functions.php file, but if you're testing multiple themes, this option can be useful.</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Google Analytics Tracking Code</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Google Analytics Tracking Code</span></legend>
			<input type='text' name='ga_tracking_code' value='<?php echo $GA_Tracking_Code; ?>'/>
			<p>If the Google Analytics tracking code is being added to each page, what's your code number (ex: UA-XXXXXXXX-X)?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Send Custom Metric with User Group</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Send Custom Metric with User Group</span></legend>
			<label title='Yes'><input type='radio' name='ga_custom_metric_enabled' value="Yes" <?php if($GA_Custom_Metric_Enabled == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='ga_custom_metric_enabled' value="No" <?php if($GA_Custom_Metric_Enabled == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>Should a Google Analytics custom metric (setup through Google Analytics admin) be sent? You can select the number of the custom metric that should be used for the user group ID.</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">User Group Custom Metric Number</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Google Analytics Tracking Code</span></legend>
			<input type='text' name='ga_custom_metric_number' value='<?php echo $GA_Custom_Metric_Number; ?>'/>
			<p>If a custom metric should be sent with the user group, which metric number should be used?</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">Send Custom Dimension with User Group</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Send Custom Dimension with User Group</span></legend>
			<label title='Yes'><input type='radio' name='ga_custom_dimension_enabled' value="Yes" <?php if($GA_Custom_Dimension_Enabled == "Yes") {echo "checked=checked";} ?>><span>Yes</span></label><br />
			<label title='No'><input type='radio' name='ga_custom_dimension_enabled' value="No" <?php if($GA_Custom_Dimension_Enabled == "No") {echo "checked=checked";} ?> ><span>No</span></label><br />
			<p>Should a Google Analytics custom Dimension (setup through Google Analytics admin) be sent? You can select the number of the custom Dimension that should be used for the user group ID.</p>
		</fieldset>
	</td>
</tr>
<tr>
	<th scope="row">User Group Custom Dimension Number</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Google Analytics Tracking Code</span></legend>
			<input type='text' name='ga_custom_dimension_number' value='<?php echo $GA_Custom_Dimension_Number; ?>'/>
			<p>If a custom dimension should be sent with the user group, which dimension number should be used?</p>
		</fieldset>
	</td>
</tr>
<table class="form-table">
</table>
</div>

<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>
</div>
</div>

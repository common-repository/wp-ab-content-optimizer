<?php
	$Enable_Tracking = get_option("EWD_ABCO_Enable_Tracking");
	$Enable_WooCommerce_Tracking = get_option("EWD_ABCO_Enable_WooCommerce_Tracking");

	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}
?>

<!-- Upgrade to pro link box -->
<!-- TOP BOX-->

<div id="fade" class="ewd-abco-dark_overlay"></div>

<div id="ewd-dashboard-top" class="metabox-holder">
<?php if ($EWD_ABCO_Full_Version != "Yes") { ?>
<div id="side-sortables" class="metabox-holder ">
	<div id="upcp_pro" class="postbox " >
		<div class="handlediv" title="Click to toggle"></div><h3 class='hndle'><span><?php _e("Full Version", 'EWD_ABCO') ?></span></h3>
		<div class="inside">
			<ul><li><a href="http://www.etoilewebdesign.com/plugins/wp-ab-content-optimizer/"><?php _e("Upgrade to the full version ", "EWD_ABCO"); ?></a><?php _e("to take advantage of all the available features of Ultimate Reviews for Wordpress!", 'EWD_ABCO'); ?></li></ul>
			<h3 class='hndle'><span><?php _e("What you get by upgrading:", 'EWD_ABCO') ?></span></h3>
				<ul>
					<li>Control who reviews by requiring email confirmation or login.</li>
					<li>WooCommerce integration, to let you create more detailed reviews for your products.</li>
					<li>Three extra review formats, admin notifications when a review is received, and dozens of styling and labeling options!</li>
					<li>Access to e-mail support.</li>
				</ul>
			<div class="full-version-form-div">
				<form action="edit.php?post_type=urp_review" method="post">
					<div class="form-field form-required">
						<label for="Key"><?php _e("Product Key", 'EWD_ABCO') ?></label>
						<input name="Key" type="text" value="" size="40" />
					</div>
					<input type="submit" name="Upgrade_To_Full" value="<?php _e('Upgrade', 'EWD_ABCO') ?>">
				</form>
			</div>
		</div>
	</div>
	</div>
<?php } ?>

<?php if (get_option("EWD_ABCO_Update_Flag") == "Yes" or get_option("EWD_ABCO_Install_Flag") == "Yes") {?>
	<div id="side-sortables" class="metabox-holder ">
		<div id="EWD_ABCO_pro" class="postbox " >
			<div class="handlediv" title="Click to toggle"></div>
			<h3 class='hndle'><span><?php _e("Thank You!", 'EWD_ABCO') ?></span></h3>
		 	<div class="inside">
				<?php  if (get_option("EWD_ABCO_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the WordPress AB Content Optimizer.", "EWD_ABCO"); ?><br> <a href='https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw'><?php _e("Subscribe to our YouTube channel ", "EWD_ABCO"); ?></a> <?php _e("for tutorial videos on this and our other plugins!", "EWD_ABCO");?> </li></ul>
				<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 0.3!", "EWD_ABCO"); ?><br> <a href='https://wordpress.org/support/view/plugin-reviews/wp-ab-content-optimizer?filter=5'><?php _e("Please rate our plugin", "EWD_ABCO"); ?></a> <?php _e("if you find Ultimate Reviews useful!", "EWD_ABCO");?> </li></ul><?php } ?>

				<?php /* if (get_option("EWD_ABCO_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "EWD_ABCO"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "EWD_ABCO"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "EWD_ABCO");?> </li></ul>
				<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 2.2.9!", "EWD_ABCO"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "EWD_ABCO"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "EWD_ABCO");?> </li></ul><?php } */ ?>

				<?php /* if (get_option("EWD_ABCO_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "EWD_ABCO"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "EWD_ABCO"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "EWD_ABCO");?>  </li></ul>
				<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 3.0.16!", "EWD_ABCO"); ?><br> <a href='http://wordpress.org/support/view/plugin-reviews/ultimate-product-catalogue'><?php _e("Please rate our plugin", "EWD_ABCO"); ?></a> <?php _e("if you find the Ultimate Product Catalogue Plugin useful!", "EWD_ABCO");?> </li></ul><?php } */ ?>

				<?php /* if (get_option("EWD_ABCO_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "EWD_ABCO"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "EWD_ABCO"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "EWD_ABCO");?>  </li></ul>
				<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 3.4.8!", "EWD_ABCO"); ?><br> <a href='http://wordpress.org/plugins/order-tracking/'><?php _e("Try out order tracking plugin ", "EWD_ABCO"); ?></a> <?php _e("if you ship orders and find the Ultimate Product Catalogue Plugin useful!", "EWD_ABCO");?> </li></ul><?php } */ ?>

				<?php /* if (get_option("EWD_ABCO_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "EWD_ABCO"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "EWD_ABCO"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "EWD_ABCO");?>  </li></ul>
				<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 2.3.9!", "EWD_ABCO"); ?><br> <a href='http://wordpress.org/support/topic/error-hunt'><?php _e("Please let us know about any small display/functionality errors. ", "EWD_ABCO"); ?></a> <?php _e("We've noticed a couple, and would like to eliminate as many as possible.", "EWD_ABCO");?> </li></ul><?php } */ ?>

				<?php /* if (get_option("EWD_ABCO_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "EWD_ABCO"); ?><br> <a href='https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw'><?php _e("Check out our YouTube channel ", "EWD_ABCO"); ?></a> <?php _e("for tutorial videos on this and our other plugins!", "EWD_ABCO");?> </li></ul>
				<?php } elseif ($Full_Version == "Yes") { ?><ul><li><?php _e("Thanks for upgrading to version 3.5.0!", "EWD_ABCO"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "EWD_ABCO"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "EWD_ABCO");?> </li></ul>
				<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 3.4!", "EWD_ABCO"); ?><br> <?php _e("Love the plugin but don't need the premium version? Help us speed up product support and development by donating. Thanks for using the plugin!", "EWD_ABCO");?>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="AQLMJFJ62GEFJ">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>
						</li></ul>
				<?php } */ ?>

			</div>
		</div>
	</div>
	<?php
	update_option('EWD_ABCO_Update_Flag', "No");
	update_option('EWD_ABCO_Install_Flag', "No");
}
?>


	<div id="ewd-dashboard-box-orders" class="ewd-abco-dashboard-box" >
	  	<div class="ewd-dashboard-box-icon"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/abco-buttonsicons-01.png"/>
	  	</div>
		<div class="ewd-dashboard-box-value-and-field-container">
		  <div class="ewd-dashboard-box-value"><span class="displaying-num"><?php echo sizeOf($Tests); ?></span>
		  </div>
		  <div class="ewd-dashboard-box-field">tests
		  </div>
		</div>
	</div>
	<div id="ewd-dashboard-box-links" class="ewd-abco-dashboard-box" >
	  	<div class="ewd-dashboard-box-icon"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/abco-buttonsicons-02.png"/>
	  	</div>
		<div class="ewd-dashboard-box-value-and-field-container">
		  <div class="ewd-dashboard-box-value"><?php echo $wpdb->get_var("SELECT COUNT(Visit_ID) FROM $EWD_ABCO_visits_table_name"); ?>
		  </div>
		  <div class="ewd-dashboard-box-field">site visits
		  </div>
		</div>
	</div>
	<div id="ewd-dashboard-box-views" class="ewd-abco-dashboard-box" >
	  	<div class="ewd-dashboard-box-icon"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/abco-buttonsicons-03.png"/>
	  	</div>
		<div class="ewd-dashboard-box-value-and-field-container">
		  <div class="ewd-dashboard-box-value"><?php echo $wpdb->get_var("SELECT COUNT(Event_ID) FROM $EWD_ABCO_events_table_name WHERE Event_Type='Page Load'"); ?>
		  </div>
		  <div class="ewd-dashboard-box-field">page views
		  </div>
		</div>
	</div>

	<div id="ewd-dashboard-box-support" class="ewd-abco-dashboard-box" >
		<div class="ewd-dashboard-box-icon"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/abco-buttonsicons-04.png"/>
	  	</div>
		<div class="ewd-dashboard-box-value-and-field-container">
		  	<div class="ewd-dashboard-box-support-value">
			<form id="form1" runat="server">
			<a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Click here for support</a>
		  		</div>
			</div>
		</div>
	<div id="light" class="ewd-abco-bright_content">
            <asp:Label ID="lbltext" runat="server" Text="Hey there!"></asp:Label>
            <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
		</br>
		<h2>Need help?</h2>
		<p>You may find the information you need with our support tools.</p>
		<a href="#"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/support_icons_abco-01.png" /></a>
		<a href="#"><h4>Youtube Tutorials</h4></a>
		<p>Our tutorials show you the basics of setting up your plugin, to the more specific utilization of our features.</p>
		<div class="ewd-abco-clear"></div>
		<a href="https://wordpress.org/support/plugin/wp-ab-content-optimizer"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/support_icons_abco-03.png"/></a>
		<a href="https://wordpress.org/support/plugin/wp-ab-content-optimizer"><h4>WordPress Forum</h4></a>
		<p>We make sure to answer your questions within a 24hrs frame during our business days. Search within our threads to find your answers. If it has not been addressed, please create a new thread!</p>
		<div class="ewd-abco-clear"></div>
		<a href="#"><img src="<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/support_icons_abco-02.png"/></a>
		<a href="#"><h4>Documentation</h4></a>
		<p>Most information concerning the installation, the shortcodes and the features are found within our documentation page.</p>
        </div>
	</form>

<!--END TOP BOX-->
</div>



<!--Middle box-->
<div class="ewd-dashboard-middle">
<div id="col-full">
<h3 class="ewd-abco-dashboard-h3">Tests Summary</h3>
<div>
<?php if ($Enable_Tracking == "Yes") { ?>
	<table class='ewd-abco-overview-table wp-list-table widefat fixed striped posts'>
		<thead>
			<tr>
				<th><?php _e("Test Name", 'EWD_ABCO'); ?></th>
				<th><?php _e("Total Visitors", 'EWD_ABCO'); ?></th>
				<th><?php _e("Average Page Views", 'EWD_ABCO'); ?></th>
				<th><?php _e("Average Time on Site", 'EWD_ABCO'); ?></th>
				<?php if ($Enable_WooCommerce_Tracking == "Yes") {?><th><?php _e("Total WC Sales", 'EWD_ABCO'); ?></th><?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($Tests as $Test) { ?>
						<tr>
							<td><?php echo $Test['Test_Name']; ?></td>
							<td><?php echo $wpdb->get_var("SELECT COUNT(Visit_ID) FROM $EWD_ABCO_visits_table_name WHERE User_Group_ID='" . $Test['ID'] . "'"); ?></td>
							<td><?php echo $wpdb->get_var("SELECT AVG(Pages_Viewed) FROM $EWD_ABCO_visits_table_name WHERE User_Group_ID='" . $Test['ID'] . "'"); ?></td>
							<td><?php echo round($wpdb->get_var("SELECT AVG(TIMESTAMPDIFF(MINUTE, Visit_Start_Datetime, Visit_End_Datetime)) FROM $EWD_ABCO_visits_table_name WHERE User_Group_ID='" . $Test['ID'] . "'"), 2) . __(" minutes", 'EWD_ABCO'); ?></td>
							<?php if ($Enable_WooCommerce_Tracking == "Yes") {?><td><?php echo $wpdb->get_var("SELECT COUNT(Event_ID) FROM $EWD_ABCO_events_table_name WHERE User_Group_ID='" . $Test['ID'] . "' AND Event_Type='WooCommerce Sale'"); ?></td><?php } ?>
						</tr>
				<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
	Set "Enable Tracking" to "Yes" in the "Options" tab to see average page views, average time on site, etc. by test group
<?php } ?>
</div>
<br class="clear" />
</div>
</div>
<!-- END MIDDLE BOX -->

<!-- FOOTER BOX -->
<!-- A list of the products in the catalogue -->
<div class="ewd-dashboard-footer">
<div id='ewd-dashboard-updates' class='ewd-abco-updates postbox upcp-postbox-collapsible'>
<h3 class='hndle ewd-abco-dashboard-h3' id='ewd-recent-changes'><?php _e("Recent Changes", 'EWD_ABCO'); ?> <i class="fa fa-cog" aria-hidden="true"></i></h3>
<div class='ewd-dashboard-content' ><?php echo EWD_ABCO_Get_EWD_Blog(); ?></div>
</div>

<div id='ewd-dashboard-blog' class='ewd-abco-blog postbox upcp-postbox-collapsible'>
<h3 class='hndle ewd-abco-dashboard-h3'>News <i class="fa fa-rss" aria-hidden="true"></i></h3>
<div class='ewd-dashboard-content'><?php echo EWD_ABCO_Get_Changelog(); ?></div>
</div>

<div id="ewd-dashboard-plugins" class='ewd-abco-plugins postbox upcp-postbox-collapsible' >
	<h3 class='hndle ewd-abco-dashboard-h3'><span><?php _e("Goes great with:", 'EWD_ABCO') ?></span><i class="fa fa-plug" aria-hidden="true"></i></h3>
	<div class="inside">
		<div class="ewd-dashboard-plugin-icons">
			<div style="width:50%">
				<a target='_blank' href='https://wordpress.org/plugins/ultimate-product-catalogue/'><img style="width:100%" src='<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/UPCP_Icons-07-300x300.png'/></a>
			</div>
			<div>
				<h3>Product Catalog</h3> <p>Enables you to display your business's products in a clean and efficient manner.</p>
			</div>

		</div>
		<div class="ewd-dashboard-plugin-icons">
			<div style="width:50%">
				<a target='_blank' href='https://wordpress.org/plugins/ultimate-reviews/'><img style="width:100%" src='<?php echo plugins_url(); ?>/wp-ab-content-optimizer/images/URP_Icons-03.png'/></a>
			</div>
			<div>
				<h3>Ultimate Reviews</h3><p>Let visitors submit reviews and display them right in the tabbed page layout!</p>
			</div>

		</div>
	</div>
</div>
</div>
</div>


<?php
function EWD_ABCO_Get_EWD_Blog() {
	$Blog_URL = EWD_ABCO_CD_PLUGIN_PATH . 'Blog.html';
	$Blog = file_get_contents($Blog_URL);

	return $Blog;
}

function EWD_ABCO_Get_Changelog() {
	$Readme_URL = EWD_ABCO_CD_PLUGIN_PATH . 'readme.txt';
	$Readme = file_get_contents($Readme_URL);

	$Changes_Start = strpos($Readme, "== Changelog ==") + 15;
	$Changes_Section = substr($Readme, $Changes_Start);

	$Changes_Text = substr($Changes_Section, 0, strposX($Changes_Section, "=", 5));

	$Changes_Text = str_replace("= ", "<h3>", $Changes_Text);
	$Changes_Text = str_replace(" =", "</h3>", $Changes_Text);
	$Changes_Text = str_replace("- ", "<br />- ", $Changes_Text);

	return $Changes_Text;
}

function strposX($haystack, $needle, $number){
    if($number == '1'){
        return strpos($haystack, $needle);
    }elseif($number > '1'){
        return strpos($haystack, $needle, strposX($haystack, $needle, $number - 1) + strlen($needle));
    }else{
        return error_log('Error: Value for parameter $number is out of range');
    }
}

?>

<?php 
	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	$Next_Test_ID = get_option("EWD_ABCO_Next_Test_ID");

	$All_Themes = wp_get_themes();
?>
<div class="wrap abco-options-page-tabbed">
	<div class="abco-options-submenu-div">
		<ul class="abco-options-submenu abco-options-page-tabbed-nav">
			<li><a id="Summary_Menu" class="MenuTab tests-subnav-tab <?php if ($Display_Tab == '' and sizeOf($Tests) != 0) {echo 'tests-subnav-tab-active';}?>" onclick="ShowTestTab('Summary');"><?php _e("Overview", 'EWD_ABCO') ?></a></li>
			<?php foreach ($Tests as $Test) { ?>
				<li><a id="<?php echo $Test['ID']; ?>_Test_Menu" class="MenuTab tests-subnav-tab <?php if ($Display_Tab == $Test['ID']) {echo 'tests-subnav-tab-active';}?>" onclick="ShowTestTab('<?php echo $Test['ID']; ?>_Test');"><?php echo $Test['Test_Name']; ?></a></li>
			<?php } ?>
			<li><a id="Add_Menu" class="MenuTab tests-subnav-tab <?php if ($Display_Tab == '' and sizeOf($Tests) == 0) {echo 'tests-subnav-tab-active';}?>"  onclick="ShowTestTab('Add');"><?php _e("New Test", 'EWD_ABCO') ?></a></li>
		</ul>
	</div>


<div class="abco-options-page-tabbed-content">

<form method="post" action="admin.php?page=EWD-ABCO-options&DisplayPage=Tests&Action=EWD_ABCO_UpdateTests">
<?php wp_nonce_field('update_tests'); ?>

<div id='Summary' class='abco-test-set <?php if ($Display_Tab != '' or sizeOf($Tests) == 0) {echo 'abco-hidden';}?>'>
<h2 id='label-basic-options' class='abco-options-page-tab-title'><?php _e("Overview", 'EWD_ABCO'); ?></h2>
	<table class='ewd-abco-overview-table wp-list-table widefat fixed striped posts'>
		<thead>
			<tr>
				<th><?php _e("Test Name", 'EWD_ABCO'); ?></th>
				<th><?php _e("Test Status", 'EWD_ABCO'); ?></th>
				<th><?php _e("Visitor %", 'EWD_ABCO'); ?></th>
				<th><?php _e("Theme", 'EWD_ABCO'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($Tests as $Test) { ?>
				<tr>
					<td><?php echo $Test['Test_Name']; ?></td>
					<td><?php echo $Test['Test_Status']; ?></td>
					<td><?php echo $Test['Test_Visitors_Percentage']; ?></td>
					<td><?php foreach ($All_Themes as $Theme) {if($Theme->get_stylesheet() == $Test['Test_Theme']) {echo $Theme->name;}} ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php foreach ($Tests as $Test) { ?>
	<div id='<?php echo $Test['ID']; ?>_Test' class='abco-test-set <?php if ($Display_Tab != $Test['ID']) {echo 'abco-hidden';}?>'>
	<h2 id='label-basic-options' class='abco-options-page-tab-title'><?php echo $Test['Test_Name']; ?></h2>
	<table class="form-table">
	<tr>
		<th scope="row">Test ID Number:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Test ID Number:</span></legend>
				<?php echo $Test['ID']; ?>
				<p>This ID is used in the shortcodes and for custom dimensions and metrics.</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Test Name:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Test Name:</span></legend>
				<input type='text' name='<?php echo $Test['ID'];?>_test_name' value='<?php echo $Test['Test_Name']; ?>' />
				<p>What name should this test have? Can be used instead of the ID in the content testing shortcode.</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Test Status</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Test Status</span></legend>
				<label title='Active'><input type='radio' name='<?php echo $Test['ID']; ?>_test_status' value="Active" <?php if($Test['Test_Status'] == "Active") {echo "checked=checked";} ?>><span><?php _e("Active", 'EWD_ABCO'); ?></span></label><br />
				<label title='Paused'><input type='radio' name='<?php echo $Test['ID']; ?>_test_status' value="Paused" <?php if($Test['Test_Status'] == "Paused") {echo "checked=checked";} ?>><span><?php _e("Paused", 'EWD_ABCO'); ?></span></label><br />
				<label title='Delete'><input type='radio' name='<?php echo $Test['ID']; ?>_test_status' value="Delete" <?php if($Test['Test_Status'] == "Delete") {echo "checked=checked";} ?>><span><?php _e("Delete", 'EWD_ABCO'); ?></span></label><br />
				<p>Should visitors be assigned to this group ("Active") or not assigned to this group ("Paused")?<br />
				You can also delete this test by clicking the delete radio button and then clicking "Save Changes".</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Percentage of Visitors Assigned to this Group:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Percentage of Visitors Assigned to this Group:</span></legend>
				<input type='text' name='<?php echo $Test['ID'];?>_test_visitors_percentage' value='<?php echo $Test['Test_Visitors_Percentage']; ?>' />
				<p>What percentage of visitors should be put in this test group?</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Theme for Test Group:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Theme for Test Group:</span></legend>
				<select name='<?php echo $Test['ID'];?>_test_theme'>
					<?php foreach ($All_Themes as $Theme) { ?>
       					<option value='<?php echo $Theme->get_stylesheet(); ?>' <?php if($Theme->get_stylesheet() == $Test['Test_Theme']) {echo "selected='selected'";} ?> >
       						<?php echo $Theme->name; ?><?php if($Theme->get_stylesheet() == get_stylesheet()) {echo " (" . __('Default', 'ABCO') . ")";} ?>
       					</option>
        			<?php } ?>
        		</select>
				<p>What theme should be used when someone in this group visits your site?</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Custom CSS for Test Group:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Custom CSS for Test Group:</span></legend>
				<textarea name='<?php echo $Test['ID'];?>_test_custom_css'>
					<?php echo $Test['Custom_CSS']; ?>
        		</textarea>
				<p>What extra css should be added for users in this group?</p>
			</fieldset>
		</td>
	</tr>
	</table>
	<div class='ewd-abco-test-shortcodes-explanation'>
		<?php _e("To set up content that is only visible to this test group, use the shortcode: ", 'EWD_ABCO'); ?>
		<code>[ab-testing id='<?php echo $Test['ID'];?>'] Testing content goes here [/ab-testing]</code>
	</div>
	<div class='ewd-abco-test-shortcodes-explanation'>
		<?php _e("To send a user directly to this test group, use the following link: ", 'EWD_ABCO'); ?>
		<code><?php echo site_url() . "?Action=EWD_ABCO_SwitchGroups&Group_ID=" . $Test['ID']; ?></code>
	</div>
	</div>
<?php } ?>

<div id='Add' class='abco-test-set <?php if ($Display_Tab != '' or sizeOf($Tests) != 0) {echo 'abco-hidden';}?>'>
<h2 id='label-basic-options' class='abco-options-page-tab-title'><?php _e("Create Test", 'EWD_ABCO'); ?></h2>
	<p>You must select an option for the field "Test Status" for this test to be saved when you click "Save Changes".</p>
	<table class="form-table">
	<tr>
		<th scope="row">Test ID Number:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Test ID Number:</span></legend>
				<?php echo $Next_Test_ID; ?>
				<p>This ID is used in the shortcodes and for custom dimensions and metrics.</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Test Name:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Test Name:</span></legend>
				<input type='text' name='<?php echo $Next_Test_ID;?>_test_name' value='' />
				<p>What name should this test have? Can be used instead of the ID in the content testing shortcode.</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Percentage of Visitors Assigned to this Group:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Percentage of Visitors Assigned to this Group:</span></legend>
				<input type='text' name='<?php echo $Next_Test_ID;?>_test_visitors_percentage' value='0' />
				<p>What percentage of visitors should be put in this test group?</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Test Status</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Test Status</span></legend>
				<label title='Active'><input type='radio' name='<?php echo $Next_Test_ID; ?>_test_status' value="Active" ><span><?php _e("Active", 'EWD_ABCO'); ?></span></label><br />
				<label title='Paused'><input type='radio' name='<?php echo $Next_Test_ID; ?>_test_status' value="Paused" ><span><?php _e("Paused", 'EWD_ABCO'); ?></span></label><br />
				<label title='Delete'><input type='radio' name='<?php echo $Next_Test_ID; ?>_test_status' value="Delete" ><span><?php _e("Delete", 'EWD_ABCO'); ?></span></label><br />
				<p>Should visitors be assigned to this group ("Active") or not assigned to this group ("Paused")?<br />
				You can also delete this test by clicking the delete radio button and then clicking "Save Changes".</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Theme for Test Group:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Theme for Test Group:</span></legend>
				<select name='<?php echo $Next_Test_ID;?>_test_theme'>
					<?php foreach ($All_Themes as $Theme) { ?>
       					<option value='<?php echo $Theme->get_stylesheet(); ?>' <?php if($Theme->get_stylesheet() == get_stylesheet()) {echo "selected='selected'";} ?> >
       						<?php echo $Theme->name; ?><?php if($Theme->get_stylesheet() == get_stylesheet()) {echo "(" . __('Default', 'ABCO') . ")";} ?>
       					</option>
        			<?php } ?>
        		</select>
				<p>What theme should be used when someone in this group visits your site?</p>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row">Custom CSS for Test Group:</th>
		<td>
			<fieldset><legend class="screen-reader-text"><span>Custom CSS for Test Group:</span></legend>
				<textarea name='<?php echo $Next_Test_ID;?>_test_custom_css'>	
        		</textarea>
				<p>What extra css should be added for users in this group?</p>
			</fieldset>
		</td>
	</tr>
	</table>
	<div class='ewd-abco-test-shortcodes-explanation'>
		<?php _e("To set up content that is only visible to this test group, use the shortcode: ", 'EWD_ABCO'); ?>
		<code>[ab-testing id='<?php echo $Next_Test_ID;?>'] Testing content goes here [/ab-testing]</code>
	</div>
	<div class='ewd-abco-test-shortcodes-explanation'>
		<?php _e("To send a user directly to this test group, use the following link: ", 'EWD_ABCO'); ?>
		<code><?php echo site_url() . "?Action=EWD_ABCO_SwitchGroups&Group_ID=" . $Next_Test_ID; ?></code>
	</div>
</div>

<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>
</div>
</div>

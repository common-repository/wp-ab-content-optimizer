<div class="EWD_ABCO_Menu">
	<h2 class="nav-tab-wrapper">
		<a id="Dashboard_Menu" class="MenuTab nav-tab <?php if ($Display_Page == '' or $Display_Page == 'Dashboard') {echo 'nav-tab-active';}?>" onclick="ShowTab('Dashboard');"><?php _e("Dashboard", "EWD_ABCO"); ?></a>
		<a id="Tests_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Tests') {echo 'nav-tab-active';}?>" onclick="ShowTab('Tests');"><?php _e("Tests", "EWD_ABCO"); ?></a>
		<a id="Options_Menu" class="MenuTab nav-tab <?php if ($Display_Page == 'Options') {echo 'nav-tab-active';}?>" onclick="ShowTab('Options');"><?php _e("Options", "EWD_ABCO"); ?></a>
	</h2>
</div>

<div class="clear"></div>

<!-- Add the individual pages to the admin area, and create the active tab based on the selected page -->
<div class="OptionTab <?php if ($Display_Page == "" or $Display_Page == 'Dashboard') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Dashboard">
	<?php include( plugin_dir_path( __FILE__ ) . 'DashboardPage.php'); ?>
</div>
<div class="OptionTab <?php if ($Display_Page == 'Tests' or $Display_Page == 'Test') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Tests">
	<?php include( plugin_dir_path( __FILE__ ) . 'TestsPage.php'); ?>
</div>	

<div class="OptionTab <?php if ($Display_Page == 'Options' or $Display_Page == 'Option') {echo 'ActiveTab';} else {echo 'HiddenTab';} ?>" id="Options">
	<?php include( plugin_dir_path( __FILE__ ) . 'OptionsPage.php'); ?>
</div>		
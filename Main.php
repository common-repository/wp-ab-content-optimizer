<?php
/*
Plugin Name: WordPress AB Content Optimizer
Plugin URI: http://www.EtoileWebDesign.com/plugins/
Description: A plugin that lets you test different themes, pages and content to see what works best for retaining your visitors
Author: Etoile Web Design
Author URI: http://www.EtoileWebDesign.com/
Terms and Conditions: http://www.etonnilewebdesign.com/plugin-terms-and-conditions/
Text Domain: EWD_ABCO
Version: 0.7
*/

global $ewd_abco_message;
global $EWD_ABCO_Full_Version;
global $EWD_ABCO_db_version;
global $EWD_ABCO_visits_table_name, $EWD_ABCO_events_table_name;
$EWD_ABCO_visits_table_name = $wpdb->prefix . "EWD_ABCO_Visits";
$EWD_ABCO_events_table_name = $wpdb->prefix . "EWD_ABCO_Events";


$EWD_ABCO_db_version = "0.3";
//$wpdb->show_errors();

define( 'EWD_ABCO_CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWD_ABCO_CD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

//define('WP_DEBUG', true);

register_activation_hook(__FILE__,'Update_EWD_ABCO_Options');
register_activation_hook(__FILE__,'Update_EWD_ABCO_Tables');

/* Hooks neccessary admin tasks */
if ( is_admin() ){
		add_action('widgets_init', 'Update_EWD_ABCO_Content');
		add_action('admin_head', 'EWD_ABCO_Admin_Styles');
		add_action('admin_init', 'Add_EWD_ABCO_Scripts');
		add_action('widgets_init', 'Update_EWD_ABCO_Content');
		add_action('admin_notices', 'EWD_ABCO_Error_Notices');
}

function EWD_ABCO_Enable_Menu() {
	$Access_Role = get_option("EWD_ABCO_Access_Role");
	if ($Access_Role == "") {$Access_Role = "administrator";}

	add_menu_page('WP AB Content Optimizer', 'A/B Optimizer', $Access_Role, 'EWD-ABCO-options', 'EWD_ABCO_Output_Options', null , '50.9');
	add_submenu_page('EWD-ABCO-options', 'ABCO Options', 'Options', $Access_Role, 'EWD-ABCO-options&DisplayPage=Options', 'EWD_ABCO_Output_Options');
	add_submenu_page('EWD-ABCO-options', 'ABCO Tests', 'Tests', $Access_Role, 'EWD-ABCO-options&DisplayPage=Tests', 'EWD_ABCO_Output_Options');
}
add_action('admin_menu' , 'EWD_ABCO_Enable_Menu');

/* Add localization support */
function EWD_ABCO_localization_setup() {
		load_plugin_textdomain('EWD_ABCO', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'EWD_ABCO_localization_setup');

// Add settings link on plugin page
function EWD_ABCO_plugin_settings_link($links) {
  $settings_link = '<a href="admin.php?page=EWD-ABCO-options">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'EWD_ABCO_plugin_settings_link' );

function Add_EWD_ABCO_Scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'EWD-ABCO-options') {
		$url_one = plugins_url("js/Admin.js", __FILE__);

		wp_enqueue_script('PageSwitch', $url_one, array('jquery'));
	}
}

function EWD_ABCO_Admin_Styles() {
	wp_enqueue_style( 'ewd-ABCO-admin', plugins_url("css/Admin.css", __FILE__));
	wp_enqueue_style( 'spectrum', plugins_url("css/spectrum.css", __FILE__));
}

add_action('wp_loaded', 'EWD_ABCO_Check_If_Enabled');
function EWD_ABCO_Check_If_Enabled() {
	global $ewd_abco_message;

	if (!isset($ewd_abco_message['Message_Type']) and isset($_GET['page']) && $_GET['page'] == 'EWD-ABCO-options') {
		$Enable_Testing = get_option("EWD_ABCO_Enable_Testing");
		
		if ($Enable_Testing != "Yes") {
			$ewd_abco_message = array('Message_Type' => 'Warning', 'Message' => __("Testing is currently not enabled. Go to the 'Options' tab to enable the plugin.", 'EWD_ABCO'));
		}
	}
}

add_action( 'admin_bar_menu', 'EWD_ABCO_Toolbar_Switch_User_Group', 999 );
function EWD_ABCO_Toolbar_Switch_User_Group($wp_admin_bar) {
	$Enable_Testing = get_option("EWD_ABCO_Enable_Testing");
	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}

	if ($Enable_Testing != "Yes" or sizeOf($Tests) == 0) {return;}

	$args = array(
		'id'    => 'ewd_abco_switch_groups',
		'title' => 'Switch Test Groups',
		//'href'  => get_admin_url() . "?page=EWD-ABCO-options",
		'meta'  => array( 'class' => 'abco-switch-groups-toolbar-parent' )
	);
	$wp_admin_bar->add_node($args);

	foreach ($Tests as $Test) {
		if (is_admin()) {$Switch_Link = get_admin_url() . "?page=EWD-ABCO-options&Action=EWD_ABCO_SwitchGroups&Group_ID=" . $Test['ID'];}
		else {$Switch_Link = get_permalink() . "?Action=EWD_ABCO_SwitchGroups&Group_ID=" . $Test['ID'];}

		$args = array(
			'id'    => 'ewd_abco_group_' . $Test['ID'],
			'title' => $Test['Test_Name'],
			'parent' => 'ewd_abco_switch_groups',
			'href'  => $Switch_Link,
			'meta'  => array( 'class' => 'abco-switch-groups-toolbar-child' )
		);
		$wp_admin_bar->add_node($args);
	}
}

add_action('widgets_init', 'EWD_ABCO_Front_End_User_Group_Switch');
function EWD_ABCO_Front_End_User_Group_Switch() {
	if (isset($_GET['Action']) and $_GET['Action'] == "EWD_ABCO_SwitchGroups") {
		Update_EWD_ABCO_Content();
		EWD_ABCO_Set_Theme_For_User();
	}
}

 add_action( 'wp_enqueue_scripts', 'Add_EWD_ABCO_FrontEnd_Scripts' );
function Add_EWD_ABCO_FrontEnd_Scripts() {
	global $EWD_ABCO_User_Group;

	wp_register_script('ewd-ABCO-js', plugins_url( '/js/ewd-ABCO-js.js' , __FILE__ ), array( 'jquery' ), true);

    $GA_Custom_Metric_Enabled = get_option("EWD_ABCO_GA_Custom_Metric_Enabled");
	$GA_Custom_Metric_Number = get_option("EWD_ABCO_GA_Custom_Metric_Number");
	$GA_Custom_Dimension_Enabled = get_option("EWD_ABCO_GA_Custom_Dimension_Enabled");
	$GA_Custom_Dimension_Number = get_option("EWD_ABCO_GA_Custom_Dimension_Number");

    $Data_Array = array( 'ga_custom_metric_enabled' => $GA_Custom_Metric_Enabled,
                        'ga_custom_metric_number' => $GA_Custom_Metric_Number,
                        'ga_custom_dimension_enabled' => $GA_Custom_Dimension_Enabled,
                        'ga_custom_dimension_number' => $GA_Custom_Dimension_Number,
                        'user_group' => $EWD_ABCO_User_Group
        );
    wp_localize_script( 'ewd-ABCO-js', 'ewd_abco_php_data', $Data_Array );

    wp_enqueue_script('ewd-ABCO-js');
}


/*add_action( 'wp_enqueue_scripts', 'EWD_ABCO_Add_Stylesheet' );
function EWD_ABCO_Add_Stylesheet() {
    wp_register_style( 'ewd-ABCO-style', plugins_url('css/ewd-ABCO-styles.css', __FILE__) );
    wp_enqueue_style( 'ewd-ABCO-style' );
} */

add_action('activated_plugin','save_ABCO_error');
function save_ABCO_error(){
		update_option('plugin_error',  ob_get_contents());
		file_put_contents("Error.txt", ob_get_contents());
}

$EWD_ABCO_Full_Version = get_option("EWD_ABCO_Full_Version");

/*if (isset($_POST['Upgrade_To_Full'])) {
	  add_action('admin_init', 'Upgrade_To_Full');
}*/


include "Functions/EWD_ABCO_Add_Custom_CSS.php";
include "Functions/EWD_ABCO_Add_Meta_Boxes.php";
include "Functions/EWD_ABCO_Error_Notices.php";
include "Functions/EWD_ABCO_Google_Analytics_Integration.php";
include "Functions/EWD_ABCO_Manage_User_Groups.php";
include "Functions/EWD_ABCO_Output_Options.php";
include "Functions/EWD_ABCO_Process_Ajax.php";
include "Functions/EWD_ABCO_Public_Functions.php";
include "Functions/EWD_ABCO_Record_Events.php";
include "Functions/EWD_ABCO_Styling.php";
include "Functions/EWD_ABCO_Tracking_Functions.php";
include "Functions/FrontEndAjaxUrl.php";
include "Functions/Prepare_EWD_ABCO_Data_For_Insertion.php";
include "Functions/Update_EWD_ABCO_Admin_Databases.php";
include "Functions/Update_EWD_ABCO_Content.php";
include "Functions/Update_EWD_ABCO_Options.php";
include "Functions/Update_EWD_ABCO_Tables.php";

include "Shortcodes/Filter_Testing_Block.php";

// Updates the ABCO database when required
if (get_option('EWD_ABCO_db_version') != $EWD_ABCO_db_version) {
	Update_EWD_ABCO_Options();
	Update_EWD_ABCO_Tables();
	update_option("EWD_ABCO_db_version", $EWD_ABCO_db_version);
}

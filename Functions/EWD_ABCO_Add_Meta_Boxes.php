<?php

add_action( 'add_meta_boxes', 'EWD_ABCO_Add_Meta_Boxes' );
function EWD_ABCO_Add_Meta_Boxes () {
	$Enable_Tracking = get_option("EWD_ABCO_Enable_Tracking");
	$Show_Page_Statistics = get_option("EWD_ABCO_Show_Page_Statistics");

	if ($Enable_Tracking == "Yes" and $Show_Page_Statistics == "Yes") { 
		add_meta_box("abco-meta", __("AB Test Statistics", 'EWD_ABCO'), "EWD_ABCO_Meta_Box", array('post', 'page'), "normal", "high");
	}
}

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function EWD_ABCO_Meta_Box( $post ) {
	global $wpdb;
	global $EWD_ABCO_visits_table_name, $EWD_ABCO_events_table_name;
	
	$Tests = get_option("EWD_ABCO_Tests");
	if (!is_array($Tests)) {$Tests = array();}
?>
	<table class='ewd-abco-page-statistics-table wp-list-table widefat fixed striped posts'>
		<thead>
			<tr>
				<th><?php _e("Test Name", 'EWD_ABCO'); ?></th>
				<th><?php _e("Total Page Views", 'EWD_ABCO'); ?></th>
				<th><?php _e("Average Time on Page", 'EWD_ABCO'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($Tests as $Test) { ?>
						<tr>
							<td><?php echo $Test['Test_Name']; ?></td>
							<td><?php echo $wpdb->get_var("SELECT COUNT(Event_ID) FROM $EWD_ABCO_events_table_name WHERE User_Group_ID='" . $Test['ID'] . "' AND Event_Target_ID='" . $post->ID . "'"); ?></td>
							<td><?php echo round($wpdb->get_var("SELECT AVG(TIMESTAMPDIFF(MINUTE, Event_Start_Datetime, Event_End_Datetime)) FROM $EWD_ABCO_events_table_name WHERE User_Group_ID='" . $Test['ID'] . "' AND Event_Target_ID='" . $post->ID . "'"), 2) . __(" minutes", 'EWD_ABCO'); ?></td>
						</tr>
				<?php } ?>
		</tbody>
	</table>
<?php
}

?>
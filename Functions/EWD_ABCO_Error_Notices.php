<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Add any update or error notices to the top of the admin page */
function EWD_ABCO_Error_Notices(){
    global $ewd_abco_message;
		if (isset($ewd_abco_message)) {
			if (isset($ewd_abco_message['Message_Type']) and $ewd_abco_message['Message_Type'] == "Update") {echo "<div class='notice notice-success'><p>" . $ewd_abco_message['Message'] . "</p></div>";}
			if (isset($ewd_abco_message['Message_Type']) and $ewd_abco_message['Message_Type'] == "Error") {echo "<div class='notice notice-error'><p>" . $ewd_abco_message['Message'] . "</p></div>";}
			if (isset($ewd_abco_message['Message_Type']) and $ewd_abco_message['Message_Type'] == "Warning") {echo "<div class='notice notice-warning'><p>" . $ewd_abco_message['Message'] . "</p></div>";}
		}
}

?>
<?php

function generate_alert_messages() {
	 $messages = array(
	 	     "Posted successfully!",
		     "Friend request sent!",
		     "Password reset!"
		     );
	if (isset($_POST['message'])) {
	   $message_id = $_POST['message'];
	   echo "<p>";
	   echo "$messages[$message_id]";
	   echo "</p>";
	}
}

?>
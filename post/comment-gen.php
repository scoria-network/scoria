<?php

function gen_comments($con, $post) {
	
        $pid = $post[0];
        $uid = $post[1];
	
	$post_context_ids = array($post[1]);

	$query = "SELECT * FROM comments WHERE pid=$pid";
         $result = mysql_query($query, $con);
	?> <ul> <?
	 while ($comment_row = mysql_fetch_array($result)) {
	       if (!in_array($comment_row[2], $post_context_ids)) {
	       	  $post_context_ids[] = $comment_row[2];
		 }
		$index = array_search($comment_row[2], $post_context_ids);
               if ($comment_row[2] == $_SESSION['uid']) {
		  $index = "me";
	       }
	       echo "<li>$index: $comment_row[3]</li>";
	       
         }
	 ?> </ul> <?
	 
}

?>

<?php

function gen_comments($con, $pid) {
	
	$query = "SELECT * FROM posts WHERE id=$pid LIMIT 1";
	$result = mysql_query($query, $con);
	$post = mysql_fetch_array($result);

	

	$post_context_ids = array($post[1]);

	$query = "SELECT * FROM comments WHERE pid=$pid";
         $result = mysql_query($query, $con);
	?> <ul> <?
	 while ($comment_row = mysql_fetch_array($result)) {
	       if (!in_array($comment_row[2], $post_context_ids)) {
	       	  $post_context_ids[] = $comment_row[2];
		 }
		$index = array_search($comment_row[2], $post_context_ids);
               echo "<li>$index: $comment_row[3]</li>";
         }
	 ?> </ul> <?
	 
}

?>
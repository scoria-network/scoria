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
	       echo "<li>$index: $comment_row[3]";

	       if ($comment_row[2] == $_SESSION['uid']) {
         ?>

                  <form action="../comment/comment-delete.php" method="post" style="margin-bottom:0px;float:right">
                    <input type="hidden" value=<? echo "\"$comment_row[0]\""?> name="comment_id" />
           	    <input type="submit" value="Delete" class="btn btn-link btn-xs" style="margin-bottom:5px; color:#d9534f" />
           	  </form>

          <?php
		}	

	       echo "</li>";
         }
	 ?> </ul> <?
	 
}

?>

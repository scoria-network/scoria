<?php 

require_once('comment-gen.php');

function gen_post($row, $con) {
	 echo "<tr>
                  <td class=\"title-col\">0: $row[2]";
		  
	 	
        gen_comments($con, $row[0]);
	

	 ?>
	 
	 <form action="comment/post-comment.php" method="post">
      	 <input type="hidden" value=<? echo "\"$row[0]\""?> name="post_id" />
	 <input type="text" name="content" size=35 />
      	 <input type="submit" value="Post Comment" />
    	 </form>	 	 

	 <?	 
	  
	 echo "</td>
                </tr>";	 
}
?>
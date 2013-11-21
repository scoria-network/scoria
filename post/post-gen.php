<?php 

require_once('comment-gen.php');

function gen_post($row, $con) {
	 $index = "0";
	 
	 if ($row[1] == $_SESSION['uid']) {
	    $index = "me";
	 }  

	 echo "<tr>
                  <td class=\"title-col\">$index: $row[2]";
	 	
        gen_comments($con, $row);
	

	 ?>
	 
	 <form action="comment/post-comment.php" method="post">
      	 <input type="hidden" value=<? echo "\"$row[0]\""?> name="post_id" />
	 <input type="text" name="content" size=35 />
      	 <input type="submit" value="Post Comment" />
    	 </form>	 	 
	 
	 <?
	 
	 if ($row[1] == $_SESSION['uid']) {
	 
	 ?>

	 <form action="post/post-delete.php" method="post">
         <input type="hidden" value=<? echo "\"$row[0]\""?> name="post_id" />
         <input type="submit" value="Delete Post" />
         </form>
	 
	 <?

	 }
	 
	 ?>		

	 <?	 
	  
	 echo "</td>
                </tr>";	 
}
?>
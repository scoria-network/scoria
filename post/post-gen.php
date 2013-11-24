<?php 

require_once('comment-gen.php');

function gen_post($row, $con) {
	 $index = "0";
	 
	 if ($row[1] == $_SESSION['uid']) {
	    $index = "me";
	 }  
	 
	 echo "<tr style=\"width:100%\">
                  <td class=\"title-col\">";

	if ($row[1] == $_SESSION['uid']) {
         ?>

         <form action="post/post-delete.php" method="post" style="margin-bottom:0px;float:right">
           <input type="hidden" value=<? echo "\"$row[0]\""?> name="post_id" />
           <input type="submit" value="Delete Post" class="btn btn-danger btn-xs" style="margin-bottom:5px;" />
         </form>

	  <?php
         }

	  echo "$index: $row[2]";
	 
         gen_comments($con, $row);
	 ?>
	 
	 <form action="comment/post-comment.php" method="post" style="margin-bottom:5px" >
      	 <input type="hidden" value=<? echo "\"$row[0]\""?> name="post_id" />
	 <input type="text" class="form-control" name="content" placeholder="Write a comment..."/>
      	 <input type="submit" class="btn btn-primary post-comment" value="Post Comment" />
    	 </form>	 	 
	 
<?php
	 echo "</td>
                </tr>";	 
}
?>

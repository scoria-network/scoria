<?php 

require_once('comment-gen.php');

function gen_post($row, $con) {
	 $index = "0";
	 
	 if ($row[1] == $_SESSION['uid']) {
	    $index = "me";
	 }  
	 
	 echo "<tr>
                  <td class=\"title-col\">";

	if (5<4/*$row[1] == $_SESSION['uid']*/) {
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
	 <?php 
	    date_default_timezone_set('Etc/GMT+8');
	    if($row[3]): 
	 ?>
	 <div style="float:left; margin-top:10px; margin-left:5px;">
	   <?php 
	      $time = $row[3];
	      echo date('F d',$time)." at ".date('g:ma',$time);
	   ?>
	 </div>
	 <?php endif; ?>
      	 <input type="submit" class="btn btn-primary post-comment" value="Post Comment"/>
    	 </form>	 	 
	 
<?php
	 echo "</td>
                </tr>";	 
}
?>

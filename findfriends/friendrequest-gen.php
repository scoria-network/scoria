<?php 

function gen_friendrequest($row, $con) {
	 $user = mysql_fetch_array(mysql_query("SELECT * FROM userinfo WHERE id=$row[2]", $con));
	 $friend = mysql_fetch_array(mysql_query("SELECT * FROM userinfo WHERE id=$row[1]", $con));


	 echo "<tr>
                  <td class=\"title-col\">Friend request from:</br> $friend[3]";
		  
		  
		  
	 ?>
	 
	 <form action="findfriends/accept-request.php" method="post">
         <input type="hidden" value=<? echo "\"$row[2]\""?> name="sender_id" />
         <input type="hidden" value=<? echo "\"$row[1]\""?> name="receiver_id" />
         <input type="submit" value="Accept" />
	 <input type="submit" value="Decline" />
         </form>

	 <?	 
	  
	 echo "</td>
                </tr>";	 
}		
?>
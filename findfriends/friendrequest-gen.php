<?php 
   function gen_friendrequest($row, $con) {
   $user = mysql_fetch_array(mysql_query("SELECT * FROM userinfo WHERE id=$row[2]", $con));
   $friend = mysql_fetch_array(mysql_query("SELECT * FROM userinfo WHERE id=$row[1]", $con));


   echo "<tr>
         <td class=\"title-col\">$friend[3]";
?>

<form action="/findfriends/accept-request.php" method="post" style="margin-bottom:3px">
  <input type="hidden" value=<? echo "\"$row[1]\""?> name="sender_id" />
  <input type="hidden" value=<? echo "\"$row[2]\""?> name="receiver_id" />
  <input type="submit" class="btn btn-primary btn-friend-req" name="accept" value="Accept" />
  <input type="submit" class="btn btn-default btn-friend-req" name="decline" value="Decline" style="float:right" />
</form>

<?	   
   echo "</td>
         </tr>";	 
   }		
?>

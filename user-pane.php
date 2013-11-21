<div class="pane left side">
  <?php
     $id = $_SESSION['uid'];
     $query = "SELECT * FROM userinfo WHERE id='$id' LIMIT 1";
     $result = mysql_query($query, $con);
     $user = mysql_fetch_row($result);
     
     echo "<p>
           Welcome, $user[3]!
	   </p>";
     /* if (!$user[5]) {
     echo "<p>
     <font color=\"red\">You have not yet verified your email!</font>
     </p>
       <p>
	 <a href=\"verify.php?uid=$user[0]\">Click here to resend your verification email</a>
       </p>";
       } */
  ?>
  <p>
    <a href="changepw">Change Password</a>
  </p>
</div>  

<?php 
   require_once('header.php');
   ?>
<?php if(isset($_SESSION['uid'])): ?>
  <div class="pane left">
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
    <p>
      <a href="post">Write a post!</a>
    </p>
    <p>
      <a href="findfriends">Find friends!</a>
    </p>
      <b>Friend Requests</b>
      <table border="1">
	<?php
	   $query = "SELECT * FROM friendrequests WHERE receiver_id=$id";
	   $result = mysql_query($query, $con);
	   while($row = mysql_fetch_array($result)) {
	   gen_friendrequest($row, $con);
	   }
	   ?>
      </table>
  </div>    

  <div class="pane content">
      <b>Posts</b><br />
      <table border="1" style="width:100%">
	<?php
	   $friend_ids = array();
	   $result = mysql_query("SELECT * FROM friendships WHERE id1=$id", $con);
	   while ($friendship_row = mysql_fetch_array($result)) {
	   $friend_ids[] = $friendship_row[1];
	   }
	   $query = 'SELECT * FROM posts WHERE uid IN (' . implode(',', array_map('intval', $friend_ids)) . ') ORDER BY id DESC';
	   $result = mysql_query($query, $con);
	   
	   while($row = mysql_fetch_array($result)) {
	   gen_post($row, $con);
	   }
	   ?>
      </table>
  </div>

<?php require_once('footer.php'); ?>
<?php else: ?>
<?php header("Location: login.php"); ?>
<?php endif; ?>

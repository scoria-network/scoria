<?php 
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  session_start();
  require_once('post/post-gen.php');
  require_once('findfriends/friendrequest-gen.php');
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <?php

      $con = mysql_connect("localhost", "root", "");
      mysql_select_db("Scoria");

      $id = $_SESSION['uid'];
      $query = "SELECT * FROM userinfo WHERE id='$id' LIMIT 1";
      $result = mysql_query($query, $con);
      $userinfo = mysql_fetch_row($result);

      echo "<p>
              Welcome, $userinfo[3]!
            </p>";
     /* if (!$userinfo[5]) {
        echo "<p>
                <font color=\"red\">You have not yet verified your email!</font>
	      </p>
	      <p>
	        <a href=\"verify.php?uid=$userinfo[0]\">Click here to resend your verification email</a>
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
    <div class="upper-right-cp">
      <div class="username">
        <?echo $userinfo[3];?>
      </div>
      <div class="logout">
        <a href="logout.php">Log Out</a>
      </div>
    </div>
    <div class="posts-table">
      <b>Posts</b><br />
      <table border="1">
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
    <div class="friend-requests" style="width:200px">
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
  </body>
</html>

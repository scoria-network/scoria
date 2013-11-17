<?php 
  session_start();
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <?php

      $con = mysql_connect("localhost", "root", "");
      mysql_select_db("MySite1");

      $id = $_SESSION['uid'];
      $query = "SELECT * FROM userinfo WHERE id='$id' LIMIT 1";
      $result = mysql_query($query, $con);
      $userinfo = mysql_fetch_row($result);

      echo "<p>
              Welcome, $userinfo[1]!
            </p>";
      if (!$userinfo[5]) {
        echo "<p>
                <font color=\"red\">You have not yet verified your email!</font>
	      </p>
	      <p>
	        <a href=\"verify.php?uid=$userinfo[0]\">Click here to resend your verification email</a>
	      </p>";
      }
    ?>
    <p>
      <a href="changepw">Change Password</a>
    </p>
    <p>
      <a href="post">Write a post!</a>
    </p>
    <div class="upper-right-cp">
      <div class="logout">
        <a href="logout.php">Log Out</a>
      </div>
      <div class="username">
        <?echo $userinfo[1];?>
      </div>
    </div>
    <div class="posts-table">
      <b>Posts</b><br />
      <table border="1">
      <?php
        $result = mysql_query("SELECT * FROM posts WHERE uid=$id", $con);
        while($row = mysql_fetch_array($result)) {
          echo "<tr>
                  <td class=\"title-col\"><a href=\"post.php?pid=$row[0]\">$row[2]</a></td>
		  <td>$row[3]</td>
	        </tr>";
        }
      ?>
      </table>
    </div>
  </body>
</html>

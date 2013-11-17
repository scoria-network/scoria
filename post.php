<?php
  session_start();
?>

<html>
  <body>
    <?php
      $con = mysql_connect("localhost", "root", "");
      mysql_select_db("MySite1", $con);
      $pid = $_GET['pid'];
      $row = mysql_fetch_array(mysql_query("SELECT * FROM posts WHERE id=$pid LIMIT 1", $con));
      echo "<b>$row[2]</b> by <i>";
      if ($_SESSION['uid'] == $row[1]) {
        echo "you";
      }
      else {
        $userrow = mysql_fetch_array(mysql_query("SELECT username FROM userinfo WHERE id=$row[1]", $con));
        echo $userrow[0];
      }
      echo "</i><p>$row[3]</p>";
    ?>
  </body>
</html>

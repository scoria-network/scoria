<?php
  //include_once "../header.php";
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $content = $_POST['content'];
  $uid = $_SESSION['uid'];
  $query = sprintf("INSERT INTO posts (uid, content) VALUES($uid, '%s')", mysql_real_escape_string($content));
  mysql_query("INSERT INTO posts (uid, content) VALUES($uid, '$content')", $con);
  header("Location: ../post/?success=1");
  mysql_close($con);
?>
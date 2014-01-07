<?php
  //include_once "../header.php";
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $content = trim($_POST['content']);
  $uid = $_SESSION['uid'];
  $content = htmlentities(str_replace("'", "''", $content));
  $time = time();
  $query = sprintf("INSERT INTO posts (uid, content, timestamp) VALUES($uid, '%s', $time)", mysql_real_escape_string($content));
  mysql_query($query, $con);

  header("Location: /");
  mysql_close($con);
?>

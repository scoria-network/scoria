<?php
  //include_once "../header.php";
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $content = trim($_POST['content']);
  $uid = $_SESSION['uid'];
  $content = str_replace("'", "''", $content);
  if($content != ""){
    mysql_query("INSERT INTO posts (uid, content) VALUES($uid, '$content')", $con);
  }
  header("Location: /");
  mysql_close($con);
?>
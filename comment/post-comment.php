<?php 
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $content = $_POST['content'];
  $pid = $_POST['post_id'];
  $uid = $_SESSION['uid'];
  $content = str_replace("'", "''", $content);
  mysql_query("INSERT INTO comments (pid, uid, content) VALUES($pid, $uid, '$content')", $con);
  header("Location: /");
  mysql_close($con);

?>
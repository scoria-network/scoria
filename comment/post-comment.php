<?php 
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $content = $_POST['content'];
  $pid = $_POST['post_id'];
  $uid = $_SESSION['uid'];
  $content = htmlentities(str_replace("'", "''", $content));
  $time = time();
  $query = sprintf("INSERT INTO comments (pid, uid, content, timestamp) VALUES($pid, $uid, '%s', $time)", mysql_real_escape_string($content));
  mysql_query($query, $con);
  header("Location: /");
  mysql_close($con);

?>

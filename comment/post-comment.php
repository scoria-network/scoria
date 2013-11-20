<?php 
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $content = $_POST['content'];
  $pid = $_POST['post_id'];
  $uid = $_SESSION['uid'];
  $query = sprintf("INSERT INTO comments (pid, uid, content) VALUES($pid, $uid, '%s')"), mysql_real_escape_string($content));
  mysql_query($query, $con);
  header("Location: ../main.php?success=1");
  mysql_close($con);

?>
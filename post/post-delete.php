<?php

session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $pid = $_POST['post_id'];
  $uid = $_SESSION['uid'];
  
  $query = "SELECT * FROM posts WHERE id=$pid AND uid=$uid LIMIT 1";
  $result = mysql_query($query, $con);

  if ($result) {
     echo "well this worked";
     $post = mysql_fetch_array($result);
     $query = "DELETE FROM posts WHERE id=$post[0] LIMIT 1";
     $result = mysql_query($query);
  }

  header("Location: /");
  mysql_close($con);

?>
<?php

session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $cid = $_POST['comment_id'];
  $uid = $_SESSION['uid'];

  $query = "SELECT * FROM comments WHERE id=$cid AND uid=$uid LIMIT 1";
  $result = mysql_query($query, $con);

  if ($result) {
     echo "well this worked";
     $comment = mysql_fetch_array($result);
     $query = "DELETE FROM comments WHERE id=$comment[0] LIMIT 1";
     $result = mysql_query($query);
  }

  header("Location: /");
  mysql_close($con);

?>

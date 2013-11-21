<?php
  session_start();
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $sender_id = $_POST['sender_id'];
  $receiver_id = $_POST['receiver_id'];
  $uid = $_SESSION['uid'];
  
  if (isset($_POST['accept'])) {

  mysql_query("INSERT INTO friendships (id1, id2) VALUES($sender_id, $receiver_id)", $con);
  mysql_query("INSERT INTO friendships (id1, id2) VALUES($receiver_id, $sender_id)", $con);
  
  }

  $query = "DELETE FROM friendrequests WHERE sender_id=$sender_id AND receiver_id=$receiver_id";
  
  
  $result = mysql_query($query, $con);

  
  header("Location: ../index.php?success=1");
  mysql_close($con);

?>
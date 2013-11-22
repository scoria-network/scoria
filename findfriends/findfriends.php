<?php
  session_start();
  $id = $_SESSION['uid'];
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $query = "SELECT * FROM userinfo WHERE id='$id' LIMIT 1";
  $result = mysql_query($query, $con);
  $user = mysql_fetch_row($result);

  $friend = mysql_fetch_row(mysql_query("SELECT * FROM userinfo WHERE email='$_POST[friendemail]'"));
  echo $array[3];

  if ($_POST[friendemail] == "") {
    header("Location: /");
    die();
  }
/*  else if ($friend == $user) {
    header("Location: ../findfriends/?err=2");
  }    */
  else if ($friend) {
    mysql_query("INSERT INTO friendrequests (sender_id, receiver_id) VALUES($user[0], $friend[0])");
    header ("Location: /");
    die();
  }
  else {
    header ("Location: /");
    die();
  }
?>

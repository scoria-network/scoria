<?php
  include_once "email.php";
  if (isset($_GET['id'])) {
    $con = mysql_connect("localhost", "root", "");
    mysql_select_db("MySite1", $con);
    $vid = $_GET['id'];
    $row = mysql_fetch_row(mysql_query("SELECT * FROM verification WHERE id='$vid' LIMIT 1", $con));
    $uid = $row[1];
    $row = mysql_fetch_row(mysql_query("SELECT * FROM userinfo WHERE id='$uid' LIMIT 1", $con));
    mysql_query("UPDATE userinfo SET verified=true WHERE id=$uid", $con);
    mysql_query("DELETE FROM verification WHERE uid=$uid", $con);
    echo "<html><body><font color=\"green\">User $row[1] verified!</font></body></html>";
  }
  else if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $con = mysql_connect("localhost", "root", "");
    mysql_select_db("MySite1", $con);
    $row = mysql_fetch_row(mysql_query("SELECT * FROM userinfo WHERE id='$uid' LIMIT 1", $con));
    sendveremail($row[4]);
  }
?>
  
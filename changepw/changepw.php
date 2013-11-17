<?php
  session_start();
  $id = $_SESSION['uid'];
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("Scoria", $con);
  $query = "SELECT * FROM userinfo WHERE id='$id' LIMIT 1";
  $result = mysql_query($query, $con);
  $array = mysql_fetch_row($result);
  $curpw = $_POST[curpw];
  $newpw = $_POST[newpw];
  $cnewpw = $_POST[cnewpw];
  
  if ($curpw == "" || $newpw == "" || $cnewpw == "") {
    header("Location: ../changepw/?err=1");
    die();
  }
  else if ($newpw != $cnewpw) {
    header("Location: ../changepw/?err=2");
    die();
  }
  else if ($array[2] != hash("sha256", $curpw)) {
    header("Location: ../changepw/?err=3");
    die();
  }
  else if ($curpw == $newpw) {
    header("Location: ../changepw/?err=4");
    die();
  }
  else {
    $query = "UPDATE userinfo SET password='" . hash("sha256", $newpw) . "' WHERE id=$id";
    mysql_query($query, $con);
    header ("Location: ../changepw/?success=1");
    die();
  }
?>
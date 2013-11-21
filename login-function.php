<?php
session_start();
$con = mysql_connect("localhost", "root", "");

mysql_select_db("Scoria", $con);

$pwhash = hash("sha256", $_POST[password]);

$query = "SELECT * FROM userinfo WHERE email='$_POST[email]' AND password='$pwhash' LIMIT 1";

$result = mysql_query($query, $con);
if (mysql_num_rows($result)) {
   $row = mysql_fetch_row($result);
   $_SESSION['user'] = $row;
   $_SESSION['uid'] = $row[0];
   //echo $_SESSION['uid'];
   //echo "Welcome, $row[1]!";
   header("Location: index.php");
}
else {
   echo "login failed";
}
?>  
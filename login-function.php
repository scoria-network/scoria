<?php
session_start();
$con = mysql_connect("localhost", "root", "");

mysql_select_db("Scoria", $con);

$pwhash = hash("sha256", $_POST[password]);

$query = sprintf("SELECT * FROM userinfo WHERE email='%s' AND password='$pwhash' LIMIT 1", mysql_real_escape_string($_POST['email']));

$result = mysql_query($query, $con);
if (mysql_num_rows($result)) {
   $row = mysql_fetch_row($result);
   $_SESSION['user'] = $row;
   $_SESSION['uid'] = $row[0];
   $_SESSION['leftpane'] = "user";
   //echo $_SESSION['uid'];
   //echo "Welcome, $row[1]!";
   header("Location: /");
}
else {
   echo "login failed";
}
?>  

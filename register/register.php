<?php
include_once "../email.php";
$con = mysql_connect("localhost", "root", "");
if (!$con) {
   die('Could not connect: ' . mysql_error());
}
mysql_select_db("Scoria", $con);

$query = "SELECT * FROM userinfo WHERE username='$_POST[username]' LIMIT 1";
if (mysql_num_rows(mysql_query($query, $con))) {
   header("Location: ../register/?err=1");
   die();
}

$name = $_POST[name];
$password = $_POST[password];
$cpassword = $_POST[cpassword];
$email = $_POST[email];

if ($password != $cpassword) {
     header("Location: ../register/?err=2");
     die();
}
else if ($password == "" || $email == "") {
     header("Location: ../register/?err=3");
     die();
}

$pwhash = hash("sha256", $_POST[password]);
$now = time();
$query = "INSERT INTO userinfo (email, password, name)
VALUES
('$email','$pwhash', '$name')";

if (mysql_query($query, $con)) {
   u
}
else {
   die('Error: ' . mysql_error());
}

sendveremail($email);

header("Location: ../");

mysql_close($con);
?>

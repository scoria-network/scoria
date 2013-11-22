<?php
include_once "../email.php";
$con = mysql_connect("localhost", "root", "");
if (!$con) {
   die('Could not connect: ' . mysql_error());
}
mysql_select_db("Scoria", $con);

$query = sprintf("SELECT * FROM userinfo WHERE email='%s' LIMIT 1", mysql_real_escape_string($_POST['email']));
if (mysql_num_rows(mysql_query($query, $con))) {
   header("Location: ../register/?err=1");
   die();
}

$firstname = $_POST[firstname];
$lastname = $_POST[lastname];

$name = $firstname." ".$lastname;
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
$query = sprintf("INSERT INTO userinfo (email, password, name) 
       	 		       	 	      VALUES   ('%s','$pwhash', '%s')", mysql_real_escape_string($email), mysql_real_escape_string($name));

if (mysql_query($query, $con)) {
   
}
else {
   die('Error: ' . mysql_error());
}

$query = sprintf("SELECT * FROM userinfo WHERE email='%s' LIMIT 1", mysql_real_escape_string($email));
$result = mysql_query($query, $con);

if ($result) {
   session_start();
   $user = mysql_fetch_array($result);
   $query = "INSERT INTO friendships (id1, id2) VALUES ($user[0], $user[0])";
   mysql_query($query, $con);
   $_SESSION['uid'] = $user[0];
}


sendveremail($email);

header("Location: ../main.php");

mysql_close($con);
?>

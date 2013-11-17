<?php
function rand_string( $length ) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

  $size = strlen( $chars );
  for( $i = 0; $i < $length; $i++ ) {
    $str .= $chars[ rand( 0, $size - 1 ) ];
  }

  return $str;
}
function sendveremail($to) {
  $con = mysql_connect("localhost", "root", "");
  mysql_select_db("MySite1", $con);
  $verid = rand_string(100);
  $link = "http://127.0.0.1/xampp/Site/verify.php?id=$verid";
  $subject = "Verification Email";
  $body = "Click this link:\n$link";
  $headers = "From: sender@example.com\r\n" .
     "X-Mailer: php";
  if (mail($to, $subject, $body, $headers)) {
    //echo("<p>Message sent!</p>");
   } 
   else {
     //echo("<p>Message delivery failed...</p>");
  }
  $row = mysql_fetch_row(mysql_query("SELECT * FROM userinfo WHERE email='$to' LIMIT 1"));
  $uid = $row[0];
  $row = mysql_fetch_row(mysql_query("SELECT * FROM verification WHERE uid='$uid' LIMIT 1"));
  if (!$row[0]) {
    $query = "INSERT INTO verification (id, uid) VALUES('$verid', $uid)";
  }
  else {
    $query = "UPDATE verification SET id='$verid' WHERE uid=$uid";
  }
  //echo $query;
  echo "<html><body>Email verification sent!<br />
         <a href=\"../\">Home</a></body></html>";
  mysql_query($query, $con);
  mysql_close($con);
}
 ?>
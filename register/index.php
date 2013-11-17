<html>
<body>

<?
$err = $_GET["err"];
if ($err) {
   if ($err == "1") {
     echo "<p><font color=\"red\">That email is already in use!</font></p>\n";
   }
   else if ($err == "2") {
     echo "<p><font color=\"red\">Those passwords don't match!</font></p>\n";
   }
   else if ($err == "3") {
     echo "<p><font color=\"red\">Please fill out all fields</font></p>\n";
   }
}
?>
<form action="register.php" method="post">
<p>
  Name: <input type="text" name="name" />
</p>
<p>
  Email: <input type="text" name="email" />
</p>
<p>
  Password: <input type="password" name="password" />
</p>
<p>
  Confirm Password: <input type="password" name="cpassword" />
</p>
<input type="submit" />
</form>

</body>
</html>

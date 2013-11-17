<?php
session_start();
if (isset($_SESSION['uid'])) {
   header("Location: main.php");
}
?>

<html>
<body>

<form title="Login:" action="login.php" method="post">
Login:
  <p>
    Email: <input type="text" name="email" />
  </p>
  <p>
    Password: <input type="password" name="password" />
  </p>
  <p>
    <input type="submit" />
  </p>
</form>

<a href="register">Register</a>

</body>
</html>

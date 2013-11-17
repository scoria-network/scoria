<html>
  <body>
    <?php
      $err = $_GET['err'];
      if ($err) {
        if ($err == "1") {
          echo "<p>
	          <font color=\"red\">Please fill out all fields</font>
		</p>";
	}
	else if ($err == "2") {
	  echo "<p>
                 <font	color=\"red\">Those passwords don't match</font>
                </p>";
	}
	else if	($err == "3") {
	  echo "<p>
                 <font  color=\"red\">That password doesn't match your current password</font>
                </p>";
	}
        else if ($err == "4") {
          echo "<p>
                  <font  color=\"red\">Your new password must be different from your current one. Why would you even try to do that?</font>
                </p>";
        }
      }
      if (isset($_GET['success']) && $_GET['success'] == "1") {
        echo "<p>                                                                                                         
                <font  color=\"green\">Password changed successfully!</font>                              
              </p>";
      }
    ?>

    <p>
      <b>Change Password</b>
    </p>
    <form action="changepw.php" method="post">
      <p>
        Current Password: <input type="password" name="curpw" />
      </p>
      <p>
        New Password: <input type="password" name="newpw" />
      </p>
      <p>
        Confirm New Password: <input type="password" name="cnewpw" />
      </p>
      <input type="submit" />
    </form>

  </body>
</html>

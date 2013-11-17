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
	           <font color=\"red\">You can't be friends with yourself</font>
	 	</p>";
        }
        else if ($err == "2") {
          echo "<p>
	           <font color=\"red\">You are already friends</font>
	 	</p>";
        }
        else if ($err == "3") {
          echo "<p>
	           <font color=\"red\">No user exists with that email address</font>
	 	</p>";
        }
      }
      if (isset($_GET['success']) && $_GET['success'] == "1") {
        echo "<p>                                                                                                         
                <font color=\"green\">Friend request sent!</font>                              
              </p>";
      }
    ?>

    <p>
      <b>Find Friends</b>
    </p>
    <form action="findfriends.php" method="post">
      <p>
        Friend's email address <input name="friendemail" />
      </p>
      <input type="submit" />
    </form>

  </body>
</html>

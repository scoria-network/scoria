<html>
  <body>
    <?php
       if(isset($_GET['success']) && $_GET['success'] == 1) {
         echo "<font color=\"green\">Post submitted!</font> <br />";
       }
    ?>

    <form action="post.php" method="post">
      Post Text: <textarea name="content" rows=10 cols=50></textarea><br />
      <input type="submit" />
    </form>
  </body>
</html>

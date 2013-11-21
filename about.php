<?php 
   require('header.php');
   if(isset($_SESSION['uid'])) {
      require('user-pane.php');
      require('about-pane.php');
      require('friend-pane.php'); 
   }
   else {
      header("Location: /");
   }

   require_once('footer.php');
?>

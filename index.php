<?php 
   require('header.php');
   if(isset($_SESSION['uid'])) {
      require('user-pane.php');
      require('posts-pane.php');
      require('friend-pane.php'); 
   }
   else {
      require_once('about-pane.php');
      require_once('register-pane.php');
   }

   require_once('footer.php');
?>

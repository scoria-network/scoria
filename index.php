<?php 
   require('header.php');
   if(isset($_SESSION['uid'])) {
      require('panes/user.pane');
      require('panes/posts.pane');
      require('panes/friends.pane'); 
   }
   else {
      require_once('about-pane.php');
      require_once('register-pane.php');
   }

   require_once('footer.php');
?>

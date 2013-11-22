<?php 
   require('header.php');
   if(isset($_SESSION['uid'])) {
      require('panes/user.pane');
      require('panes/about.pane');
      require('panes/friends.pane'); 
   }
   else {
      header("Location: /");
   }

   require_once('footer.php');
?>

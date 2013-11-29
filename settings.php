<?php 
   require('header.php');
   if(isset($_SESSION['uid'])) {
      $leftpane = 'panes/'.$_SESSION['leftpane'].'.pane';
      require($leftpane);
      require('panes/settings.pane');
      require('panes/friends.pane'); 
   }
   else {
      header("Location: /");
   }

   require_once('footer.php');
?>

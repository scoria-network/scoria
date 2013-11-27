<?php 
   require('header.php');
   if(isset($_SESSION['uid'])) {
      $leftpane = 'panes/'.$_SESSION['leftpane'].'.pane';
      require($leftpane);
      require('panes/posts.pane');
      require('panes/friends.pane'); 
   }
   else {
      require_once('panes/about.pane');
      require_once('panes/register.pane');
   }

   require_once('footer.php');
?>

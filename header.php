<?php 
   session_start();
   $con = mysql_connect("localhost", "root", "");
   mysql_select_db("Scoria");
   error_reporting(E_ALL);
   ini_set('display_errors', '1');
   require_once('post/post-gen.php');
   require_once('findfriends/friendrequest-gen.php');  
?>
<html>
  <head>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Scoria</title>
  </head>
<?php if(isset($_SESSION['user'])): ?>
  <body>
    <nav class="navbar navbar-default pane full" role="navigation">
      <div class="navbar-header" style="width:195px;">
	<a class="navbar-brand" href="#">Scoria</a>
      </div>

      <form class="navbar-form navbar-left" method="post" action="post/post.php" style="width:410px; padding-left:5px; padding-right:5px;">
	<div class="form-group">
	  <input type="text" name="content" class="form-control" style="width:285px; margin-right:5px;" placeholder="What's on your mind?">
	</div>
	<button type="submit" class="btn btn-default" style="width:105px;">Create Post</button>
      </form>

      <div class="navbar-left" style="width:193;">
	<button type="button" class="btn btn-default navbar-btn" id="about" style="width:88px; margin-right: 5px; float:left; margin-left:1px;">
	  About
	</button> 
	<button type="button" class="btn btn-default navbar-btn" id="logout" onclick="location.href='logout.php'" style="margin-right:10px; width: 88px; float:right">
	  Log Out
	</button> 
      </div>
    </nav>
    
    <div class="full">
<?php else: ?>

<?php endif; ?>

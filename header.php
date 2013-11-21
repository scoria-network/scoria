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
  <body>
    <nav class="navbar navbar-default pane full" role="navigation">
      <div class="navbar-header" style="width:200px;">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	  <span class="sr-only">Toggle navigation</span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="#">Scoria</a>
      </div>

      <form class="navbar-form navbar-left" method="post" action="post/post.php" style="width:410px; padding-left:5px; padding-right:5px;">
	<div class="form-group">
	  <input type="text" name="content" class="form-control" style="width:285px; margin-right:5px;" placeholder="What's on your mind?">
	</div>
	<button type="submit" class="btn btn-default" style="width:105px;">Create Post</button>
      </form>

      <div class="navbar-left" style="width:188;">
	<button type="button" class="btn btn-default navbar-btn" id="about" style="width:80px; margin-right: 5px; margin-left: 8px;">
	  About
	</button> 
	<button type="button" class="btn btn-default navbar-btn" id="logout" style="margin-right:10px; width: 80px; float:right">
	  Log Out
	</button> 
      </div>
    </nav>
    
    <div class="full">

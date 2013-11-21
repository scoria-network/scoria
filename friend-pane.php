<div class="pane right side">
    <p>
      <a href="findfriends">Find friends!</a>
    </p>
      <b>Friend Requests</b>
      <table border="1">
	<?php
	   $query = "SELECT * FROM friendrequests WHERE receiver_id=$id";
	   $result = mysql_query($query, $con);
	   while($row = mysql_fetch_array($result)) {
	   gen_friendrequest($row, $con);
	   }
	   ?>
      </table>
</div>

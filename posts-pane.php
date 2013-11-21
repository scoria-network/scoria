<div class="pane content">
  <b>Posts</b><br />
  <table border="1" style="width:100%">
    <?php
       $friend_ids = array();
       $result = mysql_query("SELECT * FROM friendships WHERE id1=$id", $con);
       while ($friendship_row = mysql_fetch_array($result)) {
         $friend_ids[] = $friendship_row[1];
       }
       $query = 'SELECT * FROM posts WHERE uid IN (' . implode(',', array_map('intval', $friend_ids)) . ') ORDER BY id DESC';
       $result = mysql_query($query, $con);
	   
       while($row = mysql_fetch_array($result)) {
	 gen_post($row, $con);
       }
       ?>
  </table>
</div>

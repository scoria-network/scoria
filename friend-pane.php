<div class="pane right side">
  <b>Find Friends</b>
  <form action="findfriends/findfriends.php" method="post" style="margin-bottom:0px;">
    <input name="friendemail" placeholder="Friend's email address" class="form-control form-register" />
    <input type="submit" class="btn btn-primary btn-sm" style="width:100%; margin-top:5px;" value="Send Friend Request">
    </form>

  <?php
     $query = "SELECT * FROM friendrequests WHERE receiver_id=$id";
     $result = mysql_query($query, $con);
     if($row = mysql_fetch_array($result)):
  ?>
    <b>Friend Requests</b>
    <table class="table table-striped" style="margin-bottom:0px; margin-top:10px">
      <?php
	 do {
       	   gen_friendrequest($row, $con);
	 } while($row = mysql_fetch_array($result));
      ?>
    </table>
    <?php endif; ?>
</div>

<?php
$con = mysql_connect("localhost", "root", "");
mysql_select_db("MySite1", $con);
$query = "CREATE TABLE userinfo
(
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
username varchar(20),
password varchar(64),
age int
)";

mysql_query($query, $con);
mysql_close($con)
?>